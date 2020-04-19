<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Informe $informe
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in'); ?>

<div class="informes view large-9 medium-8 columns content">
    <h3><?= h($informe->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($informe->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($informe->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Hora Informe') ?></th>
            <td><?= h($informe->fecha_hora_informe) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($informe->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($informe->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Images') ?></h4>
        <?php if (!empty($informe->images)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Fecha Hora Imagen') ?></th>
                <th scope="col"><?= __('Photo') ?></th>
                <th scope="col"><?= __('Photo Dir') ?></th>
                <th scope="col"><?= __('Hay Actividad') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($informe->images as $images): ?>
            <tr>
                <td><?= h($images->id) ?></td>
                <td><?= h($images->fecha_hora_imagen) ?></td>
                <td><?= h($images->photo) ?></td>
                <td><?= h($images->photo_dir) ?></td>
                <td><?= h($images->hay_actividad) ?></td>
                <td><?= h($images->created) ?></td>
                <td><?= h($images->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Images', 'action' => 'view', $images->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Images', 'action' => 'edit', $images->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Images', 'action' => 'delete', $images->id], ['confirm' => __('Are you sure you want to delete # {0}?', $images->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
