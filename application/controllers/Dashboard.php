<?php
class Dashboard extends CI_Controller
{

	public $viewFolder = "";
    public $user;
	public function __construct()
	{
		parent::__construct();
		$this->viewFolder = "dashboard_v";
		$this->user = get_active_user();
	}

	public function index()
	{
		$viewData = new stdClass();
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "list";
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}

}
