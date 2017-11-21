<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class UserModel extends RelationModel {
    protected $_link = array(
        'Role'=>array(
            'mapping_type' =>self::MANY_TO_MANY,
            'foreign_key'=>'user_id',
            'relation_foreign_key'=>'role_id',
            'relation_table'=>'think_role_user',
            'mapping_fields'=>'id,name',
        ),
    );
}

?>