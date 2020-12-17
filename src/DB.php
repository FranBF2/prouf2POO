<?php

namespace App;

class DB extends \PDO{
    static $instance;
    protected  $config;

    static function singleton(){
        if(!(self::$instance instanceof self)){
            self::$instance=new self;
        }
        return self::$instance;
    }

    public function __construct(){
        $config=$this->loadConf();
        //determinar entorno pro o dev
        $strdbconf='dbconf_'.$this->env();
        $dbconf=(array)$config->$strdbconf;
        $dsn=$dbconf['driver'].':host='.$dbconf['dbhost'].';dbname='.$dbconf['dbname'];
        $usr=$dbconf['dbuser'];
        $pwd=$dbconf['dbpass'];
        parent::__construct($dsn, $usr, $pwd);
    }

    private function env(){
        $ipAdrr=gethostbyname($_SERVER['SERVER_NAME']);
        if($ipAdrr=='127.0.0.1'){
            return 'dev';
        }else{
            return 'pro';
        }
    }

    private function loadConf(){
        $file="config.json";
        $json=file_get_contents($file);
        $arrayJson=json_decode($json);
        return $arrayJson;
    }

    public function register($email, $username, $pass){

        try{
            $sql="INSERT INTO users(email, username, password) VALUES(:email, :name, :pwd)";
            $result=self::$instance->prepare($sql);
            $result->execute(array(":email"=>$email, ":name"=>$username, ":pwd"=>$pass_h));
            //$_SESSION['email']=$email;
            header('Location:'.BASE);
        }catch(\PDOException $e){
            echo "Error line ".$e->getLine();
        }
    }

    public function login($email, $pass){
        try{
            $stmt=self::$instance->prepare('SELECT * FROM users where email=:dbmail LIMIT 1');
            $stmt->execute(array(":email"=>$email));
            $count=$stmt->rowCount();
            $row=$stmt->fetchAll(\PDO::FETCH_ASSOC);
    
            if($count==1){
                $user=$row[0];
                $res=password_verify($pass, $user['password']);
                if($pass == $user['password']){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
            
        }catch(\PDOException $e){
            return false;
        }
    }

    public function selectTasks($sess){
        if(isset($sess)){
            $sql="SELECT id, description, user, date FROM tasks WHERE user=?";
            $result=self::$instance->prepare($sql);
            $result->execute(array($sess));
            while($registro=$result->fetch(\PDO::FETCH_ASSOC)){
                echo "<table><td class='id'>".$registro['id']."</td><td class='cuerpo'>".$registro['description']."</td><td class='cuerpo'>".$registro['user']."</td><td class='cuerpo'>".$registro['date'].
                "</td></table>";
            }
        }else{
            echo "Por favor, inicia sesion";
        }
    }

    public function insertTasks($description, $user, $dat){
        try{
            $sql="INSERT INTO tasks(description, user, date) VALUES(:desc, :email, :fecha)";
            $result=self::$instance->prepare($sql);
            $result->execute(array(":desc"=>$description, ":email"=>$user, ":fecha"=>$dat));
            header('Location:'.BASE.'dashboard');
        }catch(\PDOException $e){
            echo "Error line ".$e->getLine();
        }
    }

    public function deleteTasks($id){
        try{
            $sql="DELETE FROM tasks where id=?";
            $result=self::$instance->prepare($sql);
            $result->execute(array($id));
            header('Location:'.BASE.'dashboard');
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }

    public function updateTasks($user, $description, $dat, $id){
        try{
            $sql="UPDATE tasks SET user=:user, description=:desc, date=:fecha WHERE id=:id";
            $result=self::$instance->prepare($sql);
            $result->execute(array(":user"=>$user, ":desc"=>$description, ":fecha"=>$dat, ":id"=>$id));
            header('Location:'.BASE.'dashboard');
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }
}