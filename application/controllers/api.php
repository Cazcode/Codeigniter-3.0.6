<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Api extends REST_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('area_model');
    }
    
     function area_get()
    {
        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $area = $this->area_model->area_by_id( $this->get('id') )[0];
         
        if($area)
        {
            $this->response($area, 200); // 200 being the HTTP response code
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    }

    function areas_ctg_get()
    {
        $areas = $this->area_model->areas();
        $result =array(
            'areas' => $areas,
        );
        if($result)
        {
            $this->response($result, 200);
        }
 
        else
        {
            $this->response(NULL, 404);
        }
    }
     
    function area_post()
    {
        $result = $this->area_model->update( $this->post('id'), array(
            'name'  => $this->post('name'),
            'email' => $this->post('email')
        ));
         
        if($result === FALSE)
        {
            $this->response(array('status' => 'failed'));
        }
         
        else
        {
            $this->response(array('status' => 'success'));
        }
         
    }
     


    // public function index()
    // {
    //     $json = array(
    //         'nombre'  => "Castro",
    //         'hobbies' =>  array('cine','desarrollo'),
    //     );
    //     $arreglo[0]      = $json;
    //     $json['nombre']  = "Alberto";
    //     $json['hobbies'] = array('trabajo','universidad');
    //     $arreglo[1]      = $json;
    //     echo json_encode($json);
    // }

}
