<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Crypto extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model("Crypto_model");
        
        $this->page_data = array();
    }
}