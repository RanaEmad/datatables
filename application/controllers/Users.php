<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function index() {
        $this->load->view("users");
    }

    public function ajax_get_users() {
        $this->load->model("Users_model");
        //the value entered in the search field
        $search= $this->input->post("search")["value"];
        $users = $this->Users_model->get_users();
        $count= $this->Users_model->count_users();
        $filtered=0;
        //in case a filter is applied set the number of filtered records
        if($search){
            $filtered= $this->Users_model->count_filtered_users();
        }
        //in case no filter is applied set the number of total records
        else{
            $filtered=$count;
        }
        $data=[];
        $n=0;
        foreach ($users as $user){
            $n++;
            $row=[];
            $row[]=$n;
            $row[]=$user->first_name;
            $row[]=$user->last_name;
            $row[]=$user->email;
            $row[]=$user->birth_date;
            $data[]=$row;
        }
        //sending this data is required
        $output = array(
            "draw" => $this->input->post("draw"),
            "recordsTotal" => $count,
            "recordsFiltered" => $filtered,
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

}
