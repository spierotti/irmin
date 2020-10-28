<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->assign('title', 'Editar perfil');
?>
<?= $this->Form->create($user) ?>
    <div class="row justify-content-center">
        <div class="col-sm-10">
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
                <label for="role" id="role" class="col-sm-4 col-form-label mt-2">Rol </label>
                <div class="col-sm-8">
                    <?php
                        if (isset($auth['User']['role_id']) && $auth['User']['role_id'] === 1 && $auth['User']['role']['modificar_usuario'] === true){
                            echo $this->Form->control('role_id', ['type'=>'select','options' => $roles, 'label' => false,'class'=>'form-control mt-2']);
                        }else{
                            echo $this->Form->control('role.name', ['label' => false,'class'=>'form-control mt-2', 'disabled' => 'disabled']);
                        }
                    ?>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <!-- <button type="submit" class="btn btn-primary">Sign in</button> -->
                        <?= $this->Form->submit('Guardar cambios', [
                            'class' => 'btn btn-primary mt-2 ml-2'
                        ]) ?>
                    </div>
                </div> 
            </div>
        </div>
    </div>
<?= $this->Form->end() ?>
