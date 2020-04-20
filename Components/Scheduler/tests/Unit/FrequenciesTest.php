<?php

use App\Scheduler\Event;
use App\Scheduler\Frequencies;
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;


/**
 * Class FrequenciesTest
*/
class FrequenciesTest extends TestCase
{


    /**
     * @test
     */
    public function canReplaceIntoExpressionAtPosition()
    {
        $frequencies = $this->frequencies();
        # $frequencies->replaceIntoExpression(1, '*/10');
        $frequencies->replaceIntoExpression(1, 1);

        $this->assertEquals($frequencies->expression, '1 * * * *');
    }


    /**
     * @test
     */
    public function canReplaceIntoExpressionByChaining()
    {
        $frequencies = $this->frequencies();
        $frequencies->replaceIntoExpression(1, 1)
                    ->replaceIntoExpression(2, 2);

        $this->assertEquals($frequencies->expression, '1 2 * * *');
    }


    /**
     * @test
    */
    public function canReplaceIntoExpressionWithArray()
    {
        $frequencies = $this->frequencies();
        $frequencies->replaceIntoExpression(1, [1, 2]);

        $this->assertEquals($frequencies->expression, '1 2 * * *');
    }


    /**
     * @test
     */
    public function canReplacePastTheEndOfAnExpression()
    {
        $frequencies = $this->frequencies();
        $frequencies->replaceIntoExpression(5, [1, 2]);
        $this->assertEquals($frequencies->expression, '* * * * 1');
        /*
        $frequencies->replaceIntoExpression(4, [1, 2, 3]);
        $this->assertEquals($frequencies->expression, '* * * 1 2');
        */
    }



    /**
     * @test
    */
    public function canSetPlainCronExpression()
    {
        $frequencies = $this->frequencies();
        $frequencies->cron('some expression');

        $this->assertEquals($frequencies->expression, 'some expression');
    }


    /**
     * @test
    */
    public function canSetEveryMinute()
    {
        $frequencies = $this->frequencies();
        $frequencies->everyMinute();

        $this->assertEquals($frequencies->expression, '* * * * *');
    }



    /**
     * @test
     */
    public function canSetEveryTenMinutes()
    {
        $frequencies = $this->frequencies();
        $frequencies->everyTenMinutes();

        $this->assertEquals($frequencies->expression, '*/10 * * * *');
    }


    /**
     * @test
     */
    public function canSetEveryThirtyMinutes()
    {
        $frequencies = $this->frequencies();
        $frequencies->everyThirtyMinutes();

        $this->assertEquals($frequencies->expression, '*/30 * * * *');
    }


    /**
     * @test
     */
    public function canSetHourlyAt()
    {
        $frequencies = $this->frequencies();
        $frequencies->hourlyAt(45); // 45 min

        $this->assertEquals($frequencies->expression, '45 * * * *');
    }

    /**
     * @test
     */
    public function canSetHourly()
    {
        $frequencies = $this->frequencies();
        $frequencies->hourly(); // chaque heure

        $this->assertEquals($frequencies->expression, '1 * * * *');
    }


    /**
     * @test
     */
    public function canSetDailyAt()
    {
        $frequencies = $this->frequencies();
        $frequencies->dailyAt(12, 30); // heure et minutes

        $this->assertEquals($frequencies->expression, '30 12 * * *');
    }

    /**
     * @test
     */
    public function canSetDaily()
    {
        $frequencies = $this->frequencies();
        $frequencies->daily();

        $this->assertEquals($frequencies->expression, '0 0 * * *');
    }


    /**
     * @test
     */
    public function canSetTwiceDaily()
    {
        $frequencies = $this->frequencies();
        $frequencies->twiceDaily(3, 7);

        $this->assertEquals($frequencies->expression, '0 3,7 * * *');
    }


    /**
     * @test
     */
    public function canSetTwiceDailyUsingDefaults()
    {
        $frequencies = $this->frequencies();
        $frequencies->twiceDaily();

        $this->assertEquals($frequencies->expression, '0 1,12 * * *');
    }


    /**
     * @test
     */
    public function canSetDays()
    {
        $frequencies = $this->frequencies();
        $frequencies->days(1, 3, 5);

        $this->assertEquals($frequencies->expression, '* * * * 1,3,5');
    }


    /**
     * @test
     */
    public function canSetMondays()
    {
        $frequencies = $this->frequencies();
        $frequencies->mondays();

        $this->assertEquals($frequencies->expression, '* * * * 1');
    }


    /**
     * @test
     */
    public function canSetTuesdays()
    {
        $frequencies = $this->frequencies();
        $frequencies->tuesdays();

        $this->assertEquals($frequencies->expression, '* * * * 2');
    }


    /**
     * @test
     */
    public function canSetAtTime()
    {
        $frequencies = $this->frequencies();
        $frequencies->at(12, 30);

        $this->assertEquals($frequencies->expression, '30 12 * * *');
    }



    /**
     * @test
     */
    public function canSetDayAndTime()
    {
        $frequencies = $this->frequencies();
        $frequencies->at(12, 30)->weekends();

        $this->assertEquals($frequencies->expression, '30 12 * * 6,7');
    }


    /**
     * @test
     */
    public function canSetMonthly()
    {
        $frequencies = $this->frequencies();
        $frequencies->monthly();

        $this->assertEquals($frequencies->expression, '0 0 1 * *');
    }



    /**
     * @test
     */
    public function canSetMonthlyOnSpecificDay()
    {
        $frequencies = $this->frequencies();
        # $frequencies->monthlyOn(10)->at(12, 30);
        $frequencies->monthlyOn(10);

        $this->assertEquals($frequencies->expression, '0 0 10 * *');
    }


    /** @test */
    public function replacementWorksCorrectly()
    {
        $frequencies = $this->frequencies();
        $frequencies->daily()->daily();

        $this->assertEquals($frequencies->expression, '0 0 * * *');
    }



    /**
     * @return \PHPUnit\Framework\MockObject\MockObject
    */
    protected function frequencies()
    {
        $frequencies = $this->getMockForTrait(Frequencies::class);
        $frequencies->expression = '* * * * *';

        return $frequencies;
    }
}