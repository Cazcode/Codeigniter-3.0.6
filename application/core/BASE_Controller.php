<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BASE_Controller extends CI_Controller 
{
	public $templates;

    public function __construct()
    {
        parent::__construct();
        $this->templates = new League\Plates\Engine(APPPATH . "views");
    }
}