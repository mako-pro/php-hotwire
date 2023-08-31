<?php

namespace app\controllers;

use DateTime;
use mako\http\request\Parameters;
use mako\http\routing\Controller;

class BaseController extends Controller
{
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

	/**
	 * Render the blade view
	 * @param  mixed   $view
	 * @param  array   $data
	 * @param  string  $frame
	 * @return string
	 */
	protected function view(?string $view, $data=[], $frame=''): string
	{
		if (! empty($frame)) {
			$data['view'] = $view;
			$data['frame'] = $frame;
			return $this->blade->render('common.turbo-frame', $data);
		}

		return $this->blade->render($view, $data);
	}

	/**
	 * Returns the target frame the client expects
	 * @return string|null
	 */
	protected function turboFrame(): string|null
	{
		return $this->request->getHeaders()
			->get('Turbo-Frame');
	}

}
