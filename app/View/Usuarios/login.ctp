<div class="users form">
<?php echo $this->Form->create('Usuario'); ?>
    <fieldset>
        <legend>
            <?php echo 'Identificarse. Introduce Nombre y Contrase&ntilde;a'; ?>
        </legend>
        <?php
        echo $this->Form->input('username',array('label'=>'Usuario'));
        echo $this->Form->input('password',array('label'=>'Contrase&ntilde;a'));
        ?>
    </fieldset>
<?php echo $this->Form->end('Login'); ?>
</div>
<div class="actions menu">
    <h3>Menu usuarios</h3>
    <ul>
        <li><?php echo $this->Html->link('Nuevo usuario',array('action'=>'add')); ?></li>
        <li><?php echo $this->Html->link('Lista de usuarios',array('action'=>'index')); ?></li>
    </ul>
</div>