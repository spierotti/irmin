<?php $this->layout = false; ?>
<?php echo $this->Html->css([
    'bootstrap.min',
    'style'
    ]);
    ?>

<div class="row justify-content-center error mt-3">
    <?php echo $this->Html->image('e404-mezcla.png',['width'=>'50%', 'alt' =>'https://pixabay.com/users/mocho-156870/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1350918']);?>
    <div class="col-sm-12">
        <p class="row justify-content-center"> <a href="../" class="link"><b>Haga click aquí para volver</b></a></p>
    </div>
</div>



