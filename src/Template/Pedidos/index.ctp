<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido[]|\Cake\Collection\CollectionInterface $pedidos
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in', ['viewName'=>'Pedidos']); ?>

<div class="pedidos index large-9 medium-8 columns content">
    <h3><?= __('Pedidos') ?></h3>
    <?php if (isset($auth['User']['role_id']) && $auth['User']['role_id'] != 4){ ?>    
        <?= $this->Form->control('buscar', ['label' => false, 'placeholder' => 'Buscar por Cliente', 'autocompelte' => false, 'id' => 'buscar']); ?>
    <?php } ?>
    <?= $this->Form->radio('estado',['Nuevo ', 'En Evaluacion ', 'Evaluado ', 'Cancelado ', 'Todos'],['id' => 'estado', 'value' => 0, 'hiddenField' => false]); ?>
    <div class = "table-content">
        <table cellpadding="0" cellspacing="0" class="table">
            <div class="row col-sm-18"> <!--Titulos-->
                <div class="col-sm border">
                    <?= $this->Paginator->sort('ID'); ?><!--¿Necesario mostrar este ID?-->
                </div>
                <div class="col-sm border">
                    Cliente
                </div>
                <div class="col-sm border">
                    Experto
                </div>
                <div class="col-sm border">
                    Fecha solicitud
                </div>
                <div class="col-sm border">
                    Estado
                </div>
                <div class="col-sm border">
                    Descripción
                </div>
                <div class="col-sm border">
                    Acciones
                </div>
            </div>

            <tbody>
                <?php foreach ($pedidos as $pedido): ?>
                <div class="row">
                    <div class="col-sm border"><?= $this->Number->format($pedido->id) ?></div>
                    <div class="col-sm border">
                        <?= ($pedido->has('cliente') and !is_null($pedido->cliente)) ? $this->Html->link($pedido->cliente->name, ['controller' => 'Clientes', 'action' => 'view', $pedido->cliente->id]) : '-' ?>
                    </div>
                    <div class="col-sm border">
                        <?//= $pedido->has('user') ? $this->Html->link($pedido->user->id, ['controller' => 'Users', 'action' => 'view', $pedido->user->id]) : '' ?>
                        <?= ($pedido->has('user') and !is_null($pedido->user)) ? $this->Html->link($pedido->user->username, ['controller' => 'Users', 'action' => 'view', $pedido->user->id]) : '-' ?></td>
                    </div>
                    <div class="col-sm border"><?= h($pedido->fecha_solicitud) ?></div>
                    <div class="col-sm border">
                        <?//= $pedido->has('estado') ? $this->Html->link($pedido->estado->id, ['controller' => 'Estados', 'action' => 'view', $pedido->estado->id]) : '' ?>
                        <?= ($pedido->has('estado') and !is_null($pedido->estado)) ? $pedido->estado->descripcion : '-' ?>
                    </div>
                    <div class="col-sm border"><?= h($pedido->descripcion) ?></div>
                    <div class="col-sm border">
                        <!--<td class="actions">-->
                        <?//= $this->Html->link(__('View'), ['action' => 'view', $pedido->id]) ?>
                        <?//= $this->Html->link(__('Edit'), ['action' => 'edit', $pedido->id]) ?>
                        <?//= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pedido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedido->id)]) ?>
                        <?php if (isset($auth['User']['role_id']) && $auth['User']['role']['ver_pedidos'] === true)
                        { ?>    
                            <?//= $this->Html->link(__('Ver'), ['action' => 'view', $pedido->id]) ?>
                            <?php
                                echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-eye', 'title' => 'Ver pedido')),
                                array('action' => 'view', $pedido->id),
                                array('escape'=>false)
                                );
                            ?>
                        <?php } ?>    
                        <?php if (isset($auth['User']['role_id']) && $auth['User']['role']['evaluar_pedido'] === true && ($pedido->estado_id == 1 || ($pedido->estado_id == 2 && $pedido->experto_id === $auth['User']['id'])))
                        { ?>    
                            <?//= $this->Html->link(__('Evaluar'), ['action' => 'evaluar', $pedido->id]) ?>
                            <?php
                                echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-check-square', 'title' => 'Evaluar pedido')),
                                array('action' => 'evaluar', $pedido->id),
                                array('escape'=>false)
                                );
                            ?>
                        <?php } ?>
                        <?php if (isset($auth['User']['role_id']) && $auth['User']['role']['modificar_pedido'] === true && ($pedido->estado_id == 1))
                        { ?>    
                            <?//= $this->Html->link(__('Editar'), ['action' => 'edit', $pedido->id]) ?>
                            <?php
                                echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-pencil', 'title' => 'Modificar pedido')),
                                array('action' => 'edit', $pedido->id),
                                array('escape'=>false)
                                );
                            ?>
                        <?php } ?>
                        <?php if (isset($auth['User']['role_id']) && $auth['User']['role']['eliminar_pedido'] === true && ($pedido->estado_id < 3) && (is_null($pedido->experto_id) || ($pedido->experto_id === $auth['User']['id'])))
                        { ?>    
                            <?//= $this->Html->link(__('Cancelar'), ['action' => 'delete', $pedido->id]) ?>
                            <?php
                                echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Eliminar pedido')),
                                array('action' => 'delete', $pedido->id),
                                array('escape'=>false)
                                );
                            ?>
                        <?php } ?>
                        <!--</td>-->
                    </div>
                </div>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Anterior</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Siguiente</a>
            </li>
        </ul>
    </nav>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
    
    
</div>
<?= $this->Html->script('filtrar-pedido.js') ?>
