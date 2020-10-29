<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Informe $pedido
 */
?>

<div class="pedidos form large-9 medium-8 columns content">
    <?= $this->Form->create($informe) ?>
    <fieldset>
        <legend>Buscar Informe</legend>
        <div class="col-sm-6">
            <?php
                echo $this->Form->control('id', ['label' => false, 'placeholder' => 'Ingrese Nro de Informe','autocomplete' => 'off', 'id' => 'id', 'class' => 'form-control']);
            ?>
        </div>

        <div class="form-group row">
        <div class="col-sm-10 ml-3">
            <?= $this->Form->submit('Buscar', [
                'class' => 'btn btn-primary mt-4'
            ]) ?>
        </div>
        </div>
    </fieldset>
    <?= $this->Form->end() ?>
</div>

<?= $this->Html->script('number-validator.js?v=1.1') ?>
