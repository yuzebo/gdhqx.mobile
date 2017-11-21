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
        'DB_DEBUG'  =>  false,         // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增
        'SHOW_PAGE_TRACE' => false, //显示页面Trace信息
        'URL_ROUTER_ON' => true,
        'URL_ROUTE_RULES'=>array(
            'index.html'=> 'Index/index',
        ),
);