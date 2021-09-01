<?php



class SiteController {
    
    public function ActionView() {
        
        $categories = array();
        $categories = Category::GetCategoriesList(); 
        
        $latestProduct = array();
        $latestProduct = Product::getLatestProduct(20);
        
        require_once(ROOT . '/views/site/index.php');
        
        return true;       
        
    }
}

