<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function validateLogin($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $result = $this->db->get('login');
        return $result;
    }
}
