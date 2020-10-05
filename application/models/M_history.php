<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_history extends CI_Model
{
    public function getSupplyDetail($id)
    {
        $this->db->select('*');
        $this->db->from('v_g_supply_images');
        $this->db->where('IMAGE_PARENT', $id);

        $query = $this->db->get();

        return $query;
    }

    public function getRandomSupply()
    {
        $this->db->select('*');
        $this->db->from('v_g_supply_images');
        $this->db->group_by('IMAGE_PARENT');
        $this->db->order_by('RAND()');
        $this->db->limit('3');

        $query = $this->db->get();

        return $query;
    }
}
