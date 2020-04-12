<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente[]|\Cake\Collection\CollectionInterface $clientes
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in', ['viewName'=>'Cliente']); ?>

<div class="clientes index large-9 medium-8 columns content">
    <h3><?= __('Clientes') ?></h3>
    <div class="col-sm-4">
    <?= $this->Form->control('Buscar', ['label' => false, 'placeholder' => 'Buscar Cliente', 'autocompelte' => false, 'id' => 'buscar','class'=>'form-control']); ?>
    </div>
    <div class="col-sm-2">
        Solo activos
    </div>
    <div class="col-sm-1">
        <?= $this->Form->control('Solo Activos', ['label'=> false, 'type' => 'checkbox', 'checked' => true, 'id' => 'activo','class'=>'form-control']); ?>
    </div>
</div>

<div class="clientes index large-9 medium-8 columns content col-lg-12">
    <h3><?= __('Clientes') ?></h3>
        <table>
            <div class="row col-sm-18">
                <div class="col-sm-1 border">
                    <?= $this->Paginator->sort('ID'); ?>
                </div>
                <div class="col-sm-2 border">
                    Nombre
                </div>
                <div class="col-sm-1 border">
                    CUIT/DNI
                </div>
                <div class="col-sm-3 border">
                    E-mail
                </div>
                <div class="col-sm-2 border">
                    Celular
                </div>
                <div class="col-sm-2 border">
                    Domicilio
                </div>
                <div class="col-sm-1 border">
                    Acciones
                </div>
            </div>
            <?php foreach ($clientes as $cliente): ?>
                <div class="row">
                    <div class="col-sm-1 border"><?= $this->Number->format($cliente->id) ?></div>
                    <div class="col-sm-2 border"><?= h($cliente->name) ?></div>
                    <div class="col-sm-1 border"><?= h($cliente->cuit) ?></div>
                    <div class="col-sm-3 border"><?= h($cliente->email) ?></div>
                    <div class="col-sm-2 border"><?= h($cliente->celular) ?></div>
                    <div class="col-sm-2 border"><?= h($cliente->domicilio) ?></div>
                    <div class="col-sm-1 border">
                        <?//= $this->Html->link(__('View'),[ 'action' => 'view', $cliente->id]) ?>
                        <a href="../clientes/view/<?= $cliente->id?>"><i class="fa fa-user" title="Ver cliente"></i></a>                        
                        <?//= $this->Html->link(__('Edit'), ['action' => 'edit', $cliente->id]) ?>
                        <a href="../clientes/edit/<?= $cliente->id?>"><i class="fa fa-pencil" title="Editar cliente"></i></a>
                        <?//= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $cliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id)]) ?>
                        <!--<i class="fa fa-pencil"></i>
                        <a href="../clientes/delete/<?= $cliente->id?>"><i class="fa fa-trash" title="Borrar cliente"></i></a>-->
                        <?/*php
                         echo $this->Form->postLink(
                            'Delete',
                            array('controller'=>'clientes',
                            'class'=>'fa fa-trash',
                            'action' => 'delete',$cliente['id']),
                            array('confirm' => 'Are you sure?')); */
                        ?> 
                        
                        <?php
                        echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash')),
                            array('action' => 'delete', $cliente['id']),
                            array('escape'=>false),
                            array('confirm' => '¿Seguro quiere borrar el cliente # {0}?', $cliente->id)
                                //array('confirm' => 'Are you sure?'),
                                //array(['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id)])
                                //array('confirm' => 'Are you sure?'),
                            //__('Are you sure you want to delete # %s?', $cliente['id'])
                           //array('class' => 'btn btn-mini')
                           );
                        ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </table>
        <br>
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>


    <div class="paginator">
        <ul class="pagination">
            <?/*= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) */?></p>
    </div>
</div>


<?= $this->Html->script('filtrar-cliente.js') ?>
