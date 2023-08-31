<?php

namespace app\controllers;

use mako\http\request\Parameters;
use mako\http\response\senders\Redirect;
use mako\http\exceptions\NotFoundException;
use app\controllers\BaseController;
use app\models\Task;

class TurboFrameController extends BaseController
{
	/**
	 * Index page
	 * @return string
	 */
	public function index(): string
	{
		return $this->blade->render('turbo-frame.index');
	}

	/**
	 * Task list page
	 * @return string
	 */
	public function list(): string
	{
		$tasks = Task::orderBy('id', 'desc')->all();
		return $this->blade->render('turbo-frame.list-page', compact('tasks'));
	}

	/**
	 * Create a new task
	 * @return mixed
	 */
	public function create(): Redirect|string
	{
		if ($this->request->getMethod() == 'GET') {
			return $this->blade->render('turbo-frame.create-page');
		}

		$post = $this->request->getPost();

		// Validate post data
		if ($errors = $this->validate($post)) {
			$this->response->setStatus(422);
			return $this->blade->render('turbo-frame.create-page', [
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
		return $this->redirectResponse('turbo-frame.detail', ['id' => $task->id]);
	}

	/**
	 * Update task
	 * @param  integer $id
	 * @return mixed
	 */
	public function update(int $id): Redirect|string
	{
		if ($this->request->getMethod() == 'GET') {
			$task = Task::getOrThrow($id, exception: NotFoundException::class);
			$form = $task->toArray();
			$form['due_date'] = $task->due_date->format('Y-m-d');
			return $this->blade->render('turbo-frame.update-page', compact('form'));
		}

		$post = $this->request->getPost();

		// Validate post data
		if ($errors = $this->validate($post)) {
			$this->response->setStatus(422);
			return $this->blade->render('turbo-frame.update-page', [
				'form'   => $post->all(),
				'errors' => $errors
			]);
		}

		$task = Task::getOrThrow($id);
		$task->title = $post->get('title');
		$task->due_date = $this->dateFormat($post->get('due_date'));
		$task->save();

		$this->session->putFlash('success', 'Task update successfully');
		return $this->redirectResponse('turbo-frame.detail', ['id' => $task->id]);
	}

	/**
	 * Delete task
	 * @param  integer $id
	 * @return mixed
	 */
	public function delete(int $id): Redirect|string
	{
		if ($this->request->getMethod() == 'GET') {
			$task = Task::getOrThrow($id, exception: NotFoundException::class);
			$form = $task->toArray();
			return $this->blade->render('turbo-frame.delete-page', compact('form'));
		}

		$token = $this->request->getPost()->get('_token');

		// Validate security token
		if (! $this->session->validateToken($token)) {
			$this->response->setStatus(403);
			return 'Invalid Token!';
		}

		$task = Task::getOrThrow($id);
		$task->delete();

		$this->session->putFlash('success', 'Task deleted successfully');
		return $this->redirectResponse('turbo-frame.list');
	}

	/**
	 * Task details
	 * @param  integer $id
	 * @return string
	 */
	public function detail(int $id): string
	{
		$task = Task::getOrThrow($id, exception: NotFoundException::class);
		return $this->blade->render('turbo-frame.detail-page', compact('task'));
	}

}
