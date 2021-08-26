<?php

Class Category
{
public static function GetCategoriesList() {

    $pdo = Db::getConnection();
    $categoryList = array();
    
    $result = $pdo->query('SELECT id, name FROM category ORDER BY sort_order ASC');
    
    $i=0;
    
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $categoryList[$i]['id'] = $row['id'];
        $categoryList[$i]['name'] = $row['name'];
        $i++;
    }
    return $categoryList;
  
}
}