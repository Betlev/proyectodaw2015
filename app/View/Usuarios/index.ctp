<div class="users index">
    <h2>Usuarios</h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Nick</th>
            <th>E-Mail</th>
            <th>Administrador</th>
            <th class="acciones actions">Acciones</th>
        </tr>
        <?php
        $i=0;
        foreach ($usuarios as $usuario){
            $class = null;
            if($i++ % 2 == 0){
                $class=' class="altrow"';
            }
            ?>
            <tr<?php echo $class;?>>
                <td><?php echo $usuario['Usuario']['id'];?>&nbsp;</td>
                <td><?php echo $usuario['Usuario']['name'];?>&nbsp;</td>
                <td><?php echo $usuario['Usuario']['username'];?>&nbsp;</td>
                <td><?php echo $usuario['Usuario']['email'];?>&nbsp;</td>
                <?php if ($usuario['Usuario']['rol'] == "admin"): ?>
                    <td>S&iacute;</td>
                <?php else: ?>
                    <td>No</td>
                <?php endif; ?>
                <td class="acciones actions">
                    <?php echo $this->Html->link('Ver',array('action'=>'view',$usuario['Usuario']['id'])); ?>
                    <?php if(($current_user['Usuario']['id']== $usuario['Usuario']['id']) || ($current_user['Usuario']['rol']=="admin")): ?>
                    <?php echo $this->Html->link('Editar',array('action'=>'edit',$usuario['Usuario']['id'])); ?>
                    <?php echo $this->Form->postLink('Borrar',array('action'=>'delete',$usuario['Usuario']['id']),array('confirm'=>'Borrar Usuario?')); ?>
                    <?php endif; ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
<div class="actions menu">
    <h3>Menu usuarios</h3>
    <ul>
        <li><?php echo $this->Html->link('Nuevo usuario',array('action'=>'add')); ?></li>
        <li><?php echo $this->Html->link('Lista de usuarios',array('action'=>'index')); ?></li>
    </ul>
</div>