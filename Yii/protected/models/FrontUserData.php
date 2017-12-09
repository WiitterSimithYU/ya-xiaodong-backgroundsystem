<?php

/**
 * This is the model class for table "front_user".
 *
 * The followings are the available columns in table 'front_user':
 * @property integer $id
 * @property string $nick_name
 * @property string $password
 * @property string $phone
 * @property string $birth
 * @property string $email
 * @property integer $gender
 * @property string $user_pic
 * @property string $province
 * @property string $city
 * @property string $area
 * @property integer $profession
 * @property integer $education
 * @property integer $register_type
 * @property string $login_token
 * @property integer $last_login
 * @property string $weixin_token
 * @property string $qq_token
 * @property string $weibo_token
 * @property string $invite_code
 * @property integer $marry
 * @property integer $children
 * @property integer $create_time
 * @property integer $update_time
 * @property string $name
 * @property string $id_card
 * @property string $openid
 * @property string $hotel
 */
class FrontUserData extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'front_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nick_name', 'required'),
			array('gender, profession, education, register_type, last_login, marry, children, create_time, update_time', 'numerical', 'integerOnly'=>true),
			array('nick_name, password, birth, email, user_pic, province, city, area, login_token, invite_code, name', 'length', 'max'=>45),
			array('phone', 'length', 'max'=>20),
			array('weixin_token, qq_token, weibo_token, id_card, openid, hotel', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nick_name, password, phone, birth, email, gender, user_pic, province, city, area, profession, education, register_type, login_token, last_login, weixin_token, qq_token, weibo_token, invite_code, marry, children, create_time, update_time, name, id_card, openid, hotel', 'safe', 'on'=>'search'),
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
			'nick_name' => '昵称',
			'password' => '密码',
			'phone' => '手机',
			'birth' => '生日',
			'email' => '邮箱',
			'gender' => '性别1男2女3保密',
			'user_pic' => '用户图像',
			'province' => 'Province',
			'city' => 'City',
			'area' => 'Area',
			'profession' => '职业',
			'education' => '学历',
			'register_type' => '注册方式： 1: 本地注册 2： 微信注册， 3：qq注册 4 ：微博',
			'login_token' => 'Login Token',
			'last_login' => 'Last Login',
			'weixin_token' => 'Weixin Token',
			'qq_token' => 'Qq Token',
			'weibo_token' => 'Weibo Token',
			'invite_code' => '邀请码',
			'marry' => '0未婚 1已婚',
			'children' => '0 1有',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'name' => '姓名',
			'id_card' => '身份证号',
			'openid' => '微信标识',
			'hotel' => '酒店',
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
		$criteria->compare('nick_name',$this->nick_name,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('birth',$this->birth,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('user_pic',$this->user_pic,true);
		$criteria->compare('province',$this->province,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('profession',$this->profession);
		$criteria->compare('education',$this->education);
		$criteria->compare('register_type',$this->register_type);
		$criteria->compare('login_token',$this->login_token,true);
		$criteria->compare('last_login',$this->last_login);
		$criteria->compare('weixin_token',$this->weixin_token,true);
		$criteria->compare('qq_token',$this->qq_token,true);
		$criteria->compare('weibo_token',$this->weibo_token,true);
		$criteria->compare('invite_code',$this->invite_code,true);
		$criteria->compare('marry',$this->marry);
		$criteria->compare('children',$this->children);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('update_time',$this->update_time);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('id_card',$this->id_card,true);
		$criteria->compare('openid',$this->openid,true);
		$criteria->compare('hotel',$this->hotel,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FrontUser the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
