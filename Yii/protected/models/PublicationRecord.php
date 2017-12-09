<?php

/**
 * This is the biz model class for table "publication_record".
 *
 */
class PublicationRecord extends PublicationRecordData
{
	

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
