<?php

class ProductController {
    
    public function ActionList($id) {
        echo '<br>', 'This is ProductController and AtionList';               
        $intid = array_shift($id);        
        echo '<br>', 'ID = ' . $intid;
        return true;
    }
}


