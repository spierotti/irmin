<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role[]|\Cake\Collection\CollectionInterface $roles
 */
$this->assign('title', 'Roles');
?>

<div class="col-sm-10">
  <div class="col-sm-10">
    <legend> Roles </legend>
    <div class="col-sm-8">
      <?= $this->Form->control('Buscar', ['label' => false, 'placeholder' => 'Buscar Rol', 'autocompelte' => false, 'id' => 'buscar', 'class'=>'form-control']); ?>
    </div>
    <div class="ml-4 mb-2">
      <table>
        <tbody>
          <tr>
          <th scope="row">Solo activos</th>
            <td>
              <div class="ml-2">
                <?= $this->Form->control(' Solo Activos ', ['label' => false,'type' => 'checkbox', 'checked' => true, 'id' => 'activo', 'class'=> 'mt-2']); ?>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

    <div style="overflow-x:auto;">
      <div class="table-content" id="contenedor-tabla">
      <?php
        $this->Paginator->templates([
        'first' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
        'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
        'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
        'current' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
        'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
        'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
        'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
        'last' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
        ]);
      ?>
        
    <?php if (!$roles->isEmpty()) { ?>
    
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($roles as $role): ?>
              <tr>
                <th scope="row"><?= h($role->name) ?></th>
                <td><?= h($role->descripcion) ?></td>
                <td>
                  <?php
                          echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-eye', 'title' => 'Ver detalles')),
                          array('action' => 'view', $role->id),
                          array('escape'=>false)
                          );
                      ?>
                      <a href="./roles/edit/<?= $role->id?>"><i class="fa fa-pencil" title="Editar rol"></i></a>
                      <?php

                          if ($role->borrado){

                            echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-check-circle eliminar', 'title' => 'Restaurar rol')),
                              array('action' => 'activar', $role->id),
                              array('escape'=>false, 'confirm' => __('¿Está seguro que desea restaurar el rol {0}?', $role->name))
                            );

                          }else{

                            echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash eliminar', 'title' => 'Eliminar rol')),
                              array('action' => 'delete', $role->id),
                              array('escape'=>false, 'confirm' => __('¿Está seguro que desea eliminar el rol {0}?', $role->name))
                            );

                          }
                      ?>
                </td>
              </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <nav aria-label="Page navigation ">
          <ul class="pagination justify-content-center">
              <?= $this->Paginator->first('<<' ) ?>
              <?= $this->Paginator->prev('<') ?>
              <?= $this->Paginator->numbers() ?>
              <?= $this->Paginator->next('>') ?>
              <?= $this->Paginator->last('>>') ?>
          </ul>
      </nav>

    <?php }else{
      echo '<p>¡No existen registros para el periodo solicitado!</p>';
    }?>
        
      </div>
    </div>
<?= $this->Html->script('filtrar-roles.js') ?>
