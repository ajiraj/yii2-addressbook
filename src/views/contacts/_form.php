<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
/* @var $this yii\web\View */
/* @var $model app\models\Contacts */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $script = <<< JS
$(document).ready(function(){
   showFields($('#contacts-type'));
}); 

function showFields(ele)
{
	var type=Number($(ele).val());
	switch(type){
		case 1:
				$(".hidden_set").slideUp( "slow" );
				$("#set_1").slideDown( "slow" );
				break;
		case 2:
				$(".hidden_set").slideUp( "slow" );
				$("#set_2").slideDown( "slow" );
				break;
		default:
				$(".hidden_set").slideUp( "slow" );
				break;
		
	}
}
JS;
$this->registerJs($script, $this::POS_END); 
$this->registerCss(".hidden_set { display: none; }");
?>
<div class="contacts-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data'] ]); ?>

    <?= $form->field($model, 'type')->dropDownList(['0' => 'Choose Type', '1' => 'Personal Contact', '2' => 'Business Contact'],['onchange'=>'showFields(this)']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>
	<div class="hidden_set" id="set_1">
    <?= $form->field($model, 'photo')->fileInput()  ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'birthday')->textInput() ?>
	</div>
	<div class="hidden_set" id="set_2">
    <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>
	</div>
	 <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
