<?php
namespace My;
class Category {
	//各种无限级分类
	//组合一维数组
	Static Public function unlimitedForLevel($cate,$html="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp",$pid=0,$level=0){
		$arr=array();
		foreach($cate as $k=>$v){
		
			if($v['pid']==$pid){
				$v['level']=$level+1;
				$v['html']=str_repeat($html,$level);
				$arr[]=$v;
				$arr=array_merge($arr,self::unlimitedForLevel($cate,$html,$v['id'],$level+1));
				
			}
		}
		return $arr;
	}
	
	
	//层级关系  组合多维数组
	Static public function unlimitedForLayer($cate,$name="child",$pid=0){
	
		$arr=array();
		foreach($cate as $k=> $v){
			if($v['pid'] == $pid){
				$v[$name]=self::unlimitedForLayer($cate,$name,$v['id']);
				$arr[]=$v;
			}
		}
		return $arr;
	}

    Static public function fiveUnlimitedForLayer($cate){

        $arr = array();
        foreach($cate[0]['child'] as $k=>$v){
            if($v['class'] != null){
                $arr[] = $v;
            }
        }
        return $arr;
    }
	
	//子集id 返回所有顶级栏目   首页》男装》裤子
	Static public function getParents($cate,$id){
		$arr=array();
		foreach($cate as $v){
			if($v['id']==$id){
				$arr[]=$v;
				$arr=array_merge(self::getParents($cate,$v['pid']),$arr);
			}
		}
		return $arr;
		
	}
	
	//传递一个父id 返回所有子集  服装             女装
							//男装	女装		衬衫 裙子			
							//aa bb
							//PID父id
	Static public function getChildId($cate,$pid){  //pid 为父id
		$arr=array();
		foreach($cate as $v){
			if($v['pid']==$pid){
				$arr[]=$v['id'];
				$arr=array_merge($arr,self::getChildId($cate,$v['id']));
			}
		}
		return $arr;
	}						
	
	}	
?>