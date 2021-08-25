<?php

include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';

class SiteController {
    
    public function ActionView() {
        
        $categories = array();
        $categories = Category::GetCategoriesList();
        
        $latestProduct = array();
        $latestProduct = Product::getLatestProduct(3);
        
        include_once(ROOT . '/views/site/index.php');
        
        return true;       
        
    }
}

