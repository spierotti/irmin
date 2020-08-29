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
                      array('escape'=>false, 'confirm' => __('¿Seguro quiere restaurar el Rol #{0}?', $role->id))
                    );

                  }else{

                    echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash eliminar', 'title' => 'Eliminar rol')),
                      array('action' => 'delete', $role->id),
                      array('escape'=>false, 'confirm' => __('¿Seguro quiere borrar el Rol #{0}?', $role->id))
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