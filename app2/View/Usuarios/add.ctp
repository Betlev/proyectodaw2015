<div class="users form">
<?php echo $this->Form->create('Usuario'); ?>
    <fieldset>
        <legend><?php echo 'Nuevo Usuario'; ?></legend>
        <?php echo $this->Form->input('username',array('label'=>'Usuario'));
        echo $this->Form->input('password',array('label'=>'Contrasenia'));
    ?>
    </fieldset>
<?php echo $this->Form->end('Registrarse'); ?>
</div>