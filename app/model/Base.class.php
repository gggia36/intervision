<?php

/*

	Copyright (c) 2015 Intervision Bussiness Group, All rights reserved.

	Creator By BIRD [SUPHAN]
	
	Base Class
	* Bug no fix : please do not use wording method name same with class name or module name;

*/

 class Base {
 	
 	private static $instance = false;
 	private $route=array();
 	
 	private $autoload = array();
 	
 	public $table=array();
 	
 	
	 public function __construct(){
	 	if(!empty($_POST)){
			foreach($_POST as $key=>$postValue){
				$this->table['POST.'.$key] = $postValue;
			}
		}
		if(!empty($_GET)){
			foreach($_GET as $key=>$getValue){
				$this->table['GET.'.$key] = $getValue;
			}
		}
		$this->table['POST'] = $_POST;
		$this->table['GET'] = $_GET;
		$_POST = array();
		$_GET = array();
	 }
 	
 
 	public static function getInstance() {
	    if (!self::$instance) {
	      self::$instance = new Base();
	    }

	    return self::$instance;
	}
 	
 	public function set($varible,$value){
		$this->table[$varible] = $value;
	}
	public function get($varible){
		if($varible=='COOKIE'){
			return $_COOKIE;
		}
		else if($varible=='SESSION'){
			return $_SESSION;
		}
		return $this->table[$varible];
	}
	public function bootAutoLoad(){
		return $this->autoload;
	}
	
	
	
 	
 	
 	public function ROUTE($request,$route_in,$method_in){
			
		if($request=='AUTOLOAD'){
			$arr_set = explode(";",$route_in);
			foreach($arr_set as $key=>$loads){
				$this->autoload[$key] = $loads;
			}
			
		}else{

			$routerVarible = $this->route[$request];
			$contVarible = count($this->route[$request]);
			$this->route[$request][$contVarible][$route_in] = $method_in;
		}
		
	}
	
	public function run(){

		$varible = $this->_getRouter();
		$str_explode = explode('->',$varible);
		
		$checkMethod = preg_match("/@.*/", $str_explode[1], $output_array);
		
		if($checkMethod){
			$varibleRelative = str_replace('@','',$str_explode[1]);
			$str_explode[1] = $this->get("_".$varibleRelative); 
		}
		
		$this->set("_method_",$str_explode[1]);
		
		
		
		$class = new $str_explode[0]();
		
		if(!method_exists($class, 'noroute')){
			$controller = new Controller();
			$controller->beforeroute(Base::getInstance());
		}
		
		if(method_exists($class, 'beforeroute')){
			$class->beforeroute(Base::getInstance());
		}
		$method = $str_explode[1];
		
		 $method;
		
		
		if(method_exists($class, $method)){
			$class->$method(Base::getInstance());
		}else{
			$error = new Error();
			$error->Fail404();
		}
		
		if(method_exists($class, 'afterroute')){
			$class->afterroute(Base::getInstance());
		}	
		
	}
	public function config($varible,$value){
		$base = Base::getInstance();
		$base->set($varible,$value);
	}
	
	
	private function _getRouter(){
		$router = $_SERVER['REQUEST_URI'];
		$projectfolder = $this->get("PROJECTFD");
		
		$fullPathURL = "https://".rtrim($_SERVER['SERVER_NAME'],'/').'/'.ltrim($_SERVER['REQUEST_URI'],'/');
		
		$exlodeREQUEST_URI = explode('/',$router);

		$language = $exlodeREQUEST_URI[1]; 

		if(empty($language)){
			$_SESSION['language'] = 'en';
	  		$language = 'en';
			$redirect_path = $this->get("BASEURL")."/".$language;
			if ($_SERVER['QUERY_STRING']) $redirect_path .= "?".$_SERVER['QUERY_STRING'];
			header("HTTP/1.1 301 Moved Permanently"); 
			header("Location: $redirect_path"); 
			die();
	  	}else{
	  		if($language=='th'){
			  	$_SESSION['language'] = 'th';
			}elseif($language=='en'){
			  	$_SESSION['language'] = 'en';
			}else{
				$_SESSION['language'] = 'en';
		  		$language = 'en';
	
				$redirect_path = $this->get("BASEURL")."/".$language.$_SERVER['REQUEST_URI'];
				if ($_SERVER['QUERY_STRING']) $redirect_path .= "?".$_SERVER['QUERY_STRING'];
				header("HTTP/1.1 301 Moved Permanently"); 
				header("Location: $redirect_path"); 
				die();
			}
	  	}
	  	
	  	$BASEDIR = $this->get("BASEDIR");
	  	require($BASEDIR.'/language/lang_'.$_SESSION['language'].'.php'); 
 		$this->set('lang',$lang_data);
		

		if($projectfolder!=""){
			$router = str_replace($this->get("BASEURL")."/".$language,"",$fullPathURL);

		}else{
			$router = str_replace($this->get("BASEURL")."/".$language,"",$fullPathURL);
		}
			
		
		$usrlQueryString = "?".$_SERVER["QUERY_STRING"];
		$router = str_replace($usrlQueryString,"",$router);
		
		$request_Method = $_SERVER['REQUEST_METHOD'];
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
       		$request_Method = 'AJAX';
		}
		$routeVarible = $this->route;
		
		
		$methodReturn = 'Error->Fail404';
		$routKeyCount = 0;
		foreach($routeVarible[$request_Method] as $requertRouteKey){
			
			foreach($requertRouteKey as $key=>$requestRoute){
				$keySplit = preg_split("/(\?.*)/", $router);
				$router_set = explode("/",trim($keySplit[0],"/"));
				$routeKey = explode('/',trim($key,"/"));
				$countrouter_set = count($router_set);
				$countrouteKey = count($routeKey);
				if($countrouter_set==$countrouteKey){
					$keycont = 0;
					$routePath = '';
					foreach($routeKey as $keyIn=>$keyVal){
						if($keyVal==$router_set[$keyIn]){
							$keycont++;
							$routePath .= $router_set[$keyIn].'/';
						}
					}
					if($routKeyCount<=$keycont && $keycont>=1){
						$routKeyCount = $keycont;
						$methodReturn = $requestRoute;
						$keyGet = str_replace($routePath,'',$keySplit[0]);
						$valuePath = explode('/',ltrim($keyGet,'/'));
						preg_match("/\/@.*\//", $key, $output_array);
						if(count($output_array)>=1){
							$output_array = trim($output_array[0],'/');
							$output_array = explode('/',$output_array);
							foreach($output_array as $keyPath=>$setValue){
								$valuName = str_replace('@','',$setValue);
								$base = Base::getInstance();
								$base->set("_".trim($valuName,'/'),$valuePath[$keyPath]);
								//echo $valuePath[$keyPath]."<br />";	
							}
						}
					}
					
				}
				
				
			}
		}
		
		return $methodReturn;
	}
 	
 }
 
class Template {
 	private static $instance = false;
 	
 	private $component = array();
 	
 	public $pagecontent;

	public static function getInstance() {
	    if (!self::$instance) {
	      self::$instance = new Template();
	    }

	    return self::$instance;
	}


 	public function component($componentName,$pathcomponent){
		$this->component[$componentName][] = $pathcomponent;
	}
	
 	public function render($pathtpl){
		$base = Base::getInstance();
		$varible = 'keyVarible';
		$$varible;
		$SESSION = $base->get('SESSION');
		$COOKIE = $base->get('COOKIE');
		$component = $this->component;
		$PAGE = $this->pagecontent;
		foreach($base->table as $key=>$vals){
			$varible = $key;
			$$varible = $vals;
		}
		//echo $pathtpl;
		include($base->get('VIEWPATH').$pathtpl);
	}
 }
?>