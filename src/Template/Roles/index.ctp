<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role[]|\Cake\Collection\CollectionInterface $roles
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in'); ?>
<div class="roles index large-9 medium-8 columns content mt-5">
    <legend><?= __('Roles') ?></legend>
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
                    <a href="/roles/edit/<?= $role->id?>"><i class="fa fa-pencil" title="Editar rol"></i></a>
                    <?php
                        echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash eliminar', 'title' => 'Eliminar rol')),
                        array('action' => 'delete', $role->id),
                        array('escape'=>false)
                        );
                    ?>
              </td>
            </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primera')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('Última') . ' >>') ?>
        </ul>
    </div>
</div>
<?= $this->Html->script('filtrar-roles.js') ?>
