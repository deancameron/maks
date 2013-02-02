<?php

class Base_Controller extends Controller {


	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

	public $layout = 'layouts.default';

}