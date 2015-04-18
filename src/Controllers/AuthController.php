<?php
/**
 * File name: AuthController.php
 *
 * Project: Project1
 *
 * PHP version 5
 *
 * $LastChangedDate$
 * $LastChangedBy$
 */

namespace Controllers;
use Common\Authentication\Authenticate;
use Common\Authentication\Registration;
use Common\Authentication\User;
use Views\LoginForm;
use Views\WelcomeView;

/**
 * Class AuthController
 */
class AuthController extends Controller
{
    /**
     * Function execute
     *
     * @access public
     */
    public function action() {
        $view = new LoginForm();
        $view->show();
    }

    public function login($username='', $password='') {

        $auth = new Authenticate();
        $result = $auth->authenticate($username, $password);

        if ($result === true) {
            $user = new User($username);
            //print_r($user->profile());
            $view = new WelcomeView($user->profile());
            $view->showPartial();
            die;
        }
       
       echo "false";
    }

    public function register($username='', $password='', $twitter='', $firstName, $lastName) {


        $register = new Registration();

        $result = $register->addUser($username, $password, $twitter, $firstName, $lastName);

        if($result === true){
            $user = new User($username);
            $view = new WelcomeView($user->profile());
            $view->showPartial();
            die;

        }

        echo "false";

    }
}
