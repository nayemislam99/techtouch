<?php


class session{

public static function init(){

	if(session_status() == PHP_SESSION_NONE ){
			session_start();
	}
}
//end php init



public static function set($key, $value){
    $_SESSION[$key] = $value;

}

public static function get($key){
	if(isset($_SESSION[$key])){
		return $_SESSION[$key];
	}else{
		return false;
	}
}

public static function logout(){
	session_unset();
	session_destroy();	
	header("location:log.php");
}

public static function check(){
   if(self::get("loging") == false){
       self::logout();
	 }
}
//end php session set


}


?>