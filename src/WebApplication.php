<?php

namespace easyPeasy;

class WebApplication extends BaseApplication
{    	
	/**
	 * $pageTitle get page title
	 * @var string
	 */
	public $pageTitle;

	private $_viewClass = '\\easyPeasy\\View';
	
	public function __construct() {
		$this->setPageTitle();
    }
    
	public function setPageTitle() {
		$this->pageTitle = ucfirst($this->_action);
	}

	/**
	 * Return a View instance
	 */
	public function getView()
	{
		return new $this->_viewClass;
	}
}