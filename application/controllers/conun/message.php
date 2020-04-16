<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends CI_Controller {

    function __construct()
    {
        parent::__construct();


    }

    public function index()
    {
     $title = $this->input->get_post("title");
     $content = $this->input->get_post("content");
     $user_id= $this->input->get_post("user_id");

        sendMessage($title, $content,$user_id);


    }


}