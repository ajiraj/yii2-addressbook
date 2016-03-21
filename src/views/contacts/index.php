<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contacts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contacts-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add Contact', ['create'], ['class' => 'btn btn-success','style' => 'float:right;margin:20px;']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'type',
			[
				'contentOptions' => ['style' => 'width:30px'],
				'attribute' => 'type',
				'format' => 'html',    
				'value' => function ($data) {
					return Html::img(Yii::getAlias('@web').'/../typeIcon/'. $data['type'].'.png',
						['width' => '25px','title'=>$data['type']=='1'?'Personal contact':'Buisness contact']);
				},
			],
            'name',
            'email:email',
            'number',
            // 'photo:ntext',
            // 'address:ntext',
            // 'birthday',
            // 'fax',
            // 'website',

			[  
        'class' => 'yii\grid\ActionColumn',
        'template' => '{view}',
        ],

        ],
    ]); ?>

</div>
