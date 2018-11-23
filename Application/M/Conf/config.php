<?php
return array(
	//'配置项'=>'配置值'
	'TMPL_TEMPLATE_SUFFIX'  =>  '.htm',     // 默认模板文件后缀
	//缓存配置
	'HTML_CACHE_ON'     =>    false, // 开启静态缓存
	'HTML_CACHE_TIME'   =>    60,   // 全局静态缓存有效期（秒）
	'HTML_FILE_SUFFIX'  =>    '.html', // 设置静态缓存文件后缀
	'HTML_CACHE_RULES'  =>     array( 
		'index:index'=>'index',
		'category:index'=>'category/category_{id}',
		'goods:index'=>'goods/goods_{id}',
	 ),
	'DATA_CRYPT_TYPE'=>'Des',
	'DES_KEY'=>'4654654164586',
    'SESSION_OPTIONS'         =>  array(
        'name'                =>  'car1',                    //设置session名
        'expire'              =>  99999,                      //SESSION过期时间，单位秒
        'use_trans_sid'       =>  1,                               //跨页传递
        'use_only_cookies'    =>  0,                               //是否只开启基于cookies的session的会话方式
    ),
);