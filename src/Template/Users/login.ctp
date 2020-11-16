<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->assign('title', 'Iniciar sesión');
?>
<?= $this->Form->create() ?>
<div class="row justify-content-center">
    <div class="col-sm-8">
        <div class="form-group row ml-2 mr-2">
            <div class="col-sm-7 ml-5">
                <?php echo $this->Html->image('irmin-logo-nombre-chico.jpg',['width'=>'364', 'height'=>'275'])?>
            </div>
            <div class="form-group row">
                <label for="email" id="email" class="col-sm-3 col-form-label mt-2">E-mail</label>
                <div class="col-sm-7">
                    <?php
                        echo $this->Form->control('email',['label' => false,'class'=>'form-control mt-2']);
                    ?>
                </div>
                <label for="email" id="email" class="col-sm-3 col-form-label mt-2">Contraseña</label>
                <div class="col-sm-7">
                    <?php
                        echo $this->Form->control('password', ['label' => false,'class'=>'form-control mt-2']);
                    ?>
                </div>
            </div>
                
            <div class="form-group col-sm-12 row">
                <?= $this->Html->link(__('¿Olvidaste tu contraseña? Click aquí...'), ['controller' => 'Users', 'action' => 'forgot_password']) ?>
            </div>

            <div class="form-group col-sm-12 row">
                <?= $this->Form->submit('Ingresar', [
                    'class' => 'btn btn-primary mt-2 mt-2 botonera'
                ]) ?>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>