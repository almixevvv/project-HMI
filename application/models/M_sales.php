<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_sales extends CI_Model
{
    public function getSalesCount()
    {
        $this->db->select('*');
        $this->db->from('g_sales_order');
        $this->db->order_by('PO_DATE', 'ASC');

        $query = $this->db->get();

        return $query;
    }
}
