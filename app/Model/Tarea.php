<?php
App::uses('AppModel', 'Model');
class Tarea extends AppModel{
    public $name='Tarea';
    public $belongsTo = array(
        'Usuario' => array(
            'className' =>'Usuario',
            'foreignKey' => 'creador'
            ),
        'Asign' => array(
            'className' =>'Usuario',
            'foreignKey' => 'asignado'
            )
        );
    public $validate = array(
        'titulo'=> array(
            'rule' =>'notEmpty',
            'message' => 'Debes poner un T&iacute;tulo'
        ),
        'descripcion' =>array(
            'rule'=>'notEmpty',
            'message'=>'Debes poner una descripci&oacute;n'
        ),
        'prioridad'=>array(
            'rule'=>'notEmpty',
            'message'=>'Debes seleccionar un nivel de prioridad'
        )
        
    );
}
?>