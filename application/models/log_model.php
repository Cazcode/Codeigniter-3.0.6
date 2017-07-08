<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Log_model extends CI_Model
{
    function __construct()
    {
        parent:: __construct();
        $this->load->database();
    }

    function insert($param)
    {
        $this->db->insert('mtt_log',$param);
    }

    function update($param,$id)
    {
        $this->db->set($param);
        $this->db->where('id_mtt_log', $id);
        $this->db->update('mtt_log');
    }

    function listado($sede)
    {
        $param = array('sede' => $sede);
        return $this->db->get_where('mtt_log',$param)->result();
    }

    function log($param)
    {
        return $this->db->get_where('mtt_log',$param)->result();
    }

}
