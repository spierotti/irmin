<?php
$this->assign('title', 'Quiénes somos');
?>
<div class="col-sm-12">
    <div class="col-sm-4">
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-10 ml-2">
            <h1>Quiénes somos</H1>
            <div class="justificado">
                <br>
                Somos un grupo de 3 estudiantes de la Universidad Tecnológica Nacional, Facultad Regional Rosario que hemos ido desarrollando este sitio web a lo largo de varios años no solo por el cumplimiento académico, sino también con el objetivo de encontrar la forma más eficiente de determinar las condiciones predisponentes para una posible caída de granizo mediante el análisis de imágenes satelitales del Servicio Meteorológico Nacional Argentino. 
                <br>
                <br>
                Dicho análisis lo hemos realizado en conjunto con la Facultad de Ciencias Agrarias - UNR, los cuales nos aportaron y enriquecieron con todo el conocimiento meteorológico necesario y serán ellos quienes harán uso del sistema de forma periódica.
                <br>
                <br>
                Para la realización del mismo, durante todo el proceso hemos sido guiados por el Docente Mario Bressano y hemos implementado los más recientes frameworks de desarrollo los cuales nos ayudaron a generar un sistema lo más óptimo, amigable y  fluido posible.
                <br>
            </div>
            <div class="col-sm-12 justify-content-center">
                <div class="row card-columns mt-5 ml-5">
                    <div class="card col-sm-3">
                        <?php echo $this->Html->image('nico.jpg',['width'=>'100%', 'class'=>'mt-3'])?>
                        <div class="card-body">
                            <h6 class="card-title"><b>Nicolás Donnelly</b><h6>
                            <p class="card-text centro">
                                Full stack developer
                            </p>
                        </div>
                    </div>
                    <div class="card col-sm-3">
                        <?php echo $this->Html->image('santi.jpg',['width'=>'100%', 'class'=>'mt-3'])?>
                        <div class="card-body">
                            <h6 class="card-title"><b>Santiago Pierotti</b><h6>
                            <p class="card-text centro">
                                Full stack developer
                            </p>
                        </div>
                    </div>
                    <div class="card col-sm-3">
                        <?php echo $this->Html->image('fabri.jpg',['width'=>'100%', 'class'=>'mt-3'])?>
                        <div class="card-body">
                            <h6 class="card-title"><b>Fabricio Viana</b><h6>
                            <p class="card-text centro">
                                Full stack developer
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

