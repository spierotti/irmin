<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->assign('title', 'Cambiar contraseña');
?>

<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>    
    <div class="col-sm-6">
        <div class="form-group row">
            <legend class="ml-1">Cambiar Contraseña</legend>
            <label for="newpassword" id="newpassword" class="col-sm-4 col-form-label mt-2">Contraseña nueva</label>
            <div class="col-sm-8">
                <?php
                    echo $this->Form->control('password', ['type' => 'password', 'label' => false,'class'=>'form-control mt-2']);
                ?>
            </div>
            <label for="confirmpassword" id="confirmpassword" class="col-sm-4 col-form-label mt-2">Confirmar contraseña nueva</label>
            <div class="col-sm-8">
                <?php
                    echo $this->Form->control('repetir_nuevo_password', ['type' => 'password', 'label' => false,'class'=>'form-control mt-2']);
                ?>
            </div>
            <div class="form-group row mt-3 ml-2">
                <div class="col-sm">
                    <?= $this->Form->submit('Guardar', [
                        'class' => 'btn btn-primary mt-3 ml-2'
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>
