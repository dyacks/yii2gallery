<?php
    $this->title = 'sort albums';
?>

<?= $this->render('flash') ?>

<?php if(!empty($model)): ?>

<?php $img = $model->getImage(); ?>

<?= \yii\widgets\DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'name',
        [
            'attribute' => 'images',
            'value' => "<img src='{$img->getUrl()}'>",
            'format' => 'html',
        ]
    ]
]) ?>

<?php endif; ?>

<div class="site-index">

    <div class="jumbotron">
        <h1><?= $model->name ?></h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">-- sort --</a></p>
    </div>

</div>
