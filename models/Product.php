<?php

class Product {
    
    const SHOW_BY_DEFAULT = 10;
    
    public static function getLatestProduct() {
        
        
        $pdo = Db::getConnection();
        $productList = array();
        
        $result = $pdo->query('SELECT id, name, price, is_new FROM product where status = 1 ORDER BY id DESC LIMIT 2');
        
        $i = 0;
        
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $productList;
    }
}

