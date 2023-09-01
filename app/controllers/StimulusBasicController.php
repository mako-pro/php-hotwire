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

	/**
	 * Load Turbo Frame
	 * @return string
	 */
	public function load(): string
	{
		return $this->view('stimulus-basic.load');
	}

	/**
	 * Task list page
	 * @return string
	 */
	public function list(): string
	{
		$tasks = Task::orderBy('id', 'desc')->all();
		return $this->view('stimulus-basic.list-page', compact('tasks'));
	}

	/**
	 * Create a new task
	 * @return mixed
	 */
	public function create(): Redirect|string
	{
		if ($this->request->getMethod() == 'GET') {
			return $this->view('stimulus-basic.create-page');
		}

		$post = $this->request->getPost();

		// Validate post data
		if ($errors = $this->validate($post)) {
			$this->response->setStatus(422);
			return $this->view('stimulus-basic.create-page', [
				'form'   => $post->all(),
				'errors' => $errors
			]);
		}

		// Insert new task
		$task = new Task;
		$task->title = $post->get('title');
		$task->due_date = $this->dateFormat($post->get('due_date'));
		$task->save();

        $this->session->putFlash('success', 'Task created successfully');
		return $this->redirectResponse('stimulus-basic.list');
	}

}
