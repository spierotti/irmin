<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image $image
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in', ['viewName'=>'Image']); ?>

<div class="images view large-9 medium-8 columns content">
    <table class="vertical-table">
        <tr>
            <?= $this->Html->image('../files/images/photo/' . $image->get('photo_dir') . '/' . $image->get('photo')); ?>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha y Hora de Captura') ?></th>
            <td><?= h($image->fecha_hora_imagen) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha y Hora de Alta') ?></th>
            <td><?= h($image->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hay Actividad') ?></th>
            <td><?= $image->hay_actividad ? __('Si') : __('No'); ?></td>
        </tr>
    </table>
</div>
