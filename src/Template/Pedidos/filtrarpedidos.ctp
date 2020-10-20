
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

<?php if (!$pedidos->isEmpty()) { ?>

    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Id</th>
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
                <td><?= ($pedido->has('user') and !is_null($pedido->user)) ? $this->Html->link($pedido->user->username, ['controller' => 'Users', 'action' => 'view', $pedido->user->id]) : '-' ?></td>
                <td><?= $pedido->fecha_solicitud ?></td>
                <td><?= ($pedido->has('estado') and !is_null($pedido->estado)) ? $pedido->estado->descripcion : '-' ?></td>
                <td><?= $pedido->descripcion ?></td>
                <td class="actions">
                    <?php if (isset($auth['User']['role_id']) && $auth['User']['role']['ver_pedidos'] === true)
                        { ?>    
                            <?php
                                echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-eye', 'title' => 'Ver pedido')),
                                array('action' => 'view', $pedido->id),
                                array('escape'=>false)
                                );
                            ?>
                        <?php } ?>    
                        <?php if (isset($auth['User']['role_id']) && $auth['User']['role']['evaluar_pedido'] === true && ($pedido->estado_id == 1 || ($pedido->estado_id == 2 && $pedido->experto_id === $auth['User']['id'])))
                        { ?>    
                            <?php
                                echo $this->Html->link(
                                    '', 
                                    array('controller' => 'Pedidos', 'action' => 'evaluar', $pedido->id), 
                                    array('class' => 'fa fa-check-square', 'title' => 'Evaluar pedido')
                                );
                            ?>
                        <?php } ?>
                        <?php if (isset($auth['User']['role_id']) && $auth['User']['role']['eliminar_pedido'] === true && ($pedido->estado_id < 3) && (is_null($pedido->experto_id) || ($pedido->experto_id === $auth['User']['id'])))
                            { ?>    
                            <?php
                                echo $this->Html->link('', 
                                    array('controller' => 'Pedidos', 'action' => 'delete', $pedido->id), 
                                    array('class' => 'fa fa-trash', 'title' => 'Cancelar pedido')
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