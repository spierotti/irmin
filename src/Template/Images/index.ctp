<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image[]|\Cake\Collection\CollectionInterface $images
 */
$this->assign('title', 'Imágenes');
?>
<div class="col-sm-12 justify-content-center mt-1">
    <legend>Imágenes</legend>
    <?= $this->Form->create('Images', ['type' => 'get']); ?>
        <div class="form-group row">
            <div class="col-sm-3 mt-1">
                <?= $this->Form->control('start_date',[
                        'label' => false,
                        'placeholder' => 'Fecha desde',
                        'class' => 'form-control mt-2', 
                        'readonly' => 'readonly',
                        'data-toggle' => 'datepicker',
                        'value' => $this->request->query('start_date'), 
                        'autocomplete' => 'off'
                    ]); 
                ?>
            </div>
            <div class="col-sm-3 mt-1">
                <?= $this->Form->control('end_date',[
                        'label' => false,
                        'placeholder' => 'Fecha hasta',
                        'class' => 'form-control mt-2',
                        'readonly' => 'readonly',
                        'data-toggle' => 'datepicker',
                        'value' => $this->request->query('end_date'),
                        'autocomplete' => 'off'
                    ]);
                ?>
            </div>
            <div class="col-sm-3 mt-2 ml-2">
                <?= $this->Form->submit('Buscar', [
                        'class' => 'btn btn-primary'
                    ]) ?>
            </div>
        </div>
    <?= $this->Form->end(); ?>

    <div class="table-content" id="contenedor-tabla">

        <?php
            $this->Paginator->templates([
            'first' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'current' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'last' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            ]);
        ?>

        <?php if (!$images->isEmpty()){ ?>
            <div class="col-sm-12">
                <div class="row card-columns">
                    <?php foreach ($images as $image): ?>
                        <div class="card col-sm-3">
                            <?=$this->Html->link(
                                    $this->Html->image('../files/images/photo/' . $image->get('photo_dir') . '/' . $image->get('photo'),['class'=>'card-img-top mt-2']), 
                                    array('controller' => 'Images', 'action' => 'view', $image->id),
                                    array('escape' => false)
                                );
                            ?>
                            <div class="card-body">
                                <h6 class="card-title" title="Número de imagen"><?= h($image->fecha_hora_imagen) ?><h6>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <?= $this->Paginator->first('<<') ?> 
                    <?= $this->Paginator->prev('<') ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next('>') ?>
                    <?= $this->Paginator->last('>>') ?>
                </ul>
            </nav>
        <?php }else{
            echo '<div class="row ml-5"><p>¡No existen imágenes para el periodo solicitado!</p></div>';
        }?>
    </div>
</div>
<?= $this->Html->script('filtrar-imagen.js') ?>