<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
$this->assign('title', 'Detalles del rol');
use Cake\Routing\Router;
?>
<div class="row justify-content-center">
    <div class="row col-sm-12">
        <div class="col-sm-6">
            <legend> Detalles del rol </legend>
            <table class="table-hover table">
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

            <legend> Usuarios relacionados </legend>    
            <?php if (!empty($role->users)): ?>
                <table class="table table-responsive table-hover roles-usuarios-relacionados">
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
                                    <a href="/irmin/users/view/<?= $users->id?>"><i class="fa fa-user" title="Ver usuario"></i></a>
                                    <a href="/irmin/users/edit/<?= $users->id?>"><i class="fa fa-pencil" title="Modificar usuario"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>


        <div class="col-sm-6">
            <legend> Permisos </legend>
            <table class="table table-responsive table-hover" width="100%">
                <thead class="centro">
                    <tr>
                        <th scope="col" width="20%" class="izquierda">Categoría</th>
                        <th scope="col" width="20%">Consulta</th>
                        <th scope="col" width="20%">Alta</th>
                        <th scope="col" width="20%">Modificación</th>
                        <th scope="col" width="20%">Baja</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="centro">
                        <th scope="row" class="izquierda">Pedidos</th>
                        <td><?= $role->ver_pedidos ? __('Si') : __('No'); ?></td>
                        <td><?= $role->nuevo_pedido ? __('Si') : __('No'); ?></td>
                        <td><?= $role->modificar_pedido ? __('Si') : __('No'); ?></td>
                        <td><?= $role->eliminar_pedido ? __('Si') : __('No'); ?></td>
                    </tr>
                    <tr class="centro">
                        <th scope="row" class="izquierda">Clientes</th>
                        <td><?= $role->ver_clientes ? __('Si') : __('No'); ?></td>
                        <td><?= $role->nuevo_cliente ? __('Si') : __('No'); ?></td>
                        <td><?= $role->modificar_cliente ? __('Si') : __('No'); ?></td>
                        <td><?= $role->eliminar_cliente ? __('Si') : __('No'); ?></td>
                    </tr>
                    <tr class="centro">
                        <th scope="row" class="izquierda">Imágenes</th>
                        <td><?= $role->ver_imagenes ? __('Si') : __('No'); ?></td>
                        <td><?= $role->nueva_imagen ? __('Si') : __('No'); ?></td>
                        <td><?= $role->modificar_imagen ? __('Si') : __('No'); ?></td>
                        <td><?= $role->eliminar_imagen ? __('Si') : __('No'); ?></td>
                    </tr>
                    <tr class="centro">
                        <th scope="row" class="izquierda">Roles</th>
                        <td><?= $role->ver_roles ? __('Si') : __('No'); ?></td>
                        <td><?= $role->nueva_rol ? __('Si') : __('No'); ?></td>
                        <td><?= $role->modificar_rol ? __('Si') : __('No'); ?></td>
                        <td><?= $role->eliminar_rol ? __('Si') : __('No'); ?></td>
                    </tr>
                    <tr class="centro">
                        <th scope="row" class="izquierda">Usuarios</th>
                        <td><?= $role->ver_usuarios ? __('Si') : __('No'); ?></td>
                        <td><?= $role->nueva_usuario ? __('Si') : __('No'); ?></td>
                        <td><?= $role->modificar_usuario ? __('Si') : __('No'); ?></td>
                        <td><?= $role->eliminar_usuario ? __('Si') : __('No'); ?></td>
                    </tr>
                </tbody>
            </table>
            <legend class="mt-2"> Otros permisos </legend>
            <table class="table table-responsive table-hover">
                <tbody>
                <tr>
                    <th scope="row">Evaluar pedidos</th>
                    <td><div class="ml-2"><?= $role->evaluar_pedido ? __('Si') : __('No'); ?></div></td>
                </tr>
                <tr>
                    <th scope="row">Ver informes</th>
                    <td><div class="ml-2"><?= $role->ver_informes ? __('Si') : __('No'); ?></div></td>
                </tr>
            </tbody>
            </table>
        </div>
        <div class="ml-3 mt-2">
            <button onclick="window.location.href = '<?php echo Router::url(array('controller'=>'Roles', 'action'=>'index'))?>'" class="btn btn-primary mt-4 rapido">Volver</button>
        </div>
    </div>
</div>