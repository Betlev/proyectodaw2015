<?php
class TareasController extends AppController{
    public $name='Tareas';
    public $helpers = array('Html','Form');
    /*metodos*/
    
    public function beforeFilter() {
        //no deja acceder a usuarios sin registrar
        $this->Auth->deny();
    }
    
    
    public function index($status=null){
        if($status=='hecha'){
            $tareas = $this->Tarea->find('all', array('conditions'=>array('Tarea.estado'=>'1')));
        }elseif($status=='pendiente'){
            $tareas = $this->Tarea->find('all', array('conditions'=>array('Tarea.estado'=>'0')));
        }else{
            $tareas = $this->Tarea->find('all');
            $this->set('tareas',$tareas);
            $this->set('status',$status);
        }
    }
    
    public function isAuthorized($user){
        return true;
    }
    
    
    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Tarea Invalida'));
            $this->redirect(array('action'=>'index'),null,true);
        }
    
        $tarea = $this->Tarea->findById($id);
        if (!$tarea) {
            throw new NotFoundException(__('Tarea Invalida'));
        }
    
        if ($this->request->is(array('post', 'put'))) {
            $this->Tarea->id = $id;
            if ($this->Tarea->save($this->request->data)) {
                $this->Session->setFlash(__('La Tarea ha sido actualizada'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('No se ha podido salvar la tarea'));
        }
    
        if (!$this->request->data) {
            $this->request->data = $tarea;
            $this->set('selected',$tarea['Tarea']['prioridad']);
        }
    }/*
    public function edit($id=null){
        debug($id);
        if(!$id){
            $this->Session->setFlash('Tarea Invalida');
            $this->redirect(array('action'=>'index'),null,true);
        }
        if(empty($this->request->data)){
            $this->request->data = $this->Tarea->findAllById($id);
        }else{
            if($this->Tarea->save($this->data)){
                $this->Session->setFlash('La Tarea ha sido salvada');
                $this->redirect(array('action'=>'index'),null,true);
            }else{
                $this->Session->setFlash('No se ha podido salvar la tarea');
            }
        }
    }*/
    
    public function delete($id=null){
        if(!$id){
            $this->Session-setFlash('id invalida para borrar tarea');
            $this->redirect(array('action'=>'index'),null,true);
        }
        if($this->Tarea->delete($id)){
            $this->Session->setFlash('Tarea #'.$id.' borrada');
            $this->redirect(array('action'=>'index'),null,true);
        }
    }
    
    
    
    public function add(){
        if(!empty($this->data)){
            //la linea para guardar el id del creador
            $user = $this->Auth->user();
            $this->request->data['Tarea']['creador']= $user['Usuario']['id']; 
            if($this->Tarea->save($this->request->data)){
                unset($user);
                $this->Session->setFlash('La Tarea ha sido guardada correctamente');
                $this->redirect(array('action'=>'index'),null,true);
            }else{
                $this->Session->setFlash('No se pudo guardar la tarea');
            }
        }
    }
}
?>