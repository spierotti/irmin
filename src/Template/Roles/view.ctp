<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in'); ?>
<legend> Detalles del rol </legend>
<div class="row col-sm-10">
    <div class="col-sm-4 border">
        Nombre
    </div>
    <div class="col-sm-6 border">
        <?= h($role->name) ?>
    </div>
</div>
<div class="row col-sm-10">
    <div class="col-sm-4 border">
        Descripción
    </div>
    <div class="col-sm-6 border">
        <?= h($role->descripcion) ?>
    </div>
</div>
<legend class="mt-2"> Permisos </legend>
<div class="row col-sm-10">
    <div class="col-sm-2 border">
        Categoría
    </div>
    <div class="col-sm-2 border">
        Consulta
    </div>
    <div class="col-sm-2 border">
        Alta
    </div>
    <div class="col-sm-2 border">
        Modificación
    </div>
    <div class="col-sm-2 border">
        Baja
    </div>
</div>
<div class="row col-sm-10">
    <div class="col-sm-2 border">
        Pedidos
    </div>
    <div class="col-sm-2 border">
        <?= $role->ver_pedidos ? __('Si') : __('No'); ?>
    </div>
    <div class="col-sm-2 border">
        <?= $role->nuevo_pedido ? __('Si') : __('No'); ?>
    </div>
    <div class="col-sm-2 border">
        <?= $role->modificar_pedido ? __('Si') : __('No'); ?>
    </div>
    <div class="col-sm-2 border">
        <?= $role->eliminar_pedido ? __('Si') : __('No'); ?>
    </div>
</div>
<div class="row col-sm-10">
    <div class="col-sm-2 border">
        Clientes
    </div>
    <div class="col-sm-2 border">
        <?= $role->ver_clientes ? __('Si') : __('No'); ?>
    </div>
    <div class="col-sm-2 border">
        <?= $role->nuevo_cliente ? __('Si') : __('No'); ?>
    </div>
    <div class="col-sm-2 border">
        <?= $role->modificar_cliente ? __('Si') : __('No'); ?>
    </div>
    <div class="col-sm-2 border">
        <?= $role->eliminar_cliente ? __('Si') : __('No'); ?>
    </div>
</div>
<div class="row col-sm-10">
    <div class="col-sm-2 border">
        Imágenes
    </div>
    <div class="col-sm-2 border">
        <?= $role->ver_imagenes ? __('Si') : __('No'); ?>
    </div>
    <div class="col-sm-2 border">
        <?= $role->nueva_imagen ? __('Si') : __('No'); ?>
    </div>
    <div class="col-sm-2 border">
        <?= $role->modificar_imagen ? __('Si') : __('No'); ?>
    </div>
    <div class="col-sm-2 border">
        <?= $role->eliminar_imagen ? __('Si') : __('No'); ?>
    </div>
</div>
<div class="row col-sm-10">
    <div class="col-sm-2 border">
        Roles
    </div>
    <div class="col-sm-2 border">
        <?= $role->ver_roles ? __('Si') : __('No'); ?>
    </div>
    <div class="col-sm-2 border">
        <?= $role->nueva_rol ? __('Si') : __('No'); ?>
    </div>
    <div class="col-sm-2 border">
        <?= $role->modificar_rol ? __('Si') : __('No'); ?>
    </div>
    <div class="col-sm-2 border">
        <?= $role->eliminar_rol ? __('Si') : __('No'); ?>
    </div>
</div>
<div class="row col-sm-10">
    <div class="col-sm-2 border">
        Usuarios
    </div>
    <div class="col-sm-2 border">
        <?= $role->ver_usuarios ? __('Si') : __('No'); ?>
    </div>
    <div class="col-sm-2 border">
        <?= $role->nueva_usuario ? __('Si') : __('No'); ?>
    </div>
    <div class="col-sm-2 border">
        <?= $role->modificar_usuario ? __('Si') : __('No'); ?>
    </div>
    <div class="col-sm-2 border">
        <?= $role->eliminar_usuario ? __('Si') : __('No'); ?>
    </div>
</div>

<legend class="mt-2"> Otros permisos </legend>
<div class="row col-sm-10">
    <div class="col-sm-4 border">
        Evaluar pedidos
    </div>
    <div class="col-sm-6 border">
        <?= $role->evaluar_pedido ? __('Si') : __('No'); ?>
    </div>
</div>

<div class="related mt-2">
    <legend> Usuarios relacionados </legend>
    <?php if (!empty($role->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <div class="row col-sm-10">
                <div class="col-sm-3 border">
                    Usuario
                </div>
                <div class="col-sm-5 border">
                    Email
                </div>
                <div class="col-sm-2 border">
                    Acciones
                </div>
            </div>
            <?php foreach ($role->users as $users): ?>
            <div class="row col-sm-10">
                <div class="col-sm-3 border">
                    <?= h($users->username) ?>
                </div>
                <div class="col-sm-5 border">
                    <?= h($users->email) ?>
                </div>
                <div class="col-sm-2 border">
                    <?//= $this->Html->link(__(''), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <a href="/users/view/<?= $users->id?>"><i class="fa fa-user" title="Ver usuario"></i></a>
                    
                    <?//= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <a href="/users/edit/<?= $users->id?>"><i class="fa fa-pencil" title="Modificar usuario"></i></a>
                    <?//= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                    <?php
                        echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Eliminar usuario')),
                        array('action' => 'delete', $users->id),
                        array('escape'=>false)
                        );
                    ?>
                </div>
            </div>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>