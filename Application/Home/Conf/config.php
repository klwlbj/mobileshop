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
);