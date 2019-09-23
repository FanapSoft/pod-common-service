<?php
return [
    'getGuildList' => [
        'baseUri' => 'PLATFORM-ADDRESS',
        'subUri' => 'nzh/guildList',
        'method' => 'GET'
    ],

    'getCurrencyList' => [
        'baseUri'   => 'PLATFORM-ADDRESS',
        'subUri'    => 'nzh/currencyList',
        'method'    => 'GET'
    ],

    'getOtt' => [
        'baseUri'   =>  'PLATFORM-ADDRESS',
        'subUri'    =>  'nzh/ott',
        'method'    =>  'GET'
    ],

    'addTagTreeCategory' => [
        'baseUri' => 'PLATFORM-ADDRESS',
        'subUri' => 'nzh/biz/addTagTreeCategory',
        'method' => 'POST'
    ],

    'getTagTreeCategoryList' => [
        'baseUri' => 'PLATFORM-ADDRESS',
        'subUri' => 'nzh/biz/getTagTreeCategoryList',
        'method' => 'GET'
    ],

    'updateTagTreeCategory' => [
        'baseUri' => 'PLATFORM-ADDRESS',
        'subUri' => 'nzh/biz/updateTagTreeCategory',
        'method' => 'PUT'
    ],

    'addTagTree' => [
        'baseUri' => 'PLATFORM-ADDRESS',
        'subUri' => 'nzh/biz/addTagTree',
        'method' => 'POST'
    ],

    'getTagTreeList' => [
        'baseUri' => 'PLATFORM-ADDRESS',
        'subUri' => 'nzh/biz/getTagTreeList',
        'method' => 'GET'
    ],

    'updateTagTree' => [
        'baseUri' => 'PLATFORM-ADDRESS',
        'subUri' => 'nzh/biz/updateTagTree',
        'method' => 'POST'
    ],
];