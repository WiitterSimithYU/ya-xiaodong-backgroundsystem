<?php
/**
 * This is the biz model class for table "admin_user".
 *
 */
class AdminUser extends AdminUserData
{
    public $pre_password;
    public $confirm_password;
    public $role_name;

    public static $isDisabledSet = array('0' => "开启", '1' => "禁用");

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'authAssignment' => array(self::HAS_MANY, 'Authassignment', 'userid'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'loginname' => 'Loginname',
            'nickname' => 'Nickname',
            'password' => 'Password',
            'phone' => 'Phone',
            'created_at' => 'Created At',
            'last_login_at' => 'Last Login At',
            'last_login_ip' => 'Last Login Ip',
            'is_deleted' => 'Is Deleted',
            'unid' => 'Unid',
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
        $criteria->compare('loginname',$this->loginname,true);
        $criteria->compare('nickname',$this->nickname,true);
        $criteria->compare('password',$this->password,true);
        $criteria->compare('phone',$this->phone,true);
        $criteria->compare('created_at',$this->created_at);
        $criteria->compare('last_login_at',$this->last_login_at);
        $criteria->compare('last_login_ip',$this->last_login_ip,true);
        $criteria->compare('is_deleted',$this->is_deleted);
        $criteria->compare('unid',$this->unid,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
    
        /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return AdminUser the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * 用户列表
     */
    public static function getIndexList() 
    {
        $model = new AdminUser();

        $criteria = new CDbCriteria();
        $criteria->addCondition("is_deleted != 1");
        $criteria->order = "created_at desc";

        $pages = new CPagination();
        $pages->itemCount = $model->count($criteria);
        $pages->pageSize = $_COOKIE['user'] ? intval($_COOKIE['user']) : Yii::app()->params['pageCount'];
        $pages->applyLimit($criteria);

        $items = $model->findAll($criteria);
        return array($model, $items, $pages);
    }

    /**
     * 获取用户列表
     * @param  string $type 数据类型
     */
    public static function getUserList($type = "array")
    {
        $contact = "is_deleted = 0 order by convert(nickname using gbk) ASC";
        $users = AdminUser::model()->findAll($contact);

        $return = array();
        switch ($type) {
            case 'array': 
                foreach ($users as $user) {
                    $return[$user->id] = $user->nickname;
                }
                break;
            case 'json': 
                foreach ($users as $user) {
                    $temp = array();
                    $temp['id']="$user->id";
                    $temp['bs']="$user->nickname";
                    $temp['name']="$user->nickname";
                    array_push($return, $temp);
                }
                $return = json_encode($return);
                break;
            default: break;
        }
        return $return;
    }

    /**
     * 获取用户姓名
     * @param  integer $id 用户id
     */
    public static function getUserName($id)
    {
        $id = intval($id);
        if (!$id) return "";
        $user = AdminUser::model()->findByPk($id);
        return $user ? $user->nickname : "";
    }

    /**
     * 根据用户名获取用户id
     * @param  string $name 用户名
     */
    public static function getUserId($name) 
    {
        $user = AdminUser::model()->find("nickname = :nickname", array(':nickname' => $name));
        return $user ? $user->id : 0;
    }
    
    /**
     * 获取拥有权限用户列表
     * @param  string $str 用户权限字符串
     */
    function getOperationList($str) 
    {
        $id = "";
        $user_id = isset(Yii::app()->user->userid) ? Yii::app()->user->userid : 0;
        $auth = Yii::app()->authManager;
        $user = AdminUser::model()->findAll();
        foreach ($user as $li) {
            if ($li->id == $user_id) continue;
            $id .= $auth->checkAccess($str, $li->id) ? $li->id."," : "";
        }
        if (strlen($id) > 1) $id = substr($id, 0, strlen($id) - 1);
        return $id;
    }

} 