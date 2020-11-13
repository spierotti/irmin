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
        
<?php if (!$users->isEmpty()) { ?>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Rol</th>
            <th scope="col">Email</th>
            <th scope="col">Fecha de creación</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= h($user->username) ?></td>
                <td><?= $user['role']['name'] ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->created) ?></td>
                <td>
                    <?php
                        echo $this->Html->link(
                            '',
                            array('controller' => 'Users', 'action' => 'view', $user->id),
                            array('class' => 'fa fa-user', 'title' => 'Ver usuario', 'escape'=>false)
                        );
                    ?>

                    <?php
                        echo $this->Html->link(
                            '',
                            array('controller' => 'Users', 'action' => 'edit', $user->id),
                            array('class' => 'fa fa-pencil', 'title' => 'Editar usuario', 'escape'=>false)
                        );
                    ?>
                    
                    <?php
                    if($user->borrado){

                        echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-check-circle', 'title' => 'Restaurar usuario')),
                        array('action' => 'activar', $user->id),
                        array('escape'=>false, 'confirm' => __('¿Está seguro que desea restaurar el usuario {0}?', $user->username))
                        );

                    }else{
                        
                        echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Eliminar usuario')),
                        array('action' => 'delete', $user->id),
                        array('escape'=>false, 'confirm' => __('¿Está seguro que desea eliminar el usuario {0}?', $user->username))
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

<?php }else{

    echo '<p>¡No existen registros para el periodo solicitado!</p>';
}?>
