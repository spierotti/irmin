<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in', ['viewName'=>'User']); ?>

<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="form-group row">
                    <legend>Modificar usuario</legend>
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
                    <div class="col-sm-8">
                        <?= $this->Form->submit('Guardar cambios', [
                            'class' => 'btn btn-primary'
                        ]) ?>
                    </div>
                    <div>
                        <button onclick="window.location.href = '/users';" class="btn btn-primary">Volver</button>
                    </div>
                </div>
            </div>
        </div>
    <?= $this->Form->end() ?>
</div>
<?= $this->Html->script('enabled-disabled.js') ?>
