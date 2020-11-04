<?php
$this->assign('title', 'Home');
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

<legend>IRMIN</legend>

<div class="row justify-content-center">
    <div class="row col-sm-10">
        <div class="col-sm-4 mb-5 mr-2">
            <legend>Acciones rápidas</legend>
            <div class="botonera">
                <button onclick="window.location.href = '../pedidos/add';" class="btn btn-primary mt-4 rapido">Nuevo pedido</button>
            </div>
            <div class="botonera">
                <button onclick="window.location.href = '../clientes/add';" class="btn btn-primary mt-4 rapido">Nuevo cliente</button>
            </div>
            <div class="botonera">
                <button onclick="window.location.href = '../images';" class="btn btn-primary mt-4 rapido">Descargar imágenes </button>
            </div>
        </div>
        <div class="col-sm-4 float-right">
            <!-- tutiempo.net - Ancho:300px - Alto:411px -->
            <iframe src="https://www.tutiempo.net/s-widget/app/?LocId=43286&sc=1" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:411px;" allowtransparency="true"></iframe>
        </div>
    </div>
</div>

