<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image $image
 */
?>

<div class="images view large-9 medium-8 columns content">
    <table class="table table-hover">
        <tr>
            <?= $this->Html->image('../files/images/photo/' . $image->get('photo_dir') . '/' . $image->get('photo')); ?>
        </tr>
        <tr>
            <th scope="row">Fecha y Hora de Captura</th>
            <td><?= h($image->fecha_hora_imagen) ?></td>
        </tr>
        <tr>
            <th scope="row">Fecha y Hora de Alta</th>
            <td><?= h($image->created) ?></td>
        </tr>
        <tr>
            <th scope="row">Hay Actividad</th>
            <td><?= $image->hay_actividad ? __('Si') : __('No'); ?></td>
        </tr>
    </table>
</div>
