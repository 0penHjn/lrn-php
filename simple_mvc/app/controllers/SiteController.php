<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10.10.2019
 * Time: 16:25
 */

class SiteController extends Controller {
    public function __construct(){
//        echo __CLASS__;
    }

    public function actionIndex(){
        $data = [
            'title'=>'SimpleMVC Home page',
            'description' => 'This is a simple mvc php framework'
        ];
        $this->view('site/index',$data);
    }

    public function actionRegister(){
        $data = [
            'title'=>'SimpleMVC Register page',
            'description' => 'This is a simple register page'
        ];
        $this->view('site/register',$data);
    }

    public function actionLogin(){
        $data = [
            'title'=>'SimpleMVC Login page',
            'description' => 'This is a simple login page'
        ];
        $this->view('site/login',$data);
    }

    public function actionAbout(){
        $data = [
            'title'=>'SimpleMVC About page',
            'description' => 'This is a simple about page',
            'version' => APPVERSION
        ];
        $this->view('site/about',$data);
    }
}