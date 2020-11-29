<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Informe $informe
 */
$this->assign('title', 'Informe número '.h($informe->id));
use Cake\Routing\Router;
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
<div class="col-sm-12">
    <div class="row justify-content-center ml-5">
        <legend>Imágenes relacionadas</legend>
        <div class="row card-columns">
            <?php if (!empty($informe->images)) { ?>
                <?php foreach ($informe->images as $images): ?>
                    <div class="card col-sm-3 <?= $images->hay_actividad ? __('peligro') : __('sinPeligro'); ?>">
                        <?= $this->Html->link(
                                $this->Html->image('../files/images/photo/' . $images->photo_dir . '/' . $images->photo, ['class'=>'card-img-top mt-2','title' => $images->hay_actividad ? __('Hay condiciones de riesgo') : __('No hay condiciones de riesgo')]), 
                                array('controller' => 'Images', 'action' => 'view', $images->id),
                                array('escape' => false)
                            );
                        ?>
                        <div class="card-body">
                            <div class="card-title"><?= h($images->fecha_hora_imagen) ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php }else{
                    echo '<div class="row ml-5"><p>¡No existen imágenes para el periodo solicitado!</p></div>';
                }?>
        </div>
    </div>
</div>

<div div class="row">
    <div class="col-sm-2">
        <button onclick="window.location.href = '<?php echo Router::url(array('controller'=>'Informes', 'action'=>'index'))?>'" class="btn btn-primary mt-4 rapido">Volver</button>
    </div>
    <div class="col-sm-2">
        <button onclick="window.location.href = '<?php echo Router::url(array('controller'=>'Informes', 'action'=>'view', $informe->id, '_ext' => 'pdf', 'target' => '_blank'))?>'" class="btn btn-primary mt-4">Exportar PDF</button>
    </div>
</div>
