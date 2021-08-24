 <?php

 class Router {
     private $routes;
     
     public function __construct() {
        return $this->routes = require_once( ROOT . '/config/routes.php');
     }
     
     private function getUri() {
         if(!empty($_SERVER['REQUEST_URI'])) {
             return trim($_SERVER['REQUEST_URI'],'/');
         }
     }
     
     public function run() {
         $uri = $this->getUri();  
//         print_r($uri);
         
         foreach ($this->routes as $key => $value) {
//             echo '<br>', $key;
             if(preg_match("~$key~", $uri)){
                $internalRoute = preg_replace("~$key~", $value , $uri);
                
//              echo '<pre>';
//              print_r($internalRoute);
                
                $segments = explode('/', $internalRoute);
                
              echo '<pre>';
              print_r($segments);
                
                $controller = ucfirst(array_shift($segments)) . 'Controller';
                
//                echo '<pre>';
//                print_r($controller);
                
                $action = 'Action' . ucfirst(array_shift($segments));
                
//                echo '<pre>';
//                print_r($action);
                
                $parameters = $segments;
                
//                 echo '<pre>';
//                 print_r($parameters);
                
                $controllerFile = ROOT . '/controllers/' . $controller . '.php';
                
//                echo '<pre>';
//                print_r($controllerFile);
                
                if(file_exists($controllerFile)){
                include_once($controllerFile);
            }
                
            $controllerObject = new $controller;
            
//            echo '<pre>';
//            print_r($controllerObject);
                
            $result = call_user_func(array($controllerObject, $action), $parameters);
            
//            echo '<pre>';
//            print_r($result);
                
            if($result != null) {
                die();
            }
        }
       }
     }
     

     
 }

