<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in', ['viewName'=>'Pedidos']); ?>

<legend><?= __('Datos del pedido') ?></legend>
<table class="table table-sm table-hover">
  <tbody>
    <tr>
      <th scope="row">Cliente</th>
      <td>
        <?= ($pedido->has('cliente') and !is_null($pedido->cliente)) ? $this->Html->link($pedido->cliente->name, ['controller' => 'Clientes', 'action' => 'view', $pedido->cliente->id]) : '-' ?>
      </td>
    </tr>
    <tr>
      <th scope="row">Experto</th>
      <td>
        <?= ($pedido->has('user') and !is_null($pedido->user)) ? $pedido->user->username : '-' ?>
      </td>
    </tr>
    <tr>
      <th scope="row">Estado</th>
      <td>
        <?= ($pedido->has('estado') and !is_null($pedido->estado)) ? $pedido->estado->descripcion : '-' ?>
      </td>
    </tr>
    <tr>
      <th scope="row">Descripción</th>
      <td>
        <?= h($pedido->descripcion) ?>
      </td>
    </tr>
    <tr>
      <th scope="row">Fecha de solicitud</th>
      <td>
        <?= h($pedido->fecha_solicitud) ?>
      </td>
    </tr>
    <tr>
      <th scope="row">Fecha de inicio</th>
      <td>
        <?= h($pedido->fecha_inicio) ?>
      </td>
    </tr>
    <tr>
      <th scope="row">Fecha de finalización</th>
      <td>
        <?= h($pedido->fecha_fin) ?>
      </td>
    </tr>
    <tr>
      <th scope="row">Conclusión</th>
      <td>
        <?= h(($pedido->has('conclusion') and !is_null($pedido->conclusion) and strlen($pedido->conclusion)>0) ? $pedido->conclusion : "-" )?>
      </td>
    </tr>
    <tr>
      <th scope="row">Fecha de evaluación</th>
      <td>
        <?= h(($pedido->has('fecha_evaluacion') and !is_null($pedido->fecha_evaluacion)) ? $pedido->fecha_evaluacion : '-')?>
      </td>
    </tr>
    <tr>
      <th scope="row">Fecha de cancelación</th>
      <td>
        <?= h(($pedido->has('fecha_cancelacion') and !is_null($pedido->fecha_cancelacion)) ? $pedido->fecha_cancelacion : '-')?>
      </td>
    </tr>
    <tr>
      <th scope="row">Motivo de cancelación</th>
      <td>
        <?= h(($pedido->has('motivo_cancelacion') and !is_null($pedido->motivo_cancelacion) and strlen($pedido->motivo_cancelacion)>0) ? $pedido->motivo_cancelacion : "-" )?>
      </td>
    </tr>
  </tbody>
</table>


<div>
<legend>Imágenes relacionadas</legend>
    <div class="card-columns">
        <?php if (!empty($pedido->images)): ?>
            <?php foreach ($pedido->images as $images): ?>
                <div class="card">
                    <?= $this->Html->image('../files/images/photo/' . $images->photo_dir . '/' . $images->photo, ['class'=>'card-img-top']); ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= h($images->fecha_hora_imagen) ?></h5>
                        <?= $this->Html->link(__('Ver imagen'), ['controller' => 'Images', 'action' => 'view', $images->id]) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<div>
    <button onclick="window.location.href = '/pedidos';" class="btn btn-primary mt-4">Volver</button>
</div>
