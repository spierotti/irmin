<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->assign('title', 'Nuevo usuario');
?>

<?= $this->Form->create($user) ?>
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="form-group row">
                <legend class="ml-3">Nuevo usuario</legend>
                <label for="nombreDeUsuario" id="nombreDeUsuario" class="col-sm-3 col-form-label mt-2">Nombre de usuario </label>
                <div class="col-sm-7">
                    <?php echo $this->Form->control('username', ['autocomplete' => 'off', 'label' => false, 'class'=>'form-control mt-2']); ?>
                </div>
                <label for="password" id="password" class="col-sm-3 col-form-label mt-2">Contraseña </label>
                <div class="col-sm-7">
                    <?php echo $this->Form->control('password', ['autocomplete' => 'off', 'label' => false, 'class'=>'form-control mt-2']); ?>
                </div>
                <label for="rol" id="rol" class="col-sm-3 col-form-label mt-2">Rol </label>
                <div class="col-sm-7">
                    <?php echo $this->Form->control('role_id', ['type'=>'select','options' => $roles, 'id' => 'rol', 'label' => false, 'class'=>'form-control mt-2']); ?>
                </div>
                <label for="cliente" id="cliente" class="col-sm-3 col-form-label mt-2">Cliente </label>
                <div id="cliente_div" class="col-sm-7">
                    <?php 
                          echo $this->Form->control('cliente', ['div' => false, 'id' => 's', 'autocomplete' => 'off', 'disabled' => true, 'label' => false, 'class'=>'form-control mt-2']);
                          echo $this->Form->control('cliente_id', ['type' => 'hidden', 'id' => 'c_id', 'label' => false, 'class'=>'form-control mt-2']); 
                        ?>
                </div>
                <?= $this->Form->button($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Quitar cliente')), [
                        'type' => 'button',
                        'class' => 'btnCuadrado ml-2 mb-2 mr-5',
                        'id' => 'btn_limpiar',
                        'title' => 'Quitar cliente',
                        'style' => "display: none;"
                    ]) ?>
                <label for="email" id="email" class="col-sm-3 col-form-label mt-2">Email </label>
                <div class="col-sm-7">
                    <?php echo $this->Form->control('email', ['autocomplete' => 'off', 'label' => false, 'class'=>'form-control mt-2']); ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <?= $this->Form->submit('Agregar usuario', [
                        'class' => 'btn btn-primary'
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
<?= $this->Form->end() ?>
<?= $this->Html->script('add-usr-cliente.js') ?>
