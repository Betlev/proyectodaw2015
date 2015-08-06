<?php

App::uses('AppModel', 'Model');
class Usuario extends AppModel{
    public $name='Usuario';
    public $hasMany = array(
        'Tarea' => array(
            'className' =>'Tarea',
            'foreignKey' => 'creador'
            ),
        'Asign' =>array(
            'className'=>'Tarea',
            'foreignKey'=>'asignado'
            )
        );
    public $validate = array(
        'name'=>array(
            'Introduce tu nombre.'=>array(
                'rule'=>'notEmpty',
                'message'=>'Debes introducir tu nombre.'
            )
        ),
        'username' => array(
            'Requerido' =>array(
                'rule' => 'notEmpty',
                'message' => 'Debes introducir un nombre de usuario.'
            ),
            'Longitud'=>array(
                'rule'=>array('between',5,15),
                'message'=>'El nombre de usuario debe tener entre 5 y 15 caracteres.'
            ),
            'unico'=>array(
                'rule'=>'isUnique',
                'message'=>'El nombre de usuario ya se encuentra en uso'
            )
        ),
        'email'=>array(
            'valido'=>array(
                'rule'=>array('email'),
                'message'=> 'Introduce un E-Mail v&aacute;lido.'
            )
        ),
        'password' => array(
            'Requerido' => array(
                'rule' => 'notEmpty',
                'message' => 'Debes introducir la contrase&ntilde;a.'
            ),
            'coinciden'=>array(
                'rule'=>'matchPasswd',
                'message'=> 'Las contrase&ntilde;as no coinciden.'
            )
        ),
        'password_confirmation' => array(
            'Requerido' => array(
                'rule' => 'notEmpty',
                'message' => 'Vuelve a introducir tu contrase&ntilde;a.'
            )
        )
    );
    public function matchPasswd($data){
        if($data['password']==$this->data['Usuario']['password_confirmation']){
            return true;
        }
        $this->invalidate('password_confirmation','Las contrase&ntilde;as no coinciden.');
        return false;
    }
    
    public function beforeSave($options=array()){
        if(isset($this->data['Usuario']['password'])){
            $this->data['User']['password']=AuthComponent::password($this->data['User']['password']);
        }
        return true;
    }
}
?>