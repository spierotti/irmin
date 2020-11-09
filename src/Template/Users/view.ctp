<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->assign('title', 'Datos del usuario');
?>

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
    <div class="col-sm-3 ml-3">
        <?=
            $this->Form->button('Volver', 
            array('type' => 'button',
            'class' => 'btn btn-primary ml-3 mt-2',
            'onclick' => 'location.href=\'../\'')
        ); ?>
    </div>
</div>
