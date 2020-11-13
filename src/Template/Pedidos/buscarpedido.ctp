<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
$this->assign('title', 'Buscar pedido');
use Cake\Routing\Router;
?>

<div class="pedidos form large-9 medium-8 columns content">
    <?= $this->Form->create($pedido) ?>
    <fieldset>
        <legend>Buscar Pedido</legend>
        <div class="col-sm-6">
            <?php
                echo $this->Form->control('id', ['label' => false, 'placeholder' => 'Ingrese Nro de Pedido', 'autocomplete' => 'off', 'id' => 'id', 'class' => 'form-control']);
            ?>
        </div>

        <div class="form-group row">
            <div class="col-sm-10 ml-3">
                <?= $this->Form->submit('Buscar', [
                    'class' => 'btn btn-primary mt-4'
                ]) ?>
                <button type="button" onclick="window.location.href = '<?php echo Router::url(array('controller'=>'Pedidos', 'action'=>'index'))?>'" class="btn btn-primary mt-4">Cancelar</button>
            </div>
            <div class="col-sm-10 ml-3">
                
            </div>
        </div>
    </fieldset>
    <?= $this->Form->end() ?>
</div>

<?= $this->Html->script('number-validator.js?v=1.1') ?>
