<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use app\modules\home\controllers;
use app\components\SidebarWidget;

/* @var $this yii\web\View */
/* @var $model app\models\Contacts */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contacts-view">

<div class='left-side-bar col-md-2'>

<?= SidebarWidget::widget() ?>
</div>
<div class='content-area col-md-8'>
	<div class='col-md-9'>
    <h1><?= Html::encode($this->title) ?></h1><h5><i>(<?php if($model->type==1) echo "Personal"; else echo "Business";?> Contact)</i></h5>
	</div>
	<div class='col-md-3'>
	<div id="activity-view-link" class="btn btn-primary" style="float:right;margin:20px;">View Contact</div>
	</div>


     <?php if($model->type == 1)  echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'email:email',
            'number',
            'address:ntext',
            'birthday',
        ],
    ]); else echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'email:email',
            'number',
            'fax',
            'website',
        ],
    ]);
	
	
	 $this->registerJs(
    "$('#activity-view-link').click(function() {
     $('.modal').show();
	 $( '.fade' ).fadeTo( 'slow', 1 );
	 });
	 
	 $('.close').click(function() {
	 $( '.fade' ).fadeTo( 'slow', 0 );
	 $('.modal').hide();
	 });
	 
	 "); 
	 $this->registerCss(".modal.fade .modal-dialog{
    -webkit-transform: translate(0, 50%);
    -ms-transform: translate(0, 50%);
    -o-transform: translate(0, 50%);
    transform: translate(0, 50%);}
	.left-side-bar{}
	
	");
	 
	 
	 ?>
 
</div></div>
<div class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><?=$model->name?></h4>
      </div>
      <div class="modal-body">
	  <div class="row">
		<div class="col-md-4">
			<div class="image" >
			<?php if($model->type == 1) $link=Url::base().'/../uploads/'.$model->photo; else $link=Url::base().'/../uploads/v-card-default.png'; ?>
				<img src="<?=$link ?>" width="150"/>
			</div>
		</div>
		<div class="col-md-6">
			<div class="address" >
			<?php if($model->type == 1) echo $model->address; else {?>
			<label>Subject</label>
			<input type="text" >
			<label>Content</label>
			<textarea col="6" style="margin: 0px; height: 78px; width: 279px;"> </textarea>
			
			<?php }?>
		  </div>
		</div>
	 </div>	 
    </div>
      <div class="modal-footer">
        <?php if($model->type == 2){ ?><a href="#" class="btn btn-primary" data-dismiss="modal">Send</a> <?php } ?>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->