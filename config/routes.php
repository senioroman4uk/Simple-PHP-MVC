<?php
$config['routes'] =
    [
        'post ~^/formHandler$~' => 'MessageController/create',
//        'get ~^/messages/(\d+){0,1}/(\d+){0,1}$~' => 'MessageController/find'
    ];
