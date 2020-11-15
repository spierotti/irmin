<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
$this->assign('title', 'Agregar nuevo cliente');
?>

<div class="clientes form large-9 medium-8 columns content">
    <?= $this->Form->create($cliente) ?>
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="form-group row">
                    <legend class="ml-3">Agregar nuevo cliente</legend>
                    <label for="name" id="name" class="col-sm-3 col-form-label mt-2">Nombre </label>
                    <div class="col-sm-7">
                        <?php echo $this->Form->control('name',
                            [
                                'type' => 'text',
                                'label' => false, 
                                'class'=>'form-control mt-2',
                                'autocomplete' => 'off'
                                ]
                            ); ?>
                    </div>
                    <label for="cuit" id="cuit" class="col-sm-3 col-form-label mt-2">CUIT / DNI</label>
                    <div class="col-sm-7">
                        <?php echo $this->Form->control( 'cuit',
                            [
                                'type' => 'text',
                                'label' => false, 
                                'id' => 'txt_cuit', 
                                'class'=>'form-control mt-2',
                                'autocomplete' => 'off'
                                ]
                            ); ?>
                    </div>
                    <label for="email" id="email" class="col-sm-3 col-form-label mt-2">E-mail</label>
                    <div class="col-sm-7">
                        <?php echo $this->Form->control('email',
                            [
                                'type' => 'email',
                                'label' => false, 
                                'class'=>'form-control mt-2',
                                'autocomplete' => 'off'
                                ]
                            ); ?>
                    </div>
                    <label for="telefono" id="telefono" class="col-sm-3 col-form-label mt-2">Teléfono</label>
                    <div class="col-sm-7">
                        <?php echo $this->Form->control('telefono',
                            [
                                'type' => 'text',
                                'label' => false, 
                                'class'=>'form-control mt-2',
                                'autocomplete' => 'off',
                                'id' => 'txt_telefono'
                                ]
                            ); ?>
                    </div>
                    <label for="celular" id="celular" class="col-sm-3 col-form-label mt-2">Celular</label>
                    <div class="col-sm-7">
                        <?php echo $this->Form->control('celular',
                            [
                                'type' => 'text',
                                'label' => false, 
                                'class'=>'form-control mt-2',
                                'autocomplete' => 'off',
                                'id' => 'txt_celular'
                                ]
                            ); ?>
                    </div>
                    <label for="domicilio" id="domicilio" class="col-sm-3 col-form-label mt-2">Domicilio</label>
                    <div class="col-sm-7">
                        <?php echo $this->Form->control('domicilio',['label' => false, 'class'=>'form-control mt-2']); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 mt-3">
                        <?= $this->Form->submit('Agregar cliente', [
                            'class' => 'btn btn-primary'
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>

    <?= $this->Form->end() ?>
</div>
<?= $this->Html->script('number-validator-cliente.js') ?>