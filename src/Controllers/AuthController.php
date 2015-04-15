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
            // header( 'Location: /welcome' ) ;
            $view = new WelcomeView();
            $view->showPartial();
            die;
        }
       
       echo "false";
    }
}
