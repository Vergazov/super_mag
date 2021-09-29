<?php


class CatalogController {
    
    public function ActionView() {
        
        $categories = array();
        $categories = Category::GetCategoriesList(); 
        
        $latestProduct = array();
        $latestProduct = Product::getLatestProduct(8);
        
        require_once(ROOT . '/views/catalog/index.php');
       
        
        return true;       
        
    }
    
    public function ActionCategory($categoryId, $page=1) {
        
//       echo $categoryId, '<br>' ;
//       echo $page;
        
           
//            print_r($_SESSION['products']);
  
        
        
        $categories = array();
        $categories = Category::GetCategoriesList();
        
        $categoryProducts = array();
        $categoryProducts = Product::getProductListByCategory($categoryId,$page);
        
        $total = Product::getTotalProductInCategory($categoryId);
        
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');
        
        require_once(ROOT . '/views/catalog/category.php');
        
        return true;
    }
}

