<?php

namespace app\controllers;

use DateTime;
use mako\http\request\Parameters;
use mako\http\response\senders\Redirect;
use mako\http\routing\Controller;
use app\models\Task;

class TurboDriveController extends Controller
{
	/**
	 * Index page
	 * @return Redirect
	 */
	public function index(): Redirect
	{
		return $this->redirectResponse('turbo-drive.create');
	}

	/**
	 * Task list page
	 * @return string
	 */
	public function list(): string
	{
		sleep(1);
		$tasks = Task::orderBy('id', 'desc')->all();
		return $this->blade->render('turbo-drive.list-page', compact('tasks'));
	}

	/**
	 * Create a new task
	 * @return mixed
	 */
	public function create(): Redirect|string
	{
		sleep(1);
		if ($this->request->getMethod() == 'POST') {
			$post = $this->request->getPost();

			// If post data is valid
			if (! $this->validate($post)) {
				// Insert new task
				$task = new Task;
				$task->title = $post->get('title');
				$task->due_date = $this->dateFormat($post->get('due_date'));
				$task->save();

				$message = 'Task created successfully';
				$this->session->putFlash('success', $message);
				return $this->redirectResponse('turbo-drive.list');
			}
		}

		return $this->blade->render('turbo-drive.create-page');
	}

	/**
	 * Date format from string
	 * @param  string $date
	 * @return DateTime
	 */
	protected function dateFormat(string $date): DateTime
	{
		return DateTime::createFromFormat('Y-m-d', $date);
	}

	/**
	 * Validation post data
	 * @param  Parameters $post
	 * @return array
	 */
	protected function validate(Parameters $post): array
	{
		$rules = [
			'_token'   => ['required', 'token'],
			'title'    => ['required', 'min_length(3)', 'max_length(250)'],
			'due_date' => ['required', 'date("Y-m-d")'],
		];

		$validator = $this->validator->create($post->all(), $rules);

		if ($validator->isValid()) {
			return [];
		}

		$errors = $validator->getErrors();

		if (array_key_exists('_token', $errors)) {
			return ['_token' => $errors['_token']];
		}

		return $errors;
	}

}
