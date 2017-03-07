<?php
use yii\helpers\Html;
//use yii\bootstrap\ActiveForm;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

?>

<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="panel-body">

        <?php $form = ActiveForm::begin([
            'method' => 'post',
            'action' => ['album/upload'],
            'options' => [
            'class' => 'form-horizontal col-lg-8',
            'enctype' => 'multipart/form-data'
        ],
        ]);?>


        <?= $form->field($model, 'name')
            ->textInput()
            //->hint('Длинна названия должна быть от 1 до 24 символов')
            ->label('Название альбома') ?>




            <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
                'language' => 'ru',
                'dateFormat' => 'dd-MM-yyyy',

            ]) ?>

            <!--?= $form->field($model, 'date')->widget(DatePicker::className(), [
                'options' => ['placeholder' => 'TO'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]); ?-->

        <?= $form->field($model, 'description')
            ->textarea(['rows' => 5, 'cols' => 5])
            ->label('Описание альбома') ?>



            <?= $form->field($model, 'imageFiles[]')->fileInput([
                'multiple' => true,
                'accept' => 'image/*',
            ]) ?>


            <div class="form-group">
                <?= Html::submitButton('Создать альбом', ['class' => 'btn btn-primary']) ?>
            </div>

        <?php ActiveForm::end(); ?>




    <div><div><div>



