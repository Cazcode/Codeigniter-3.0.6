<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller   
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('log_model');
    }
	
	public function index()
	{
        if($this->session->loggin)
        {
            if($this->session->userdata('mtto') == 0 )
            {
                $this->load->view('header_open');
                $this->load->view('header_close');
                $this->load->view('header_main');
                $this->load->view('asaide_main');
                $this->load->view('log',$this->datos());
            }
            else
            {
                echo "No tiene permisos para ingresar a esta vista!";
            }
        }
        else
        {
            echo 'No ha cargado el usuario';
            redirect('logown');
        }
	}

    private function datos()
    {
        $sede    = $this->session->userdata('sede');
        return array(
                    'name_master' => 'Log',
                    'log'         => $this->log_model->listado($sede)
                );
    }

}
