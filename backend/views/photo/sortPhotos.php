<?php
$this->title = 'sort photos';
?>

<?= $this->render('/album/flash') ?>

<?php $img = $model->getImage(); ?>

<!-- https://yiiframework.com.ua/ru/doc/guide/2/output-data-widgets/ -->


<?= \yii\widgets\DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'name',
        [
            'attribute' => 'images',
            'value' => "<img src='{$img->getUrl()}'>",
            //'contentOptions' => ['class' => 'bg-red'],
            'format' => 'html',
        ]
    ]
]) ?>

<div class="site-index">

    <div class="jumbotron">
        <h1><?= $model->name ?></h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">-- sort photos --</a></p>
    </div>

</div>
