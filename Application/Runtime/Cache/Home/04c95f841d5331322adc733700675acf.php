<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>广东海启星海洋科技有限公司</title>
    <!--<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>-->

</head>
<body>


	<title>经典案例</title>
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/hqx/Public/css/Home/base.css"/>
	<link rel="stylesheet" type="text/css" href="/hqx/Public/css/Home/classic_case.css"/>
	<link rel="stylesheet" type="text/css" href="/hqx/Public/css/Home/page.css"/>


	<script src="/hqx/Public/js/jquery-1.9.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/hqx/Public/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/hqx/Public/js/base.js" type="text/javascript" charset="utf-8"></script>
	<script>
        var imgWidth = $('.classic_case_big').attr('width');
        var indexUrl = "<?php echo U('Index/index');?>";
        var breadcrumbUrl = "<?php echo U('Home/News/index');?>";

	</script>
	<script>
		$(function () {
		$('.showli li:first').attr('class' ,'classic_case_big');
		$('.showli li:eq(1)').attr('class' ,'classic_case_big').attr('style','margin-right:0');
		$('.showli li:first a div').attr('class' ,'classic_case_con');
        $('.showli li:eq(1) a div').attr('class' ,'classic_case_con');
        $('.showli li:gt(1)').attr('class','classic_case_sm');
        $('.showli li:gt(1) a div').attr('class' ,'classic_case_con');
        $('.showli li:eq(4)').attr('style','margin-right:0');
        $('.showli li:eq(7)').attr('style','margin-right:0');
        $('.nav_crumbs_ul li a:last').removeAttr('href');
        });
	</script>


<!--头部导航栏-->
<div class="container header_container">
    <header>
        <h1 class="pull-left"><a href="<?php echo U('Index/index');?>"><img src="/hqx/Public/images/Home/logo6.png"/></a></h1>
        <h3 class="nav-right">
            <ul class="nav-right_ul" id="nav-right_ul">
                <li><a <?php if($controller_name == Index): ?>class="header_nav"<?php endif; ?> href="<?php echo U('Index/index');?>">首页<i <?php if($controller_name == Index): ?>class="active_this header_nav"<?php endif; ?>></i></a></li>
                <li><a href="<?php echo U('Case/index');?>">经典案例<i <?php if($controller_name != Index && $controller_name != News && $controller_name != Five && $controller_name != Intro): ?>class="active_this header_nav"<?php endif; ?>></i></a></li>
                <li><a href="<?php echo U('News/index' ,array('cid' => 32));?>">新闻中心<i <?php if($controller_name == News): ?>class="active_this header_nav"<?php endif; ?>></i></a></li>
                <li class="header_two_afive">
                    <a href="<?php echo U('Five/index');?>">五大领域<i <?php if($controller_name == Five): ?>class="active_this header_nav"<?php endif; ?>></i></a>

                    <!--新添加头部二级菜单-->
                    <ul class="header_two_nav header_two_five">
                        <li><a href="<?php echo U('Five/object', array('cid' => 3));?>">主体领域<em>></em></a></li>
                        <li><a href="<?php echo U('Five/object', array('cid' => 4));?>">核心领域<em>></em></a></li>
                        <li><a href="<?php echo U('Five/object', array('cid' => 2));?>">基础领域<em>></em></a></li>
                        <li><a href="<?php echo U('Five/object', array('cid' => 6));?>">前沿领域<em>></em></a></li>
                        <li><a href="<?php echo U('Five/object', array('cid' => 5));?>">提升领域<em>></em></a></li>
                    </ul>
                </li>
                <li class="header_two_aintro">
                    <a href="<?php echo U('Intro/intro' ,array('cid' => 43));?>">公司概况<i <?php if($controller_name == Intro): ?>class="active_this header_nav"<?php endif; ?>></i></a>

                    <!--新添加头部二级菜单-->
                    <ul class="header_two_nav header_two_intro">
                        <li><a href="<?php echo U('Intro/intro' ,array('cid' => 43));?>">公司简介<em>></em></a></li>
                        <li><a href="<?php echo U('Intro/intro' ,array('cid' => 45));?>">资质认证<em>></em></a></li>
                        <li><a href="<?php echo U('Intro/intro' ,array('cid' => 44));?>">企业文化<em>></em></a></li>
                        <li><a href="<?php echo U('Intro/intro' ,array('cid' => 46));?>">人才招聘<em>></em></a></li>
                    </ul>
                </li>
            </ul>
        </h3>
    </header>
</div>





<!--海报-->
<div id="myCarousel" class="carousel slide">
	<img src="/hqx/Public/images/Home/case.png">
</div>


<!--2017-10-26添加经典案例导航-->
<div class="container">
	<div class="base_nav">
		<ul>
			<li <?php if($cid == 36 || $cid == null): ?>class="base_nav_active"<?php endif; ?> ><a href="<?php echo U('Case/index' ,array('cid' => 36));?>">海洋站建设案例</a></li>
			<li <?php if($cid == 37): ?>class="base_nav_active"<?php endif; ?> ><a href="<?php echo U('Case/index' ,array('cid' => 37));?>">浮标布放案例</a></li>
			<li <?php if($cid == 38): ?>class="base_nav_active"<?php endif; ?> ><a href="<?php echo U('Case/index' ,array('cid' => 38));?>">软件服务案例</a></li>
			<li <?php if($cid == 39): ?>class="base_nav_active"<?php endif; ?> ><a href="<?php echo U('Case/index' ,array('cid' => 39));?>">系统集成案例</a></li>
			<li <?php if($cid == 40): ?>class="base_nav_active"<?php endif; ?> ><a href="<?php echo U('Case/index' ,array('cid' => 40));?>">警戒标识服务</a></li>
			<li <?php if($cid == 41): ?>class="base_nav_active"<?php endif; ?> ><a href="<?php echo U('Case/index' ,array('cid' => 41));?>">海洋综合服务案例</a></li>
		</ul>
	</div>
</div>

<div class="classic_case">
    <div class="container">
        <h3 class="tit">经典案例<i class="active_this set_width"></i></h3>
        <ul class="showli">
			<?php if(is_array($result)): foreach($result as $key=>$vo): ?><li>
            	<a href="<?php echo U('showCase', array('id' => $vo['id'] ,'cid' => $vo['cid']));?>">
                	<img src="/hqx/Uploads/Face/<?php echo ($vo["max"]); ?>" alt="">
	                <div>
	                    <h5><strong><?php echo ($vo["title"]); ?></strong></h5>
	                    <p><?php echo (htmlspecialchars_decode($vo["brief"])); ?></p>
	                </div>
                </a>
            </li><?php endforeach; endif; ?>
		</ul>
    </div>
</div>

<!--分页-->
<div class="pages">
	<li><?php echo ($show); ?></li>
</div>

</body>
</html>


<!--底部内容-->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 footer_left">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <h3>联系我们</h3>

                        <!--添加底部橙色方块-->
                        <em></em>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <h4>关于我们</h4>
                        <ul>
                            <li><a href="<?php echo U('Intro/intro' ,array('cid' => 44));?>">企业文化</a></li>
                            <li><a href="<?php echo U('Intro/intro' ,array('cid' => 45));?>">资质认证</a></li>
                            <li><a href="<?php echo U('Intro/intro' ,array('cid' => 46));?>">人才招聘</a></li>
                            <li><a href="<?php echo U('Intro/intro' ,array('cid' => 47));?>">售后服务</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <h4>经典案例</h4>
                        <ul>
                            <li class="base_nav_active"><a href="<?php echo U('Case/index' ,array('cid' => 36));?>">海洋站建设案例</a></li>
                            <li><a href="<?php echo U('Case/index' ,array('cid' => 37));?>">浮标布放案例</a></li>
                            <li><a href="<?php echo U('Case/index' ,array('cid' => 38));?>">软件服务案例</a></li>
                            <li><a href="<?php echo U('Case/index' ,array('cid' => 39));?>">系统集成案例</a></li>
                            <li><a href="<?php echo U('Case/index' ,array('cid' => 40));?>">警戒标识服务</a></li>
                            <li><a href="<?php echo U('Case/index' ,array('cid' => 41));?>">海洋综合服务案例</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <h4>新闻中心</h4>
                        <ul>
                            <li><a href="<?php echo U('News/index' ,array('cid' => 31));?>">海洋知识</a></li>
                            <li><a href="<?php echo U('News/index' ,array('cid' => 32));?>">公司新闻</a></li>
                            <li><a href="<?php echo U('News/index' ,array('cid' => 33));?>">行业动态</a></li>
                            <li><a href="<?php echo U('Activity' ,array('cid'=>'34'));?>">活动公告</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 footer_right">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h4>广东海启星海洋科技有限公司</h4>
                        <ul>
                            <li><i class="glyphicon glyphicon-print"></i>传真：020-31063753</li>
                            <li><i class="glyphicon glyphicon-envelope"></i>邮箱：hqx@gdhqx.com</li>
                            <li><i class="glyphicon glyphicon-earphone"></i>电话：020-31063753</li>
                            <li>020-31043879</li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <img class="img-responsive" src="/hqx/Public/images/Home/wechat.png"/>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--添加底部底纹-->
    <img src="/hqx/Public/images/Home/footer.png"/>
</footer>