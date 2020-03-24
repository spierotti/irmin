<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in'); ?>

<div class="roles view large-9 medium-8 columns content">
    <h3><?= h($this->Number->format($role->id)) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($role->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($role->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Consulta de Pedidos') ?></th>
            <td><?= $role->ver_pedidos ? __('Si') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Alta de Pedidos') ?></th>
            <td><?= $role->nuevo_pedido ? __('Si') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificación de Pedidos') ?></th>
            <td><?= $role->modificar_pedido ? __('Si') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Baja de Pedidos') ?></th>
            <td><?= $role->eliminar_pedido ? __('Si') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Evaluar Pedidos') ?></th>
            <td><?= $role->evaluar_pedido ? __('Si') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Consulta de Clientes') ?></th>
            <td><?= $role->ver_clientes ? __('Si') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ALta de Clientes') ?></th>
            <td><?= $role->nuevo_cliente ? __('Si') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificación de Clientes') ?></th>
            <td><?= $role->modificar_cliente ? __('Si') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Baja de Clientes') ?></th>
            <td><?= $role->eliminar_cliente ? __('Si') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Consulta de Imagenes') ?></th>
            <td><?= $role->ver_imagenes ? __('Si') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Alta de Imagenes') ?></th>
            <td><?= $role->nueva_imagen ? __('Si') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificación de Imagenes') ?></th>
            <td><?= $role->modificar_imagen ? __('Si') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Baja de Imagenes') ?></th>
            <td><?= $role->eliminar_imagen ? __('Si') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Consulta de Roles') ?></th>
            <td><?= $role->ver_roles ? __('Si') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Alta de Roles') ?></th>
            <td><?= $role->nueva_rol ? __('Si') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificación de Roles') ?></th>
            <td><?= $role->modificar_rol ? __('Si') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Baja de Roles') ?></th>
            <td><?= $role->eliminar_rol ? __('Si') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Consulta de Usuario') ?></th>
            <td><?= $role->ver_usuarios ? __('Si') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Alta de Usuarios') ?></th>
            <td><?= $role->nueva_usuario ? __('Si') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificación de Usuarios') ?></th>
            <td><?= $role->modificar_usuario ? __('Si') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Baja de Usuarios') ?></th>
            <td><?= $role->eliminar_usuario ? __('Si') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($role->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($role->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->email) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
