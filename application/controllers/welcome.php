<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
		$this->load->helper('url');

        $this->load->library('facebook', array(
            'appId' => $this->config->item('facebook_application_id'),
            'secret' => $this->config->item('facebook_secret_key'),
            'cookie' => true
        ));
    }

	public function index()
	{
        $data['facebook_uid'] = NULL;
        $data['facebook_token'] = NULL;

        $user = $this->facebook->getUser();
        $data['facebook_uid'] = $user;
        $data['facebook_token'] = $this->facebook->getAccessToken();

        if ($data['facebook_uid']) {
            $user_profile = $this->facebook->api('/me');
            $data['facebook_name'] = $user_profile['name'];

            $this->session->set_userdata($data);

            echo 'aaaaaaaaaaaaaaaaaaaaaa';
        } else {
            $url = $this->facebook->getLoginUrl(array('cancel_url' => site_url(), 'redirect_uri' => site_url('home/facebookonly/'), 'scope' => $this->config->item('facebook_perms')));
            redirect($url);
        }
	}
}
