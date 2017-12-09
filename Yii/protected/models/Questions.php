<?php

/**
 * This is the biz model class for table "questions".
 *
 */
class Questions extends QuestionsData
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
			'ques1' => 'Ques1',
			'ques2' => 'Ques2',
			'ques3' => 'Ques3',
			'ques4' => 'Ques4',
			'ques5' => 'Ques5',
			'ques6' => 'Ques6',
			'ques7' => 'Ques7',
			'ques8' => 'Ques8',
			'ques9' => 'Ques9',
			'ques10' => 'Ques10',
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
		$criteria->compare('ques1',$this->ques1,true);
		$criteria->compare('ques2',$this->ques2,true);
		$criteria->compare('ques3',$this->ques3,true);
		$criteria->compare('ques4',$this->ques4,true);
		$criteria->compare('ques5',$this->ques5,true);
		$criteria->compare('ques6',$this->ques6,true);
		$criteria->compare('ques7',$this->ques7,true);
		$criteria->compare('ques8',$this->ques8,true);
		$criteria->compare('ques9',$this->ques9,true);
		$criteria->compare('ques10',$this->ques10,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
		/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Questions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

}
