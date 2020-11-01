<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->assign('title', 'Usuarios - Modificar usuario');
?>
<?= $this->Form->create($user) ?>
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="form-group row">
                <legend class="ml-2">Modificar usuario</legend>
                <label for="usuario" id="usuario" class="col-sm-3 col-form-label mt-2">Nombre de usuario</label>
                <div class="col-sm-8">
                    <?php echo $this->Form->control('username', ['autocomplete' => 'off','label' => false, 'class'=>'form-control mt-2']); ?>
                </div>
                <label for="email" id="email" class="col-sm-3 col-form-label mt-2">Email</label>
                <div class="col-sm-8">
                    <?php echo $this->Form->control('email', ['autocomplete' => 'off', 'label' => false,'class'=>'form-control mt-2']); ?>
                </div>
                <label for="rol" id="rol" class="col-sm-3 col-form-label mt-2">Rol</label>
                <div class="col-sm-8">
                    <?php echo $this->Form->control('role_id', ['type'=>'select','options' => $roles, 'id' => 'rol', 'label' => false,'class'=>'form-control mt-2']); ?>
                </div>
                <label for="nombre" id="nombre" class="col-sm-3 col-form-label mt-2">Nombre</label>
                <div class="col-sm-8">
                    <?php echo $this->Form->control('cliente.name', [ 'div' => false, 'id' => 's' , 'autocomplete' => 'off','label' => false, 'class'=>'form-control mt-2']); ?>
                </div>
            </div>
            <div class="form-group row mt-4">
                <div class="col-sm-5 mr-2">
                    <?= $this->Form->submit('Guardar cambios', [
                        'class' => 'btn btn-primary mt-2 mr-2'
                    ]) ?>
                </div>
                <div class="col-sm-3 ml-3">
                    <?=
                        $this->Form->button('Volver', 
                        array('type' => 'button',
                        'class' => 'btn btn-primary ml-3 mt-2',
                        'onclick' => 'location.href=\'/users\'')
                    ); ?>
                </div>
            </div>
        </div>
    </div>
<?= $this->Form->end() ?>
<?= $this->Html->script('enabled-disabled.js') ?>
