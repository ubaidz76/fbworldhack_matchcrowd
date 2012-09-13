<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

        $this->load->library('facebook', array(
            'appId' => $this->config->item('facebook_application_id'),
            'secret' => $this->config->item('facebook_secret_key'),
            'cookie' => true
        ));
    }

	public function index()
	{
		$this->load->view('welcome_message');
	}
}
