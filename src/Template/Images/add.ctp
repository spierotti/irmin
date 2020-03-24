<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image $image
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in', ['viewName' => 'Image']); ?>

<div class="images form large-9 medium-8 columns content">
    <?= $this->Form->create($image, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('ALTA DE IMAGENES') ?></legend>
        <?php
            echo $this->Form->control('photo', ['type' => 'file', 'label' => 'Agregar Imagen']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('GUARDAR')) ?>
    <?= $this->Form->end() ?>
</div>
