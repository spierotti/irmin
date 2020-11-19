<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image $image
 */
$this->assign('title', 'Imágenes');
use Cake\Routing\Router;
use Cake\I18n\Time;
?>

<div class="images view large-9 medium-8 columns content">
    <div style="overflow-x:auto;">
        <table class="table table-hover col-sm-9">
            <tr>
                <th scope="row">Fecha y Hora de Captura</th>
                <td><?= h($image->fecha_hora_imagen); ?></td>
            </tr>
            <tr>
                <th scope="row">Fecha y Hora local</th>
                <?php 
                $date=new Time($image->fecha_hora_imagen);
                date_sub($date,date_interval_create_from_date_string("3 hours"));
                ?>
                <td><?php echo date_format($date,'d/m/Y H:i'); ?></td>
            </tr>
            <tr>
                <th scope="row">Fecha y Hora de Alta</th>
                <td><?= h($image->created) ?></td>
            </tr>
            <tr>
                <th scope="row">Hay Actividad</th>
                <td><?= $image->hay_actividad ? __('Si') : __('No'); ?></td>
            </tr>
        </table>
        <?= $this->Html->image('../files/images/photo/' . $image->get('photo_dir') . '/' . $image->get('photo')); ?>
    </div>
    <div class="col-sm-2">
      <button onclick="window.location.href = '<?php echo Router::url(array('controller'=>'Images', 'action'=>'index'))?>'" class="btn btn-primary mt-4 rapido">Volver</button>
    </div>
</div>
