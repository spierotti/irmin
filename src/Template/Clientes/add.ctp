<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in', ['viewName'=>'Cliente']); ?>

<div class="clientes form large-9 medium-8 columns content">
    <?= $this->Form->create($cliente) ?>
    <fieldset>
        <legend><?= __('Add Cliente') ?></legend>
        <?php
            echo $this->Form->control('razon_social');
            echo $this->Form->control('cuit');
            echo $this->Form->control('email');
            echo $this->Form->control('telefono');
            echo $this->Form->control('celular');
            echo $this->Form->control('domicilio');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
