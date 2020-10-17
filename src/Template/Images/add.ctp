<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image $image
 */
?>

<div>
    <?= $this->Html->image('../files/images/photo/Images/loading.gif', ['id' => 'img']); ?>
</div>


<div class="images form large-9 medium-8 columns content">
    <?= $this->Form->button('COMENZAR', ['id' => 'descargar']) ?>
</div>

<?= $this->Html->script('cargar-imagenes.js') ?>

<!-- www.tutiempo.net - Ancho:477px - Alto:91px -->
<div id="TT_JiTE1Ek11acB8FsUjAujzzzjD6nU1YW2bt1YEZCoqkjomIm5G">El tiempo - Tutiempo.net</div>
<script type="text/javascript" src="https://www.tutiempo.net/s-widget/l_JiTE1Ek11acB8FsUjAujzzzjD6nU1YW2bt1YEZCoqkjomIm5G"></script>
