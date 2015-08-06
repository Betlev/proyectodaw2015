<?php //debug($tareas) ?>
<div class="tareas index">
    <h2>Lista de Tareas</h2>
    <?php if(empty($tareas)){ ?>
    No hay tareas en esta lista
    <?php }else{ ?>
     <table class="listatareas"  cellpadding="0" cellspacing="0">
        <tr>
            <th>T&iacute;tulo</th>
            <th>Prioridad</th>
            <th>Creada Por</th>
            <th class="actions">Acciones</th>
        </tr>
        <?php foreach($tareas as $tarea){
            $class='';
            if($tarea['Tarea']['estado']==0){
                $class = ' class="'.$tarea['Tarea']['prioridad'].'"';
            }
            ?>
        <tr <?php echo $class; ?>>
            <td><?php echo $tarea['Tarea']['titulo'] ?></td>
            <td><?php echo $tarea['Tarea']['prioridad'] ?></td>
            <td>
                <?php echo $this->Html->link($tarea['Usuario']['name'],array('controller'=>'usuarios','action'=>'view',$tarea['Usuario']['id'])); ?>
            </td>
            <td class="acciones actions">
                <?php echo $this->Html->link('Ver',array('action'=>'view',$tarea['Tarea']['id'])); ?>
                <?php if($tarea['Tarea']['estado']==false): ?>
                <?php if(($current_user['Usuario']['id']== $tarea['Usuario']['id']) || ($current_user['Usuario']['rol']=="admin") || ($current_user['Usuario']['id']==$tarea['Tarea']['asignado'])): ?>
                <?php echo $this->Html->link('Editar',array('action'=>'edit',$tarea['Tarea']['id'])); ?>
                <?php echo $this->Html->link('Finalizar',array('action'=>'delete',$tarea['Tarea']['id']),null,'Finalizar? Esta accion no se puede deshacer'); ?>
                <?php endif; ?>
                <?php endif; ?>
            </td>
        </tr>
        <?php } ?>
    </table>



 <?php } ?>
  </div>
 <div class="actions menu">
    <h3>Men&uacute; Tareas</h3>
    <ul>
        <li><?php echo $this->Html->link('Anadir Tarea',array('action'=>'add')); ?></li>

<?php if($status){ ?>
    <li><?php echo $this->Html->link('Listar Todas las Tareas',array('action'=>'index')); ?></li>
<?php }
if($status!='hecha'){ ?>
    <li> <?php echo $this->Html->link('Listar Tareas Terminadas',array('action'=>'index','hecha')); ?></li>
<?php }
if($status!='pendiente'){ ?>
    <li><?php echo $this->Html->link('Listar Tareas Pendientes',array('action'=>'index','pendiente')); ?></li>
<?php } ?>
    </ul>
</div>