<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role[]|\Cake\Collection\CollectionInterface $roles
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in'); ?>
<div class="roles index large-9 medium-8 columns content mt-5">
    <legend><?= __('Roles') ?></legend>
    <div class="row">
        <div class="col-sm-1 border">
            ID
        </div>
        <div class="col-sm border">
            Nombre
        </div>
        <div class="col-sm border">
            Descripción
        </div>
        <div class="col-sm border">
            Fecha de creación
        </div>
        <div class="col-sm border">
            Última modificación
        </div>
        <div class="col-sm border">
            Acciones
        </div>
    </div>
    <?php foreach ($roles as $role): ?>
        <div class="row">
                <div class="col-sm-1 border"><?= $this->Number->format($role->id) ?></div>
                <div class="col-sm border"><?= h($role->name) ?></div>
                <div class="col-sm border"><?= h($role->descripcion) ?></div>
                <div class="col-sm border"><?= h($role->created) ?></div>
                <div class="col-sm border"><?= h($role->modified) ?></div>
                <div class="col-sm border">
                    <td class="actions">
                    <?//= $this->Html->link(__('View'), ['action' => 'view', $role->id]) ?>
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
                </div>
        </div>
    <?php endforeach; ?>


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
