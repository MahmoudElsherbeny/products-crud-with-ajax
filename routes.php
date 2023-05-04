<?php

use App\Classes\ProductsClass;
use App\Core\Router;

/*
|--------------------------------------------------------------------------
| Url Routes
|--------------------------------------------------------------------------
|
| Here is where you can register url routes for your application. 
|
*/

$productClass = new ProductsClass();

Router::run($_SERVER['REQUEST_URI'], [

    '/' => function () use ($productClass) {
        return $productClass->list();
    },

    '/add-product' => function () use ($productClass) {
        return $productClass->create();
    },

    '/add-product/store' => function () use ($productClass) {
        return $productClass->store();
    },

    '/delete-products' => function () use ($productClass) {
        return $productClass->delete_multiple();
    },

]);
