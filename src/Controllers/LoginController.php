<?php
namespace App\Controllers;
use App\Controller;
use App\Model;
use App\View;
use App\Request;
use App\Session;

class LoginController extends Controller implements View,Model{

    public function __construct(Request $request, Session $session){
        parent::__construct($request,$session);
    }

    public function index(){
        $dataview=['login',['title'=>'login']];
        $this->render($dataview);
    }

    public function log(){
        $email = filter_input(INPUT_POST, 'email');
        $pass = filter_input(INPUT_POST, 'pass');
        $db=$this->getDB();
        $register = $db->login($email, $pass);
        $this->session->set('email', $email);
        header('Location:'.BASE);
    }
}