<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Informe $informe
 */
?>

<legend>Informe número <?= h($informe->id) ?></legend>
<table class="table table-sm table-hover">
    <tr>
        <th scope="row">Descripcion</th>
        <td><?= h($informe->descripcion) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Fecha Hora Informe') ?></th>
        <td><?= h($informe->fecha_hora_informe) ?></td>
    </tr>
</table>
<?php if (!empty($informe->images)): ?>
    <div class="related">
        <legend>Imágenes relacionadas</legend>
        <?php foreach ($informe->images as $images): ?>
            <div class="card-columns">
                <div class="card">
                    <?= $this->Html->image('../files/images/photo/' . $images->photo_dir . '/' . $images->photo, ['class'=>'card-img-top']); ?>
                    <div class="card-body">
                        <div class="card-title"><?= h($images->fecha_hora_imagen) ?></div>
                        <?= $this->Html->link(__('Ver imagen'), ['controller' => 'Images', 'action' => 'view', $images->id]) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
