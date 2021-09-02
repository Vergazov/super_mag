<?php

class UserController {
    
    public function actionRegister() {
        
        $name = '';
        $email = '';
        $password = '';
        $result = false;
        
        if(isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $errors = false;
            
            if(!User::checkName($name)) {
                $errors[] = 'Имя должно содержать не менее 2-х символов'; 
            }       
        
            if(!User::checkPassword($password)) {
                $errors[] = 'Пароль должен содержать как минимум 6 символов';
            }
        
            if(!User::checkEmail($email)) {
                $errors[] = 'Неверный Email';
            }
            
            if(User::checkEmailExists($email)) {
                $errors[] = 'Такой Email уже используется';
            }
            
            if($errors == false) {
                $result = User::register($name,$email,$password);
            }
        }

        
     
        require_once(ROOT . '/views/user/register.php');
        
        return true;
  
    }
    
    public function actionLogin() {
        
    } 
}

