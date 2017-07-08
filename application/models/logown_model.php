<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Logown_model extends CI_Model{
    function __construct()
    {
        parent:: __construct();
        $this->load->database();
    }
    
    function loaduser($data)
    {
        if(isset($data) && sizeof($data)>1)
        {
            $result = $this->db->get_where('usuario',$data)->result();
            if(!empty($result))
            {
                if(!is_null($result[0]->prev))
                {
                    return $result;
                }
            }
            else
            {
                return null;
            }
        }
    }

    function valid_username($user)
    {
        if(empty($this->db->get_where('usuario',$user)->result()))
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    function valid_clave($pass)
    {
        if(empty($this->db->get_where('usuario',$pass)->result()))
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

}
