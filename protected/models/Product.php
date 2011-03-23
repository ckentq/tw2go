<?php

/**
 * This is the model class for table "{{product}}".
 *
 * The followings are the available columns in table '{{product}}':
 * @property integer $id
 * @property string $name
 * @property integer $owner
 * @property integer $category
 * @property string $cover
 * @property integer $active
 * @property integer $sort
 */
class Product extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Product the static model class
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
		return '{{product}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, owner, category', 'required'),
			array('owner, category, active, sort', 'numerical', 'integerOnly'=>true),
			array('cover', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('name, owner, category, cover, active, sort', 'safe', 'on'=>'search'),
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
		    'pd_profiles'=> array(self::HAS_ONE, 'PdProfiles', 'p_id'),
			'user'=> array(self::BELONGS_TO, 'User', 'owner'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => '品名',
			'owner' => 'Owner',
			'category' => '分類',
			'cover' => 'Cover',
			'active' => '上架',
			'sort' => 'Sort',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('owner',$this->owner);
		$criteria->compare('category',$this->category);
		$criteria->compare('cover',$this->cover,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('sort',$this->sort);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}