<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
$this->assign('title', 'Agregar rol');
?>
<?= $this->Form->create($role) ?>
  <div class="justify-content-center"> 
        <div class="row col-sm-12">
        <legend class="ml-2">Agregar rol</legend>
        <div class="row col-sm-12">
            <label for="razonSocial" id="razonSocial" class="col-sm-2 col-form-label mt-2">Nombre </label>
            <div class="col-sm-9">
                <?php
                    echo $this->Form->control('name', ['label' => false, 'class'=>'form-control mt-2', 'placeholder' => 'Ej: Gestor']);
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
                    'placeholder' => 'Ej: Se encarga de gestionar los pedidos.'
            ]); ?>
            </div>
        </div>
        <legend class="mt-2 ml-2"> Permisos </legend>
          <div class="row col-sm-10 ml-2">
            <table class="table table-sm-12" width="100%">
              <thead>
                <tr class="centro">
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
                  <td><?php echo $this->Form->control('ver_pedidos', ['label' => false]); ?></td>
                  <td><?php echo $this->Form->control('nuevo_pedido', ['label' => false]); ?></td>
                  <td><?php echo $this->Form->control('modificar_pedido',['label' => false] );  ?></td>
                  <td><?php echo $this->Form->control('eliminar_pedido', ['label' => false]); ?></td>
                </tr>
                <tr class="centro">
                  <th scope="row" class="izquierda">Clientes</th>
                  <td><?php echo $this->Form->control('ver_clientes', ['label' => false]); ?></td>
                  <td><?php echo $this->Form->control('nuevo_cliente', ['label' => false]); ?></td>
                  <td><?php echo $this->Form->control('modificar_cliente', ['label' => false]); ?></td>
                  <td><?php echo $this->Form->control('eliminar_cliente', ['label' => false]); ?></td>
                </tr>
                <tr class="centro">
                  <th scope="row" class="izquierda">Imágenes</th>
                  <td><?php echo $this->Form->control('ver_imagenes', ['label' => false]);  ?></td>
                  <td><?php echo $this->Form->control('nueva_imagen', ['label' => false]); ?></td>
                  <td><?php echo $this->Form->control('modificar_imagen', ['label' => false]); ?></td>
                  <td><?php echo $this->Form->control('eliminar_imagen', ['label' => false]); ?></td>
                </tr>
                <tr class="centro">
                  <th scope="row" class="izquierda">Roles</th>
                  <td><?php echo $this->Form->control('ver_roles', ['label' => false]); ?></td>
                  <td><?php echo $this->Form->control('nueva_rol', ['label' => false]); ?></td>
                  <td><?php echo $this->Form->control('modificar_rol', ['label' => false]); ?></td>
                  <td><?php echo $this->Form->control('eliminar_rol', ['label' => false]); ?></td>
                </tr>
                <tr class="centro">
                  <th scope="row" class="izquierda">Usuarios</th>
                  <td><?php echo $this->Form->control('ver_usuarios', ['label' => false]); ?></td>
                  <td><?php echo $this->Form->control('nueva_usuario', ['label' => false]); ?></td>
                  <td><?php echo $this->Form->control('modificar_usuario', ['label' => false]); ?></td>
                  <td><?php echo $this->Form->control('eliminar_usuario', ['label' => false]); ?></td>
                  
                </tr>
              </tbody>
            </table>
          </div>

        <div class="row col-sm-10 ml-2">
          <legend class="mt-2 ml-2"> Otros permisos </legend>
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

        <div class="form-group row col-sm-10">
            <div class="col-sm-10">
                <?= $this->Form->submit('Agregar rol', [
                    'class' => 'btn btn-primary mt-4 ml-2'
                ]) ?>
            </div>
        </div>
      </div>
  </div>

<?= $this->Form->end() ?>

