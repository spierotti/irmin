<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
$this->assign('title', 'Anular pedido');
use Cake\Routing\Router;
?>
<legend>Anular Pedido</legend>
<div class="col-sm-12">
    <table class="table table-responsive-sm table-hover col-sm-12">
        <tr>
            <th scope="row">Nro Pedido</th>
            <td><?= $pedido->id ?></td>
        </tr>
        <tr>
            <th scope="row">Cliente</th>
            <td><u class="cliente"><?= ($pedido->has('cliente') and !is_null($pedido->cliente)) ? $this->Html->link($pedido->cliente->name, ['controller' => 'Clientes', 'action' => 'view', $pedido->cliente->id], ['class'=>'cliente']) : '-' ?></u></td>
        </tr>
        <tr>
            <th scope="row">Descripcion</th>
            <td><?= h($pedido->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row">Fecha Inicio</th>
            <td><?= h($pedido->fecha_inicio) ?></td>
        </tr>
        <tr>
            <th scope="row">Fecha Fin</th>
            <td><?= h($pedido->fecha_fin) ?></td>
        </tr>
    </table>

    <div class="col-sm-12">
        <legend> Imágenes relacionadas al pedido </legend>
        <div class="row card-columns">
            <?php if (!empty($pedido->images)){ ?>
                <?php foreach ($pedido->images as $images): ?>
                    <div class="card col-sm-3">
                    <?=$this->Html->link(
                        $this->Html->image('../files/images/photo/' . $images->photo_dir . '/' . $images->photo, ['class'=>'card-img-top mt-1']),
                        array('controller' => 'Images', 'action' => 'view', $images->id),
                        array('escape' => false)
                        );                        
                    ?>
                        <div class="card-body">
                            <h6 class="card-title"><?= h($images->created) ?></h5>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php }else{
                echo '<p>¡No existen imágenes para el periodo solicitado!</p>';
            }?>
        </div>
    </div>
    
    <?= $this->Form->create($pedido,['class'=>'col-sm-11 mr-4']) ?>
        <div class="col-sm-12">
            <div class="form-group row">
                <div class="col-sm-10 mr-3">
                    <?php 
                        echo $this->Form->control('motivo_cancelacion',[
                            'type' => 'textarea',
                            'class'=>'form-control mt-2',
                            'style' => 'width: -moz-available;',
                            'label' => false,
                            'placeholder' => 'Indique el motivo de anulación del pedido.'
                    ]); ?>
                </div>
                <div class="form-group col-sm-10 row ml-4">
                    <div class="col-sm-7">
                        <?= $this->Form->submit('Anular pedido', [
                            'class' => 'btn btn-primary mt-4 ml-3'
                        ]) ?>
                    </div>
                    <div class="col-sm-2 ml-3 mt-2">
                        <button type="button" onclick="window.location.href = '<?php echo Router::url(array('controller'=>'Pedidos', 'action'=>'index'))?>'" class="btn btn-primary mt-3 ml-3">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    <?= $this->Form->end() ?>
</div>


