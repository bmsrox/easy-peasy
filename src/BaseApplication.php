<?php

namespace easyPeasy;

class BaseApplication 
{
	/**
	 * $_namespace get the namespace of file
	 * @var string
	 */
    protected $_namespace = "app";
    
	/**
	 * $_controller get the controller
	 * @var string
	 */
    protected $_controller = "site";
    
	/**
	 * $_action get the action in controller
	 * @var string
	 */
    protected $_action = "index";
    
	/**
	 * $_error get the Error Action in controller
	 * @var string
	 */
	protected $_error = "error";
	
	/**
	 * @var string
	 */
	protected $_module;

	/**
	 * @var array
	 */
	protected $_params = [];

		/**
	 * $_view define the path to layout/main.php
	 * @var string
	 */
	protected $_view = "layout/main";

	/**
	 * $layout default layout
	 * @var string
	 */
	public $layout = "layout/column1";

	protected function getLayout()
	{
		return $this->layout;
	}

	protected function getMainLayout()
	{
		return $this->_view;
	}
	
	protected function getNamespace() {
		return $this->_namespace;
    }
    
	protected function getController() {
		return $this->_controller;
    }
    
	protected function getAction() {
		return $this->_action;
    }
    
	protected function getActionError() {
		return $this->_error;
	}
	
	protected function getModule()
    {
        return $this->_module;
    }

    protected function getParams()
    {
        return $this->_params;
    }
}