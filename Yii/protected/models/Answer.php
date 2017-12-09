<?php

/**
 * This is the biz model class for table "answer".
 *
 */
class Answer extends AnswerData
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
			'user_id' => 'User',
			'question' => 'Question',
			'answer' => 'Answer',
			'create_time' => 'Create Time',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('question',$this->question);
		$criteria->compare('answer',$this->answer,true);
		$criteria->compare('create_time',$this->create_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
		/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Answer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function answerList($search_array)
	{
		$criteria = new CDbCriteria();

		if ($search_array['question']) {
			$criteria->compare('t.question', trim($search_array['question']));
		}

        $criteria->addCondition("answer <> ''");
        $criteria ->order = "create_time desc";
        $pages = new CPagination();
		$pages->itemCount = $this->count($criteria);
		$pages->pageSize = Yii::app()->params['postsPerPage'];
		$pages->applyLimit($criteria);
        if ($search_array['limit']) {
            $criteria->limit = $search_array['limit'];
        }
		$answer = $this->findAll($criteria);

		return array($answer, $pages);
	}

}
