<?php
$config['routes'] =
    [
        'get ~^/$~' => 'StaticController/index',
        'get ~^/contact$~' => 'StaticController/contact',
        'get ~^/politics$~' => 'StaticController/politics',
        'get ~^/sport$~' => 'StaticController/sport',
        'get ~^/country$~' => 'StaticController/country',
        'post ~^/formHandler$~' => 'MessageController/create',
    ];
