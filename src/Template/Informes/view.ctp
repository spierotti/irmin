<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Informe $informe
 */
$this->assign('title', 'Informe número '.h($informe->id));
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
<div class="col-sm-2">
    <?=
        $this->Form->button('Volver', 
        array('type' => 'button',
        'class' => 'btn btn-primary mt-3 ml-2',
        'onclick' => 'location.href=\'../\'')
    ); ?>
</div>

<?php if (!empty($informe->images)): ?>
    <div class="related ml-2">
        <legend>Imágenes relacionadas</legend>
        <?php foreach ($informe->images as $images): ?>
            <div class="row card-columns">
                <div class="card col-sm-3">
                    <?= $this->Html->link(
                            $this->Html->image('../files/images/photo/' . $images->photo_dir . '/' . $images->photo, ['class'=>'card-img-top mt-2']), 
                            array('controller' => 'Images', 'action' => 'view', $images->id),
                            array('escape' => false)
                        );
                    ?>
                    <div class="card-body">
                        <div class="card-title"><?= h($images->fecha_hora_imagen) ?></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
