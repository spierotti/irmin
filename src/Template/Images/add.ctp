<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image $image
 */
$this->assign('title', 'Descarga de imágenes');
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in', ['viewName' => 'Image']); ?>

<div class="images form large-9 medium-8 columns content">

    <legend>Descarga de Imagenes</legend>

    <table class="table table-hover">
        <tr>
            <th scope="row">Ultima descarga realizada:</th>
            <td id="fecha_actualizacion"><?= $row['fecha_hora_actualizacion'] ?></td>
        </tr>
        <tr>
            <th scope="row">Resultado:</th>
            <td id="resultado"><?= $row['salida'] ?></td>
        </tr>
    </table>

    <div class="form-group" id="proceso" style="display:none;">
        <div class="progress" style="height: 20px;">
            <div class="progress-bar progress-bar-striped progress-bar-animated active" style="width: 0%" role="progressbar" aria_valuemin="0" aria_valuemax="100" id="progressbar">0%</div>
        </div>
    </div>

    <?= $this->Form->button('COMENZAR DESCARGA', ['id' => 'descargar', 'class' => 'btn btn-primary mt-4']) ?>
</div>

<?= $this->Html->script('cargar-imagenes.js') ?>
