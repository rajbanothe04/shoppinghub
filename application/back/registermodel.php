<?php
class Registermodel extends CI_Model
{

    public function loadCountry()
    {
        $country_list = $this->db->select('*')
            ->get('country');
        return $country_list->result();;
    }
    public function loadState($country_id)
    {
        $state_list = $this->db->select('*')
            ->where('country_id', $country_id)
            ->get('state');
        return $state_list->result();
    }
    public function loadCity($state_id)
    {
        $city_list = $this->db->select('*')
            ->where('state_id', $state_id)
            ->get('city');
        return $city_list->result();
    }
    public function user_register($array)
    {
        return $this->db->insert('users', $array);
    }
}