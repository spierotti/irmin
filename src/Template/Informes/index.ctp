<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Informe[]|\Cake\Collection\CollectionInterface $informes
 */
$this->assign('title', 'Informes');
?>

<div class="row justify-content-center">
    <div class="col-sm-10">
        <legend>Informes</legend>
        <?= $this->Form->create('Informes', ['type' => 'get', 'name'=>'buscarInforme'] ); ?>
            <div class="form-group row">
                <label for="informe" id="informe" class="col-form-label mt-2 ml-3">Fecha Desde</label>
                <div class="col-sm-2">
                    <?= $this->Form->control('start_date',[
                        'label' => false,
                        'placeholder' => 'Fecha desde',
                        'class' => 'form-control mt-2 calendario', 
                        'readonly' => 'readonly',
                        'data-toggle' => 'datepicker',
                        'value' => $start_date, 
                        'autocomplete' => 'off',
                        'id' => 'fecha_inicio'
                        ]); 
                    ?>
                </div>
                <label for="informe" id="informe" class="col-form-label mt-2 ml-3">Fecha Hasta</label>
                <div class="col-sm-2 mb-2">
                    <?= $this->Form->control('end_date',[
                        'label' => false,
                        'placeholder' => 'Fecha hasta',
                        'class' => 'form-control mt-2 calendario', 
                        'readonly' => 'readonly',
                        'data-toggle' => 'datepicker',
                        'value' => $end_date, 
                        'autocomplete' => 'off',
                        'id' => 'fecha_fin'
                        ]); 
                    ?>
                </div>
                <div class="col-sm-3">
                    
                <?= $this->Form->submit('Buscar', [
                        'class' => 'btn btn-primary',
                        'onclick'=>'validarFechas()'
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
                                        array('controller' => 'Informes', 'action' => 'view', $informe->id),
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

            <?php }else{ ?>

                <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    <strong> No se encontraron informes para mostrar en el periodo seleccionado.</strong>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?= $this->Html->script('filtrar-informe.js') ?>
<?= $this->Html->script('validador-fechas.js') ?>


