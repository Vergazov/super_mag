<?php

class ProductController {
    
    public function ActionList($productId) {
        
        $categories = array();
        $categories = Category::GetCategoriesList(); 
        
        $product = Product::getProductById($productId);
        
        include_once(ROOT . '/views/product/view.php');
        return true;
    }
}


