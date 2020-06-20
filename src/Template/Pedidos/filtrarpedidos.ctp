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

<table class="table table-hover" id="tabla">
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
                <td><?= ($pedido->has('user') and !is_null($pedido->user)) ? $this->Html->link($pedido->user->username, ['controller' => 'Users', 'action' => 'view', $pedido->user->id]) : '-' ?></td></td>
                <td><?= h($pedido->fecha_solicitud) ?></td>
                <td><?= ($pedido->has('estado') and !is_null($pedido->estado)) ? $pedido->estado->descripcion : '-' ?></td>
                <td><?= h($pedido->descripcion) ?></div></td>
                <td>
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
                                echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-check-square', 'title' => 'Evaluar pedido')),
                                array('action' => 'evaluar', $pedido->id),
                                array('escape'=>false)
                                );
                            ?>
                        <?php } ?>
                        <?php if (isset($auth['User']['role_id']) && $auth['User']['role']['eliminar_pedido'] === true && ($pedido->estado_id < 3) && (is_null($pedido->experto_id) || ($pedido->experto_id === $auth['User']['id'])))
                        { ?>    
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

<nav aria-label="Page navigation ">
    <ul class="pagination justify-content-center">
        <?= $this->Paginator->first('<<') ?> 
        <?= $this->Paginator->prev('<') ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next('>') ?>
        <?= $this->Paginator->last('>>') ?>
    </ul>
</nav>
