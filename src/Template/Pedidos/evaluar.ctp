<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
$this->assign('title', 'Evaluar pedido');
?>

<legend>Evaluar Pedido</legend>
<div class="col-sm-12">
    <table class="table table-responsive-sm table-hover">
        <tbody>
            <tr>
                <th scope="row">Nro. de Pedido</th>
                <td><?= $pedido->id ?></td>
            </tr>
            <tr>
                <th scope="row">Cliente</th>
                <td><?= ($pedido->has('cliente') and !is_null($pedido->cliente)) ? $this->Html->link($pedido->cliente->name, ['controller' => 'Clientes', 'action' => 'view', $pedido->cliente->id]) : '-' ?></td>
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
        </tbody>
    </table>

    <?= $this->Form->create($pedido,['class'=>'col-sm-12']) ?>
        <div class="col-sm-12">
            <div class="form-group row">
                <div class="col-sm-10">
                    <?php 
                        echo $this->Form->control('conclusion',[
                            'type' => 'textarea',
                            'class'=>'form-control mt-2',
                            'style' => 'width: -moz-available;',
                            'label' => false,
                            'placeholder' => 'Escriba la conclusión en este recuadro.'
                    ]); ?>
                </div>
                <div class="col-sm-4">
                    <?= $this->Form->submit('Finalizar', [
                        'class' => 'btn btn-primary mt-3 ml-3'
                    ]) ?>
                </div>
                <div class="col-sm-2">
                    <?=
                        $this->Form->button('Cancelar', 
                        array('type' => 'button',
                        'class' => 'btn btn-primary mt-3 ml-3',
                        'onclick' => 'location.href=\'../\'')
                    ); ?>
                </div>
            </div>
        </div>
    <?= $this->Form->end() ?>
        
    <div class="col-sm-12 ml-5">
        <legend> Imágenes relacionadas al pedido </legend>
        <div class="row card-columns">
            <?php if (!empty($pedido->images)){ ?>
                <?php foreach ($pedido->images as $images): ?>
                    <div class="card col-sm-3">
                        <?= $this->Html->link(
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
                echo '<p>No existen imágenes para el periodo solicitado.</p>';
            }?>
        </div>
    </div>
</div>
    

