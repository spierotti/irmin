<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Informe $informe
 */
$this->assign('title', 'Informe número ' . $informe->id);
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

<legend>Imágenes relacionadas</legend>

<div class="ml-5 mr-5 mb-6 mt-5">
<?php if (!empty($informe->images)){ ?>

  <div class="row card-columns">
    <?php foreach ($informe->images as $images): ?>

      <div class="card col-sm-3" style='width:70%;'>
        <?= 
          $this->Html->image('../files/images/photo/' . $images->photo_dir . '/' . $images->photo, ['class'=>'card-img-top mt-2', 'fullBase' => true]);
        ?>
        <div class="card-body">
            <div class="card-title"><?= h($images->fecha_hora_imagen) ?></div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

<?php }else{
  echo '<p>¡No existen registros para el periodo solicitado!</p>';
}?>
