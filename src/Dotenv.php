<?php
	
namespace Notenv;

use Notenv\Loader as Loader;

class Dotenv extends \Dotenv\Dotenv {
	
	public function __construct($path, $file = '.env') {
		
		parent::__construct($path, $file);
		
		$this->loader = new Loader($this->filePath, $immutable=true);
		
	}
	
	public function load() {
		
		$this->loader = new Loader($this->filePath, $immutable=true);
		return $this->loader->load();
		
	}
	
	public function get() {
		return call_user_func_array(array($this->loader, 'get'), func_get_args());
	}

	public function set() {
		return call_user_func_array(array($this->loader, 'set'), func_get_args());
	}
	
}