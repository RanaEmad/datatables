<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model{
    function get_users (){
        $length=  $this->input->post("length");
        $start= $this->input->post("start");
        $search=  $this->input->post('search')["value"];
        $this->db->order_by("id","asc");
        $this->db->limit($length,$start);
        if($search){
            $this->db->like("first_name",$search);
            $this->db->or_like("last_name",$search);
            $this->db->or_like("email",$search);
            $this->db->or_like("birth_date",$search);
        }
        $query=$this->db->get("users");
        return $query->result();
    }
    function count_users(){
        $this->db->order_by("id","asc");
        $query=$this->db->get("users");
        return $query->num_rows();
    }
    function count_filtered_users(){
        $search=  $this->input->post('search')["value"];
        $this->db->order_by("id","asc");
        if($search){
            $this->db->like("first_name",$search);
            $this->db->or_like("last_name",$search);
            $this->db->or_like("email",$search);
            $this->db->or_like("birth_date",$search);
        }
        $query=$this->db->get("users");
        return $query->num_rows();        
    }
}