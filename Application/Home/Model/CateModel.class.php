<?php
namespace Admin\Model;
use \Think\Model\RelationModel;

class CateModel extends RelationModel{
    protected $_link = array(
        'Cate' => array(
            'mapping_type' => self::HAS_MANY,
            'mapping_name' => 'cate',
            'mapping_order' => 'sort',
            'parent_key' => 'pid',
        ),
    );
}