<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estado $estado
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in', ['viewName'=>'Cliente']); ?>

<div class="estados form large-9 medium-8 columns content">
    <?= $this->Form->create($estado) ?>
    <fieldset>
        <legend><?= __('Add Estado') ?></legend>
        <?php
            echo $this->Form->control('descripcion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
