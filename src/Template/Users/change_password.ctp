<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in', ['viewName'=>'User']); ?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <div class="col-sm-8">
        <div class="form-group row">
            <legend><?= __('Cambiar Contraseña') ?></legend>
            <label for="oldpassword" id="oldpassword" class="col-sm-4 col-form-label mt-2">Contraseña anterior</label>
            <div class="col-sm-8">
                <?php
                    echo $this->Form->control('viejo_password', ['type' => 'password', 'label' => false,'class'=>'form-control mt-2']);
                ?>
            </div>
            <label for="newpassword" id="newpassword" class="col-sm-4 col-form-label mt-2">Contraseña nueva</label>
            <div class="col-sm-8">
                <?php
                    echo $this->Form->control('nuevo_password', ['type' => 'password', 'label' => false,'class'=>'form-control mt-2']);
                ?>
            </div>
            <label for="confirmpassword" id="confirmpassword" class="col-sm-4 col-form-label mt-2">Confirmar contraseña nueva</label>
            <div class="col-sm-8">
                <?php
                    echo $this->Form->control('repetir_nuevo_password', ['type' => 'password', 'label' => false,'class'=>'form-control mt-2']);
                ?>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <!-- <button type="submit" class="btn btn-primary">Sign in</button> -->
                    <?= $this->Form->submit('Guardar', [
                        'class' => 'btn btn-primary mt-2'
                    ]) ?>
                </div>
            </div> 
        </div>
    <?= $this->Form->end() ?>
    </div>
</div>