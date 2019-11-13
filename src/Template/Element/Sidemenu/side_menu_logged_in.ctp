<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">

    
        <!-- MENU PRINCIPAL -->
        <li class="heading"><?= __('MENU') ?></li>
        <!-- PEDIDOS -->
        <li><?= $this->Html->link(__('Ver Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nuevo Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?> </li>
        <?php if($this->view == 'view' && $this->name == "Pedidos"){ ?>
            <li><?= $this->Html->link(__('Modificar Pedido'), ['action' => 'edit', $pedido->id]) ?> </li>
            <li><?= $this->Form->postLink(__('Eliminar Pedido'), ['action' => 'delete', $pedido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedido->id)]) ?> </li>
        <?php } ?>

        <!-- CLIENTES -->
        <li><?= $this->Html->link(__('Ver Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nuevo Clientes'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
        <?php if($this->view == 'view' && $this->name == "Clientes"){ ?>
            <li><?= $this->Html->link(__('Modificar Clientes'), ['action' => 'edit', $cliente->id]) ?> </li>
            <li><?= $this->Form->postLink(__('Eliminar Clientes'), ['action' => 'delete', $cliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id)]) ?> </li>
        <?php } ?>

        <!-- IMAGENES -->
        <li><?= $this->Html->link(__('Ver Imagenes'), ['controller' => 'Images', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nueva Imagen'), ['controller' => 'Images', 'action' => 'add']) ?> </li>
        <?php if($this->view == 'view' && $this->name == "Images"){ ?>
            <li><?= $this->Html->link(__('Modificar Imagen'), ['action' => 'edit', $image->fecha_hora_imagen]) ?> </li>
            <li><?= $this->Form->postLink(__('Eliminar Imagen'), ['action' => 'delete', $image->fecha_hora_imagen], ['confirm' => __('Are you sure you want to delete # {0}?', $image->fecha_hora_imagen)]) ?> </li>
        <?php } ?>

        <li role="reparator" class="divider"></li>

        <!-- MENU MI CUENTA -->
        <li class="heading"><?= __('MI CUENTA') ?></li>
        <li><?= $this->Html->link(__('Editar Perfil'), ['controller' => 'Users', 'action' => 'edit', $auth['User']['id']]) ?></li>
        <li><?= $this->Html->link(__('Cambiar Contraseña'), ['controller' => 'Users', 'action' => 'changePassword']) ?></li>

        <!-- MENU ADMINISTRADOR -->
        <?php if (isset($auth['User']['role_id']) && $auth['User']['role_id'] === 1){ ?>

            <li role="reparator" class="divider"></li>

            <li class="heading"><?= __('Admin') ?></li>

            <!-- ROLES -->
            <li><?= $this->Html->link(__('Ver Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('Nuevo Rol'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
            <?php if($this->view == 'view' && $this->name == "Images"){ ?>
                <li><?= $this->Html->link(__('Modificar Rol'), ['action' => 'edit', $role->id]) ?> </li>
                <li><?= $this->Form->postLink(__('Eliminar Role'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]) ?> </li>
            <?php } ?>

            <!-- USERS -->
            <li><?= $this->Html->link(__('Ver Usuarios'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('Nuevo Usuario'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
            <?php if($this->view == 'view' && $this->name == "Users"){ ?>
                <li><?= $this->Html->link(__('Modificar User'), ['action' => 'edit', $user->id]) ?> </li>
                <li><?= $this->Form->postLink(__('Eliminar User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
            <?php } ?>

            <!-- ESTADOS -->
            <li><?= $this->Html->link(__('Ver Estados'), ['controller' => 'Estados', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('Nuevo Estado'), ['controller' => 'Estados', 'action' => 'add']) ?> </li>
            <?php if($this->view == 'view' && $this->name == "Estados"){ ?>
                <li><?= $this->Html->link(__('Edit Estado'), ['action' => 'edit', $estado->id]) ?> </li>
                <li><?= $this->Form->postLink(__('Delete Estado'), ['action' => 'delete', $estado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estado->id)]) ?> 
            <?php } ?>

        <?php } ?>

        <li role="reparator" class="divider"></li>

        <!-- MENU OTROS -->
        <li class="heading"><?= __('Otros') ?></li>
        <li><?= $this->Html->link(__('Nuestra Empresa'), ['controller' => 'Pages', 'action' => 'display', 'nuestra_empresa']) ?></li>
        <li><?= $this->Html->link(__('Contacto'), ['controller' => 'Pages', 'action' => 'display', 'contacto']) ?></li>
        <li><?= $this->Html->link(__('Ayuda'), ['controller' => 'Pages', 'action' => 'display', 'ayuda']) ?></li>
    </ul>
</nav>