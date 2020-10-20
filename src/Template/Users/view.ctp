<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in', ['viewName'=>'User']); ?>

<div class="users view large-9 medium-8 columns content">
    <legend>Datos del usuario</legend>
    <table class="table table-responsive-sm table-hover">
        <tbody>
            <tr>
                <th scope="row"><?= __('Username') ?></th>
                <td><?= h($user->username) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Email') ?></th>
                <td><?= h($user->email) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Rol') ?></th>
                <td><?= $user['role']['name'] ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Cliente Asociado') ?></th>
                <td><?= $user['cliente']['name'] . " (" . $user['cliente']['id'] . ")" ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Fecha Creación') ?></th>
                <td><?= h($user->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Última Modificación') ?></th>
                <td><?= h($user->modified) ?></td>
            </tr>
        </tbody>
    </table>
    <!--<div>
        <button onclick="window.location.href = '/users';" class="btn btn-primary mt-4">Volver</button>
    </div>-->
</div>
