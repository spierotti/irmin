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
        <table cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('cliente_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('experto_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('fecha_solicitud') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('estado_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pedidos as $pedido): ?>
                <tr>
                    <td><?= $this->Number->format($pedido->id) ?></td>
                    <td><?= ($pedido->has('cliente') and !is_null($pedido->cliente)) ? $this->Html->link($pedido->cliente->name, ['controller' => 'Clientes', 'action' => 'view', $pedido->cliente->id]) : '-' ?></td>
                    <td><?= ($pedido->has('user') and !is_null($pedido->user)) ? $this->Html->link($pedido->user->username, ['controller' => 'Users', 'action' => 'view', $pedido->user->id]) : '-' ?></td>
                    <td><?= $pedido->fecha_solicitud ?></td>
                    <td><?= ($pedido->has('estado') and !is_null($pedido->estado)) ? $pedido->estado->descripcion : '-' ?></td>
                    <td><?= $pedido->descripcion ?></td>
                    <td class="actions">
                        <?php if (isset($auth['User']['role_id']) && $auth['User']['role']['ver_pedidos'] === true){ ?>    
                            <?= $this->Html->link(__('Ver'), ['action' => 'view', $pedido->id]) ?>
                        <?php } ?>    
                        <?php if (isset($auth['User']['role_id']) && $auth['User']['role']['evaluar_pedido'] === true && ($pedido->estado_id == 1 || ($pedido->estado_id == 2 && $pedido->experto_id === $auth['User']['id']))){ ?>    
                            <?= $this->Html->link(__('Evaluar'), ['action' => 'evaluar', $pedido->id]) ?>
                        <?php } ?>
                        <?php if (isset($auth['User']['role_id']) && $auth['User']['role']['eliminar_pedido'] === true && ($pedido->estado_id < 3) && (is_null($pedido->experto_id) || ($pedido->experto_id === $auth['User']['id']))){ ?>    
                            <?= $this->Html->link(__('Cancelar'), ['action' => 'delete', $pedido->id]) ?>
                        <?php } ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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
</div>
<?= $this->Html->script('filtrar-pedido.js') ?>
