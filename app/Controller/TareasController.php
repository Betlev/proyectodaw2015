<?php
App::uses('DboSource', 'Model/DataSource');
App::uses('AppController', 'Controller');
class TareasController extends AppController{
    public $name='Tareas';
    public $helpers = array('Html','Form','Time');
    /*metodos*/
    
    
    public function beforeFilter() {
        parent::beforeFilter();
        //no deja acceder a usuarios sin registrar
        $this->Auth->deny();
    }
    
    
    public function index($status=null){
        if($status=='hecha'){
            $tareas = $this->Tarea->find('all', array('conditions'=>array('Tarea.estado'=>'1'),'order'=>'Tarea.modified DESC'));
        }elseif($status=='pendiente'){
            $tareas = $this->Tarea->find('all', array('conditions'=>array('Tarea.estado'=>'0'),'order'=>'Tarea.modified DESC'));
        }else{
            $tareas = $this->Tarea->find('all',array('order'=>'Tarea.modified DESC'));
        }
        $this->set('tareas',$tareas);
        $this->set('status',$status);
    }
    
    public function isAuthorized($user){
        return true;
    }
    
    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException('Tarea Inv&aacute;lida');
            $this->redirect(array('action'=>'index','pendiente'),null,true);
        }
    
        $tarea = $this->Tarea->findById($id);
        if (!$tarea) {
            throw new NotFoundException('Tarea Inv&aacute;lida');
        }
    
        if ($this->request->is(array('post', 'put'))) {
            $this->Tarea->id = $id;
            if ($this->Tarea->save($this->request->data)) {
                $this->Session->setFlash('La Tarea ha sido actualizada');
                return $this->redirect(array('action' => 'index','pendiente'));
            }
            $this->Session->setFlash('No se ha podido actualizar la tarea');
        }
    
        if (!$this->request->data) {
            $this->request->data = $tarea;
            $this->set('selected',$tarea['Tarea']['prioridad']);
        }
    }
    
    public function delete($id=null){
        if(!$id){
            $this->Session-setFlash('Tarea inv&aacute;lida');
            $this->redirect(array('action'=>'index','pendiente'),null,true);
        }
        $this->Tarea->id = $id;
        $this->request->data['Tarea']['estado']=1;
        $this->request->data['Tarea']['finalizado']=DboSource::expression('NOW()'); 
        if($this->Tarea->save($this->request->data)){
            $this->Session->setFlash('Tarea #'.$id.' Terminada');
            $this->redirect(array('action'=>'index','pendiente'),null,true);
        }
    }
    
    public function view($id=null){
        if(!$id){
            $this->Session-setFlash('Tarea inv&aacute;lida');
            $this->redirect(array('action'=>'index','pendiente'),null,true);
        }
        $this->Tarea->id = $id;
        if (!$this->Tarea->exists()) {
            throw new NotFoundException('Tarea inv&aacute;lido');
        }
        $this->set('tarea', $this->Tarea->findAllById($id));
    }
    
    public function add(){
        if(!empty($this->data)){
            $user = $this->Auth->user();
            $this->request->data['Tarea']['creador']= $user['Usuario']['id'];
            if($this->request->data['Tarea']['asignado']==0){
                $this->request->data['Tarea']['asignado']=null;
            }else{
                $this->request->data['Tarea']['asignado']= $user['Usuario']['id'];
            }
            if($this->Tarea->save($this->request->data)){
                unset($user);
                $this->Session->setFlash('La Tarea ha sido guardada correctamente');
                $this->redirect(array('action'=>'index','pendiente'),null,true);
            }else{
                $this->Session->setFlash('No se pudo guardar la tarea');
            }
        }
    }
}
?>