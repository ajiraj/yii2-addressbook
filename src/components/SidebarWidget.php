<?php
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;
use yii\db\Query;
class SidebarWidget extends Widget
{
   
    public function init()
    {
        parent::init();
        
    }

    public function run()
    {
		$data=$this->getRandomContact();
        return $this->render('contact',array('data'=>$data));
    }
	
	public function getRandomContact()
    {
		$query = new Query;
		$query->select('*')
			->from('contacts')
			->orderBy('RAND()')
			->limit(1);
			
		$rows = $query->one();
		return $rows;
	}
}
?>