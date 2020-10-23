<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->assign('title', 'Iniciar sesión');
?>

<div class="users form large-6 medium-8 columns content">
    <?= $this->Form->create() ?>
        <div class="row justify-content-center">
            <div class="col-sm-10 mt-5">
                <legend class="ml-3">Iniciar sesión </legend>
                <div class="col-sm-8">
                    <div class="form-group row">
                        <label for="email" id="email" class="col-sm-2 col-form-label mt-2">E-mail</label>
                        <div class="col-sm-9">
                            <?php
                                echo $this->Form->control('email',['label' => false,'class'=>'form-control mt-2']);
                            ?>
                        </div>
                        <label for="email" id="email" class="col-sm-2 col-form-label mt-2">Contraseña</label>
                        <div class="col-sm-9">
                            <?php
                                echo $this->Form->control('password', ['label' => false,'class'=>'form-control mt-2']);
                            ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 mt-2">
                            <!-- <button type="submit" class="btn btn-primary">Sign in</button> -->
                            <?= $this->Form->submit('Iniciar sesión', [
                                'class' => 'btn btn-primary mt-2'
                            ]) ?>
                        </div>
                    </div>                
                </div>
            </div>
        </div>
    <?= $this->Form->end() ?>
</div>