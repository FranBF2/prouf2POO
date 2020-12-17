<?php

namespace App;
use App\Request;
use App\Session;

final class App{
    static protected $action;
    static protected $req;
    static protected $session;
    
    public static function run(){
        $routes=self::getRoutes();
        self::$session = new Session();
        self::$req=new Request();
        var_dump(self::$req);
        die;
        $controller=self::$req->getController();
        self::$action=self::$req->getAction();
        self::dispatch($controller, $routes);
    }

    public static function env(){
        $ipAddress=gethostbyname($_SERVER['SERVER_NAME']);
        if($ipAddress == '127.0.0.1'){
            return 'dev';
        }else{
            return 'pro';
        }
    }

    public static function loadConf(){
        $file="config.json";
        $jsonStr=file_get_contents($file);
        $arrayJson=json_decode($jsonStr);
        return $arrayJson;
    }

    public function init(){
        //read configuration
        $config=self::loadConf();
        $strconf='dbconf_'.self::env();
        $conf=(array)$config->$strconf;
        return $conf;
    }

    private static function dispatch($controller, $routes):void{
        try{
            if(in_array($controller, $routes)){
                //nombre del controlador
                //instancia del controlador
                //llamar a la accion
                //dispatcher
                $nameController='\\App\Controllers\\'.ucfirst($controller).'Controller';
                $objContr=new $nameController(self::$req, self::$session);   
                //comprobar si existe la accion como metodo en el objeto
                if(is_callable([$objContr, self::$action])){
                    call_user_func([$objContr, self::$action]);
                }else{
                    call_user_func([$objContr, 'error']);
                }
            }else{
                throw new \Exception("Ruta no disponible");
            }
        }catch(\Exception $e){
            die($e->getMessage());
        }
        

        try{
            $nameController='\\App\Controllers\\'.ucfirst($controller).'Controller';
            $objController=new $nameController(self::$req, self::$session);
        }catch(\Exception $e){
            die($e->getMessage());
        }
    }

    static function getRoutes(){
        $dir=__DIR__.'/Controllers';
        $handle=opendir($dir);
        while(false !=($entry=readdir($handle))){
            if($entry!="." && $entry!=".."){
                $routes[]=strtolower(substr($entry,0,-14));
            }
           
        }
        return $routes;
    }

}
	
