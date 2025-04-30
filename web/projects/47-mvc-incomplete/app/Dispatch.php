<?php
	namespace App;

	use Src\Classes\Application;
	
	class Dispatch extends Application
	{

		#Attributes
		private $method;
		private $param = [];
		private $obj;

		public function setMethod($method){
			$this->method = $method;
		}

		protected function getMethod(){
			return $this->method;
		}

		public function setParam($param){
			$this->param = $param;
		}

		protected function getParam(){
			return $this->param;
		}

		#Construct
		public function __construct(){
			self::addControllers();
		}

		#Controller Addition
		private function addControllers(){
			$name_space = "App\\Controllers\\{$this->runApp()}";
			$this->obj = new $name_space;
			if(isset($this->parseUrl()[1])){
				self::addMethods();
			}
		}

		#Method Controller Addition
		private function addMethods(){
			if(method_exists($this->obj, $this->parseUrl()[1])){
				$this->setMethod("{$this->parseUrl()[1]}");
				self::addParams();
				call_user_func_array([$this->obj,$this->getMethod()],$this->getParam());
			}

		}

		#Params Controller Addition
		private function addParams(){
			$count_array = count($this->parseUrl());
			if($count_array > 2){
				foreach($this->parseUrl() as $key => $value){
					if($key > 1){
						$this->setParam($this->param += [$key => $value]);
					}
				}
				var_dump($this->getParam());
			}
		}
	}
?>