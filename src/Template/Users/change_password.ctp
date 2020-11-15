<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->assign('title', 'Cambiar contraseña');
use Cake\Routing\Router;
?>
<?= $this->Form->create($user) ?>
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="form-group row">
                <legend class="ml-1">Cambiar Contraseña</legend>
                <label for="oldpassword" id="oldpassword" class="col-sm-3 col-form-label mt-2">Contraseña anterior</label>
                <div class="col-sm-7">
                    <?php
                        echo $this->Form->control('viejo_password', ['type' => 'password', 'label' => false,'class'=>'form-control mt-2']);
                    ?>
                </div>
                <label for="newpassword" id="newpassword" class="col-sm-3 col-form-label mt-2">Contraseña nueva</label>
                <div class="col-sm-7">
                    <?php
                        echo $this->Form->control('nuevo_password', ['type' => 'password', 'label' => false,'class'=>'form-control mt-2']);
                    ?>
                </div>
                <label for="confirmpassword" id="confirmpassword" class="col-sm-3 col-form-label mt-2">Confirmar contraseña nueva</label>
                <div class="col-sm-7">
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
                    <div class="col-sm mt-2">
                        <button type="button" onclick="window.location.href = '<?php echo Router::url(array('controller'=>'Users', 'action'=>'home'))?>'" class="btn btn-primary  ml-3 mt-2">Volver</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->Form->end() ?>