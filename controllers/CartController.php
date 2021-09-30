<?php

class CartController  {

public function actionAdd($id) {
    
    Cart::addProduct($id);
    
    $referrer = $_SERVER['HTTP_REFERER'];
    header("Location: $referrer"); 
    
}

public function actionAddAjax($id) {
    echo Cart::addProduct($id);
    return true;
}


public function actionIndex() {
    $categories = [];
    $categories = Category::GetCategoriesList();
    
    $productsInCart = false;
    
    $productsInCart = Cart::getProducts();
    
    if($productsInCart) {
        $productsIds = array_keys($productsInCart);
        $products = Product::getProductByIds($productsIds);
        
        
        $totalPrice = Cart::getTotalPrice($products);
    }   
    
    require_once(ROOT . '/views/cart/index.php');
    return true;
}

public function actionCheckout(){
    
    
    $categories = array();
    $categories = Category::GetCategoriesList();
    
    $result = false;
    
    if(isset($_POST['submit'])) {
        
        $userName = $_POST['userName'];
        $userPhone = $_POST['userPhone'];
        $userComment = $_POST['userComment'];
        
        $errors = false;
        
        if(!User::checkName($userName)) {
            $errors[] = 'Неправильное имя';
        }
            if(!User::checkPhone($userPhone)) {
            $errors[] = 'Неправильный телефон';
        }
        
        if($errors == false) {
           
            $producstInCart = Cart::getProducts();
            if(User::isGuest()) {
                $usedId = false;
            }else{
                $userId = User::checkLogged();
                
            }
            
            $result = Order::save($userName)
        }
    }
}

        
}

