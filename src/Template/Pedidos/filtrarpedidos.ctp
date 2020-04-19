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