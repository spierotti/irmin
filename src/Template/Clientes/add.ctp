<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in', ['viewName'=>'Cliente']); ?>
<div class="clientes form large-9 medium-8 columns content">
    <?= $this->Form->create($cliente) ?>
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="form-group row">
                <legend><?= __('Agregar nuevo cliente') ?></legend>
                <label for="razonSocial" id="razonSocial" class="col-sm-3 col-form-label mt-2">Nombre </label>
                <div class="col-sm-8">
                    <?php echo $this->Form->control('razon_social',['label' => false, 'class'=>'form-control mt-2']); ?>
                </div>
                <label for="cuit" id="cuit" class="col-sm-3 col-form-label mt-2">Cuit</label>
                <div class="col-sm-8">
                    <?php echo $this->Form->control('cuit',['label' => false,'class'=>'form-control mt-2']); ?>
                </div>
                <label for="email" id="email" class="col-sm-3 col-form-label mt-2">E-mail</label>
                <div class="col-sm-8">
                    <?php echo $this->Form->control('email',['label' => false,'class'=>'form-control mt-2']); ?>
                </div>
                <label for="telefono" id="telefono" class="col-sm-3 col-form-label mt-2">Teléfono</label>
                <div class="col-sm-8">
                    <?php echo $this->Form->control('telefono',['label' => false, 'class'=>'form-control mt-2']); ?>
                </div>
                <label for="celular" id="celular" class="col-sm-3 col-form-label mt-2">Celular</label>
                <div class="col-sm-8">
                    <?php echo $this->Form->control('celular',['label' => false, 'class'=>'form-control mt-2']); ?>
                </div>
                <label for="domicilio" id="domicilio" class="col-sm-3 col-form-label mt-2">Domicilio</label>
                <div class="col-sm-8">
                    <?php echo $this->Form->control('domicilio',['label' => false, 'class'=>'form-control mt-2']); ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <?= $this->Form->submit('Agregar cliente', [
                        'class' => 'btn btn-primary'
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

    <?= $this->Form->end() ?>
</div>