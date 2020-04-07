
<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?//= __('MENU') ?></li>
        <li><?//= $this->Html->link(__('Recuperar Contraseña'), ['action' => 'forgotPassword']) ?></li>
        <li><?//= $this->Html->link(__('Nuestra Empresa'), ['controller' => 'Pages', 'action' => 'display', 'nuestra_empresa']) ?></li>
        <li><?//= $this->Html->link(__('Contacto'), ['controller' => 'Pages', 'action' => 'display', 'contacto']) ?></li>
        <li><?//= $this->Html->link(__('Ayuda'), ['controller' => 'Pages', 'action' => 'display', 'ayuda']) ?></li>
    </ul>
</nav>
-->

<div class="menu-wrapper">
    <header class="vertical-header">
        <div class="vertical-header-wrapper">
            <nav class="nav-menu">
                <div class="logo">
                    <!--<a href="index.html"><img src="images/logo.png" alt=""></a>-->
                </div><!-- end logo -->
                <div class="margin-block"></div>
	                <ul class="primary-menu">
						<li class="child-menu"><a href="#">Home </a></li>
					    <li class="child-menu"><?= $this->Html->link(__('Recuperar Contraseña'), ['action' => 'forgotPassword']) ?></li>
					    <li class="child-menu"><?= $this->Html->link(__('Nuestra Empresa'), ['controller' => 'Pages', 'action' => 'display', 'nuestra_empresa']) ?></li>
					    <li class="child-menu"><?= $this->Html->link(__('Contacto'), ['controller' => 'Pages', 'action' => 'display', 'contacto']) ?></li>
					    <li class="child-menu"><?= $this->Html->link(__('Ayuda'), ['controller' => 'Pages', 'action' => 'display', 'ayuda']) ?></li>
	                </ul>
                <div class="margin-block"></div>
                <!-- end menu -->
            </nav><!-- end nav-menu -->
        </div><!-- end vertical-header-wrapper -->
    </header><!-- end header -->
</div> <!--end div menu-wrapper-->