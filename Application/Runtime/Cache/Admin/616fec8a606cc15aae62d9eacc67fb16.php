<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>C-star</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="/hqx/Public/lib/bootstrap/css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="/hqx/Public/stylesheets/theme.css">
    <link rel="stylesheet" href="/hqx/Public/lib/font-awesome/css/font-awesome.css">

    <script src="/hqx/Public/lib/jquery-1.7.2.min.js" type="text/javascript"></script>
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
            <?php if(is_array($vo['node'])): $i = 0; $__LIST__ = $vo['node'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?><li class="lli"><a href="/hqx/index.php/Admin/<?php echo ($vo["name"]); ?>/<?php echo ($sub["name"]); ?>" name="lii"><?php echo ($sub["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul><?php endforeach; endif; else: echo "" ;endif; ?>
    <!--<ul id="dashboard-menu" class="nav nav-list collapse in">-->
    <!--<li ><a href="/hqx/index.php/Admin/Rbac/addRole">添加角色</a></li>-->
    <!--<li><a href="/hqx/index.php/Admin/Rbac/roleList">角色列表</a></li>-->
    <!--<li ><a href="/hqx/index.php/Admin/Rbac/addNode">添加权限</a></li>-->
    <!--<li ><a href="/hqx/index.php/Admin/Rbac/nodeList">权限管理</a></li>-->
    <!--<li ><a href="/hqx/index.php/Admin/Rbac/addUser">添加用户</a></li>-->
    <!--<li ><a href="/hqx/index.php/Admin/Rbac/userList">用户管理</a></li>-->
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

<script src="/hqx/Public/lib/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript">
    $("[rel=tooltip]").tooltip();
    $(function() {
        $('.demo-cancel-click').click(function(){return false;});
    });
</script>


    <script type="text/javascript" src="/hqx/Public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="/hqx/Public/ueditor/ueditor.all.min.js"></script>
    <script src="/hqx/Public/js/jquery-1.7.2.min.js" type="text/javascript"></script>
    <script src="/hqx/Public/js/ajaxfileupload.js" type="text/javascript"></script>


    <link rel="stylesheet" type="text/css" href="/hqx/Public/css/news_con.css"/>
    <link rel="stylesheet" type="text/css" href="/hqx/Public/css/base.css"/>


    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>上传文章</title>

    <script type="text/javascript">
        $(function () {
           $(document.body).on('change',"#file1",function(){
               ajaxFileUpload();
                 })
            });

        function ajaxFileUpload() {
            var PUBLIC = "/hqx/"+"Uploads/";
            var url = "<?php echo U('Admin/Common/uploadFace');?>";

            $.ajaxFileUpload
            (
                {
                    url: url , //用于文件上传的服务器端请求地址
                    type: 'post',
                    data: { }, //此参数非常严谨，写错一个引号都不行
                    secureuri: false, //一般设置为false
                    fileElementId: 'file1', //文件上传空间的id属性  <input type="file" id="file1" name="file" />
                    dataType: 'json', //返回值类型 一般设置为json
                    success: function (data)  //服务器成功响应处理函数
                    {
                        console.log(data);
                        var imgurl = PUBLIC + data.path.max;
                        if(data.status){
                            $('input[name=max]').val(data.path.max);
//                            $('input[name=medium]').val(data.path.medium);
//                            $('input[name=mini]').val(data.path.mini);
                            $("#img").attr('src',imgurl);
                            alert('上传成功');
                        }else {
                            alert(data.msg);
                        }

                    }

                }
            )
        }

        function checksubmit() {
//            console.log(document.form.content.value);
//            return false;
            if(document.form.cid.value == ''){
                alert('请输入类目');
                document.form.cid.focus();
                return false
            }
            if(document.form.title.value == ''){
                alert('请输入标题');
                document.form.title.focus();
                return false
            }
            if(document.form.content.value == ''){
                alert('请输入内容');
                document.form.content.focus();
                return false
            }
            if(document.form.imgurl.value == ''){
                alert('请输入封面图片');
                document.form.imgurl.focus();
                return false
            }
            return true;
        }

        $(function () {
            var url = "<?php echo U('Admin/Article/preview');?>";
            $("#yulan").click(function () {

                var cid = $(".cid").val();
                var title = $("input[name = 'title']").val();
                var author = $("input[name = 'author']").val();
                var brief = $("textarea[name = 'brief']").val();
                var content = $("textarea[name = 'content']").val();
                var max = $("input[name = 'max']").val();


                $.ajax({
                    type:"post",
                    url:url,
                    dataType:"json",
                    data:{
                            cid:cid,
                            title:title,
                            author:author,
                            brief:brief,
                            content:content,
                            max:max
                    },
                    beforeSend:function () {
                        $(".well").fadeOut();
                    },
                    success:function (data) {

                        $(".news_con_html_con").fadeIn();
                        $(".news_con_html_con .h4").html(data.title);
                        $(".news_con_html_con .small").html('作者：' + data.author + '&nbsp&nbsp&nbsp&nbsp来源：广东海启星海洋科技有限公司&nbsp&nbsp&nbsp&nbsp日期：' +data.time);
                        $(".news_con_html_con .news_con_html_essay").html(data.content);
                    }
                })
            });

            $("input[name = 'back']").click(function () {
                $(".news_con_html_con").fadeOut();
                $(".well").fadeIn();
            })
        })

//        $(function () {
//            var url = "<?php echo U('Admin/Article/Ajax');?>";
//            $("#btn").click(function () {
//                var params = $('form').serialize();
//                console.log(params);
//                //return false;
//                $.ajax({
//                    type:"post",
//                    url:url,
//                    dataType:"json",
//                    data: params,
//                    beforeSend:function () {
//                        if(!$("#title").val()){
//                            alert('请输入标题');
//                           // $("#title").select();
//                            return false;
//                        }
//                        if(!$("#content").val()){
//                            alert('请输入文章内容');
//                            return false;
//                        }
//                        return true;
//                    },
//                    success:function(msg){
//                        console.log(msg);
//                    }
//                })
//            })
//        })
    </script>
    <script type="text/javascript">
        window.UEDITOR_HOME_URL = '/hqx/Public/ueditor/';
        window.onload = function (){
            window.UEDITOR_CONFIG.initialFrameHeight = 600;
            window.UEDITOR_CONFIG.initialFrameWidth = 950;

            UE.getEditor('content');
        }
    </script>

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="well">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#home" data-toggle="tab">Profile</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane active in" id="home">
                            <form action="<?php echo U('Admin/Article/addArticleHandle');?>" method="post" id="form" name="form" onsubmit="return checksubmit()">
                            <table>
                                <tr>
                                    <th colspan="2">文章发布</th>
                                </tr>
                                <tr>
                                    <td align="right" width="10%">所属分类：</td>
                                    <td>
                                        <select name="cid" class="cid">
                                            <option value="">====请选择分类====</option>
                                            <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["html"]); ?>|<?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">标题：</td>
                                    <td>
                                        <input type="text" name="title" id="title">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" >发布时间：</td>
                                    <td>
                                        <input type="text" name="addtime" id="addtime" placeholder="时间格式Y-m-d H:i:s">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">作者：</td>
                                    <td>
                                        <input type="text" name="author" id="author">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">简介：</td>
                                    <td>
                                        <textarea name="brief" id="brief" style="width: 500px; height: 150px;"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <textarea  cols="45" name="content" id="content"></textarea>
                                    </td>
                                </tr>

                                <tr style="height: 200px" >
                                        <td>
                                            <p>封面图片：<input type="file" id="file1" name="file" /></p>
                                            <input type="hidden" value="" name="max" id="max">
                                            <input type="hidden" value="" name="medium" id="medium">
                                            <input type="hidden" value="" name="mini" id="mini">
                                        </td>
                                        <td>
                                            <img id="img" src="/hqx/Public/images/noface.gif" style="border:solid 1px #000;width:300px;height:200px">
                                        </td>
                                </tr>
                            </table>
                                <br/><br/>
                                <input type="submit" value="保存" class="btn btn-primary" style="align-content:center" id="btn">
                                <input type="button" value="预览" class="btn btn-primary" style="align-content:center" id="yulan">
                            </form>
                        </div>
                    </div>
                </div>

                <div class="news_con_html_con" hidden style="width: 950px">
                    <h4 class="h4"></h4>
                    <i class="active_this set_width"></i>
                    <small class="small"></small>
                    <div class="news_con_html_essay">
                        <p></p>
                    </div>
                    <div style="height: 100px"></div>
                    <input type="button" value="返回文章编辑" class="btn btn-primary" style="align-content:center" id="back" name="back">
                    <div style="height: 100px"></div>
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