<h2>Lista de Tareas</h2>
<?php if(empty($tareas)){ ?>
No hay tareas en esta lista
<?php }else{ ?>
<table>
 <table>
    <tr>
        <th>Titulo</th>
        <th>Estatus</th>
        <th>Creado</th>
        <th>Modificado</th>
        <th>Acciones</th>
    </tr>
    <?php foreach($tareas as $tarea){ ?>
    <tr>
        <td>
            <?php echo $tarea['Tarea']['titulo'] ?>
        </td>
        <td>
            <?php echo $tarea['Tarea']['prioridad'] ?>
        </td>
        <td>
            <?php echo $tarea['Tarea']['created'] ?>
        </td>
        <td>
            <?php echo $tarea['Tarea']['modified'] ?>
        </td>
        <td>
            <?php echo $this->Html->link('Editar',array('action'=>'edit',$tarea['Tarea']['id'])); ?>
            &nbsp;
            <?php echo $this->Html->link('Borrar',array('action'=>'delete',$tarea['Tarea']['id']),null,'¿Estas Seguro?'); ?>
        </td>
    </tr>
    <?php } ?>
</table>
 <?php } ?>
<?php echo $this->Html->link('Anadir Tarea',array('action'=>'add')); ?>

<?php if($status){
    echo $this->Html->link('Listar Todas las Tareas',array('action'=>'index'));
    echo '<br/>';
}
if($status!='hecha'){
    echo $this->Html->link('Listar Tareas Hechas',array('action'=>'index','hecha'));
    echo '<br/>';
}
if($status!='pendiente'){
    echo $this->Html->link('Listar Tareas Pendientes',array('action'=>'index','pendiente'));
    echo '<br/>';
}