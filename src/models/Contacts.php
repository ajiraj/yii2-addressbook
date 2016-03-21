<?php

namespace app\models;

use Yii;
use kop\y2cv\ConditionalValidator;
/**
 * This is the model class for table "contacts".
 *
 * @property integer $id
 * @property integer $type
 * @property string $name
 * @property string $email
 * @property string $number
 * @property string $photo
 * @property string $address
 * @property string $birthday
 * @property string $fax
 * @property string $website
 */
class Contacts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	 public $verifyCode;
    public static function tableName()
    {
        return 'contacts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'name', 'email', 'number'], 'required'],
            [['type'], 'integer'],
			['verifyCode', 'captcha'],
            [[ 'address'], 'string'],
			[['photo'], 'safe'],
            [['photo'], 'file', 'extensions'=>'jpg, gif, png'],
            [['birthday'], 'safe'],
			['birthday', 'date', 'format' => 'yyyy-m-d','message'=>'The format of Birthday is invalid.(format: 2015-10-24)'],
            [['name', 'website'], 'string', 'max' => 45],
            [['email'], 'string', 'max' => 254],
			['email', 'email'],
            [['number', 'fax'], 'string', 'max' => 15],
			[['address','birthday','photo'], 'required', 'when' => function ($model) {
					return $model->type == '1';
				}, 'whenClient' => "function (attribute, value) {
					return $('#contacts-type').val() == '1';
				}"],
			[['fax', 'website'], 'required', 'when' => function ($model) {
					return $model->type == '2';
				}, 'whenClient' => "function (attribute, value) {
					return $('#contacts-type').val() == '2';
				}"],	
	
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'name' => 'Name',
            'email' => 'Email',
            'number' => 'Number',
            'photo' => 'Photo',
            'address' => 'Address',
            'birthday' => 'Birthday',
            'fax' => 'Fax',
            'website' => 'Website',
			'verifyCode'=>'Verification Code'
        ];
    }
}
