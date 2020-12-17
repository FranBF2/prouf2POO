<?php
namespace App\Controllers;
use App\Request;
use App\Controller;
use App\Session;

final class DeleteController extends Controller{

    public function __construct(Request $request, Session $session){
        parent::__construct($request, $session);
    }

    public function index(){
        $dataview=['delete',['title'=>'delete']];
        $this->render($dataview);
    }

    public function delete(){
        $id=$_POST['id'];
        $db=$this->getDB();
        $delete = $db->deleteTasks($id);
    }
    
}