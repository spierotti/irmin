<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in', ['viewName'=>'Role']); ?>

<div class="roles form large-9 medium-8 columns content">
    <?= $this->Form->create($role) ?>
    <fieldset>
        <legend><?= __('Add Role') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('descripcion');
            echo $this->Form->control('ver_pedidos');
            echo $this->Form->control('nuevo_pedido');
            echo $this->Form->control('modificar_pedido');
            echo $this->Form->control('eliminar_pedido');
            echo $this->Form->control('evaluar_pedido');
            echo $this->Form->control('ver_clientes');
            echo $this->Form->control('nuevo_cliente');
            echo $this->Form->control('modificar_cliente');
            echo $this->Form->control('eliminar_cliente');
            echo $this->Form->control('ver_imagenes');
            echo $this->Form->control('nueva_imagen');
            echo $this->Form->control('modificar_imagen');
            echo $this->Form->control('eliminar_imagen');
            echo $this->Form->control('ver_roles');
            echo $this->Form->control('nueva_rol');
            echo $this->Form->control('modificar_rol');
            echo $this->Form->control('eliminar_rol');
            echo $this->Form->control('ver_usuarios');
            echo $this->Form->control('nueva_usuario');
            echo $this->Form->control('modificar_usuario');
            echo $this->Form->control('eliminar_usuario');
            echo $this->Form->control('ver_informes');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
