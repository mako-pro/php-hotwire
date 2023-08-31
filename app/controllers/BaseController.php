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

}
