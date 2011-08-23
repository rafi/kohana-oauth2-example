<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Example Protected Resource
 *
 * @package    OAuth2-Example
 * @category   Controller
 * @author     Managed I.T.
 * @copyright  (c) 2011 Managed I.T.
 * @license    https://github.com/managedit/kohana-oauth2/blob/master/LICENSE.md
 */
class Controller_API extends OAuth2_Controller {

	/**
	 * Show the registration forms
	 */
	public function action_me()
	{
		$user = Auth::instance()->get_user();

		$this->response->body(json_encode($user->as_array()));
	}

}