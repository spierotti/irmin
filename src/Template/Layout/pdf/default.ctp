<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <title>
        <?= $this->fetch('title') ?>
    </title>

    <?= $this->Html->css('bootstrap.min.css', ['fullBase' => true]) ?>
    <?= $this->Html->css('bootstrap.icon-large.min.css', ['fullBase' => true]) ?>
    <?= $this->Html->css('font-awesome.min.css', ['fullBase' => true]) ?>
    <?= $this->Html->css('datepicker.min.css', ['fullBase' => true]) ?>
    <?= $this->Html->css('style.css', ['fullBase' => true]) ?>
    <?= $this->Html->css('jquery-ui.css', ['fullBase' => true]) ?>
    <?= $this->Html->css('jquery-ui.min.css', ['fullBase' => true]) ?>

</head>
<body>
    <div id="container">
        <div id="content">
            <?= $this->fetch('content') ?>
        </div>
    </div>
</body>
</html>