<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
?>

    <?= $this->Form->create($cliente) ?>
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="form-group row">
                    <legend class="ml-3">Buscar Cliente</legend>
                    <div class="col-sm-7">
                        <?php
                            echo $this->Form->control('id', ['label' => false, 'placeholder' => 'Ingrese CUIT o DNI del cliente', 'autocomplete' => 'off', 'id' => 'id', 'class' => 'form-control']);
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <?= $this->Form->submit('Buscar', [
                            'class' => 'btn btn-primary mt-2'
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    <?= $this->Form->end() ?>

<?= $this->Html->script('number-validator.js') ?>
