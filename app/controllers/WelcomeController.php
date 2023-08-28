<?php

namespace app\controllers;

use mako\http\routing\Controller;

class WelcomeController extends Controller
{
	/**
	 * Welcome page.
	 * @param  \package\blade\Blade $blade
	 * @return string
	 */
	public function index(): string
	{
		return $this->blade->render('index', []);
	}

}
