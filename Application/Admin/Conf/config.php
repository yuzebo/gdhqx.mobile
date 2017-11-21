<?php
return array(
	//'配置项'=>'配置值'
    'DB_TYPE'   => 'mysql',         // 数据库类型我们是mysql，就对于的是mysql
    'DB_HOST'   => '127.0.0.1',   // 服务器地址，就是我们配置好的php服务器地址，也可以使用localhost，
    'DB_NAME'   => 'rbac',  // 数据库名：mysq创建的要连接我们项目的数据库名称
    'DB_USER'   => 'root',           // 用户名：mysql数据库的名称
    'DB_PWD'    => '',                 //mysql数据库的 密码
    'DB_PORT'   => 3306,            // 端口服务端口一般选3306
    'URL_HTML_SUFFIX'=>'',
    'DB_PREFIX' => 'think_',            //  数据库表前缀
    'DB_CHARSET'=> 'utf8',         // 字符集
    'DB_DEBUG'  =>  TRUE,         // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增
   // 'SHOW_PAGE_TRACE' => true,//显示页面Trace信息
    'URL_CASE_INSENSITIVE' => true,//URL访问不区分大小写

    //RBAC认证配置信息
     'RBAC_SUPERADMIN' =>'admin',//超级管理员，对应用户表中某一用户名-username
     'ADMIN_AUTH_KEY' =>'superadmin',//超级管理员识别

     'USER_AUTH_ON' => true, //是否需要认证
     'USER_AUTH_TYPE' => 1, //认证类型 1为登入之后认证 2为实时认证
     'USER_AUTH_KEY' => 'authid', //认证识别号,此名称可以自己取
     // 'REQUIRE_AUTH_MODULE'=>  //需要认证模块
     'NOT_AUTH_MODULE' => 'Index,Exit',//无需认证模块
     'NOT_AUTH_ACTION' => 'addRoleHandle',//无需认证方法
     //'USER_AUTH_GATEWAY' => //认证网关
     //'RBAC_DB_DSN' => '', //数据库连接DSN,公用的,此处省略
     'RBAC_ROLE_TABLE' => 'think_role',//角色表名称
     'RBAC_USER_TABLE' => 'think_role_user',//用户表名称
     'RBAC_ACCESS_TABLE' => 'think_access',//权限表名称
     'RBAC_NODE_TABLE' => 'think_node',//节点表名称

     //用于一位或加密的KEY值
     'ENCTYPTION_KEY' => 'boqingbo',
     //自动登入时间
     'AUTO_LOGIN_TIME' => time() + 3600 * 24 * 7

);