<?php
/**
*
*/
class AuthRoleForm extends CFormModel
{
    public $name;

    public $description;

    public $priority;

    public function rules()
    {
        return array(
            array('name, description, priority', 'required'),
        );
    }
}
