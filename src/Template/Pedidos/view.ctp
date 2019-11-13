<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in', ['viewName'=>'Pedidos']); ?>

<div class="pedidos view large-9 medium-8 columns content">
    <h3><?= h($pedido->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cliente') ?></th>
            <td><?= $pedido->has('cliente') ? $this->Html->link($pedido->cliente->id, ['controller' => 'Clientes', 'action' => 'view', $pedido->cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $pedido->has('user') ? $this->Html->link($pedido->user->id, ['controller' => 'Users', 'action' => 'view', $pedido->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= $pedido->has('estado') ? $this->Html->link($pedido->estado->id, ['controller' => 'Estados', 'action' => 'view', $pedido->estado->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($pedido->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Conclusion') ?></th>
            <td><?= h($pedido->conclusion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pedido->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Solicitud') ?></th>
            <td><?= h($pedido->fecha_solicitud) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Inicio') ?></th>
            <td><?= h($pedido->fecha_inicio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Fin') ?></th>
            <td><?= h($pedido->fecha_fin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Evaluacion') ?></th>
            <td><?= h($pedido->fecha_evaluacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Cancelacion') ?></th>
            <td><?= h($pedido->fecha_cancelacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($pedido->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($pedido->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Images') ?></h4>
        <?php if (!empty($pedido->images)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Fecha Hora Imagen') ?></th>
                <th scope="col"><?= __('Photo') ?></th>
                <th scope="col"><?= __('Photo Dir') ?></th>
                <th scope="col"><?= __('Hay Actividad') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pedido->images as $images): ?>
            <tr>
                <td><?= h($images->fecha_hora_imagen) ?></td>
                <td><?= h($images->photo) ?></td>
                <td><?= h($images->photo_dir) ?></td>
                <td><?= h($images->hay_actividad) ?></td>
                <td><?= h($images->created) ?></td>
                <td><?= h($images->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Images', 'action' => 'view', $images->fecha_hora_imagen]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Images', 'action' => 'edit', $images->fecha_hora_imagen]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Images', 'action' => 'delete', $images->fecha_hora_imagen], ['confirm' => __('Are you sure you want to delete # {0}?', $images->fecha_hora_imagen)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
