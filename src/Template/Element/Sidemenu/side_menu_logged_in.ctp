<header class="vertical-header">
    <div class="vertical-header-wrapper">
        <nav class="nav-menu">
            <div class="logo">
                <!--<a href="index.html"><img src="images/logo.png" alt=""></a>-->
            </div><!-- end logo -->

            <div class="margin-block"></div>


            <ul class="primary-menu">
                <!--<li class="child-menu"><a href="#">-->
                    <?/*php/* echo $this->Html->link($this->request->session()->read('Auth.User.email'),
                         ['controller' => 'Users', 
                         'action' => 'view', 
                         $auth['User']['id']]); 
                     */?>
                <!--<i class="fa fa-angle-right"></i></a>-->
                <!--</li>-->

                <!--vieja sección Mi cuenta
                <li class="child-menu"><a href="#">Mi cuenta <i class="fa fa-angle-right"></i></a>
                    <div class="sub-menu-wrapper">
                        <ul class="sub-menu center-content">
                            <li><a href="../users/view-perfil">Ver perfil</a></li>
                            <li><a href="../users/edit-perfil">Editar perfil</a></li>
                            <li><a href="../users/change-password">Cambiar contraseña</a></li>
                        </ul>
                    </div>
                </li>
                -->
                <!--Mi cuenta-->
                <?php if (isset($auth['User']['role_id']))
                { ?>
                <li class="child-menu"><a href="#">Mi cuenta <i class="fa fa-angle-right"></i></a>
                    <div class="sub-menu-wrapper">
                        <ul class="sub-menu center-content">
                            <?php if($this->view != 'viewPerfil')
                            { ?>
                                <!--<li><a href="../users/view-perfil">Ver perfil</a></li>-->
                                <li><?= $this->Html->link(__('Ver Perfil'), ['controller' => 'Users', 'action' => 'viewPerfil']) ?></li>
                            <?php 
                            } else
                                { ?>
                                    <!--<li><a href="../users/edit-perfil">Editar perfil</a></li>-->
                                    <li><?= $this->Html->link(__('Editar Perfil'), ['controller' => 'Users', 'action' => 'editPerfil']) ?></li>
                            <?php } ?>
                            <!--<li><a href="../users/change-password">Cambiar contraseña</a></li>-->
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
                            <!--<li><a href="../pedidos">Ver pedidos </a></li>-->
                            <li><?= $this->Html->link(__('Ver pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?> </li>
                        <?php } ?>
                        <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['nuevo_pedido'] === true))
                            { ?>
                            <!--<li><a href="../pedidos/add">Nuevo pedidos </a></li>-->
                            <li><?= $this->Html->link(__('Nuevo pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?> </li>
                        <?php } ?>
                        </ul>
                        <?php if($this->view == 'view' && $this->name == "Pedidos") //¿Qué onda esta parteee??
                        { ?> 
                            <?php if (isset($auth['User']['role_id']) && $auth['User']['role']['evaluar_pedido'] === true && ($pedido->estado_id == 1 || ($pedido->estado_id == 2 && $pedido->experto_id == $auth['User']['id'])))
                            { ?>    
                                <li><?= $this->Html->link(__('Evaluar pedido'), ['action' => 'evaluar', $pedido->id]) ?> </li>
                            <?php } ?>
                            <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['modificar_pedido'] === true) && ($pedido->estado_id == 1))
                            { ?>
                                <!--<li><?//= $this->Html->link(__('Modificar pedidos'), ['action' => 'edit', $pedido->id]) ?> </li>-->
                            <?php } ?>
                            <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['eliminar_pedido'] === true) && ($pedido->estado_id == 1 || ($pedido->estado_id == 2 && $pedido->experto_id === $auth['User']['id'])))
                            { ?>    
                                <!--<li><?//= $this->Form->postLink(__('Cancelar'), ['action' => 'delete', $pedido->id], ['confirm' => __('¿Seguro que desea Cancelar el pedido # {0}?', $pedido->id)]) ?> </li>-->
                            <?php } ?>
                        <?php } ?>
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
                                <!--<li><a href="../clientes">Ver clientes</a></li>-->
                                <li><?= $this->Html->link(__('Ver clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
                            <?php } ?>
                            <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['nuevo_cliente'] === true))
                            { ?>
                                <!--<li><a href="../clientes/add">Nuevo cliente</a></li>-->
                                <li><?= $this->Html->link(__('Nuevo cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
                            <?php } ?>

                            <!--¿Qué hace esta parte-->
                            <?php if($this->view == 'view' && $this->name == "Clientes")
                            { ?>
                                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['modificar_cliente'] === true))
                                { ?>
                                    <li><?= $this->Html->link(__('Modificar'), ['action' => 'edit', $cliente->id]) ?> </li>
                                <?php } ?>
                                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['eliminar_cliente'] === true))
                                { ?>
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
                            <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_imagenes'] === true))
                            { ?>
                                <!--<li><a href="../images">Ver imágenes</a></li>-->
                                <li><?= $this->Html->link(__('Ver imágenes'), ['controller' => 'Images', 'action' => 'index']) ?> </li>
                            <?php } ?>
                            <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['nueva_imagen'] === true))
                            { ?>
                                <!--<li><a href="../images/add">Nueva imagen</a></li>-->
                                <li><?= $this->Html->link(__('Nueva imagen'), ['controller' => 'Images', 'action' => 'add']) ?> </li>
                            <?php } ?>
                            <?php if($this->view == 'view' && $this->name == "Images"){ ?>
                            <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['eliminar_imagen'] === true))
                            { ?> <!--¿Qué onda con esta parte?-->
                                <li><?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $image->id], ['confirm' => __('Are you sure you want to delete # {0}?', $image->id)]) ?> </li>
                                <?php } ?>
                            <?php } ?>
                         </ul>
                    </div>
                </li>
                <!--FIN IMÁGENES-->


                <!-- ROLES -->
                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['ver_roles'] === true || $auth['User']['role']['nueva_rol'] === true || $auth['User']['role']['modificar_rol'] === true || $auth['User']['role']['eliminar_rol'] === true))
                { ?>
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
                                <!--<li><a href="../users">Ver usuarios</a></li>-->
                                <li><?= $this->Html->link(__('Ver usuarios'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
                            <?php } ?>
                            <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['nueva_usuario'] === true))
                            { ?>
                                <!--<li><a href="../users/add">Nuevo usuario</a></li>-->
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


                <div class="margin-block"></div>
<!--
                <li class="child-menu"><a href="#">Administración <i class="fa fa-angle-right"></i></a>
                    <div class="sub-menu-wrapper">
                        <ul class="sub-menu center-content">
                            <li><a href="../roles/add">Nuevo rol</a></li>
                            <li><a href="../roles">Ver roles</a></li>
                            <li><a href="../estados/add">Nuevo estados</a></li>
                            <li><a href="../estados">Ver estado</a></li>
                        </ul>
                    </div>
                </li>
-->
            </ul>
            <ul class="primary-menu">
                <li class="child-menu"><a href="../pages/nuestra_empresa">Nuestra empresa</a></li>
                <li class="child-menu"><a href="../pages/contacto">Contacto </a></li>
                <li class="child-menu"><a href="../pages/ayuda">Ayuda </a></li>
                <div class="margin-block"></div>
                <li class="child-menu"><a href="../users/logout">Logout </a></li>
            </ul>
            <!-- end menu -->
        </nav><!-- end nav-menu -->
    </div><!-- end vertical-header-wrapper -->
</header><!-- end header -->