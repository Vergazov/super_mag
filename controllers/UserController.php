<?php

class UserController {
    
    public function actionRegister() {
        
        $name = '';
        $email = '';
        $password = '';
        
        if(isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $errors = false;
            
            if(User::checkName($name)) {
                echo '<br>Name ok!';
            }
            else $errors[] = 'Имя должно содержать не менее 2-х символов';       
        
            if(User::checkName($email)) {
                echo '<br>Email ok!';
            }
            else $errors[] = 'Неправильынй email';
        }
            if(User::checkName($password)) {
                echo '<br>password ok!';
            }
            else $errors[] = 'Пароль должен содержать как минимум 6 символов';
        }
}
        
        
        require_once(ROOT . '/views/user/register.php');
        
        return true;
    }
}

