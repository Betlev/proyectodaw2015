<?php //debug($tarea) ?>
<div class="tareas index">
    <h4>T&iacute;tulo</h4>
    <div class="titulo"><?php echo $tarea[0]['Tarea']['titulo'] ?></div>
    <h4>Descripci&oacute;n</h4>
    <div class="descripcion"><?php echo $tarea[0]['Tarea']['descripcion'] ?></div>
    <table class="info">
        <tr>
            <th>Creada por</th>
            <th>F.Creaci&oacute;n</th>
            <th>Estado</th>
            <th>&Uacute;lt.Modificaci&oacute;n</th>
            <th>F.Finalizaci&oacute;n</th>
            <th>Asignado A</th>
        </tr>
        <tr>
            <td><?php if($tarea[0]['Usuario']['name']==null) echo ' - '; else echo $this->Html->link($tarea[0]['Usuario']['name'],array('controller'=>'usuarios','action'=>'view',$tarea[0]['Usuario']['id'])); ?></td>
            <td><?php echo $this->Time->format($tarea[0]['Tarea']['created'],'%d/%m/%Y %H:%M')?></td>
            <td><?php if($tarea[0]['Tarea']['estado']==0) echo 'Pendiente'; else echo 'Finalizada'; ?></td>
            <td><?php echo $this->Time->format($tarea[0]['Tarea']['modified'],'%d/%m/%Y %H:%M') ?></td>
            <td><?php echo $this->Time->format($tarea[0]['Tarea']['finalizado'],'%d/%m/%Y %H:%M') ?></td>
            <td><?php if($tarea[0]['Asign']['name']==null) echo ' - '; else echo $this->Html->link($tarea[0]['Asign']['name'],array('controller'=>'usuarios','action'=>'view',$tarea[0]['Asign']['id'])); ?></td>
        </tr>
    </table>
</div>
<div class="actions">
    <h3>Men&uacute; Tareas</h3>
    <ul>
        <li><?php echo $this->Html->link('Listar Todas las Tareas',array('action'=>'index')); ?></li>
        <li> <?php echo $this->Html->link('Listar Tareas Terminadas',array('action'=>'index','hecha')); ?></li>
        <li><?php echo $this->Html->link('Listar Tareas Pendientes',array('action'=>'index','pendiente')); ?></li>
    </ul>
</div>