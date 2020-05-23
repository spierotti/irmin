<h3><?= h($pedido->id) ?></h3>
<table class="vertical-table">
    <tr>
        <th scope="row"><?= __('Cliente') ?></th>
        <td><?= ($pedido->has('cliente') and !is_null($pedido->cliente)) ? $pedido->cliente->name : '-' ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Experto') ?></th>
        <td><?= ($pedido->has('user') and !is_null($pedido->user)) ? $pedido->user->username : '-' ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Estado') ?></th>
        <td><?= ($pedido->has('estado') and !is_null($pedido->estado)) ? $pedido->estado->descripcion : '-' ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Descripcion') ?></th>
        <td><?= h($pedido->descripcion) ?></td>
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
        <th scope="row"><?= __('Conclusion') ?></th>
        <td><?= h(($pedido->has('conclusion') and !is_null($pedido->conclusion) and strlen($pedido->conclusion)>0) ? $pedido->conclusion : "-" )?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Fecha Evaluacion') ?></th>
        <td><?= h(($pedido->has('fecha_evaluacion') and !is_null($pedido->fecha_evaluacion)) ? $pedido->fecha_evaluacion : '-')?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Motivo de Cancelación') ?></th>
        <td><?= h(($pedido->has('motivo_cancelacion') and !is_null($pedido->motivo_cancelacion) and strlen($pedido->motivo_cancelacion)>0) ? $pedido->motivo_cancelacion : "-" )?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Fecha Cancelacion') ?></th>
        <td><?= h(($pedido->has('fecha_cancelacion') and !is_null($pedido->fecha_cancelacion)) ? $pedido->fecha_cancelacion : '-')?></td>
    </tr>
</table>
<div class="related">
    <h4><?= __('Related Images') ?></h4>
    <?php if (!empty($pedido->images)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th scope="col"><?= __('Fecha Hora Imagen') ?></th>
            <th scope="col"><?= __('Photo') ?></th>
            <th scope="col"><?= __('Created') ?></th>
        </tr>
        <?php foreach ($pedido->images as $images): ?>
        <tr>
            <td><?= h($images->fecha_hora_imagen) ?></td>
            <td><?= $this->Html->image('../files/images/photo/' . $images->photo_dir . '/' . $images->photo, ['fullBase' => true]); ?></td>
            <td><?= h($images->created) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
</div>