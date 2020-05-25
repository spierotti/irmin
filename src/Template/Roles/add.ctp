<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in', ['viewName'=>'Role']); ?>

<?= $this->Form->create($role) ?>
<fieldset>
    <legend>Agregar rol</legend>
    <div class="row col-sm-10">
        <label for="razonSocial" id="razonSocial" class="col-sm-2 col-form-label mt-2">Nombre </label>
        <div class="col-sm-9">
            <?//php echo $this->Form->control('razon_social',['label' => false, 'class'=>'form-control mt-2']); ?>
            <?php
                echo $this->Form->control('name', ['label' => false, 'class'=>'form-control mt-2']);
            ?>
        </div>
        <label for="descripcion" id="descripcion" class="col-sm-2 col-form-label mt-2">Descripción </label>
        <div class="col-sm-9">
        <?php 
            echo $this->Form->control('descripcion',[
                'type' => 'textarea',
                'class'=>'form-control mt-2',
                'style' => 'width: -moz-available;',
                'label' => false,
                'placeholder' => 'Ej: Se encarga de gestionar los clientes.'
        ]); ?>
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
            <?php echo $this->Form->control('ver_pedidos', ['label' => false]); ?>
        </div>
        <div class="col-sm-2 border">
            <?php echo $this->Form->control('nuevo_pedido', ['label' => false]); ?>
        </div>
        <div class="col-sm-2 border">
            <?php echo $this->Form->control('modificar_pedido',['label' => false] );  ?>
        </div>
        <div class="col-sm-2 border">
            <?php echo $this->Form->control('eliminar_pedido', ['label' => false]); ?>
        </div>
    </div>
    <div class="row col-sm-10">
        <div class="col-sm-2 border">
            Clientes
        </div>
        <div class="col-sm-2 border">
            <?php echo $this->Form->control('ver_clientes', ['label' => false]); ?>
        </div>
        <div class="col-sm-2 border">
            <?php echo $this->Form->control('nuevo_cliente', ['label' => false]); ?>
        </div>
        <div class="col-sm-2 border">
            <?php echo $this->Form->control('modificar_cliente', ['label' => false]); ?>
        </div>
        <div class="col-sm-2 border">
            <?php echo $this->Form->control('eliminar_cliente', ['label' => false]); ?>
        </div>
    </div>
    <div class="row col-sm-10">
        <div class="col-sm-2 border">
            Imágenes
        </div>
        <div class="col-sm-2 border">
            <?php echo $this->Form->control('ver_imagenes', ['label' => false]);  ?>
        </div>
        <div class="col-sm-2 border">
            <?php echo $this->Form->control('nueva_imagen', ['label' => false]); ?>
        </div>
        <div class="col-sm-2 border">
            <?php echo $this->Form->control('modificar_imagen', ['label' => false]); ?>
        </div>
        <div class="col-sm-2 border">
            <?php echo $this->Form->control('eliminar_imagen', ['label' => false]); ?>
        </div>
    </div>
    <div class="row col-sm-10">
        <div class="col-sm-2 border">
            Roles
        </div>
        <div class="col-sm-2 border">
            <?php echo $this->Form->control('ver_roles', ['label' => false]); ?>
        </div>
        <div class="col-sm-2 border">
            <?php echo $this->Form->control('nueva_rol', ['label' => false]); ?>
        </div>
        <div class="col-sm-2 border">
            <?php echo $this->Form->control('modificar_rol', ['label' => false]); ?>
        </div>
        <div class="col-sm-2 border">
            <?php echo $this->Form->control('eliminar_rol', ['label' => false]); ?>
        </div>
    </div>
    <div class="row col-sm-10">
        <div class="col-sm-2 border">
            Usuarios
        </div>
        <div class="col-sm-2 border">
            <?php echo $this->Form->control('ver_usuarios', ['label' => false]); ?>
        </div>
        <div class="col-sm-2 border">
            <?php echo $this->Form->control('nueva_usuario', ['label' => false]); ?>
        </div>
        <div class="col-sm-2 border">
            <?php echo $this->Form->control('modificar_usuario', ['label' => false]); ?>
        </div>
        <div class="col-sm-2 border">
            <?php echo $this->Form->control('eliminar_usuario', ['label' => false]); ?>
        </div>
    </div>

    <legend class="mt-2"> Otros permisos </legend>
    <div class="row col-sm-10">
        <div class="row col-sm-4">
            <div class="col-sm-8 border">
                Evaluar pedidos
            </div>
            <div class="col-sm-3 border">
                <?php echo $this->Form->control('evaluar_pedido', ['label' => false]); ?>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
            <?= $this->Form->submit('Agregar rol', [
                'class' => 'btn btn-primary mt-4'
            ]) ?>
        </div>
    </div>
</fieldset>
<?= $this->Form->end() ?>