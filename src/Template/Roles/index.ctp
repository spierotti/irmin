<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role[]|\Cake\Collection\CollectionInterface $roles
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in'); ?>
<div class="roles index large-9 medium-8 columns content mt-5">
    <legend><?= __('Roles') ?></legend>
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
                    <?//La parte de editar el rol se hizo así porque al querer usar el link "edit" en lugar de mostrar la vista, realizaba el cambio directamente?>
                    <a href="../roles/edit/<?= $role->id?>"><i class="fa fa-pencil" title="Editar rol"></i></a>

                    <?//= $this->Form->postLink(__('Delete'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]) ?>
                    <?//php $this->Html->link("<i class='fas fa-image'></i>",  ['action' => 'view', $role->id]) ?><!--Elimianr esta línea cuando se pueda verificar que la función "Eliminar rol" funcionac on el ícono del tacho.-->
                    <?php
                        echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Eliminar rol')),
                        array('action' => 'delete', $role->id),
                        array('escape'=>false)
                        );
                    ?>
              </td>
            </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <br>
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
