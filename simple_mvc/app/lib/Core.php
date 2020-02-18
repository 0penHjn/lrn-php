<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10.10.2019
 * Time: 14:27
 */

/**
 * App Core Class
 * Creates URL & loads core controller
 * URL FORMAT - /controller/method/params
 */

class Core {
    protected $currentController = 'SiteController';
    protected $currentMethod = 'actionIndex';
    protected $params = [];

    public function __construct(){

        try {
            $url = $this->getUrl();
            if (isset($url)) {
                //Look in controllers for first value
                if (file_exists('../app/controllers/' . ucwords($url[0]) . 'Controller.php')) {

                    //If exists, set a controller
                    $this->currentController = ucwords($url[0]) . 'Controller';
                    //Unset 0 index
                    unset($url[0]);
                } else {
                    http_response_code(404);
                    die();
                }
            }

            //Require the controller
            require_once '../app/controllers/' . $this->currentController . '.php';

            //instantiate controller class
            $this->currentController = new $this->currentController;

            //Check for second part of url
            if (isset($url)) {
                if (isset($url[1])) {
                    //Check if method exists in controller
                    if (method_exists($this->currentController, 'action' . ucwords($url[1]))) {
                        $this->currentMethod = 'action' . ucwords($url[1]);
                        //Unset index 1
                        unset($url[1]);
                    } else {
                        http_response_code(404);
                        die();
                    }
                }
            }
            //Get params
            $this->params = $url ? array_values($url) : [];

            //Call a callback with array of params
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

        }catch (Exception $e){
            echo 'Ошибка сервера: ',  $e->getMessage(), "\n";
            http_response_code(500);
            die();
        }
    }

    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            return $url;
        }
    }
}