<?php

return [
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    // 'enableStrictParsing' => true,
    'rules' => [
        // правила для передачи пагинации
        'sport-blog/about-sport/<pagination:\d+>'=>'sport-blog/about-sport',
        'sport-blog/body-building/<pagination:\d+>'=>'sport-blog/body-building',
        'sport-blog/all-sport/<pagination:\d+>'=>'sport-blog/all-sport',
        // правила для передачи подСтраницы
        'sport-blog/about-sport/<page:page>/<id:\d+>'=>'sport-blog/about-sport',
        'sport-blog/body-building/<page:page>/<id:\d+>'=>'sport-blog/body-building',
        'sport-blog/all-sport/<page:page>/<id:\d+>'=>'sport-blog/all-sport',
    ],
];
