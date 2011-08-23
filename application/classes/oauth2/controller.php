<?php defined('SYSPATH') or die('No direct script access.');

class OAuth2_Controller extends Kohana_OAuth2_Controller {

    public function before()
    {
        parent::before();

        /**
         * Force a login as the user who granted the permission to the client.
         */
        Auth::instance()->force_login(ORM::factory('user', $this->_oauth_user_id));

        /**
         * Add a log entry recording which client make a request on behalf of
         * which user. (Just a demo showing user_id and client_id acess..)
         */
        Kohana::$log->add(Log::INFO, 'OAuth2 request made on behalf of \':user_id\' from \':client_id\'', array(
            ':user_id'   => $this->_oauth_user_id,
            ':client_id' => $this->_oauth_client_id,
        ));

    }

}