<?php
App::uses('AppController', 'Controller');

class UsuariosController extends AppController {
    public $name ='Usuarios';

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('logout');
    }
    public function login() {
        if ($this->request->is('post')) {
            $usuario = $this->Usuario->find('first',array( 'conditions'=>array('username'=>$this->request->data['Usuario']['username'],'password'=>$this->request->data['Usuario']['password'])));
            unset($usuario['Usuario']['password']);
            if ($this->Auth->login($usuario)) {
                return $this->redirect($this->Auth->redirectUrl());
            }else{
                $this->Session->setFlash('La combinacion de usuario/contrase&ntilde;a es incorrecta');
            }
        }
    }
    public function isAuthorized($user){
        if($user['Usuario']['rol']=='admin'){
            return true;
        }
        if(in_array($this->action,array('edit','delete'))){
            if($user['Usuario']['id'] != $this->request->params['pass'][0]){
                return false;
            }
        }
        if(in_array($this->action,'add')){
            if($user['Usuario']['rol'] != 'admin'){
                return false;
            }
        }
        return true;
    }
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function index() {
        $this->Usuario->recursive = 0;
        $this->set('usuarios', $this->paginate());
    }

    public function view($id = null) {
        $this->Usuario->id = $id;
        if (!$this->Usuario->exists()) {
            throw new NotFoundException('Usuario inv&aacute;lido');
        }
        $this->set('user', $this->Usuario->findAllById($id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Usuario->create();
            if ($this->Usuario->save($this->request->data)) {
                $this->Session->setFlash('Usuario registrado con &eacute;xito');
                return $this->redirect(array('controller'=>'usuarios','action' => 'index'));
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
            $this->request->data = $this->Usuario->findById($id);
            $this->request->data['Usuario']['password_confirmation'] = $this->request->data['Usuario']['password'];
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
            $curusr =$this->Auth->user();
            if($curusr['Usuario']['id']==$id){
                return $this->redirect($this->Auth->logout());
            }
            return $this->redirect(array('action'=>'index'));
        }
        $this->Session->setFlash('No se pudo borrar el usuario');
    }
}
?>