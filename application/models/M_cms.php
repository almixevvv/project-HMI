<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_cms extends CI_Model
{

  //------------------------------------------------------------------------LOGIN PROSES
  public function login_cms($username, $password)
  {

    $this->db->select('*');
    $this->db->where('id', $username);
    $this->db->where('pass', $password);
    $this->db->from('s_user');

    $query = $this->db->get();

    return $query;
  }

  public function checkUsername($username)
  {

    $this->db->select('*');
    $this->db->from('s_user');
    $this->db->where('id', $username);

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
