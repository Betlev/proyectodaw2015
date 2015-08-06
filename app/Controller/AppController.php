<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
      public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'usuarios',
                'action' => 'index',
            ),
            'logoutRedirect' => array(
                'controller' => 'usuarios',
                'action' => 'login'
            ),
            'authError' => 'No puedes acceder a esta zona: identificate',
            'authorize' => array('Controller'),
            'authenticate' => array(
                'Form'
            ),
            'loginAction' => array(
                'controller' =>'usuarios',
                'action' => 'login'
            ),
        ),
        'RequestHandler'
    );
    public function isAuthorized($user) {
        //determina si el usuario logueado tiene permiso para acceder
        return true;
    }
    public function beforeFilter(){
        //determina a donde pueden acceder usuarios sin loguear
        $this->Auth->allow('index','view');
        //poniendo esto aqui otros controladores tendran acceso si es necesario
        $this->set('logueado',$this->Auth->loggedIn());
        $this->set('current_user',$this->Auth->user());
    }
}
