<?php
namespace Admin\Model;
use Think\Model\RelationModel;

class ArticleModel extends RelationModel{
    protected $_link = array(
        'User'=>array(
            'mapping_type' =>self::MANY_TO_MANY,
            'class_name' =>'User',
            'foreign_key'=>'article_id',
            'relation_foreign_key'=>'user_id',
            'relation_table'=>'think_article_user',
            'mapping_fields'=>'id,username',
        ),
        'Cate'=>array(
            'mapping_type' => self::BELONGS_TO,
            'class_name' => 'Cate',
            'foreign_key' => 'cid',
            'mapping_name' => 'Cate',
            'mapping_fields' => 'title'
        ),
    );
}