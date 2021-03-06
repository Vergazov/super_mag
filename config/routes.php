<?php
return array(
    'super_mag/category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'super_mag/category/([0-9]+)' => 'catalog/category/$1',
    'super_mag/catalog' => 'catalog/view',
    'super_mag/product/([0-9]+)' => 'product/list/$1',
    'super_mag' => 'site/view',
    'super_mag/user/register' => 'user/register',
    'super_mag/cabinet' => 'cabinet/index',
    'super_mag/user/login' => 'user/login',
    'super_mag/user/logout' => 'user/logout',
    'super_mag/cabinet/edit' => 'cabinet/edit',
    'super_mag/cart/add/([0-9]+)' => 'cart/add/$1',
    'super_mag/cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',
    'super_mag/cart' => 'cart/index',
);
