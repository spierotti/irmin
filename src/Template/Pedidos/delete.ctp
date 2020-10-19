<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
?>
<legend>Cancelar Pedido</legend>
<div class="row col-sm-10">
    <table class="table table-responsive-sm table-hover">
        <tr>
            <th scope="row">Nro Pedido</th>
            <td><?= $pedido->id ?></td>
        </tr>
        <tr>
            <th scope="row">Cliente</th>
            <td><?= ($pedido->has('cliente') and !is_null($pedido->cliente)) ? $this->Html->link($pedido->cliente->name, ['controller' => 'Clientes', 'action' => 'view', $pedido->cliente->id]) : '-' ?></td>
        </tr>
        <tr>
            <th scope="row">Descripcion</th>
            <td><?= h($pedido->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row">Fecha Inicio</th>
            <td><?= h($pedido->fecha_inicio) ?></td>
        </tr>
        <tr>
            <th scope="row">Fecha Fin</th>
            <td><?= h($pedido->fecha_fin) ?></td>
        </tr>
    </table>
    
    <div class="related">
        <?php if (!empty($pedido->images)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col">Fecha Hora Imagen</th>
                <th scope="col">Imagen</th>
                <th scope="col">Fecha de creación</th>
                <th scope="col" class="actions">Acciones</th>
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
        <div class="col-sm-10">
            <?php 
                echo $this->Form->control('motivo_cancelacion',[
                    'type' => 'textarea',
                    'class'=>'form-control mt-2',
                    'style' => 'width: -moz-available;',
                    'label' => false,
                    'placeholder' => 'Indique el motivo de cancelación del pedido.'
            ]); ?>
        </div>
        
        <div class="form-group row">
            <div class="col-sm-10">
                <?= $this->Form->submit('Cancelar pedido', [
                    'class' => 'btn btn-primary mt-4 ml-3'
                ]) ?>
            </div>
        </div>
    <?= $this->Form->end() ?>
</div>
