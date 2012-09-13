<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Show extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
		$this->load->helper('url');

        $this->load->library('facebook', array(
            'appId' => $this->config->item('facebook_application_id'),
            'secret' => $this->config->item('facebook_secret_key'),
            'cookie' => true
        ));
    }

	public function index()
	{
		$user = $this->db->get_where('game', array('tournament_id' => 1))->result();
		foreach($user as $row){
			$team = array($row->fbid1, $row->fbid2);
			$teams[] = $team;			
			$hasil = array($row->skor1, $row->skor2);
			$hasils[] = $hasil;
		}
		$this->tpl['team'] = json_encode($teams);
		$this->tpl['skor'] = json_encode($hasils);
        $this->load->view('show', $this->tpl);
	}
}
