<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image $image
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in', ['viewName' => 'Image']); ?>

<div>
    <?= $this->Html->image('../files/images/photo/Images/loading.gif', ['id' => 'img']); ?>
</div>
<div class="images form large-9 medium-8 columns content">
    <?= $this->Form->button('COMENZAR', ['id' => 'descargar']) ?>
</div>

<?= $this->Html->script('cargar-imagenes.js') ?>

