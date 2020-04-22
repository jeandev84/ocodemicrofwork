<?php
namespace App\Controllers\Auth;


use App\Auth\Auth;
use App\Auth\Hashing\Contracts\Hasher;
use App\Controllers\Controller;
use App\Models\User;
use App\Session\Flash;
use App\Views\View;
use Doctrine\ORM\EntityManager;
use League\Route\RouteCollection;


/**
 * Class RegisterController
 * @package App\Controllers\Auth
*/
class RegisterController extends Controller
{

    /** @var  */
    protected $view;


    /**
     * @var Hasher
     */
    private $hash;


    /** @var EntityManager  */
    private $db;
    /**
     * @var RouteCollection
     */
    private $route;


    /**
     * HomeController constructor.
     * @param View $view
     * @param Hasher $hash
     * @param EntityManager $db
     * @param RouteCollection $route
     */
    public function __construct(
        View $view,
        Hasher $hash,
        EntityManager $db,
        RouteCollection $route
    )
    {
        $this->view = $view;
        $this->hash = $hash;
        $this->db = $db;
        $this->route = $route;
    }

    /**
     * Show the register form
     *
     * @param $request
     * @param $response
     * @return mixed
     *
     */
    public function index($request, $response)
    {
        return $this->view->render($response, 'auth/register.twig');
    }


    /**
     * Sign in user or Login user
     * @param $request
     * @param $response
     * @throws \App\Exceptions\ValidationException
    */
    public function register($request, $response)
    {
        $data = $this->validateRegistration($request);

        $user = $this->createUser($data);

        return redirect($this->route->getNamedRoute('home')->getPath());
    }


    /**
     * Create an user
     * @param $data
     */
    protected function createUser($data)
    {
         $user = new User();

         $user->fill([
             'name' => $data['name'],
             'email' => $data['email'],
             'password' => $this->hash->create($data['password']),
             'remember_token' => 'NULL',
             'remember_identifier' => 'NULL',
         ]);

         $this->db->persist($user);
         $this->db->flush();

         return $user;
    }

    /**
     * @param $request
     * @return mixed
     */
    protected function validateRegistration($request)
    {
        # equals (password_confirmation must be equal to password)
        # users name of table User::class or users
         return $this->validate($request, [
             'email' => ['required', 'email', ['exists', User::class]],
             'name'  => ['required'],
             'password'  => ['required'],
             'password_confirmation'  => ['required', ['equals', 'password']]
         ]);
    }
}