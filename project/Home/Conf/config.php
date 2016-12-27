<?php
return array(
    //'配置项'=>'配置值'

    'URL_ROUTE_RULES' => array(
        'user_info/' => array('UserInfo/read', '', array('method' => 'get')),
        'user_info/:id' => array('UserInfo/update', '', array('method' => 'put')),
        'user_info/add' => array('UserInfo/add', '', array('method' => 'post')),
    ),
);