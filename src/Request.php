<?php

namespace easyPeasy;

class Request implements RequestInterface
{
	private function sanitizedUrl($url)
	{
		return filter_var($url, FILTER_SANITIZE_URL);
	}

	public function resolve() 
	{
		return html_entity_decode($this->sanitizedUrl($_SERVER['QUERY_STRING']));
	}
}