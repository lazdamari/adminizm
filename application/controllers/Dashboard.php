<?php
class Dashboard extends CI_Controller
{

	public $viewFolder = "";

	public function __construct()
	{
		parent::__construct();
		$this->viewFolder = "dashboard_v";
	}

	public function index()
	{
		$viewData = new stdClass();
		$viewData->viewFolder = $this->viewFolder;
		$viewData->subViewFolder = "list";
		$this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}

}
