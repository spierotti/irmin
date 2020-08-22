<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in', ['viewName'=>'Cliente']); ?>
<legend>Datos del cliente</legend>
<table class="table table-responsive-sm table-hover">
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
<div>
    <button onclick="window.location.href = '/clientes';" class="btn btn-primary mt-4">Volver</button>
</div>