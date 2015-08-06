<?php

App::uses('AppModel', 'Model');
class Usuario extends AppModel{
    public $name='Usuario';
    /*public $validate = array(
        'username' => array(
            'Requerido' =>array(
                'rule' => 'notEmpty',
                'message' => 'Debes introducir un nombre de usuario.'
            )
        ),
        'password' => array(
            'Requerido' => array(
                'rule' => 'notEmpty',
                'message' => 'Debes introducir la contrasenia.'
            )
        )
    );*/
}
?>