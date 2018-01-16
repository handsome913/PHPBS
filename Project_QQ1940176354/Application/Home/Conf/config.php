<?php
return array(
    'DB_NAME'   =>  'Project_QQ1940176354',          // 数据库名
    'DB_PREFIX' => 't_',
    'DB_TYPE'   => 'mysql',
    'DB_HOST'   => '114.215.141.131',
    'DB_USER'   => 'root',
    'DB_PWD'    => 'root',
    'DB_PORT'   => 3306,
    'TMPL_TEMPLATE_SUFFIX' => '.php',
    'SHOW_PAGE_TRACE' =>false,
    'PAGE_TRACE_SAVE' => array('debug'),
    'SESSION_OPTIONS'         =>  array(
        'name'                 =>  'Project_QQ1940176354', //设置session名
        'expire'               =>  24*3600*3,  //SESSION保存3天
        'use_trans_sid'       =>  1,        //跨页传递
        'use_only_cookies'    =>  0     //是否只开启基于cookies的session的会话方式
    )
);