<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
$this->assign('title', 'Nuevo pedido');
?>

<div class="row justify-content-center">
    <div class="col-sm-8">
        <?= $this->Form->create($pedido) ?>
            <div class="form-group row">
                <legend>Nuevo Pedido</legend>
                <label for="cliente" id="cliente" class="col-sm-3 col-form-label mt-2">Cliente</label>
                <div id="cliente_div" class="col-sm-8">
                    <?php
                        echo $this->Form->control('cliente', 
                        [
                            'div' => false, 
                            'id' => 's', 
                            'autocomplete' => 'off', 
                            'label' => false, 
                            'class'=>'form-control mt-2', 
                            'placeholder' => 'Ingrese nombre o CUIT/DNI del cliente',
                            //'value' => (!empty($this->request->query['cliente'])) ? $this->request->query['cliente'] : ""
                            ]);
                        echo $this->Form->control('cliente_id', 
                        [
                            'type' => 'hidden', 
                            'id' => 'c_id', 
                            'label' => false, 
                            'class'=>'form-control mt-2',
                            //'value' => (!empty($this->request->query['cliente_id'])) ? $this->request->query['cliente_id'] : ""
                            ]);
                    ?>
                </div>
                <div class="col-sm-1">
                    <?= $this->Form->button($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Quitar cliente')), [
                            'type' => 'button',
                            'class' => 'btn btn-primary',
                            'id' => 'btn_limpiar',
                            'title' => 'Quitar cliente',
                            'style' => "display: none;"
                        ]) ?>
                </div>
                <label for="fechaInicio" id="fechaInicio" class="col-sm-3 col-form-label mt-2">Fechas</label>
                <div class="col-sm-4">
                    <?php 
                        //echo $this->Form->control('fecha_inicio',['label' => false]); 
                    ?>
                    <?php echo $this->Form->control('fecha_inicio', [
                        'type' => 'text',
                        'placeholder' => 'Fecha desde',
                        'readonly' => 'readonly',
                        'id' => 'fecha_inicio',
                        'class'=>'form-control mt-2 calendario',
                        //'class' => 'datetimepicker',
                        'data-toggle' => 'datepicker',
                        'label' => false,
                        //'value' => (!empty($this->request->query['fecha_inicio'])) ? $this->request->query['fecha_inicio'] : "",
                        'autocomplete' => 'off'
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
                        'readonly' => 'readonly',
                        'class'=>'form-control mt-2 calendario',
                        //'class' => 'datetimepicker',
                        'data-toggle' => 'datepicker',
                        'label' => false,
                        //'value' => (!empty($this->request->query['fecha_fin'])) ? $this->request->query['fecha_fin'] : "",
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
                        'class' => 'btn btn-primary'
                    ]) ?>
                </div>
            </div>
        <?= $this->Form->end() ?>
    </div>
<?= $this->Html->script('search.js') ?>
</div>
