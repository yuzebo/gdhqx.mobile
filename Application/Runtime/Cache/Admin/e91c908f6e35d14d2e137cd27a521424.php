<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>C-star</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="/Public/lib/bootstrap/css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="/Public/stylesheets/theme.css">
    <link rel="stylesheet" href="/Public/lib/font-awesome/css/font-awesome.css">

    <script src="/Public/lib/jquery-1.7.2.min.js" type="text/javascript"></script>
    <script>
        $(function(){

            var url = window.location.pathname;
            console.log(url);
            $('.lli').each(function(i,v){
                var m_url =  $(this).children('a').attr('href');
                if(url.indexOf(m_url) >-1){
                    $(this).parent('ul').show();
                    $(this).addClass('ss');
                }
            });

            $('.nav-header').click(function(){
                //  alert($(this).hasClass('cur'));
                if(!$(this).hasClass('cur')){
                    $(this).addClass('cur');
                    $(this).next('ul').slideDown();
                }
                else{
                    $(this).removeClass('cur');
                    $(this).next('ul').slideUp();
                }
            });

        })
    </script>

    <!-- Demo page code -->

    <style type="text/css">
        .ss{opacity:0.3}
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
</head>

<!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
<!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
<!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
<!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<body class="">
<!--<![endif]-->

<div class="navbar">
    <div class="navbar-inner">
        <ul class="nav pull-right">

            <li><a href="#" class="hidden-phone visible-tablet visible-desktop" role="button">Settings</a></li>
            <li id="fat-menu" class="dropdown">
                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown" >
                    <i class="icon-user"></i>
                    <i class="icon-caret-down"></i><?php echo $_SESSION['username'];?>
                </a>

                <ul class="dropdown-menu">
                    <li><a tabindex="-1" href="#">My Account</a></li>
                    <li class="divider"></li>
                    <li><a tabindex="-1" class="visible-phone" href="#">Settings</a></li>
                    <li class="divider visible-phone"></li>
                    <li><a tabindex="-1" href="<?php echo U('Admin/Exit/index');?>">Logout</a></li>
                </ul>
            </li>

        </ul>
        <a class="brand" href="index.html"><span class="first">Your</span> <span class="second">Company</span></a>
    </div>
</div>
<div class="copyrights">Collect from <a href="http://www.cssmoban.com/"  title="网站模板">后台管理</a></div>
<div class="sidebar-nav">
    <form class="search form-inline">
        <input type="text" placeholder="Search...">
    </form>
    <?php if(is_array($node1)): $i = 0; $__LIST__ = $node1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i><?php echo ($vo["title"]); ?></a>
        <ul id="dashboard-menu1" class="nav nav-list collapse in" style="display: none">
            <?php if(is_array($vo['node'])): $i = 0; $__LIST__ = $vo['node'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?><li class="lli"><a href="/index.php/Admin/<?php echo ($vo["name"]); ?>/<?php echo ($sub["name"]); ?>" name="lii"><?php echo ($sub["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul><?php endforeach; endif; else: echo "" ;endif; ?>
    <!--<ul id="dashboard-menu" class="nav nav-list collapse in">-->
    <!--<li ><a href="/index.php/Admin/Rbac/addRole">添加角色</a></li>-->
    <!--<li><a href="/index.php/Admin/Rbac/roleList">角色列表</a></li>-->
    <!--<li ><a href="/index.php/Admin/Rbac/addNode">添加权限</a></li>-->
    <!--<li ><a href="/index.php/Admin/Rbac/nodeList">权限管理</a></li>-->
    <!--<li ><a href="/index.php/Admin/Rbac/addUser">添加用户</a></li>-->
    <!--<li ><a href="/index.php/Admin/Rbac/userList">用户管理</a></li>-->
    <!--</ul>-->

</div>
<div class="content">

    <div class="header">

        <h1 class="page-title"><?php echo ($info["title"]); ?></h1>
    </div>

    <ul class="breadcrumb">
        <?php if(is_array($breadcrumb)): foreach($breadcrumb as $key=>$vo): ?><li><span class="active"><?php echo ($vo["name"]); ?>/</span></li>
            <!--<li class="active">Users</li>--><?php endforeach; endif; ?>
    </ul>

<script src="/Public/lib/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript">
    $("[rel=tooltip]").tooltip();
    $(function() {
        $('.demo-cancel-click').click(function(){return false;});
    });
</script>




    <link rel="stylesheet" type="text/css" href="/Public/css/Home/page.css">
    <script src="/Public/js/jquery-1.7.2.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $("select#cid").change(function () {
                var cid = $("select#cid").val();
                // var param = $("select#cid").serialize();
                var url = "<?php echo U('Admin/Article/articleList');?>";
                window.location.href = url + '?cid=' +cid;
            })
        })
    </script>

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="well">
                    <table class="table mytable">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th style="width: 150px;">文章标题</th>
                            <th style="width: 1000px;">文章内容</th>
                            <th>操作</th>
                            <th style="width: 26px;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($brief)): $i = 0; $__LIST__ = $brief;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <td><?php echo ($vo["id"]); ?></td>
                                <td><?php echo ($vo["name"]); ?></td>
                                <td><?php echo (mb_substr($vo["content"],0,200,utf8)); ?></td>
                                <td>
                                    <a href="<?php echo U('Article/updateBrief',array('brief_id'=>$vo['id']));?>"><i class="icon-pencil"></i></a>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="pagination">
                    <ul>
                        <li><div class="pages" id="article"><?php echo ($page); ?></div></li>
                    </ul>
                </div>

                <div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 id="myModalLabel">Delete Confirmation</h3>
                    </div>
                    <div class="modal-body">
                        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                        <button class="btn btn-danger" data-dismiss="modal">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>




    </body>
    </html>