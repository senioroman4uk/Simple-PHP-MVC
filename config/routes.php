<?php
$config['routes'] =
    [
        'post ~^/formHandler$~' => 'MessageController/create',
//        'get ~^/messages$~' => 'MessageController/find',
        'get ~^/news/(\d+)$~' => 'NewsController/findOne'
    ];
