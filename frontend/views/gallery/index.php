<?php

use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\helpers\Html;
use yii\helpers\Url;

echo GridView::widget([
    'dataProvider' => $gridDataProvider,
    'tableOptions' => [
        'class' => 'table table-striped table-bordered'
    ],
    'columns' => [
        ['class' => SerialColumn::className()],
    [
        'attribute' => 'name',
        'format' => 'text',
    ],
        [
            'label' => 'Картинка',
            'format' => 'raw',
            'value' => function($data){
                return Html::img(Url::toRoute($data->image),[
                    'alt'=>'yii2 - картинка в gridview',
                    'style' => 'width:15px;'
                ]);
            },
        ],
    ]
       // ['class' => 'yii\grid\SerialColumn'],
        //'name',
//        [
//            'class' => 'yii\grid\DataColumn',
//            'value' => function($data){
//                return $data->image;
//            }
//        ]
]);
