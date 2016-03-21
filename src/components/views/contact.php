<?php
use yii\helpers\Url;
if($data['type']==1 && $data['photo'] !='' ) $link=Url::base().'/../uploads/'.$data['photo'];
else if ($data['type']==1) $link=Url::base().'/../defaults/personal.png';
else $link=Url::base().'/../defaults/buisness.png';

?>
<div class="modal-body  ">
<h5 class="heading bg-info btn btn-default">Random Contact </h5>
<div class="col-md-3" style="padding:10px;width:100px;text-align:center">
<img src="<?php echo $link;  ?>" width="50" height="50" class="img" >
<span style="text-align:center"><?php echo $data['name']; ?></span>
</div></div>