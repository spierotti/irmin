<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in'); ?>
<legend> Detalles del rol </legend>

<table class="table-sm table-responsive table-hover">
    <tr>
      <th scope="row">Nombre</th>
      <td><?= h($role->name) ?></td>
    </tr>
        <tr>
      <th scope="row">Descripción</th>
      <td><?= h($role->descripcion) ?></td>
    </tr>
        <tr>
      <th scope="row">Fecha de creación</th>
      <td><?= h($role->created) ?></td>
    </tr>
        <tr>
      <th scope="row">Última modificación</th>
      <td><?= h($role->modified) ?></td>
    </tr>
</table>


<legend class="mt-2"> Permisos </legend>

<table class="table-sm table-responsive table-hover">
    <thead>
        <tr>
            <th scope="col">Categoría</th>
            <th scope="col">Consulta</th>
            <th scope="col">Alta</th>
            <th scope="col">Modificación</th>
            <th scope="col">Baja</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">Pedidos</th>
            <td><?= $role->ver_pedidos ? __('Si') : __('No'); ?></td>
            <td><?= $role->nuevo_pedido ? __('Si') : __('No'); ?></td>
            <td><?= $role->modificar_pedido ? __('Si') : __('No'); ?></td>
            <td><?= $role->eliminar_pedido ? __('Si') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row">Clientes</th>
            <td><?= $role->ver_clientes ? __('Si') : __('No'); ?></td>
            <td><?= $role->nuevo_cliente ? __('Si') : __('No'); ?></td>
            <td><?= $role->modificar_cliente ? __('Si') : __('No'); ?></td>
            <td><?= $role->eliminar_cliente ? __('Si') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row">Imágenes</th>
            <td><?= $role->ver_imagenes ? __('Si') : __('No'); ?></td>
            <td><?= $role->nueva_imagen ? __('Si') : __('No'); ?></td>
            <td><?= $role->modificar_imagen ? __('Si') : __('No'); ?></td>
            <td><?= $role->eliminar_imagen ? __('Si') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row">Roles</th>
            <td><?= $role->ver_roles ? __('Si') : __('No'); ?></td>
            <td><?= $role->nueva_rol ? __('Si') : __('No'); ?></td>
            <td><?= $role->modificar_rol ? __('Si') : __('No'); ?></td>
            <td><?= $role->eliminar_rol ? __('Si') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row">Usuarios</th>
            <td><?= $role->ver_usuarios ? __('Si') : __('No'); ?></td>
            <td><?= $role->nueva_usuario ? __('Si') : __('No'); ?></td>
            <td><?= $role->modificar_usuario ? __('Si') : __('No'); ?></td>
            <td><?= $role->eliminar_usuario ? __('Si') : __('No'); ?></td>
        </tr>
    </tbody>
</table>

<legend class="mt-2"> Otros permisos </legend>
<div class="row col-sm-10">
    <table class="table-sm table-responsive table-hover">
        <tbody>
        <tr>
            <th scope="row">Evaluar pedidos</th>
            <td><div class="ml-2"><?= $role->evaluar_pedido ? __('Si') : __('No'); ?></div></td>
        </tr>
      </tbody>
    </table>
</div>

<legend> Usuarios relacionados </legend>    
<?php if (!empty($role->users)): ?>
    <table class="table-sm table-responsive table-hover">
        <thead>
            <tr>
                <th scope="col">Usuario</th>
                <th scope="col">Email</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($role->users as $users): ?>
                <tr>
                    <th scope="row"><?= h($users->username) ?></th>
                    <td><?= h($users->email) ?></td>
                    <td>
                        <a href="/users/view/<?= $users->id?>"><i class="fa fa-user" title="Ver usuario"></i></a>
                        <a href="/users/edit/<?= $users->id?>"><i class="fa fa-pencil" title="Modificar usuario"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<div class="form-group row">
    <div class="col-sm-4">
    </div>
    <div class="ml-4">
        <button onclick="window.location.href = '/roles';" class="btn btn-primary mt-4">Volver</button>
    </div>
</div>