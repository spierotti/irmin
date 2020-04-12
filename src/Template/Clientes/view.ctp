<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in', ['viewName'=>'Cliente']); ?>
<legend><?= __('Datos del cliente') ?></legend>
<div class="row col-sm-12">
    <div class="row col-sm-10">
        <div class="col-sm-4 border">
            Nombre
        </div>
        <div class="col-sm-6 border">
            <?= h($cliente->name) ?>
        </div>
    </div>
    <div class="row col-sm-10">
        <div class="col-sm-4 border">
            CUIT/DNI
        </div>
        <div class="col-sm-6 border">
            <?= h($cliente->cuit) ?>
        </div>
    </div>
    <div class="row col-sm-10">
        <div class="col-sm-4 border">
            Email
        </div>
        <div class="col-sm-6 border">
            <?= h($cliente->email) ?>
        </div>
    </div>
    <div class="row col-sm-10">
        <div class="col-sm-4 border">
            Teléfono
        </div>
        <div class="col-sm-6 border">
            <?= h($cliente->telefono) ?>
        </div>
    </div>
    <div class="row col-sm-10">
        <div class="col-sm-4 border">
            Celular
        </div>
        <div class="col-sm-6 border">
            <?= h($cliente->celular) ?>
        </div>
    </div>
    <div class="row col-sm-10">
        <div class="col-sm-4 border">
            Domicilio
        </div>
        <div class="col-sm-6 border">
            <?= h($cliente->domicilio) ?>
        </div>
    </div>
    <div class="row col-sm-10">
        <div class="col-sm-4 border">
            Fecha de creación
        </div>
        <div class="col-sm-6 border">
            <?= h($cliente->created) ?>
        </div>
    </div>
    <div class="row col-sm-10">
        <div class="col-sm-4 border">
            Última modificación
        </div>
        <div class="col-sm-6 border">
            <?= h($cliente->modified) ?>
        </div>
    </div>
</div>