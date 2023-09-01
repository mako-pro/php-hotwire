<?php

namespace app\controllers;

use mako\http\response\senders\Redirect;
use mako\http\exceptions\NotFoundException;
use app\controllers\BaseController;
use app\models\Task;

class StimulusBasicController extends BaseController
{
	/**
	 * Index page
	 * @return Redirect
	 */
	public function index(): Redirect
	{
		return $this->redirectResponse('stimulus-basic.counter');
	}

	/**
	 * Counter page
	 * @return string
	 */
	public function counter(): string
	{
		return $this->view('stimulus-basic.counter');
	}

}
