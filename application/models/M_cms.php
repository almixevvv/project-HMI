<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_cms extends CI_Model
{
  public function getLoginDetails($username, $password)
  {

    $this->db->select('*');
    $this->db->where('id', $username);
    $this->db->where('pass', $password);
    $this->db->from('s_user');

    $query = $this->db->get();

    return $query;
  }

  public function insertSupply($data)
  {
    $query = $this->db->insert('g_histori_suplai', $data);

    return $query;
  }

  public function getSupplyDetail($id)
  {
    $this->db->select('*');
    $this->db->from('g_histori_suplai');
    $this->db->where('REC_ID', $id);

    $query = $this->db->get();

    return $query;
  }

  public function updateSupply($id, $data)
  {
    $this->db->where('REC_ID', $id);
    $query = $this->db->update('g_histori_suplai', $data);

    return $query;
  }

  public function deleteSupply($id)
  {
    $this->db->where('REC_ID', $id);
    $query = $this->db->delete('g_histori_suplai');

    return $query;
  }

  public function getSupplyHistory()
  {
    $this->db->select('*');
    $this->db->from('g_histori_suplai');

    $query = $this->db->get();

    return $query;
  }

  public function getSalt($username)
  {
    $this->db->select('SALT');
    $this->db->from('s_user');
    $this->db->where('id', $username);

    $query = $this->db->get();

    return $query;
  }
}
