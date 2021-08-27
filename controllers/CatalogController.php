<?php


include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';


class CatalogController {
    
    public function ActionView() {
        
        $categories = array();
        $categories = Category::GetCategoriesList(); 
        
        $latestProduct = array();
        $latestProduct = Product::getLatestProduct(8);
        
        require_once(ROOT . '/views/catalog/index.php');
        
        return true;       
        
    }
    
    public function ActionCategory($categoryId) {
        
        $categories = array();
        $categories = Category::GetCategoriesList();
        
        $categoryProducts = array();
        $categoryProducts = Product::getProductListByCategory($categoryId,5);
        
        require_once(ROOT . '/views/catalog/category.php');
    }
}

