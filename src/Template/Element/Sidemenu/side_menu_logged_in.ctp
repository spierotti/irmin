<!--Menu mobile-->
<div class="menu-wrapper">
    <div class="mobile-menu">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <i class="fa fa-bars fa-2x"></i>
                    </button>
                    <a class="navbar-brand" href="/users/home"><i class="fa fa-home fa-2x"></i></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="child-menu"><a href="/users/home">Home </a></li>
                        <!--Mi cuenta - Mobile -->
                        <?php if (isset($auth['User']['role_id']))
                        { ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mi cuenta </a>
                            <ul class="dropdown-menu">
                            <?php if($this->view != 'viewPerfil')
                                { ?>
                                    <li><?= $this->Html->link(__('Ver Perfil'), ['controller' => 'Users', 'action' => 'viewPerfil']) ?></li>
                                <?php 
                                } else
                                    { ?>
                                        <li><?= $this->Html->link(__('Editar Perfil'), ['controller' => 'Users', 'action' => 'editPerfil']) ?></li>
                                <?php } ?>
                                <li><?= $this->Html->link(__('Cambiar Contraseña'), ['controller' => 'Users', 'action' => 'changePassword']) ?></li>
                            </ul>
                        </li>
                        <?php } ?>
                        <!--Fin de mi cuenta-->

                        <!--Pedidos mobile-->
                        <?php 
                        if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_pedidos'] === true || $auth['User']['role']['modificar_pedido'] === true || $auth['User']['role']['nuevo_pedido'] === true || $auth['User']['role']['eliminar_pedido'] === true || $auth['User']['role']['evaluar_pedido'] === true))
                        { ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pedidos </a>
                            <?php } ?>
                            <ul class="dropdown-menu">
                                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_pedidos'] === true))
                                        { ?>    
                                        <li><?= $this->Html->link(__('Ver pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?> </li>
                                    <?php } ?>
                                    <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_pedidos'] === true))
                                        { ?>    
                                        <li><?= $this->Html->link(__('Buscar pedido'), ['controller' => 'Pedidos', 'action' => 'buscarpedido']) ?> </li>
                                    <?php } ?>
                                    <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['nuevo_pedido'] === true))
                                        { ?>
                                        <li><?= $this->Html->link(__('Nuevo pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?> </li>
                                    <?php } ?>
                                    <?php if($this->view == 'view' && $this->name == "Pedidos") { ?> 

                                        <?php if (isset($auth['User']['role_id']) && $auth['User']['role']['evaluar_pedido'] === true && ($pedido->estado_id == 1 || ($pedido->estado_id == 2 && $pedido->experto_id == $auth['User']['id']))) { ?>    
                                            <li><?= $this->Html->link(__('Evaluar pedido'), ['action' => 'evaluar', $pedido->id]) ?> </li>
                                        <?php } ?>
                                        
                                        <?php if (isset($auth['User']['role_id']) && $auth['User']['role']['eliminar_pedido'] === true && ($pedido->estado_id < 3) && (is_null($pedido->experto_id) || ($pedido->experto_id === $auth['User']['id']))) { ?>
                                            <li><?= $this->Html->link(__('Cancelar pedido'), ['action' => 'delete', $pedido->id]) ?> </li>
                                        <?php } ?>
                                <?php } ?>
                            </ul>
                        </li>
                        <!--Fin de pedidos-->

                        <!--Informes mobile-->
                        <?php 
                        if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_pedidos'] === true || $auth['User']['role']['modificar_pedido'] === true || $auth['User']['role']['nuevo_pedido'] === true || $auth['User']['role']['eliminar_pedido'] === true || $auth['User']['role']['evaluar_pedido'] === true))
                        { ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Informes </a>
                            <?php } ?>
                            <ul class="dropdown-menu">
                                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_pedidos'] === true))
                                    { ?>    
                                    <li><?= $this->Html->link(__('Ver informes'), ['controller' => 'Informes', 'action' => 'index']) ?> </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <!--Fin informes-->

                        <!--Clientes mobile-->
                        <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_clientes'] === true || $auth['User']['role']['nuevo_cliente'] === true || $auth['User']['role']['modificar_cliente'] === true ||$auth['User']['role']['eliminar_cliente'] === true))
                        { ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Clientes </a>
                            <?php } ?>
                            <ul class="dropdown-menu">
                                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_clientes'] === true))
                                { ?>
                                    <li><?= $this->Html->link(__('Ver clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
                                <?php } ?>
                                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['nuevo_cliente'] === true))
                                { ?>
                                    <li><?= $this->Html->link(__('Nuevo cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
                                <?php } ?>

                                <!--¿Qué hace esta parte-->
                                <?php if($this->view == 'view' && $this->name == "Clientes") { ?>

                                    <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['modificar_cliente'] === true)) { ?>
                                        <li><?= $this->Html->link(__('Modificar'), ['action' => 'edit', $cliente->id]) ?> </li>
                                    <?php } ?>
                                    <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['eliminar_cliente'] === true)) { ?>
                                        <li><?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $cliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id)]) ?> </li>
                                    <?php } ?>

                                <?php } ?>
                                <!--Fin de qué hace esta parte-->
                            </ul>
                        </li>
                        <!--Fin clientes -->

                        <!--Imágenes mobile-->
                        <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_imagenes'] === true || $auth['User']['role']['nueva_imagen'] === true || $auth['User']['role']['modificar_imagen'] === true ||$auth['User']['role']['eliminar_imagen'] === true))
                        { ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Imágenes </a>
                            <?php } ?>
                            <ul class="dropdown-menu">
                                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_imagenes'] === true)) { ?>
                                    <li><?= $this->Html->link(__('Ver imágenes'), ['controller' => 'Images', 'action' => 'index']) ?> </li>
                                <?php } ?>
                                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['nueva_imagen'] === true)) { ?>
                                    <li><?= $this->Html->link(__('Nueva imagen'), ['controller' => 'Images', 'action' => 'add']) ?> </li>
                                <?php } ?>
                                <?php if($this->view == 'view' && $this->name == "Images") { ?>
                                    <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['eliminar_imagen'] === true)) { ?> <!--¿Qué onda con esta parte?-->
                                        <li><?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $image->id], ['confirm' => __('Are you sure you want to delete # {0}?', $image->id)]) ?> </li>
                                    <?php } ?>
                                <?php } ?>
                            </ul>
                        </li>
                        <!--Fin imágenes-->

                        <!--Roles mobile-->
                        <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_roles'] === true || $auth['User']['role']['nueva_rol'] === true || $auth['User']['role']['modificar_rol'] === true || $auth['User']['role']['eliminar_rol'] === true)) { ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Roles </a>
                            <ul class="dropdown-menu">
                                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_roles'] === true)){ ?>
                                    <li><?= $this->Html->link(__('Ver roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
                                <?php } ?>
                                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['nueva_rol'] === true)){ ?>
                                    <li><?= $this->Html->link(__('Nuevo rol'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
                                <?php } ?>
                                <?php if($this->view == 'view' && $this->name == "Roles"){ ?>
                                    <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['modificar_rol'] === true)){ ?>
                                        <li><?= $this->Html->link(__('Modificar rol'), ['action' => 'edit', $role->id]) ?> </li>
                                    <?php } ?>
                                    <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['eliminar_rol'] === true)){ ?>
                                        <li><?= $this->Form->postLink(__('Eliminar rol'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]) ?> </li>
                                    <?php } ?>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
                        <!--FIn roles-->

                        <!--Usuarios - mobile-->
                        <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_usuarios'] === true || $auth['User']['role']['nueva_usuario'] === true || $auth['User']['role']['modificar_usuario'] === true || $auth['User']['role']['eliminar_usuario'] === true))
                        { ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios </a>
                            <ul class="dropdown-menu">
                                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_usuarios'] === true))
                                { ?>
                                    <li><?= $this->Html->link(__('Ver usuarios'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
                                <?php } ?>
                                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['nueva_usuario'] === true))
                                { ?>
                                    <li><?= $this->Html->link(__('Nuevo usuario'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
                                <?php } ?>
                                <!--¿QUé hace esto?-->
                                <?php if($this->view == 'view' && $this->name == "Users")
                                { ?>
                                    <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['modificar_usuario'] === true)){ ?>
                                        <li><?= $this->Html->link(__('Modificar'), ['action' => 'edit', $user->id]) ?> </li>
                                    <?php } ?>
                                    <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['eliminar_usuario'] === true)){ ?>
                                        <li><?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
                                    <?php } ?>
                                <?php } ?>
                                <!--Fin de ¿QUé hace esto?-->
                            </ul>
                        </li>
                        <?php } ?>
                        <!--Fin usuarios-->
                        <li class="child-menu"><?= $this->Html->link(__('Nuestra empresa'), ['controller' => 'Pages', 'action' => 'nuestra_empresa']) ?></li>

                        <li class="child-menu"><?= $this->Html->link(__('Contacto'), ['controller' => 'Pages', 'action' => 'contacto']) ?></li>

                        <li class="child-menu"><?= $this->Html->link(__('Ayuda'), ['controller' => 'Users', 'action' => 'ayuda']) ?></li>
                        <!--LOGOUT-->
                        <?php if (isset($auth['User']['role_id']) )
                        { ?>
                        <li class="child-menu"><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
                        <?php } ?>
                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>
    </div><!-- end mobile-menu -->


    <!--Menu para pc-->
    <header class="vertical-header">
        <div class="vertical-header-wrapper">
            <nav class="nav-menu">

                <div class="margin-block"></div>

                <ul class="primary-menu">

                    <li class="child-menu"><a href="/users/home">Home </a></li>
                    <?php if (!isset($auth['User']['role_id']))
                    { ?>
					    <li class="child-menu"><?= $this->Html->link(__('Recuperar Contraseña'), ['controller' => 'Users','action' => 'forgotPassword']) ?></li>
                    <?php } ?>
                    <!--Mi cuenta-->
                    <?php if (isset($auth['User']['role_id']))
                    { ?>
                    <li class="child-menu"><a href="#">Mi cuenta <i class="fa fa-angle-right"></i></a>
                        <div class="sub-menu-wrapper">
                            <ul class="sub-menu center-content">
                                <?php if($this->view != 'viewPerfil')
                                { ?>
                                    <li><?= $this->Html->link(__('Ver Perfil'), ['controller' => 'Users', 'action' => 'viewPerfil']) ?></li>
                                <?php 
                                } else
                                    { ?>
                                        <li><?= $this->Html->link(__('Editar Perfil'), ['controller' => 'Users', 'action' => 'editPerfil']) ?></li>
                                <?php } ?>
                                <li><?= $this->Html->link(__('Cambiar Contraseña'), ['controller' => 'Users', 'action' => 'changePassword']) ?></li>
                            </ul>
                        </div>
                    </li>
                    <?php } ?>
                    <!--Fin de mi cuenta-->

                    <!--PEDIDOS-->
                    <?php 
                    if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_pedidos'] === true || $auth['User']['role']['modificar_pedido'] === true || $auth['User']['role']['nuevo_pedido'] === true || $auth['User']['role']['eliminar_pedido'] === true || $auth['User']['role']['evaluar_pedido'] === true))
                    { ?>
                    <li class="child-menu"><a href="#">Pedidos <i class="fa fa-angle-right"></i></a>
                    <?php } ?>    
                        <div class="sub-menu-wrapper">
                            <ul class="sub-menu center-content">
                                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_pedidos'] === true))
                                    { ?>    
                                    <li><?= $this->Html->link(__('Ver pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?> </li>
                                <?php } ?>
                                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_pedidos'] === true))
                                    { ?>    
                                    <li><?= $this->Html->link(__('Buscar pedido'), ['controller' => 'Pedidos', 'action' => 'buscarpedido']) ?> </li>
                                <?php } ?>
                                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['nuevo_pedido'] === true))
                                    { ?>
                                    <li><?= $this->Html->link(__('Nuevo pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?> </li>
                                <?php } ?>
                                <?php if($this->view == 'view' && $this->name == "Pedidos") { ?> 

                                    <li><?= $this->Html->link(__('Exportar a PDF'), ['action' => 'view', $pedido->id, '_ext' => 'pdf']); ?></li>

                                    <?php if (isset($auth['User']['role_id']) && $auth['User']['role']['evaluar_pedido'] === true && ($pedido->estado_id == 1 || ($pedido->estado_id == 2 && $pedido->experto_id == $auth['User']['id']))) { ?>    
                                        <li><?= $this->Html->link(__('Evaluar pedido'), ['action' => 'evaluar', $pedido->id]) ?> </li>
                                    <?php } ?>
                                    
                                    <?php if (isset($auth['User']['role_id']) && $auth['User']['role']['eliminar_pedido'] === true && ($pedido->estado_id < 3) && (is_null($pedido->experto_id) || ($pedido->experto_id === $auth['User']['id']))) { ?>
                                        <li><?= $this->Html->link(__('Cancelar pedido'), ['action' => 'delete', $pedido->id]) ?> </li>
                                    <?php } ?>

                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                    <!--FIN PEDIDOS -->

                    <!--INFORME-->
                    <?php 
                    if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_pedidos'] === true || $auth['User']['role']['modificar_pedido'] === true || $auth['User']['role']['nuevo_pedido'] === true || $auth['User']['role']['eliminar_pedido'] === true || $auth['User']['role']['evaluar_pedido'] === true))
                    { ?>
                    <li class="child-menu"><a href="#">Informes<i class="fa fa-angle-right"></i></a>
                    <?php } ?>    
                        <div class="sub-menu-wrapper">
                            <ul class="sub-menu center-content">
                                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_pedidos'] === true))
                                    { ?>    
                                    <li><?= $this->Html->link(__('Ver informes'), ['controller' => 'Informes', 'action' => 'index']) ?> </li>
                                <?php } ?>
                                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_pedidos'] === true))
                                    { ?>    
                                    <li><?= $this->Html->link(__('Buscar informe'), ['controller' => 'Informes', 'action' => 'buscarinforme']) ?> </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                    <!--FIN PEDIDOS -->

                    <!--CLIENTES-->
                    <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_clientes'] === true || $auth['User']['role']['nuevo_cliente'] === true || $auth['User']['role']['modificar_cliente'] === true ||$auth['User']['role']['eliminar_cliente'] === true))
                    { ?>
                    <li class="child-menu"><a href="#">Clientes <i class="fa fa-angle-right"></i></a>
                    <?php } ?>
                        <div class="sub-menu-wrapper">
                            <ul class="sub-menu center-content">
                                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_clientes'] === true))
                                { ?>
                                    <li><?= $this->Html->link(__('Ver clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
                                <?php } ?>
                                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_clientes'] === true))
                                    { ?>    
                                    <li><?= $this->Html->link(__('Buscar cliente'), ['controller' => 'Clientes', 'action' => 'buscarclientecuit']) ?> </li>
                                <?php } ?>
                                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['nuevo_cliente'] === true))
                                { ?>
                                    <li><?= $this->Html->link(__('Nuevo cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
                                <?php } ?>

                                <!--¿Qué hace esta parte-->
                                <?php if($this->view == 'view' && $this->name == "Clientes") { ?>

                                    <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['nuevo_pedido'] === true)) { ?>
                                        <li><?= $this->Html->link(__('Realizar Pedido'), ['controller' => 'Pedidos', 'action' => 'add', $cliente->id], ['confirm' => '¿Desea realizar un pedido para este cliente?']); ?></li>    
                                    <?php } ?>

                                    <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['modificar_cliente'] === true)) { ?>
                                        <li><?= $this->Html->link(__('Modificar'), ['action' => 'edit', $cliente->id]) ?> </li>
                                    <?php } ?>
                                    <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['eliminar_cliente'] === true)) { ?>
                                        <li><?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $cliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id)]) ?> </li>
                                    <?php } ?>

                                <?php } ?>
                                <!--Fin de qué hace esta parte-->
                             </ul>
                        </div>
                    </li>
                    <!--FIN CLIENTES-->

                    <!-- IMAGENES -->
                    <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_imagenes'] === true || $auth['User']['role']['nueva_imagen'] === true || $auth['User']['role']['modificar_imagen'] === true ||$auth['User']['role']['eliminar_imagen'] === true))
                    { ?>
                    <li class="child-menu"><a href="#">Imágenes <i class="fa fa-angle-right"></i></a>
                    <?php } ?>
                        <div class="sub-menu-wrapper">
                            <ul class="sub-menu center-content">
                                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_imagenes'] === true)) { ?>
                                    <li><?= $this->Html->link(__('Ver imágenes'), ['controller' => 'Images', 'action' => 'index']) ?> </li>
                                <?php } ?>
                                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['nueva_imagen'] === true)) { ?>
                                    <li><?= $this->Html->link(__('Descargar Imagenes'), ['controller' => 'Images', 'action' => 'add']) ?> </li>
                                <?php } ?>
                                <?php if($this->view == 'view' && $this->name == "Images") { ?>
                                    <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['eliminar_imagen'] === true)) { ?> <!--¿Qué onda con esta parte?-->
                                        <li><?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $image->id], ['confirm' => __('Are you sure you want to delete # {0}?', $image->id)]) ?> </li>
                                    <?php } ?>
                                <?php } ?>
                             </ul>
                        </div>
                    </li>
                    <!--FIN IMÁGENES-->


                    <!-- ROLES -->
                    <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_roles'] === true || $auth['User']['role']['nueva_rol'] === true || $auth['User']['role']['modificar_rol'] === true || $auth['User']['role']['eliminar_rol'] === true)) { ?>
                    <li class="child-menu"><a href="#">Roles <i class="fa fa-angle-right"></i></a>
                        <div class="sub-menu-wrapper">
                            <ul class="sub-menu center-content">
                                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_roles'] === true)){ ?>
                                    <li><?= $this->Html->link(__('Ver roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
                                <?php } ?>
                                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['nueva_rol'] === true)){ ?>
                                    <li><?= $this->Html->link(__('Nuevo rol'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
                                <?php } ?>
                                <?php if($this->view == 'view' && $this->name == "Roles"){ ?>
                                    <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['modificar_rol'] === true)){ ?>
                                        <li><?= $this->Html->link(__('Modificar rol'), ['action' => 'edit', $role->id]) ?> </li>
                                    <?php } ?>
                                    <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['eliminar_rol'] === true)){ ?>
                                        <li><?= $this->Form->postLink(__('Eliminar rol'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]) ?> </li>
                                    <?php } ?>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                    <?php } ?>
                    <!-------------->


                    <!--USUARIOS-->
                    <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_usuarios'] === true || $auth['User']['role']['nueva_usuario'] === true || $auth['User']['role']['modificar_usuario'] === true || $auth['User']['role']['eliminar_usuario'] === true))
                    { ?>
                    <li class="child-menu"><a href="#">Usuarios <i class="fa fa-angle-right"></i></a>
                        <div class="sub-menu-wrapper">
                            <ul class="sub-menu center-content">
                                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_usuarios'] === true))
                                { ?>
                                    <li><?= $this->Html->link(__('Ver usuarios'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
                                <?php } ?>
                                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['nueva_usuario'] === true))
                                { ?>
                                    <li><?= $this->Html->link(__('Nuevo usuario'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
                                <?php } ?>
                                <!--¿QUé hace esto?-->
                                <?php if($this->view == 'view' && $this->name == "Users")
                                { ?>
                                    <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['modificar_usuario'] === true)){ ?>
                                        <li><?= $this->Html->link(__('Modificar'), ['action' => 'edit', $user->id]) ?> </li>
                                    <?php } ?>
                                    <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['eliminar_usuario'] === true)){ ?>
                                        <li><?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
                                    <?php } ?>
                                <?php } ?>
                                <!--Fin de ¿QUé hace esto?-->
                             </ul>
                        </div>
                    </li>
                    <?php } ?>
                    <!--FIN USUARIOS-->

                    <li class="child-menu"><?= $this->Html->link(__('Nuestra empresa'), ['controller' => 'Pages', 'action' => 'nuestra_empresa']) ?></li>

                    <li class="child-menu"><?= $this->Html->link(__('Contacto'), ['controller' => 'Pages', 'action' => 'contacto']) ?></li>
                    
                    <!--LOGOUT-->
                    <?php if (isset($auth['User']['role_id']) )
                    { ?>

                    <li class="child-menu"><?= $this->Html->link(__('Ayuda'), ['controller' => 'Users', 'action' => 'ayuda']) ?></li>
                        
                    <li class="child-menu"><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?></li>

                    <?php } ?>
                </ul>
                <!-- end menu -->
            </nav><!-- end nav-menu -->
        </div><!-- end vertical-header-wrapper -->
    </header><!-- end header -->
</div>