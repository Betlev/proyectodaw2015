<div class="users form">
<?php echo $this->Form->create('Usuario'); ?>
    <fieldset>
        <legend>
            <?php echo 'Identificarse. Introduce Nombre y Contrasenia'; ?>
        </legend>
        <?php
        echo $this->Form->input('username',array('label'=>'Usuario'));
        echo $this->Form->input('password',array('label'=>'Contrasenia'));
        ?>
    </fieldset>
<?php echo $this->Form->end('Login'); ?>
<?php echo $this->Html->link('Nuevo usuario',array('action'=>'add')); ?>
</div>