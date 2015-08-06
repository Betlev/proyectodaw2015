<?php
 echo $this->Form->create('Tarea'); ?>
 <fieldset>
    <legend>Editar Tarea</legend>
    <?php
    debug($selected);
    echo $this->Form->hidden('Tarea.id');
    echo $this->Form->input('Tarea.titulo');
    echo $this->Form->input('Tarea.prioridad',(
        'selected' => $selected,
        'options'=>array(
            0=>'minima',
            1=>'baja',
            2=>'normal',
            3=>'alta',
            4=>'urgente'
            ),
        'empty'=>'(Seleccionar)'
        )
        );
    ?>
 </fieldset>
 <?php echo $this->Form->end('Guardar Cambios'); ?>
<?php echo $this->Html->link('Ver Lista de Tareas',array('action'=>'index'));
echo '<br/>'; ?>
<?php echo $this->Html->link('Anadir Tarea',array('action'=>'add'));
echo '<br/>';
echo $this->Html->link('Listar Tareas Hechas',array('action'=>'index','hecha'));
echo '<br/>';
echo $this->Html->link('Listar Tareas Pendientes',array('action'=>'index','pendiente'));
?>