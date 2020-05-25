<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido[]|\Cake\Collection\CollectionInterface $pedidos
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in', ['viewName'=>'Pedidos']); ?>

<div class="pedidos index large-9 medium-8 columns content">
    <h3><?= __('Pedidos') ?></h3>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col"><?= $this->Paginator->sort('ID'); ?></th>
          <th scope="col">Cliente</th>
          <th scope="col">Experto</th>
          <th scope="col">Fecha de solicitud</th>
          <th scope="col">Estado</th>
          <th scope="col">Descripción</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($pedidos as $pedido): ?>
        <tr>
          <th scope="row"><?= $this->Number->format($pedido->id) ?></th>
          <td><?= ($pedido->has('cliente') and !is_null($pedido->cliente)) ? $this->Html->link($pedido->cliente->name, ['controller' => 'Clientes', 'action' => 'view', $pedido->cliente->id]) : '-' ?></td>
          <td><?= ($pedido->has('user') and !is_null($pedido->user)) ? $this->Html->link($pedido->user->username, ['controller' => 'Users', 'action' => 'view', $pedido->user->id]) : '-' ?></td></td>
          <td><?= h($pedido->fecha_solicitud) ?></td>
          <td><?= ($pedido->has('estado') and !is_null($pedido->estado)) ? $pedido->estado->descripcion : '-' ?></td>
          <td><?= h($pedido->descripcion) ?></div></td>
          <td>
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
            </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

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
