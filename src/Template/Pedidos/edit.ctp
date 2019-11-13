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
        <legend><?= __('Modificar Pedido') ?></legend>
        <?php
            echo $this->Form->control('cliente_id', ['options' => $clientes]);
            //echo $this->Form->control('experto_id', ['options' => $users]);
            //echo $this->Form->control('fecha_solicitud');
            echo $this->Form->control('fecha_inicio');
            echo $this->Form->control('fecha_fin');
            //echo $this->Form->control('fecha_evaluacion');
            //echo $this->Form->control('fecha_cancelacion');
            //echo $this->Form->control('estado_id', ['options' => $estados]);
            echo $this->Form->control('descripcion');
            //echo $this->Form->control('conclusion');
            //echo $this->Form->control('images._ids', ['options' => $images]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
