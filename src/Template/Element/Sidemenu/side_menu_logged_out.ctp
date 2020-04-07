
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('MENU') ?></li>
        <li><?= $this->Html->link(__('Recuperar Contraseña'), ['action' => 'forgotPassword']) ?></li>
        <li><?= $this->Html->link(__('Nuestra Empresa'), ['controller' => 'Pages', 'action' => 'display', 'nuestra_empresa']) ?></li>
        <li><?= $this->Html->link(__('Contacto'), ['controller' => 'Pages', 'action' => 'display', 'contacto']) ?></li>
    </ul>
</nav>