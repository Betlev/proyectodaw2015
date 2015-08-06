<?php //debug($user); ?>
<div class="index">
    <div class="usuario">
        <table>
            <caption>Informaci&oacute;n de usuario</caption>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Nick</th>
                <th>Rol</th>
            </tr>
            <tr>
                <td><?php echo $user[0]['Usuario']['name'] ?></td>
                <td><?php echo $user[0]['Usuario']['email'] ?></td>
                <td><?php echo $user[0]['Usuario']['username'] ?></td>
                <td><?php echo $user[0]['Usuario']['rol'] ?></td>
            </tr>
        </table>
    </div>
    <?php if(empty($user[0]['Tarea'])){?>
    <h6>El usuario no tiene tareas</h6>
    <?php }else{ ?>
    <div class="tareas">
         <table>
            <tr>
                <th>T&iacute;tulo</th>
                <th>Prioridad</th>
                <th>Creado</th>
                <th>Estado</th>
                <th>Finalizado</th>
            </tr>
            <?php foreach($user[0]['Tarea'] as $tarea){ ?>
            <tr>
                <td><?php echo $tarea['titulo'] ?></td>
                <td><?php echo $tarea['prioridad'] ?></td>
                <td><?php echo $this->Time->format($tarea['created'],'%d/%m/%Y %H:%M') ?></td>
                <td><?php if($tarea['estado']==0) echo 'Pendiente'; else echo 'Finalizada'; ?></td>
                <td><?php echo $this->Time->format($tarea['finalizado'],'%d/%m/%Y %H:%M') ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <?php } ?>
</div>
<div class="actions menu">
    <h3>Men&uacute; usuarios</h3>
    <ul>
        <li><?php echo $this->Html->link('Nuevo usuario',array('action'=>'add')); ?></li>
        <li><?php echo $this->Html->link('Lista de usuarios',array('action'=>'index')); ?></li>
    </ul>
</div>

<?php

?>