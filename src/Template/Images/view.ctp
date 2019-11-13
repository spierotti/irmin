<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image $image
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in', ['viewName'=>'Image']); ?>

<div class="images view large-9 medium-8 columns content">
    <h3><?= h($image->fecha_hora_imagen) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Photo') ?></th>
            <td><?= h($image->photo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo Dir') ?></th>
            <td><?= h($image->photo_dir) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Hora Imagen') ?></th>
            <td><?= h($image->fecha_hora_imagen) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($image->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($image->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hay Actividad') ?></th>
            <td><?= $image->hay_actividad ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
