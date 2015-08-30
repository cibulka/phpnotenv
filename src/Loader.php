<?php
	
namespace Notenv;

class Loader extends \Dotenv\Loader {
	
	protected $notenv_data = array();
	
	protected $notenv_callback;
	
	public function getEnvironmentVariable($name) {
		
		if (empty($_ENV)) {
			throw new \Exception('Empty $_ENV variable, switch by something else.');
		}
		
		switch (true) {
			case array_key_exists($name, $_ENV):
				return $_ENV[$name];
			break;
			case array_key_exists($name, $_SERVER):
				return $_SERVER[$name];
			break;
			case array_key_exists($name, $this->notenv_data):
				return $this->notenv_data[$name];
			break;
		}
		
	}
	
	public function get($name) {
		return $this->getEnvironmentVariable($name);
	}
	
	public function setEnvironmentVariable($name, $value=null) {
				
        list($name, $value) = $this->normaliseEnvironmentVariable($name, $value);

        // Don't overwrite existing environment variables if we're immutable
        // Ruby's dotenv does this with `ENV[key] ||= value`.
        if ($this->immutable === true && !is_null($this->getEnvironmentVariable($name))) {
            return;
        }
        
        if (!empty($this->notenv_callback)) {
	        call_user_func_array($this->notenv_callback, func_get_args());
        }
        
        $this->notenv_data[$name] = $value;
		
	}

	public function set($name, $value=null) {
		return $this->setEnvironmentVariable($name, $value);
	}
	
	public function clearEnvironmentVariable($name) {
		
		parent::cleanEnvironmentVariable($name);
		
		if (!$this->immutable) {
			unset($this->notenv_data[$name]);
		}
		
	}
	
	public function setVariableSetter($callback) {
		$this->notenv_callback = $callback;
	}
	
}