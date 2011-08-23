<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Example
 *
 * @package    OAuth2-Example
 * @category   Controller
 * @author     Managed I.T.
 * @copyright  (c) 2011 Managed I.T.
 * @license    https://github.com/managedit/kohana-oauth2/blob/master/LICENSE.md
 */
class Controller_Welcome extends Controller_Template {

	/**
	 * Show the registration forms
	 */
	public function action_index()
	{
		$this->template->title = "Register";
		$this->template->content = View::factory('welcome/index');

		$this->template->content->user_action_url = Route::url('default', array(
			'controller' => 'welcome',
			'action'     => 'user',
		), TRUE);

		$this->template->content->client_action_url = Route::url('default', array(
			'controller' => 'welcome',
			'action'     => 'client',
		), TRUE);

		$this->template->content->oauth_authorize_url = Route::url('oauth2', array(
			'action'     => 'authorize',
		), TRUE);

		$this->template->content->oauth_token_url = Route::url('oauth2', array(
			'action'     => 'token',
		), TRUE);

		$this->template->content->resource_url = Route::url('default', array(
			'controller' => 'api',
			'action'     => 'me',
		), TRUE);
	}

	/**
	 * Register a new User
	 */
	public function action_user()
	{
		$user = ORM::factory('user');

		$user->username = $this->request->post('username');
		$user->password = $this->request->post('password');
		$user->email = $this->request->post('email');

		$user->save();

		$user->add('roles', ORM::factory('role', array('name' => 'login')));

		$user->save();

		$this->template->title = "User";
		$this->template->content = View::factory('welcome/user');
		$this->template->content->user = $user;

	}

	/**
	 * Register a new OAuth Client
	 */
	public function action_client()
	{
		$client = Model_OAuth2_Client::create_client($this->request->post('redirect_uri'));

		$this->template->title = "Client";
		$this->template->content = View::factory('welcome/client');
		$this->template->content->client = $client;
	}

	/**
	 * Login ..
	 */
	public function action_login()
	{
		if ($this->request->method() == Request::POST)
		{
			$username = $this->request->post('username');
			$password = $this->request->post('password');

			if (Auth::instance()->login($username, $password))
			{
				$post_login_redirect_url = Session::instance()->get('post_login_redirect_url');

                $this->request->redirect($post_login_redirect_url);
			}
		}

		$this->template->title = "Login";
		$this->template->content = View::factory('welcome/login');
	}

}