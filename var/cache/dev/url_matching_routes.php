<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/ownerList' => [[['_route' => 'app_main_ownerlist', '_controller' => 'App\\Controller\\MainController::ownerList'], null, null, null, false, false, null]],
        '/factory' => [[['_route' => 'app_main_addfactory', '_controller' => 'App\\Controller\\MainController::addFactory'], null, ['POST' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/factoriesOfOwner/([^/]++)(*:68)'
                .'|/ownersOfFactory/([^/]++)(*:100)'
                .'|/tankersOfFactory/([^/]++)(*:134)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        68 => [[['_route' => 'app_main_companiesofowner', '_controller' => 'App\\Controller\\MainController::companiesOfOwner'], ['ownerId'], null, null, false, true, null]],
        100 => [[['_route' => 'app_main_ownersoffactory', '_controller' => 'App\\Controller\\MainController::ownersOfFactory'], ['factoryId'], null, null, false, true, null]],
        134 => [
            [['_route' => 'app_main_tankersoffactory', '_controller' => 'App\\Controller\\MainController::tankersOfFactory'], ['factoryId'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
