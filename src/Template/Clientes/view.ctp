<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in', ['viewName'=>'Cliente']); ?>

<div class="clientes view large-9 medium-8 columns content">
    <h3><?= h($cliente->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($cliente->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CUIT / DNI') ?></th>
            <td><?= h($cliente->cuit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($cliente->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefono') ?></th>
            <td><?= h($cliente->telefono) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Celular') ?></th>
            <td><?= h($cliente->celular) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Domicilio') ?></th>
            <td><?= h($cliente->domicilio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Creación') ?></th>
            <td><?= h($cliente->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Última Modificación') ?></th>
            <td><?= h($cliente->modified) ?></td>
        </tr>
    </table>
</div>
