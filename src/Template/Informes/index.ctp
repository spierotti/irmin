<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Informe[]|\Cake\Collection\CollectionInterface $informes
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in'); ?>

<div class="large-9 medium-8 columns content">
    <legend>Informes </legend>
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
        
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('fecha_hora_informe') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($informes as $informe): ?>
                <tr>
                    <td><?= $this->Number->format($informe->id) ?></td>
                    <td><?= h($informe->fecha_hora_informe) ?></td>
                    <td><?= h($informe->descripcion) ?></td>
                    <td class="actions">
                        <?php
                            echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-eye', 'title' => 'Ver pedido')),
                            array('action' => 'view', $informe->id),
                            array('escape'=>false)
                            );
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
