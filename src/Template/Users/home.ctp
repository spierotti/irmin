<?php
$this->assign('title', 'Home');
use Cake\Routing\Router;
?>

<style>
    .buttons {
        width: 100%;
        table-layout: fixed;
    }

    .buttons button {
        width: 100%;
    }
</style>

<div class="row justify-content-center">
    <div class="row col-sm-10 ml-2">
        <div class="col-sm-7 mb-5 mr-2">
            <div class="col-sm-10 mb-5 mr-2">
            <?php echo $this->Html->image('irmin-logo-nombre-chico.jpg',['width'=>'200', 'height'=>'150'])?>

                <?php if (isset($auth['User']['role_id']) && (($auth['User']['role']['nuevo_pedido'] === true)) || ($auth['User']['role']['nuevo_cliente'] === true) || ($auth['User']['role']['nueva_imagen'] === true)){?>

                    <legend>Acciones rápidas</legend>

                    <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['nuevo_pedido'] === true)) {?>
                        <div class="botonera">
                            <button onclick="window.location.href = '<?php echo Router::url(array('controller'=>'Pedidos', 'action'=>'add'))?>'" class="btn btn-primary mt-4 rapido">Nuevo pedido</button>
                        </div>
                    <?php } ?>
                    <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['nuevo_cliente'] === true)) {?>
                        <div class="botonera">
                            <button onclick="window.location.href = '<?php echo Router::url(array('controller'=>'Clientes', 'action'=>'add'))?>'" class="btn btn-primary mt-4 rapido">Nuevo cliente</button>
                        </div>
                    <?php } ?>
                    <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['nueva_imagen'] === true)) { ?>
                        <div class="botonera">
                            <button onclick="window.location.href = '<?php echo Router::url(array('controller'=>'Images', 'action'=>'add'))?>'" class="btn btn-primary mt-4 rapido">Descargar imágenes </button>
                        </div>
                    <?php } ?>


                <?php } ?>
                
                <?php if (isset($auth['User']['role_id']) && ($auth['User']['role']['id'] === 4)) { ?>
                    
                    <legend>Acciones rápidas</legend>

                    <div class="botonera">
                        <button onclick="window.location.href = '<?php echo Router::url(array('controller'=>'Pedidos', 'action'=>'index'))?>'" class="btn btn-primary mt-4 rapido">Ver pedidos </button>
                    </div>
                    <div class="botonera">
                        <button onclick="window.location.href = '<?php echo Router::url(array('controller'=>'Pedidos', 'action'=>'buscarpedido'))?>'" class="btn btn-primary mt-4 rapido">Buscar pedido </button>
                    </div>
                    <div class="botonera">
                        <button onclick="window.location.href = '<?php echo Router::url(array('controller'=>'Informes', 'action'=>'index'))?>'" class="btn btn-primary mt-4 rapido">Ver informes </button>
                    </div>
                <?php } ?>
                
            </div>
        </div>
        <div class="col-sm-4 ml-4">
            <!-- tutiempo.net - Ancho:300px - Alto:411px -->
            <iframe src="https://www.tutiempo.net/s-widget/app/?LocId=43286&sc=1" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:411px;" allowtransparency="true"></iframe>
        </div>
    </div>
</div>

