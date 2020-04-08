<table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('Nombre') ?></th>
            <th scope="col"><?= $this->Paginator->sort('cuit / DNI') ?></th>
            <th scope="col"><?= $this->Paginator->sort('email') ?></th>
            <th scope="col"><?= $this->Paginator->sort('telefono') ?></th>
            <th scope="col"><?= $this->Paginator->sort('celular') ?></th>
            <th scope="col"><?= $this->Paginator->sort('domicilio') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clientes as $cliente): ?>
        <tr>
            <td><?= $this->Number->format($cliente->id) ?></td>
            <td><?= h($cliente->name) ?></td>
            <td><?= h($cliente->cuit) ?></td>
            <td><?= h($cliente->email) ?></td>
            <td><?= h($cliente->telefono) ?></td>
            <td><?= h($cliente->celular) ?></td>
            <td><?= h($cliente->domicilio) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $cliente->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cliente->id]) ?>
                        <?php if($cliente->borrado == true){ ?>
                            <?= $this->Form->postLink(__('Activar'), ['action' => 'activar', $cliente->id], ['confirm' => __('Are you sure you want to activate # {0}?', $cliente->id)]) ?>
                        <?php } else {?>
                            <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $cliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id)]) ?>
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