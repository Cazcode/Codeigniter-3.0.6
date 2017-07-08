<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logown extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('logown_model');
    }

	public function index()
	{
        
        $this->create_form();
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('header_open');
            $this->load->view('header_close');
            $this->load->view('logown');
        }
        else
        {
            $this->start_session_post();
        }
	}

    function create_form()
    {
        $config = array(
            array(
                 'field'  => 'user',
                 'label'  => 'Nombre de Usuario',
                 'rules'  => array('trim','xss_clean','required','callback_valid_username'),
                 'errors' => array('required' => 'Debe ingresar un %s.')
                 ),
            array(
                 'field'  => 'pwd',
                 'label'  => 'Contraseña',
                 'rules'  => array('trim','xss_clean','required','callback_valid_pass'),
                 'errors' => array('required' => 'Debe ingresar una %s.')
                 )
        );
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
        $this->form_validation->set_rules($config);
    }

    public function valid_username($user)
    {
        $data = array('usuario' => $user);
        if (!$this->logown_model->valid_username($data))
        {
            $this->form_validation->set_message('valid_username', 'El {field}: '.$user.' no se encuentra registrado');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function valid_pass($pass)
    {
        $data = array('clave' => $pass);
        if (!$this->logown_model->valid_clave($data))
        {
            $this->form_validation->set_message('valid_pass', 'La {field} no se encuentra registrada');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function start_session_post()
    {
        $post = $this->input->post();
        if($this->input->post())
        {
            $data = array(
                        'usuario' => $this->input->post("user"),
                        'clave'   => $this->input->post("pwd")
                   );
            $view = '';
            $datos = $this->logown_model->loaduser($data)[0];
            if(! is_null($datos)  && ! empty($datos))
            {
				$user_data = array(
                                'iduser'  => $datos->id_user,
                                'nombre'  => $datos->nombre,
                                'tipo'    => $datos->tipo,
                                'mtto'    => $datos->prev,
                                'usuario' => $datos->usuario,
                                'sede'    => strtoupper($datos->ciudad),
                                'loggin'  => TRUE
                             );
                
                switch ($datos->taller)
                {
                    case 0:
                        $view = 'admin';
                    break;
                    case 1:
                        $view = 'paneltaller';
                    break;
                    case 2:
                        $view = 'paneltallertecnico';
                    break;
                }
                $user_data['back'] = $view;
                $this->session->set_userdata($user_data);
                redirect($view);
            }
        }
    }


    public function removeCache()
    {
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
    }
    
    public function close_session()
    {
        $this->session->sess_destroy();
        $this->removeCache();
        redirect('logown');
    }
}