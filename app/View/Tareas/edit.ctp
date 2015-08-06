 <div class="index">
<?php
 echo $this->Form->create('Tarea'); ?>
 <fieldset>
    <legend>Editar Tarea</legend>
    <?php
    echo $this->Form->hidden('Tarea.id');
    echo $this->Form->input('Tarea.titulo',array('error' => array(
        'attributes' => array('escape' => false)
    )));
    echo $this->Form->input('Tarea.descripcion',array('error' => array(
        'attributes' => array('escape' => false)
    )));
    echo $this->Form->input('Tarea.prioridad',array(
        'selected' => $selected,
        'default' => $selected,
        'options'=>array(
            'minima'=>'minima',
            'baja'=>'baja',
            'normal'=>'normal',
            'alta'=>'alta',
            'urgente'=>'urgente'
            ),
        'empty'=>'(Seleccionar)'
        )
        );
    echo $this->Form->input('asignado',array('type'=>'checkbox','label'=>'Gestionar'));
    ?>
 </fieldset>
 <?php echo $this->Form->end('Guardar Cambios'); ?>
</div>


<div class="actions">
    <h3>Menu Tareas</h3>
    <ul>
        <li><?php echo $this->Html->link('Anadir Tarea',array('action'=>'add')); ?></li>
        <li><?php echo $this->Html->link('Listar Todas las Tareas',array('action'=>'index')); ?></li>
        <li> <?php echo $this->Html->link('Listar Tareas Terminadas',array('action'=>'index','hecha')); ?></li>
        <li><?php echo $this->Html->link('Listar Tareas Pendientes',array('action'=>'index','pendiente')); ?></li>
    </ul>
</div>