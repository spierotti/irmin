<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
$this->assign('title', 'Datos del cliente');
?>

<legend>Datos del cliente</legend>
<div class="justify-content-center">
  <table class="table table-responsive-sm table-hover justify-content-center">
    <tbody>
      <tr>
        <th scope="row">Nombre</th>
        <td><?= h($cliente->name) ?></td>
      </tr>
      <tr>
        <th scope="row">DNI</th>
        <td><?= h($cliente->cuit) ?></td>
      </tr>
      <tr>
        <th scope="row">Email</th>
        <td><?= h($cliente->email) ?></td>
      </tr>
      <tr>
        <th scope="row">Teléfono</th>
        <td><?= h($cliente->telefono) ?></td>
      </tr>
      <tr>
        <th scope="row">Celular</th>
        <td><?= h($cliente->celular) ?></td>
      </tr>
      <tr>
        <th scope="row">Domicilio</th>
        <td><?= h($cliente->domicilio) ?></td>
      </tr>
    </tbody>
  </table>
  <div class="col-sm-2">
    <?=
        $this->Form->button('Volver', 
        array('type' => 'button',
        'class' => 'btn btn-primary mt-3 ml-2',
        'onclick' => 'location.href=\'/clientes\'')
    ); ?>
  </div>
</div>
