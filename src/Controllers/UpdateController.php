<?php
namespace App\Controllers;
use App\Request;
use App\Controller;
use App\Session;

final class UpdateController extends Controller{

    public function __construct(Request $request, Session $session){
        parent::__construct($request, $session);
    }

    public function index(){
        $dataview=['update',['title'=>'update']];
        $this->render($dataview);
    }

    public function update(){
        $id=$_POST['id'];
        $user=$this->session->get('email');
        $description=$_POST['desc'];
        $dat=$_POST['fecha'];
        $db=$this->getDB();
        $update = $db->updateTasks($user, $description, $dat, $id);
    }
    
}