<?php
$config['routes'] =
    [
        'post ~^/formHandler$~' => 'MessageController/create',
        'get ~^/messages$~' => 'MessageController/find'
    ];
