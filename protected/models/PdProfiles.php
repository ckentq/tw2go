<?php

/**
 * This is the model class for table "{{pd_profiles}}".
 *
 * The followings are the available columns in table '{{pd_profiles}}':
 * @property integer $p_id
 * @property string $description
 * @property string $size
 * @property string $due
 * @property string $preserve
 * @property integer $price
 * @property integer $sale
 * @property string $max
 * @property string $max_month
 * @property string $duration
 * @property string $ps
 * @property string $certify
 */
class PdProfiles extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return PdProfiles the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{pd_profiles}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('p_id, description, size, due, preserve, price, max, max_month, duration', 'required'),
			array('p_id, price, sale', 'numerical', 'integerOnly'=>true),
			array('ps, certify', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('p_id, description, size, due, preserve, price, sale, max, max_month, duration, ps, certify', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'p_id' => 'P',
			'description' => 'Description',
			'size' => 'Size',
			'due' => 'Due',
			'preserve' => 'Preserve',
			'price' => 'Price',
			'sale' => 'Sale',
			'max' => 'Max',
			'max_month' => 'Max Month',
			'duration' => 'Duration',
			'ps' => 'Ps',
			'certify' => 'Certify',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('p_id',$this->p_id);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('size',$this->size,true);
		$criteria->compare('due',$this->due,true);
		$criteria->compare('preserve',$this->preserve,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('sale',$this->sale);
		$criteria->compare('max',$this->max,true);
		$criteria->compare('max_month',$this->max_month,true);
		$criteria->compare('duration',$this->duration,true);
		$criteria->compare('ps',$this->ps,true);
		$criteria->compare('certify',$this->certify,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}