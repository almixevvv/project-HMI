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

  public function getUnreadEmail()
  {
    $this->db->select('*');
    $this->db->from('g_messages');
    $this->db->where('STATUS', 'ACTIVE');
    $this->db->order_by('CREATED_AT', 'DESC');
    $this->db->limit('6');

    $query = $this->db->get();

    return $query;
  }

  public function updateMessageStatus($id)
  {
    $data = array(
      'STATUS'      => 'INACTIVE',
      'UPDATED_AT'  => date('Y-m-d h:i:s')
    );

    $this->db->where('REC_ID', $id);
    $query = $this->db->update('g_messages', $data);

    return $query;
  }

  public function updatePassword($data)
  {
    $this->db->where('REC_ID', 1);
    $query = $this->db->update('s_user', $data);

    return $query;
  }

  public function insertMessage($data)
  {
    $query = $this->db->insert('g_messages', $data);

    return $query;
  }

  public function insertSupply($data)
  {
    $query = $this->db->insert('g_supply_images', $data);

    return $query;
  }

  public function insertSupplyMaster($data)
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

  public function getThreeSupplyList()
  {
    $this->db->select('*');
    $this->db->from('v_g_supply_images');
    $this->db->group_by('IMAGE_PARENT');
    $this->db->order_by('CREATED', 'DESC');
    $this->db->limit('3');

    $query = $this->db->get();

    return $query;
  }

  public function getSupplyWithLimit($start, $end)
  {
    $this->db->select('*');
    $this->db->from('v_g_supply_images');
    $this->db->group_by('IMAGE_PARENT');
    $this->db->order_by('CREATED', 'ASC');
    $this->db->limit($start, $end);

    $query = $this->db->get();

    return $query;
  }

  public function getSupplyCount()
  {
    $this->db->select('*');
    $this->db->from('v_g_supply_images');
    $this->db->group_by('IMAGE_PARENT');
    $this->db->order_by('CREATED', 'ASC');

    $query = $this->db->get();

    return $query;
  }

  public function getSpecificSupply($id)
  {
    $this->db->select('*');
    $this->db->from('v_g_supply_images');
    $this->db->where('REC_ID', $id);
    $this->db->order_by('CREATED', 'ASC');

    $query = $this->db->get();

    return $query;
  }


  public function getSupplyHistory($lastCounter)
  {
    $this->db->select('*');
    $this->db->from('g_histori_suplai');
    $this->db->where('REC_ID <', $lastCounter);
    $this->db->order_by('CREATED', 'DESC');

    $query = $this->db->get();

    return $query;
  }

  public function updateSupply($id, $data)
  {
    $this->db->where('SUPPLY_ID', $id);
    $query = $this->db->update('g_histori_suplai', $data);

    return $query;
  }

  public function deleteHistoryImage($id)
  {
    $this->db->where('IMAGE', $id);
    $query = $this->db->delete('g_supply_images');

    return $query;
  }

  public function deleteSupply($id)
  {
    $this->db->where('REC_ID', $id);
    $query = $this->db->delete('g_histori_suplai');

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

  public function postLogData($data)
  {
    $query = $this->db->insert('g_activity_log', $data);

    return $query;
  }

  public function getLogData()
  {
    $this->db->select('*');
    $this->db->from('g_activity_log');
    $this->db->order_by('CREATED_AT', 'DESC');
    $this->db->limit('6');

    $query = $this->db->get();

    return $query;
  }
}
