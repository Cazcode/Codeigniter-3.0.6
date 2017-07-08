<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Usuario_model extends CI_Model
{
    function __construct()
    {
        parent:: __construct();
        $this->load->database();
    }

    function insert($param)
    {
        $this->db->insert('usuario',$param);
    }

    function update($param,$id)
    {
        $this->db->set($param);
        $this->db->where('id_user', $id);
        $this->db->update('usuario');
    }

    function listado()
    {
        return $this->db->get('usuario')->result();
    }

    function usuario($param)
    {
        return $this->db->get_where('usuario',$param)->result();
    }

    function usuario_mtto()
    {
        $var = array("tecnico","aux_mtto","jfmtto");
        return $this->db->select('*')->from('usuario')->where_in('tipo',$var)->get()->result();    
    }
    

}
