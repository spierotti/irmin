<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Informe[]|\Cake\Collection\CollectionInterface $informes
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in'); ?>

<div class="informes index large-9 medium-8 columns content">
    <h3><?= __('Informes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_hora_informe') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($informes as $informe): ?>
            <tr>
                <td><?= $this->Number->format($informe->id) ?></td>
                <td><?= h($informe->fecha_hora_informe) ?></td>
                <td><?= h($informe->descripcion) ?></td>
                <td><?= h($informe->created) ?></td>
                <td><?= h($informe->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $informe->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $informe->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $informe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $informe->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
