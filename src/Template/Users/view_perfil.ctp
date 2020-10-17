<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<legend><?= __('Datos del usuario') ?></legend>
<div class="row col-sm-10">
    <table class="table table-responsive-sm table-hover">
        <tbody>
            <tr>
              <th scope="row">Nombre de usuario</th>
              <td><?= h($user->username) ?></td>
            </tr>
            <tr>
              <th scope="row">Email</th>
              <td><?= h($user->email) ?></td>
            </tr>
            <tr>
              <th scope="row">Rol</th>
              <td><?= $user['role']['name'] ?></td>
            </tr>
            <tr>
              <th scope="row">Fecha de creación</th>
              <td><?= h($user->created) ?></td>
            </tr>
            <tr>
              <th scope="row">Última modificación</th>
              <td><?= h($user->modified) ?></td>
            </tr>
        </tbody>
    </table>
</div>