<?php
namespace App\Controllers;
use App\Controller;
use App\Model;
use App\View;
use App\Request;
use App\Session;

class DashboardController extends Controller implements View,Model{

    public function __construct(Request $request, Session $session){
        parent::__construct($request, $session);
    }

    public function index(){
        $dataview=['dashboard',['title'=>'dashboard']];
        $this->render($dataview);
    }

    public function indexDelete(){
        $dataview=['delete',['title'=>'delete']];
        $this->render($dataview);
    }

    public function dash(){
        $sess=$this->session->get('email');
        $db=$this->getDB();
        $select = $db->selectTasks($sess);
    }

    public function insert(){
        $user=$this->session->get('email');
        $description=$_POST['desc'];
        $dat=$_POST['fecha'];
        $db=$this->getDB();
        $insert = $db->insertTasks($description, $user, $dat);
    }
}