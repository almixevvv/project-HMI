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

    public function getUnpaidSO()
    {
        $this->db->select('*');
        $this->db->from('g_sales_order');
        $this->db->order_by('PO_DATE', 'ASC');
        $this->db->where('SO_STATUS', 'UNPAID');

        $query = $this->db->get();

        return $query;
    }

    public function insertSOFiles($data)
    {
        $query = $this->db->insert('g_so_files', $data);

        return $query;
    }

    public function insertSOData($data)
    {
        $query = $this->db->insert('g_sales_order', $data);

        return $query;
    }

    public function updateSOData($poNo, $data)
    {
        $this->db->where('PO_NO', $poNo);
        $query = $this->db->update('g_sales_order', $data);

        return $query;
    }
}
