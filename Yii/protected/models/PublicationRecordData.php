<?php

/**
 * This is the model class for table "publication_record".
 *
 * The followings are the available columns in table 'publication_record':
 * @property integer $id
 * @property string $name
 * @property integer $sex
 * @property string $phone
 * @property integer $cate
 * @property string $star_ad
 * @property string $en_ad
 * @property string $luguo
 * @property string $date
 * @property string $time
 * @property integer $num
 * @property double $free
 * @property integer $wwe
 * @property integer $kong
 * @property string $carded
 * @property string $remark
 * @property string $add_time
 * @property string $car_man
 */
class PublicationRecordData extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'publication_record';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sex, cate, num, wwe, kong', 'numerical', 'integerOnly'=>true),
			array('free', 'numerical'),
			array('name, star_ad, en_ad, luguo, time, carded, remark, add_time, car_man', 'length', 'max'=>20),
			array('phone', 'length', 'max'=>11),
			array('date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, sex, phone, cate, star_ad, en_ad, luguo, date, time, num, free, wwe, kong, carded, remark, add_time, car_man', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'name' => '名称',
			'sex' => '性别1男2女',
			'phone' => '手机号',
			'cate' => '类别 ，1找人2人找车',
			'star_ad' => '出发地',
			'en_ad' => '终点站',
			'luguo' => '途径地',
			'date' => '出发日期',
			'time' => '出发时间',
			'num' => '人数',
			'free' => '费用',
			'wwe' => '免责说明',
			'kong' => '空几位',
			'carded' => '车型',
			'remark' => '不撑说明',
			'add_time' => '创建时间',
			'car_man' => '人车',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('cate',$this->cate);
		$criteria->compare('star_ad',$this->star_ad,true);
		$criteria->compare('en_ad',$this->en_ad,true);
		$criteria->compare('luguo',$this->luguo,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('num',$this->num);
		$criteria->compare('free',$this->free);
		$criteria->compare('wwe',$this->wwe);
		$criteria->compare('kong',$this->kong);
		$criteria->compare('carded',$this->carded,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('add_time',$this->add_time,true);
		$criteria->compare('car_man',$this->car_man,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PublicationRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
