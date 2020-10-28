<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Informe[]|\Cake\Collection\CollectionInterface $informes
 */
$this->assign('title', 'Informes');

?>

<div class="large-9 medium-8 columns content">
    <legend>Informes</legend>
    <?= $this->Form->create('Informes', ['type' => 'get']); ?>
        <div class="form-group row">
            <div class="col-sm-3">
                <?= $this->Form->control('start_date',[
                    'label' => false,
                    'placeholder' => 'Fecha desde',
                    'class' => 'form-control mt-2', 
                    'data-toggle' => 'datepicker',
                    'value' => $this->request->query('start_date'), 
                    'autocomplete' => 'off'
                    ]); 
                ?>
            </div>
            <div class="col-sm-3 mb-2">
                <?= $this->Form->control('end_date',[
                    'label' => false,
                    'placeholder' => 'Fecha hasta',
                    'class' => 'form-control mt-2', 
                    //'type'  => 'text',
                    'data-toggle' => 'datepicker',
                    'value' => $this->request->query('end_date'), 
                    'autocomplete' => 'off'
                    ]); 
                ?>
            </div>
            <div class="col-sm-3">
                
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
        <?php if (!$informes->isEmpty()) { ?>

            <table class="table table-hover">   
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Descripción</th>
                        <th scope="col" class="actions">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($informes as $informe): ?>
                    <tr>
                        <td><?= $this->Number->format($informe->id) ?></td>
                        <td><?= h($informe->fecha_hora_informe) ?></td>
                        <td><?= h($informe->descripcion) ?></td>
                        <td class="actions">
                            <?php if (isset($auth['User']['role_id']) && $auth['User']['role']['ver_pedidos'] === true) { 
                                    echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-eye', 'title' => 'Ver informe')),
                                    array('action' => 'view', $informe->id),
                                    array('escape'=>false)
                                    );
                            } ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>

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

            echo '<p>¡No existen registros para el periodo solicitado!</p>';
        }?>
    </div>

</div>
<?= $this->Html->script('filtrar-informe.js') ?>
