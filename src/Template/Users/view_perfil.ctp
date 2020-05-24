<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in', ['viewName'=>'User']); ?>

<legend><?= __('Datos del usuario') ?></legend>
<div class="row col-sm-12">
    <div class="row col-sm-10">
        <div class="col-sm-4 border">
            Nombre de usuario
        </div>
        <div class="col-sm-6 border">
            <?= h($user->username) ?>
        </div>
    </div>
    <div class="row col-sm-10">
        <div class="col-sm-4 border">
            Email
        </div>
        <div class="col-sm-6 border">
            <?= h($user->email) ?>
        </div>
    </div>
    <div class="row col-sm-10">
        <div class="col-sm-4 border">
            Rol
        </div>
        <div class="col-sm-6 border">
            <?= $user['role']['name'] ?>
        </div>
    </div>
    <div class="row col-sm-10">
        <div class="col-sm-4 border">
            Fecha de creación
        </div>
        <div class="col-sm-6 border">
            <?= h($user->created) ?>
        </div>
    </div>
    <div class="row col-sm-10">
        <div class="col-sm-4 border">
            Última modificación
        </div>
        <div class="col-sm-6 border">
            <?= h($user->modified) ?>
        </div>
    </div>
</div>