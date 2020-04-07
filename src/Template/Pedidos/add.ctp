<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in', ['viewName'=>'Pedidos']); ?>

<div class="pedidos form large-9 medium-8 columns content">
    <?= $this->Form->create($pedido) ?>
    <fieldset>
        <legend><?= __('Nuevo Pedido') ?></legend>
        <?php
            echo $this->Form->control('cliente_id', ['type' => 'hidden', 'id' => 'c_id']);
            echo $this->Form->control('cliente', ['div' => false, 'id' => 's', 'autocomplete' => 'off']);
            echo $this->Form->control('fecha_inicio');
            echo $this->Form->control('fecha_fin');
            echo $this->Form->control('descripcion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<?= $this->Html->script('search.js') ?>