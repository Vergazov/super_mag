<?php

class User {
      
        public static function checkName($name) {
            if(strlen($name) >=2) {
            return true;
            }
            return false;
        }
        
        public static function checkPassword($password) {
            if(strlen($password) >=6) {
            return true;
            }
            return false;
        }
        
                public static function checkEmail($email) {
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
            }
            return false;
        }
        
        public static function checkEmailExists($email) {
            $pdo = Db::getConnection();
            
            $sql = 'SELECT * FROM user where email = :email';
            $params = [':email' => $email];
            $result = $pdo->prepare($sql);
            $result->execute($params);
            
            if($result->fetch()){
                return true;
            }
            else return false;
            
            
        }
        
         public static function register($name, $email, $password) {
             
             $pdo = Db::getConnection();
             
             $sql = 'INSERT INTO user(name,email,password) values(:name, :email, :password)';
             
             $params = [':name' => $name,':email' => $email,':password' => $password];
             $result = $pdo->prepare($sql);
             $result->execute($params);
             
             return $result->execute();
             
         }
         
         public static function checkUserData($email,$password) {
             
             $pdo = Db::getConnection();
             
             $sql = 'SELECT * from user where email = :email AND password = :password';
             
             $params = [':email' => $email, ':password' => $password];
             $result = $pdo->prepare($sql);
             $result->execute($params);
             
             $user = $result->fetch(PDO::FETCH_ASSOC);
             if($user) {
                 return $user['id'];  
             }
             return false;             
             
         }
         
         public static function auth($userId){
                 
             
             
             $_SESSION['user'] = $userId;
             }
          
         public static function checkLogged(){
             
             
             if(isset($_SESSION['user'])){
                 return$_SESSION['user'];
             }
             header("Location: /super_mag/user/login");
         }
         
         public static function isGuest(){
             
             
             if(isset($_SESSION['user'])){
                 return false;
             }
             return true;
             
         }
                 
         
         
    
    }


