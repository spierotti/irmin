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

<div class="row justify-content-center">
    <div class="col-sm-8">
        <?= $this->Form->create($pedido) ?>
            <div class="form-group row">
                <legend>Nuevo Pedido</legend>
                <label for="cliente" id="cliente" class="col-sm-3 col-form-label mt-2">Cliente</label>
                <div class="col-sm-9">
                    <?php
                        echo $this->Form->control('cliente_id', ['type' => 'hidden', 'id' => 'c_id', 'label' => false, 'class'=>'form-control mt-2']);
                        echo $this->Form->control('cliente', ['div' => false, 'id' => 's', 'autocomplete' => 'off', 'label' => false, 'class'=>'form-control mt-2']);
                    ?>
                </div>
                <label for="fechaInicio" id="fechaInicio" class="col-sm-3 col-form-label mt-2">Fechas</label>
                <div class="col-sm-4">
                    <?php 
                        //echo $this->Form->control('fecha_inicio',['label' => false]); 
                    ?>

                    <?php echo $this->Form->control('fecha_inicio', [
                        'type' => 'text',
                        'placeholder' => 'Fecha desde',
                        'class'=>'form-control mt-2',
                        //'class' => 'datetimepicker',
                        'data-toggle' => 'datepicker',
                        'label' => false,
                        'value' => (!empty($this->request->query['fecha_inicio'])) ? $this->request->query['fecha_inicio'] : ""
                    ]) ?>

                </div>
                <!--<label for="fechaFin" id="fechaFin" class="col-sm-3 col-form-label mt-2">Fecha de fin</label>-->
                <div class="col-sm-4">
                    <?php 
                        //echo $this->Form->control('fecha_fin',['label' => false]); 
                    ?>

                    <?php echo $this->Form->control('fecha_fin', [
                        'type' => 'text',
                        'placeholder' => 'Fecha hasta',
                        'class'=>'form-control mt-2',
                        //'class' => 'datetimepicker',
                        'data-toggle' => 'datepicker',
                        'label' => false,
                        'value' => (!empty($this->request->query['fecha_fin'])) ? $this->request->query['fecha_fin'] : ""
                    ]) ?>
                </div>
                <label for="descripcion" id="descripcion" class="col-sm-3 col-form-label mt-2">Descripción</label>
                <div class="col-sm-9">
                    <?php 
                        echo $this->Form->control('descripcion',[
                            'type' => 'textarea',
                            'class'=>'form-control mt-2',
                            'style' => 'width: -moz-available;',
                            'label' => false,
                            'placeholder' => 'Ej: granizo en quinta Los Fresnos'
                    ]); ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <?= $this->Form->submit('Registrar pedido', [
                        'class' => 'btn btn-primary'
                    ]) ?>
                </div>
            </div>
        <?= $this->Form->end() ?>
    </div>
</div>
<?= $this->Html->script('search.js') ?>