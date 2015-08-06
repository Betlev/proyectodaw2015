<div class="index">
<?php echo $this->Form->create('Tarea'); ?>
<fieldset>
    <legend>Nueva Tarea</legend>
    <?php
    echo $this->Form->input('Tarea.titulo',array('error' => array(
        'attributes' => array('escape' => false)
    )));
    echo $this->Form->input('Tarea.descripcion',array('error' => array(
        'attributes' => array('escape' => false)
    )));
    echo $this->Form->input('Tarea.prioridad',array(
        'options'=>array(
            'minima'=>'Minima',
            'baja'=>'Baja',
            'normal'=>'Normal',
            'alta'=>'Alta',
            'urgente'=>'Urgente'
            ),
        'empty'=>'(Seleccionar)'
            )
        );
    echo $this->Form->input('Tarea.estado',array('type'=>'hidden','value'=>'0'));
    echo $this->Form->input('asignado',array('type'=>'checkbox','label'=>'Gestionar'));
    ?>
</fieldset>
<?php echo $this->Form->end('Nueva Tarea'); ?>
</div>
<div class="actions">
    <h3>Men&uacute; Tareas</h3>
    <ul>
        <li><?php echo $this->Html->link('Listar Todas las Tareas',array('action'=>'index')); ?></li>
        <li> <?php echo $this->Html->link('Listar Tareas Terminadas',array('action'=>'index','hecha')); ?></li>
        <li><?php echo $this->Html->link('Listar Tareas Pendientes',array('action'=>'index','pendiente')); ?></li>
    </ul>
</div>
