<?php

class Product {    

    const SHOW_BY_DEFAULT = 10;
    
    public static function getLatestProduct($count = self::SHOW_BY_DEFAULT) {
        
        $count = intval($count);
        
        $pdo = Db::getConnection();
        
        $productList = array();
        
        $result = $pdo->query("SELECT id, name, price, image, is_new FROM product where status = 1 ORDER BY id DESC LIMIT $count");
        
        $i = 0;
        
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['image'] = $row['image'];
            $productList[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        
        return $productList;
    }
    
    public static function getProductListByCategory($categoryId,$count1 = self::SHOW_BY_DEFAULT) {
        
          
  
        
        if($categoryId) {
            
            
            $pdo = Db::getConnection();
            
            $products = array();
            $result = $pdo->query("SELECT id,name,price,image,is_new FROM product where status = 1 "
                    . "AND category_id = $categoryId[0] "
                    . "ORDER BY id DESC "
                    . "LIMIT $count1 " );
            $i=0;
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $products[$i]['id'] = $row['id'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['price'] = $row['price'];
                $products[$i]['image'] = $row['image'];
                $products[$i]['is_new'] = $row['is_new'];
                $i++;
            }
            return $products;
        }        
    }
    
    public static function getProductById($id) {
        
        
        print_r($id);
        
        
        
        if($id) {
            $pdo = Db::getConnection();
            
            $result = $pdo->query("SELECT * FROM product WHERE id = $id[0]");
            return $result->fetch(PDO::FETCH_ASSOC);
            
            
        }              
    }
}

