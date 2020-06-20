<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image[]|\Cake\Collection\CollectionInterface $images
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in', ['viewName'=>'Image']); ?>

<div class="col-sm-6">    
    <legend>Imágenes</legend>
    <?= $this->Form->create('Images', ['type' => 'get']); ?>
    <div class="form-group row">
        <div class="col-sm-4">
            <?= $this->Form->control('start_date',
                ['class' => 'datepicker form-control mt-2 mb-2', 
                'placeholder' => 'Fecha desde',
                'value' => $this->request->query('start_date'), 
                'autocomplete' => 'off',
                'label' => false
                ]); 
            ?>
        </div>
        <div class="col-sm-4">
            <?= $this->Form->control('end_date',
                ['class' => 'datepicker form-control mt-2 mb-2', 
                'placeholder' => 'Fecha hasta',
                'value' => $this->request->query('end_date'), 
                'autocomplete' => 'off',
                'label' => false
                ]); 
            ?>
        </div>
        <?//= $this->Form->button('Buscar'); ?>
        <div class="form-group row">
            <div class="col-sm-10">
                <?= $this->Form->submit('Buscar', [
                    'class' => 'btn btn-primary'
                ]) ?>
            </div>
        </div>
        <?= $this->Form->end(); ?>
    </div>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('fecha_hora_imagen') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('ACCIONES') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($images as $image): ?>
            <tr>
                <td><?= h($image->fecha_hora_imagen) ?></td>
                
                <td><?= $this->Html->image('../files/images/photo/' . $image->get('photo_dir') . '/' . $image->get('photo')); ?></td> <!-- /square_ -->
                <td><?= h($image->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $image->id]) ?>
                    <?= $this->Form->postLink(__('Borrar Imagen'), ['action' => 'delete', $image->id], ['confirm' => __('¿Seguro que desea eliminar la imagen: #{0}?', $image->id)]) ?>
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
<?= $this->Html->script('filtrar-imagen.js') ?>