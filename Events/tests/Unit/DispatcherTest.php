<?php
namespace App\Tests\Unit;


use App\Core\Events\Dispatcher;
use App\Tests\Stubs\ListenerSub;
use PHPUnit\Framework\TestCase;


/**
 * Class DispatcherTest
 * @package App\Tests\Unit
*/
class DispatcherTest extends TestCase
{
     /** @test */
     public function itHoldsListenersInAanArray()
     {
          $dispatcher = new Dispatcher();

          $this->assertEmpty($dispatcher->getListeners());
          /* $this->assertInternalType('array', $dispatcher->getListeners()); */
         $this->assertIsArray($dispatcher->getListeners());
     }


     /** @test */
     public function itCanAddListener()
     {
         $dispatcher = new Dispatcher();

         $dispatcher->addListener('UserSignedUp', new ListenerSub());

         $this->assertCount(1, $dispatcher->getListeners()['UserSignedUp']);
     }


     /** @test */
     public function itCanGetListenersByEventName()
     {
         $dispatcher = new Dispatcher();

         $dispatcher->addListener('UserSignedUp', new ListenerSub());

         $this->assertCount(1, $dispatcher->getListenersByEvent('UserSignedUp'));

     }


     /** @test */
     public function itReturnsEmptyArrayIfNoListenersSetForEvent()
     {
         $dispatcher = new Dispatcher();

         $this->assertCount(0, $dispatcher->getListenersByEvent('UserSignedUp'));
     }


     /** @test */
     public function itCanCheckIfHasListenerRegisteredForEvent()
     {
          $dispatcher = new Dispatcher();

          $this->assertFalse($dispatcher->hasListeners('UserSignedUp'));
     }
}