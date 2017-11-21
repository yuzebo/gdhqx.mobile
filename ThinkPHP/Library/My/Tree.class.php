<?php
namespace My;
class Tree{
    //存放无限极分类结果

   static public  function create($data,$html="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;",$pid=0,$level=0){
        $treeList=array();

        foreach($data as $key=>$value){
            if($value['pid']==$pid){
                $value['html']=str_repeat($html,$level);
                $treeList[]=$value;
                unset($data[$key]);
                $treeList = array_merge($treeList,self::create($data,$html,$value['id'],$level+1));
            }
        }
//       dd($treeList);
        return $treeList;
    }
}

?>