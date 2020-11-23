<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
$this->assign('title', 'Nuevo pedido');
?>

<div class="row justify-content-center">
    <div class="col-sm-8">
        <?= $this->Form->create($pedido,['name'=>'nuevoPedido']) ?>
            <div class="form-group row">
                <legend class="ml-3">Nuevo Pedido</legend>
                <label for="cliente" id="lblcliente" class="col-sm-3 col-form-label mt-2">Cliente</label>
                <div id="cliente_div" class="col-sm-8">
                    <?php
                        echo $this->Form->control('cliente', 
                        [
                            'div' => false, 
                            'id' => 's', 
                            'autocomplete' => 'off', 
                            'label' => false, 
                            'class'=>'form-control mt-2', 
                            'placeholder' => 'Ingrese nombre o CUIT/DNI del cliente'
                            ]);
                        echo $this->Form->control('cliente_id', 
                        [
                            'type' => 'hidden', 
                            'id' => 'c_id', 
                            'label' => false, 
                            'class'=>'form-control mt-2'
                            ]);
                    ?>
                </div>
                <?= $this->Form->button($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Quitar cliente')), [
                        'type' => 'button',
                        'class' => 'btnCuadrado ml-2 mb-3 mr-5',
                        'id' => 'btn_limpiar',
                        'title' => 'Quitar cliente',
                        'style' => "display: none;"
                    ]) ?>
                <label for="fechaInicio" id="fechaInicio" class="col-sm-3 col-form-label mt-2">Fechas</label>
                <div class="col-sm-4">
                    <?php echo $this->Form->control('fecha_inicio', [
                        'type' => 'text',
                        'placeholder' => 'Fecha desde',
                        'readonly' => 'readonly',
                        'id' => 'fecha_inicio',
                        'class'=>'form-control mt-2 calendario',
                        'data-toggle' => 'datepicker',
                        'label' => false,
                        'autocomplete' => 'off'
                    ]) ?>
                </div>
                <div class="col-sm-4">
                    <?php echo $this->Form->control('fecha_fin', [
                        'type' => 'text',
                        'placeholder' => 'Fecha hasta',
                        'readonly' => 'readonly',
                        'id' => 'fecha_fin',
                        'class'=>'form-control mt-2 calendario',
                        'data-toggle' => 'datepicker',
                        'label' => false,
                        'autocomplete' => 'off'
                        ])
                    ?>
                </div>
                <label for="descripcion" id="descripcion" class="col-sm-3 col-form-label mt-2">Descripción</label>
                <div class="col-sm-8">
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
                        'class' => 'btn btn-primary',
                        'onclick'=>'validarFechas()'
                    ]) ?>
                </div>
            </div>
        <?= $this->Form->end() ?>
    </div>
<?= $this->Html->script('search.js') ?>
<?= $this->Html->script('validador-fechas-pedidos.js') ?>
</div>
