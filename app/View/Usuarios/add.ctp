<div class="users form">
<?php echo $this->Form->create('Usuario'); ?>
    <fieldset>
        <legend>Nuevo Usuario</legend>
        <?php
        echo $this->Form->input('name',array('label'=>'Nombre'));
        echo $this->Form->input('username',array('label'=>'Usuario'));
        echo $this->Form->input('email',array('label'=>'E-Mail','error' => array(
        'attributes' => array('escape' => false)
    )));
        echo $this->Form->input('password',array('label'=>'Contrase&ntilde;a','error' => array(
        'attributes' => array('escape' => false)
    )));
        echo $this->Form->input('password_confirmation',array('type'=>'password','label'=>'repetir contrase&ntilde;a','error' => array(
        'attributes' => array('escape' => false)
    )));
        
    ?>
    </fieldset>
<?php echo $this->Form->end('Registrarse'); ?>
</div>
<div class="actions">
    <h3>Acciones</h3>
    <ul>
        <li><?php echo $this->Html->link('Lista de usuarios',array('action' => 'index')); ?></li>
    </ul>
</div>