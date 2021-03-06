<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Wallet extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page_data = array();

        $this->load->model("Wallet_model");
        $this->load->model("Crypto_model");
        $this->load->model("Transaction_model");

        if ($this->session->has_userdata("user")) {
            $crypto_wallet = $this->Wallet_model->get_crypto_wallet($this->session->userdata("user")["user_id"]);

            $crypto_wallet = $this->sort_crypto_wallet($crypto_wallet);

            $this->page_data["crypto_wallet"] = $crypto_wallet;
        }
        $this->load->model("User_trade_model");
        if ($this->session->has_userdata("user")){
            $where = array(
                "buyer_id" => $this->session->userdata("user")['user_id'],
                "user_trade.user_trade_status_id <" => "4"
            );
    
            $this->page_data["buys_processing"] = $this->User_trade_model->get_offers_where($where);
        }
    }

    public function index()
    {

        if (!$this->session->has_userdata("user")) show_404();

        $user_id = $this->session->userdata("user")["user_id"];

        $where = array(
            "transaction.user_id" => $user_id
        );

        $this->page_data["transaction"] = $this->Transaction_model->get_log_where($where);

        $this->load->view("main/header", $this->page_data);
        $this->load->view("main/wallet");
        $this->load->view("main/footer");
    }

}
