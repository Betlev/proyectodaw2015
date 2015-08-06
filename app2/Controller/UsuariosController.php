<?php
App::uses('AppController', 'Controller');

class UsuariosController extends AppController {
    public $name ='Usuarios';

    public function beforeFilter() {
        $this->Auth->allow('add','logout');
    }
    public function login() {
        if ($this->request->is('post')) {
           $usuario = $this->Usuario->find('first',array( 'conditions'=>array('username'=>$this->request->data['Usuario']['username'],'password'=>$this->request->data['Usuario']['password'])));
            unset($usuario['Usuario']['password']);
            if ($this->Auth->login($usuario)) {
                return $this->redirect(array('controller'=>'tareas','action' => 'index'));
            }else{
                $this->Session->setFlash('Invalid username or password, try again');
            }
        }
    }
    public function isAuthorized($user){
        return true;
    }
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function index() {
        $this->Usuario->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        $this->Usuario->id = $id;
        if (!$this->Usuario->exists()) {
            throw new NotFoundException('Usuario invalido');
        }
        $this->set('user', $this->Usuario->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Usuario->create();
            if ($this->Usuario->save($this->request->data)) {
                $this->Session->setFlash('Usuario registrado con &eacute;xito');
                return $this->redirect(array('controller'=>'usuarios','action' => 'login'));
            }
            $this->Session->setFlash('No se ha podido registrar el usuario');
        }
    }

    public function edit($id = null) {
        $this->Usuario->id = $id;
        if (!$this->Usuario->exists()) {
            throw new NotFoundException('Usuario incorrecto');
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Usuario->save($this->request->data)) {
                $this->Session->setFlash('Cambios guardados');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash('No se han podido guardar los cambios');
        } else {
            $this->request->data = $this->Usuario->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        $this->request->allowMethod('post');

        $this->Usuario->id = $id;
        if (!$this->Usuario->exists()) {
            throw new NotFoundException('Usuario incorrecto');
        }
        if ($this->Usuario->delete()) {
            $this->Session->setFlash('Usuario eliminado');
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('No se pudo borrar el usuario');
        return $this->redirect(array('action' => 'index'));
    }
}
?>