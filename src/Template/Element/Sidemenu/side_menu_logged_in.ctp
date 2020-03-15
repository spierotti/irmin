<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">

        <!-- MENU MI CUENTA -->
        <li class="heading"><?= __('MI CUENTA') ?></li>
        <?php if($this->view != 'viewPerfil'){ ?>
            <li><?= $this->Html->link(__('Ver Perfil'), ['controller' => 'Users', 'action' => 'viewPerfil']) ?></li>
        <?php }else{ ?>
            <li><?= $this->Html->link(__('Editar Perfil'), ['controller' => 'Users', 'action' => 'editPerfil']) ?></li>
        <?php } ?>
        <li><?= $this->Html->link(__('Cambiar Contraseña'), ['controller' => 'Users', 'action' => 'changePassword']) ?></li>
        <!-------------------->

        <!-- PEDIDOS -->
        <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_pedidos'] === true || $auth['User']['role']['modificar_pedido'] === true || $auth['User']['role']['nuevo_pedido'] === true ||$auth['User']['role']['eliminar_pedido'] === true)){ ?>
            <li role="reparator" class="divider"></li>
            <li class="heading"><?= __('Pedidos') ?></li>
        <?php } ?>
        <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_pedidos'] === true)){ ?>
        <li><?= $this->Html->link(__('Ver'), ['controller' => 'Pedidos', 'action' => 'index']) ?> </li>
        <?php } ?>
        <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['nuevo_pedido'] === true)){ ?>
            <li><?= $this->Html->link(__('Nuevo'), ['controller' => 'Pedidos', 'action' => 'add']) ?> </li>
        <?php } ?>
        <?php if($this->view == 'view' && $this->name == "Pedidos"){ ?>
            <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['nuevo_pedido'] === true)){ ?>
                <li><?= $this->Html->link(__('Modificar Pedido'), ['action' => 'edit', $pedido->id]) ?> </li>
            <?php } ?>
            <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['nuevo_pedido'] === true)){ ?>    
                <li><?= $this->Form->postLink(__('Eliminar Pedido'), ['action' => 'delete', $pedido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedido->id)]) ?> </li>
            <?php } ?>
        <?php } ?>
        <!-------------->

        <!-- CLIENTES -->
        <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_clientes'] === true || $auth['User']['role']['nuevo_cliente'] === true || $auth['User']['role']['modificar_cliente'] === true ||$auth['User']['role']['eliminar_cliente'] === true)){ ?>
            <li role="reparator" class="divider"></li>
            <li class="heading"><?= __('Clientes') ?></li>
        <?php } ?>
        <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_clientes'] === true)){ ?>
            <li><?= $this->Html->link(__('Ver'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
        <?php } ?>
        <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['nuevo_cliente'] === true)){ ?>
            <li><?= $this->Html->link(__('Nuevo'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
        <?php } ?>
        <?php if($this->view == 'view' && $this->name == "Clientes"){ ?>
            <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['modificar_cliente'] === true)){ ?>
                <li><?= $this->Html->link(__('Modificar'), ['action' => 'edit', $cliente->id]) ?> </li>
            <?php } ?>
            <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['eliminar_cliente'] === true)){ ?>
                <li><?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $cliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id)]) ?> </li>
            <?php } ?>
        <?php } ?>
        <!-------------->

        <!-- IMAGENES -->
        <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_imagenes'] === true || $auth['User']['role']['nueva_imagen'] === true || $auth['User']['role']['modificar_imagen'] === true ||$auth['User']['role']['eliminar_imagen'] === true)){ ?>
            <li role="reparator" class="divider"></li>
            <li class="heading"><?= __('Imagenes') ?></li>
        <?php } ?>
        <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_imagenes'] === true)){ ?>
            <li><?= $this->Html->link(__('Ver'), ['controller' => 'Images', 'action' => 'index']) ?> </li>
        <?php } ?>
        <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['nueva_imagen'] === true)){ ?>
            <li><?= $this->Html->link(__('Nueva'), ['controller' => 'Images', 'action' => 'add']) ?> </li>
        <?php } ?>
        <?php if($this->view == 'view' && $this->name == "Images"){ ?>
            <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['modificar_imagen'] === true)){ ?>
                <li><?= $this->Html->link(__('Modificar Imagen'), ['action' => 'edit', $image->fecha_hora_imagen]) ?> </li>
            <?php } ?>
            <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['eliminar_imagen'] === true)){ ?>
                <li><?= $this->Form->postLink(__('Eliminar Imagen'), ['action' => 'delete', $image->fecha_hora_imagen], ['confirm' => __('Are you sure you want to delete # {0}?', $image->fecha_hora_imagen)]) ?> </li>
            <?php } ?>
        <?php } ?>
        <!-------------->

        <!-- MENU ADMINISTRADOR -->
        <?php if (isset($auth['User']['role_id']) && $auth['User']['role_id'] === 1){ ?>
            <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_roles'] === true || $auth['User']['role']['nueva_rol'] === true || $auth['User']['role']['modificar_rol'] === true || $auth['User']['role']['eliminar_rol'] === true && $auth['User']['role']['ver_usuarios'] === true || $auth['User']['role']['nueva_usuario'] === true || $auth['User']['role']['modificar_usuario'] === true || $auth['User']['role']['eliminar_usuario'] === true)){ ?>
                <li role="reparator" class="divider"></li>
                <li class="heading"><?= __('Admin') ?></li>
            <?php } ?>

            <!-- ROLES -->
            <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_roles'] === true)){ ?>
                <li><?= $this->Html->link(__('Ver Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
            <?php } ?>
            <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['nueva_rol'] === true)){ ?>
                <li><?= $this->Html->link(__('Nuevo Rol'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
            <?php } ?>
            <?php if($this->view == 'view' && $this->name == "Images"){ ?>
                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['modificar_rol'] === true)){ ?>
                    <li><?= $this->Html->link(__('Modificar Rol'), ['action' => 'edit', $role->id]) ?> </li>
                <?php } ?>
                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['eliminar_rol'] === true)){ ?>
                    <li><?= $this->Form->postLink(__('Eliminar Role'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]) ?> </li>
                <?php } ?>
            <?php } ?>
            <!-------------->

            <!-- USERS -->
            <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_usuarios'] === true)){ ?>
                <li><?= $this->Html->link(__('Ver Usuarios'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
            <?php } ?>
            <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['nueva_usuario'] === true)){ ?>
                <li><?= $this->Html->link(__('Nuevo Usuario'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
            <?php } ?>
            <?php if($this->view == 'view' && $this->name == "Users"){ ?>
                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['modificar_usuario'] === true)){ ?>
                    <li><?= $this->Html->link(__('Modificar User'), ['action' => 'edit', $user->id]) ?> </li>
                <?php } ?>
                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['eliminar_usuario'] === true)){ ?>
                    <li><?= $this->Form->postLink(__('Eliminar User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
                <?php } ?>
            <?php } ?>
            <!-------------->

        <?php } ?>
        <!-------------->

        <li role="reparator" class="divider"></li>

        <!-- MENU OTROS -->
        <li class="heading"><?= __('Otros') ?></li>
        <li><?= $this->Html->link(__('Nuestra Empresa'), ['controller' => 'Pages', 'action' => 'display', 'nuestra_empresa']) ?></li>
        <li><?= $this->Html->link(__('Contacto'), ['controller' => 'Pages', 'action' => 'display', 'contacto']) ?></li>
        <li><?= $this->Html->link(__('Ayuda'), ['controller' => 'Pages', 'action' => 'display', 'ayuda']) ?></li>
        <!-------------->
    </ul>
</nav>