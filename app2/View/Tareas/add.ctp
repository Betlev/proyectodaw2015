<?php echo $this->Form->create('Tarea'); ?>
<fieldset>
    <legend>Nueva Tarea</legend>
    <?php
    echo $this->Form->input('Tarea.titulo');
    echo $this->Form->input('Tarea.prioridad',array(
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
<?php echo $this->Form->end('Nueva Tarea'); ?>
<?php echo $this->Html->link('Ver Lista de Tareas',array('action'=>'index'));
echo '<br/>';
echo $this->Html->link('Listar Tareas Hechas',array('action'=>'index','hecha'));
echo '<br/>';
echo $this->Html->link('Listar Tareas Pendientes',array('action'=>'index','pendiente'));
?>