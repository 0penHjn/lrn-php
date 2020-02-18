<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10.10.2019
 * Time: 14:28
 */

/**
 * Base Controller
 * Loads the methods and views
 */

class Controller {
    public function model($model){
        //Require model file
        if(file_exists('../app/models/' . ucwords($model) . '.php')) {
            require_once '../app/models/' . ucwords($model) . '.php';
            //Instantiate model
            return new $model();
        }else{
            die('View '. $model . ' does not exist');
        }
    }

    public function view($view, $data = []){
        //Check view file
        if(file_exists('../app/views/'. $view .'.php')){
            require_once '../app/views/'. $view .'.php';
        }else{
            die('View '. $view . ' does not exist');
        }
    }
}