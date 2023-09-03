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

	/**
	 * Returns true if the client accepts turbo stream reponses
	 * @return bool
	 */
	protected function canTurboStream(): bool
	{
		$headers = $this->request->getHeaders();
		$contentTypes = $headers->getAcceptableContentTypes();

		return in_array('text/vnd.turbo-stream.html', $contentTypes);
	}

	/**
	 * Turbo stream response
	 * @param  array  $streams  Separate turbo stream contexts
	 * @return string
	 */
	protected function turboStreamResponse(array $streams): string
	{
		// Set the content type as turbo-stream
		$args = ['Content-Type', 'text/vnd.turbo-stream.html; charset=utf-8'];
		$this->response->getHeaders()->add(...$args);

		return $this->blade->render('common.turbo-stream', compact('streams'));
	}

	/**
	 * Turbo stream context
	 * @param  string       $action    Action name
	 * @param  string       $target    Target name
	 * @param  string|null  $template  Template name
	 * @param  mixed        $data      Stream content | Template data
	 * @return array
	 */
	protected function turboStream(
		string $action,
		string $target,
		?string $template='',
		mixed $data=[]): array
	{
		// Trigger for single|multiple targets
		$sfx = strpos($target, '.') === 0 ? 's' : '';
		$targets = 'target'. $sfx .'="'. $target .'"';

		return [
			'action'   => $action,
			'targets'  => $targets,
			'template' => $template,
			'data'     => $data,
		];
	}

}
