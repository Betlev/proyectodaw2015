<?php
App::uses('AppModel', 'Model');
class Tarea extends AppModel{
    public $name='Tarea';
    public $validate = array(
        'titulo'=> array(
            'rule' =>'notEmpty',
            'message' => 'Debes poner un Titulo'
        )
    );
}
?>