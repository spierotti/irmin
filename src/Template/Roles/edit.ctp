<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in'); ?>

<div class="roles form large-9 medium-8 columns content">

    <?= $this->Form->create($role) ?>
    <fieldset>
        <legend>Editar rol</legend>
        <div class="row col-sm-10">
            <label for="razonSocial" id="razonSocial" class="col-sm-2 col-form-label mt-2">Nombre </label>
            <div class="col-sm-9">
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
            <table class="table table-sm">
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
                  <td><?php echo $this->Form->control('ver_pedidos', ['label' => false]); ?></td>
                  <td><?php echo $this->Form->control('nuevo_pedido', ['label' => false]); ?></td>
                  <td><?php echo $this->Form->control('modificar_pedido',['label' => false] );  ?></td>
                  <td><?php echo $this->Form->control('eliminar_pedido', ['label' => false]); ?></td>
                </tr>
                <tr>
                  <th scope="row">Clientes</th>
                  <td><?php echo $this->Form->control('ver_clientes', ['label' => false]); ?></td>
                  <td><?php echo $this->Form->control('nuevo_cliente', ['label' => false]); ?></td>
                  <td><?php echo $this->Form->control('modificar_cliente', ['label' => false]); ?></td>
                  <td><?php echo $this->Form->control('eliminar_cliente', ['label' => false]); ?></td>
                </tr>
                <tr>
                  <th scope="row">Imágenes</th>
                  <td><?php echo $this->Form->control('ver_imagenes', ['label' => false]);  ?></td>
                  <td><?php echo $this->Form->control('nueva_imagen', ['label' => false]); ?></td>
                  <td><?php echo $this->Form->control('modificar_imagen', ['label' => false]); ?></td>
                  <td><?php echo $this->Form->control('eliminar_imagen', ['label' => false]); ?></td>
                </tr>
                <tr>
                  <th scope="row">Roles</th>
                  <td><?php echo $this->Form->control('ver_roles', ['label' => false]); ?></td>
                  <td><?php echo $this->Form->control('nueva_rol', ['label' => false]); ?></td>
                  <td><?php echo $this->Form->control('modificar_rol', ['label' => false]); ?></td>
                  <td><?php echo $this->Form->control('eliminar_rol', ['label' => false]); ?></td>
                </tr>
                <tr>
                  <th scope="row">Usuarios</th>
                  <td><?php echo $this->Form->control('ver_usuarios', ['label' => false]); ?></td>
                  <td><?php echo $this->Form->control('nueva_usuario', ['label' => false]); ?></td>
                  <td><?php echo $this->Form->control('modificar_usuario', ['label' => false]); ?></td>
                  <td><?php echo $this->Form->control('eliminar_usuario', ['label' => false]); ?></td>
                </tr>
              </tbody>
            </table>
        </div>

        <legend class="mt-2"> Otros permisos </legend>
        <div class="row col-sm-10">
            <table>
                <tbody>
                <tr>
                    <th scope="row">Evaluar pedidos</th>
                    <td><div class="ml-2"><?php echo $this->Form->control('evaluar_pedido', ['label' => false]); ?></div></td>
                </tr>
                <tr>
                    <th scope="row">Ver informes</th>
                    <td><div class="ml-2"><?php echo $this->Form->control('ver_informes', ['label' => false]); ?></div></td>
                </tr>
              </tbody>
            </table>
        </div>
        <div class="form-group row">
            <div class="col-sm-6">
                <?= $this->Form->submit('Guardar cambios', [
                    'class' => 'btn btn-primary mt-4'
                ]) ?>
            </div>
            <div>
                <button onclick="window.location.href = '/roles';" class="btn btn-primary mt-4">Volver</button>
            </div>
        </div>
        
    </fieldset>
    <?= $this->Form->end() ?>
</div>