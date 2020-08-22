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
          <th scope="col">Id</th>
          <th scope="col">Nombre</th>
          <th scope="col">DNI</th>
          <th scope="col">Email</th>
          <th scope="col">Celular</th>
          <th scope="col">Domicilio</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($clientes as $cliente): ?>
            <tr>
              <th scope="row"><?= $this->Number->format($cliente->id) ?></th>
              <td><?= h($cliente->name) ?></td>
              <td><?= h($cliente->cuit) ?></td>
              <td><?= h($cliente->email) ?></td>
              <td><?= h($cliente->celular) ?></td>
              <td><?= h($cliente->domicilio) ?></td>
              <td>
                <a href="./clientes/view/<?= $cliente->id?>"><i class="fa fa-user" title="Ver cliente"></i></a>
                <a href="./clientes/edit/<?= $cliente->id?>"><i class="fa fa-pencil" title="Editar cliente"></i></a>
                
                <?php
                      if ($cliente->borrado){
                                        
                        echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-check-circle', 'title' => 'Activar cliente')),
                          array('action' => 'activar', $cliente['id']),
                          array('escape'=>false, 'confirm' => __('¿Seguro quiere activar el cliente # {0}?', $cliente->id))
                        );
                        
                      }else{
                                        
                          echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Eliminar cliente')),
                            array('action' => 'delete', $cliente['id']),
                            array('escape'=>false, 'confirm' => __('¿Seguro quiere borrar el cliente # {0}?', $cliente->id))
                          );
                      }
                    ?>
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
