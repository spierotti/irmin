<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in', ['viewName'=>'Pedidos']); ?>

<div class="pedidos view large-9 medium-8 columns content">
    <table class="vertical-table">
        <h4><?= __('Evaluar Pedido') ?></h4>
        <tr>
            <th scope="row"><?= __('Nro Pedido') ?></th>
            <td><?= $pedido->id ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cliente') ?></th>
            <td><?= ($pedido->has('cliente') and !is_null($pedido->cliente)) ? $this->Html->link($pedido->cliente->name, ['controller' => 'Clientes', 'action' => 'view', $pedido->cliente->id]) : '-' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($pedido->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Inicio') ?></th>
            <td><?= h($pedido->fecha_inicio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Fin') ?></th>
            <td><?= h($pedido->fecha_fin) ?></td>
        </tr>
    </table>
    
    <div class="related">
        <?php if (!empty($pedido->images)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Fecha Hora Imagen') ?></th>
                <th scope="col"><?= __('Photo') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pedido->images as $images): ?>
            <tr>
                <td><?= h($images->fecha_hora_imagen) ?></td>
                <td><?= $this->Html->image('../files/images/photo/' . $images->photo_dir . '/' . $images->photo); ?></td>
                <td><?= h($images->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Images', 'action' => 'view', $images->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

<div class="pedidos form large-9 medium-8 columns content">
    <?= $this->Form->create($pedido) ?>
    <fieldset>
        <?php
            echo $this->Form->control('conclusion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Finalizar')) ?>
    <?= $this->Form->end() ?>
</div>
