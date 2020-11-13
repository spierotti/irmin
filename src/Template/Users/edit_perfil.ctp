<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->assign('title', 'Modificar perfil');
use Cake\Routing\Router;
?>
<?= $this->Form->create($user) ?>
    <div class="col-sm-6">
        <div class="form-group row">
            <legend class="ml-1">Modificar Usuario</legend>
            <label for="username" id="username" class="col-sm-4 col-form-label mt-2">Nombre de usuario </label>
            <div class="col-sm-8">
                <?php
                    echo $this->Form->control('username', ['label' => false,'class'=>'form-control mt-2']);
                ?>
            </div>
            <label for="email" id="email" class="col-sm-4 col-form-label mt-2">Email </label>
            <div class="col-sm-8">
                <?php
                    echo $this->Form->control('email', ['label' => false,'class'=>'form-control mt-2']);
                ?>
            </div>
            <div class="form-group row mt-3 ml-2">
                <div class="col-sm">
                    <!-- <button type="submit" class="btn btn-primary">Sign in</button> -->
                    <?= $this->Form->submit('Guardar cambios', [
                        'class' => 'btn btn-primary mt-3'
                    ]) ?>
                </div>
                <div class="col-sm">
                    <button type='button' onclick="window.location.href = '<?php echo Router::url(array('controller'=>'Users', 'action'=>'view_perfil'))?>'" class="btn btn-primary mt-3">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
<?= $this->Form->end() ?>
