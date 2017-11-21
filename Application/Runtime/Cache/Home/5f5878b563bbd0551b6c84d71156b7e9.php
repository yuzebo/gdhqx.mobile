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


	<title>广东海启星海洋科技有限公司</title>
	<!--<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>-->
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/hqx/Public/css/base.css"/>
	<link rel="stylesheet" type="text/css" href="/hqx/Public/css/index.css"/>
	<link rel="stylesheet" type="text/css" href="/hqx/Public/css/animate.min.css"/>


	<script src="/hqx/Public/js/jquery-1.9.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/hqx/Public/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/hqx/Public/js/base.js" type="text/javascript" charset="utf-8"></script>
	<script src="/hqx/Public/js/index.js"></script>
	<script src="/hqx/Public/js/wow.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
        new WOW().init();
	</script>
	<script>
        $(function () {
            $('.news_left_con :first').attr('class', 'news_left_con news_left_con1');
            $('.news_right_con li:eq(1)').attr('class' , 'op1');
            $('.news_right_con li:eq(2)').attr('class' , 'op8');
            $('.news_right_con li:eq(3)').attr('class' , 'op5');
        })
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





<div id="myCarousel" class="carousel slide">
	<!-- 轮播（Carousel）指标 -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>
	<!-- 轮播（Carousel）项目 -->
	<div class="carousel-inner">
		<div class="item active">
			<a href="http://www.gdhqx.com/index.php/Home/Five/showFive/id/82/cid/8"><img src="/hqx/Public/images/Home/1.jpg" alt="First slide"></a>
		</div>
		<div class="item">
			<a href="http://www.gdhqx.com/index.php/Home/Five/showFive/id/71/cid/9"><img src="/hqx/Public/images/Home/2.jpg" alt="Second slide"></a>
		</div>
		<div class="item">
			<a href="http://www.gdhqx.com/index.php/Home/Five/showFive/id/83/cid/10"><img src="/hqx/Public/images/Home/3.jpg" alt="Third slide"></a>
		</div>
	</div>
	<!-- 轮播（Carousel）导航 -->
	<a class="carousel-control left" href="#myCarousel"
	   data-slide="prev"></a>
	<a class="carousel-control right" href="#myCarousel"
	   data-slide="next"></a>
</div>

<!--五大领域-->
<div class="five">
	<div class="container">
		<div class="five_top">
			<ul id="five_top_ul">
				<li class="wow fadeInUp" data-wow-delay="0.5s">
					<a href="<?php echo U('Five/object', array('cid' => 2));?>">基础领域</a>
				</li>
				<li class="wow fadeInUp" data-wow-delay="0.75s">
					<a href="<?php echo U('Five/object', array('cid' => 3));?>">主体领域</a>
				</li>
				<li class="wow fadeInUp" data-wow-delay="1s">
					<a href="<?php echo U('Five/object', array('cid' => 4));?>">核心领域</a>
				</li>
				<li class="wow fadeInUp" data-wow-delay="1.25s">
					<a href="<?php echo U('Five/object', array('cid' => 6));?>">前沿领域</a>
				</li>
				<li class="wow fadeInUp" data-wow-delay="1.5s">
					<a href="<?php echo U('Five/object', array('cid' => 5));?>">提升领域</a>
				</li>
			</ul>
		</div>
	</div>

	<!--2017-10-24修改第一个P标签显示隐藏-->
	<div class="five_bottom" id="five_bottom">
		<div class="container">
			<span><?php echo ($info[2]); ?></span>
			<span><?php echo ($info[0]); ?></span>
			<span><?php echo ($info[1]); ?></span>
			<span><?php echo ($info[3]); ?></span>
			<span><?php echo ($info[4]); ?></span>
		</div>
	</div>
</div>


<!--新闻版块-->
	<div class="news">
		<div class="container">
			<div class="news_left wow fadeInUp">
				<h3 class="tit">新闻资讯<i class="active_this set_width"></i></h3>
				<?php if(is_array($left)): foreach($left as $key=>$vo): ?><div class="news_left_con">
						<div class="news_left_text">
							<p style="overflow: hidden;text-overflow:ellipsis;"><?php echo ($vo["brief"]); ?></p>
						</div>
						<div class="news_left_img">
							<img style="width: 240px;height: 180px;" src="/hqx/Uploads/Face/<?php echo ($vo["max"]); ?>"/>
						</div>
					</div><?php endforeach; endif; ?>
			</div>
			<div class="news_right">
				<ul id="news_right_con">
					<li></li>
					<li></li>
					<?php if(is_array($result)): foreach($result as $key=>$vo): ?><li><a href="<?php echo U('showNews', array('id' => $vo['id'] , 'cid' => $vo['cid']));?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; ?>
				</ul>
			</div>
		</div>
	</div>

<!--公司文化版块-->
<div class="about">
	<div class="container">
		<div class="about_con" style="display: block;">
			<h3 class="tit">公司简介<i class="active_this set_width"></i></h3>
			<div style="margin-top: 70px;">
				<div class="about_con_left">
					<i class="about_square1"></i>
					<i class="about_square2"></i>
					<div class="about_con_img">
						<img src="/hqx/Public/images/Home/index_intro.png"/>
					</div>
				</div>
				<div class="about_con_right">
					<div class="about_con_text">
						<h3>公司简介</h3>
						<p><?php echo ($info[5]); ?></p>
					</div>
				</div>
			</div>
		</div>
		
		
		
		<div class="about_con" style="display: none;">
			<h3 class="tit">企业文化<i class="active_this set_width"></i></h3>
			<div style="margin-top: 70px;">
				<div class="about_con_left">
					<i class="about_square1"></i>
					<i class="about_square2"></i>
					<div class="about_con_img">
						<img src="/hqx/Public/images/Home/mazu.png"/>
					</div>
				</div>
				<div class="about_con_right">
					<div class="about_con_text">
						<h3>企业文化</h3>
						<p><?php echo ($info[6]); ?></p>
					</div>
				</div>
			</div>
		</div>
		
		
		<ul class="about_con_stria">
			<li class="about_con_stria_li"></li>
			<li class="about_con_stria_li"></li>
			<li></li>
		</ul>
		
		<!--<div class="about_con">
			<h3 class="tit">公司简介<i class="active_this set_width"></i></h3>
			<div style="margin-top: 70px;">
				<div class="about_con_left">
					<i class="about_square1"></i>
					<i class="about_square2"></i>
					<div class="about_con_img">
						<img src="images/mazu1.jpg"/>
					</div>
					<h4>Sea star</h4>
				</div>
				<div class="about_con_right">
					<div class="about_con_text">
						<h3>公司简介</h3>
						<p>广东海启星海洋科技有限公司，现入驻国家级创新基地广州清华科技园。<br /><br />公司秉承发展海洋经济，建设海洋强国战略，立足广东省区域优势，与中科院、国家级技术中心、科研院所等达成合作关系，共同致力于海洋科技创新应用。主要承担：海洋装备及观测技术服务、相关基础设施建设和维护项目；<br /><br />重点开展拥有自主知识产权的海洋信息化专题系统建设，提供智慧海洋与城市、涉海产业大数据应用解 决方案；提供海洋综合业务技术服务、海洋技术培训、咨询和特殊岗位购买服务；开展海洋装备、专业仪器的研发、销售与技术支持，努力打造海洋科技转化和成果应用和综合实力国内领先的“双创”实体。</p>
					</div>
				</div>
			</div>
		</div>
		
		<div class="about_con">
			<h3 class="tit">关于我们<i class="active_this set_width"></i></h3>
			<div style="margin-top: 70px;">
				<div class="about_con_left">
					<i class="about_square1"></i>
					<i class="about_square2"></i>
					<div class="about_con_img">
						<img src="images/mazu1.jpg"/>
					</div>
					<h4>Sea star</h4>
				</div>
				<div class="about_con_right">
					<div class="about_con_text">
						<h3>关于我们</h3>
						<p>广东海启星海洋科技有限公司，现入驻国家级创新基地广州清华科技园。<br /><br />公司秉承发展海洋经济，建设海洋强国战略，立足广东省区域优势，与中科院、国家级技术中心、科研院所等达成合作关系，共同致力于海洋科技创新应用。主要承担：海洋装备及观测技术服务、相关基础设施建设和维护项目；<br /><br />重点开展拥有自主知识产权的海洋信息化专题系统建设，提供智慧海洋与城市、涉海产业大数据应用解 决方案；提供海洋综合业务技术服务、海洋技术培训、咨询和特殊岗位购买服务；开展海洋装备、专业仪器的研发、销售与技术支持，努力打造海洋科技转化和成果应用和综合实力国内领先的“双创”实体。</p>
					</div>
				</div>
			</div>
		</div>-->
		<!--<ul>
			<li></li>
			<li></li>
			<li></li>
		</ul>
		<i class="about_nav"></i>-->
	</div>
</div>

<!--合作伙伴-->
<div class="partner">
	<div class="container">
		<h3 class="tit">合作伙伴<i class="active_this set_width"></i></h3>
		<div class="partner_con">
			<!--<ul>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>-->
			<span class="partner_con_left glyphicon glyphicon-chevron-left" id="partner_con_left"></span>
			<div class="partner_con_wrapimg">
				<div class="partner_con_img" id="partner_con_img">
					<img src="/hqx/Public/images/Home/partner1.jpg"/>
					<img src="/hqx/Public/images/Home/partner2.jpg"/>
					<img src="/hqx/Public/images/Home/partner3.jpg"/>
				</div>
			</div>
			<span class="partner_con_right glyphicon glyphicon-chevron-right" id="partner_con_right"></span>
		</div>









	</div>
</div>



<!--底部三色条-->
<ul class="footer_logo_color">
	<li></li>
	<li></li>
	<li></li>
</ul>


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