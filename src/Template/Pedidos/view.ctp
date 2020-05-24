<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in', ['viewName'=>'Pedidos']); ?>
<legend><?= __('Datos del pedido') ?></legend>
<div class="row col-sm-12">
    <div class="row col-sm-10">
        <div class="col-sm-4 border">
            Cliente
        </div>
        <div class="col-sm-6 border">
            <?= ($pedido->has('cliente') and !is_null($pedido->cliente)) ? $this->Html->link($pedido->cliente->name, ['controller' => 'Clientes', 'action' => 'view', $pedido->cliente->id]) : '-' ?>
        </div>
    </div>
    <div class="row col-sm-10">
        <div class="col-sm-4 border">
            Experto
        </div>
        <div class="col-sm-6 border">
            <?= ($pedido->has('user') and !is_null($pedido->user)) ? $pedido->user->username : '-' ?>
        </div>
    </div>
    <div class="row col-sm-10">
        <div class="col-sm-4 border">
            Estado
        </div>
        <div class="col-sm-6 border">
            <?= ($pedido->has('estado') and !is_null($pedido->estado)) ? $pedido->estado->descripcion : '-' ?>
        </div>
    </div>
    <div class="row col-sm-10">
        <div class="col-sm-4 border">
            Descripción
        </div>
        <div class="col-sm-6 border">
            <?= h($pedido->descripcion) ?>
        </div>
    </div>
    <div class="row col-sm-10">
        <div class="col-sm-4 border">
            Fecha de solicitud
        </div>
        <div class="col-sm-6 border">
            <?= h($pedido->fecha_solicitud) ?>
        </div>
    </div>
    <div class="row col-sm-10">
        <div class="col-sm-4 border">
            Fecha de inicio
        </div>
        <div class="col-sm-6 border">
            <?= h($pedido->fecha_inicio) ?>
        </div>
    </div>
    <div class="row col-sm-10">
        <div class="col-sm-4 border">
            Fecha de finalización
        </div>
        <div class="col-sm-6 border">
            <?= h($pedido->fecha_fin) ?>
        </div>
    </div>
    <div class="row col-sm-10">
        <div class="col-sm-4 border">
            Conclusión
        </div>
        <div class="col-sm-6 border">
            <?= h(($pedido->has('conclusion') and !is_null($pedido->conclusion) and strlen($pedido->conclusion)>0) ? $pedido->conclusion : "-" )?>
        </div>
    </div>
    <div class="row col-sm-10">
        <div class="col-sm-4 border">
            Fecha de evaluación
        </div>
        <div class="col-sm-6 border">
            <?= h(($pedido->has('fecha_evaluacion') and !is_null($pedido->fecha_evaluacion)) ? $pedido->fecha_evaluacion : '-')?>
        </div>
    </div>
    <div class="row col-sm-10">
        <div class="col-sm-4 border">
            Fecha de cancelación
        </div>
        <div class="col-sm-6 border">
            <?= h(($pedido->has('fecha_cancelacion') and !is_null($pedido->fecha_cancelacion)) ? $pedido->fecha_cancelacion : '-')?>
        </div>
    </div>
    <div class="row col-sm-10">
        <div class="col-sm-4 border">
            Motivo de cancelación
        </div>
        <div class="col-sm-6 border">
            <?= h(($pedido->has('motivo_cancelacion') and !is_null($pedido->motivo_cancelacion) and strlen($pedido->motivo_cancelacion)>0) ? $pedido->motivo_cancelacion : "-" )?>
        </div>
    </div>
    <div class="col-sm-12 mt-2">
        <legend><?= __('Imágenes relacionadas') ?></legend>
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