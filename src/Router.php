<?php

namespace easyPeasy;

class Router extends BaseApplication
{
    private $_request;

    public function __construct(RequestInterface $request)
    {
        $this->_request = $request->resolve();
    }
    
    private function matchRequest()
    {
        parse_str($this->_request, $request);
        
        if (!empty($request['r'])) {
            $req = explode(DIRECTORY_SEPARATOR, $request['r']);

            if (count($req) === 3) {
                list($module, $controller, $action) = $req;
                $this->_module = $module;
            } else {
                list($controller, $action) = $req;
            }
            
            $this->_controller = $controller;
            $this->_action = $action;
            $this->_params = array_slice($request, 1);
        }

        return $this;
    }
    
    private function resolve()
    {
        $class = $this->getNamespace() . "\\";

        if (!empty($this->getModule())) {
            $class .= "modules\\" . $this->getModule() . "\\";
        }

        $class .= "controllers\\" . ucfirst(strtolower($this->getController())) . "Controller";

        if (class_exists($class)) {
            $controller = new $class;

            if (!method_exists($controller, $this->getAction())) {
                return call_user_func([$controller, $this->getActionError()]);
            }

            return call_user_func_array([$controller, $this->getAction()], $this->getParams());
        }

        throw new \Exception("The class '{$class}' does not exist!");
    }
    
    public function run()
    {		
        $this->matchRequest()->resolve();
    }
}