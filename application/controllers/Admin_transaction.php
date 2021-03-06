<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_transaction extends Base_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model("Transaction_model");
        $this->load->model("User_trade_model");
        $this->load->model("User_trade_status_model");
        $this->load->model("User_listing_model");
        $this->load->model("User_crypto_model");
        $this->load->model("Users_model");

        if(!$this->session->has_userdata("admin")) redirect("access/admin_login");
        
        $this->page_data = array();
    }

    public function index()
    {

        $this->pageData["user_trade"] = $this->User_trade_model->get_all();
        $this->pageData['cryptos'] = $this->db->get("crypto");

        $this->load->view("admin/header", $this->pageData);
        $this->load->view("admin/Transaction/all");
        $this->load->view("admin/footer");
    }

    function internal($user_trade_id)
    {

        $where = array(
            "user_trade_id" => $user_trade_id
        );

        $result = $this->User_trade_model->get_where($where);

        if (!count($result)) show_404();


        $this->pageData["user_trade"] = $result[0];
        $this->pageData["user_trade_status"] = $this->User_trade_status_model->get_all();

        $this->load->view("admin/header", $this->pageData);
        $this->load->view("admin/Transaction/details");
        $this->load->view("admin/footer");
    }

    function update_status($user_trade_id)
    {
        if ($_POST) {
            $input = $this->input->post();

            if($input['user_trade_status_id'] == 4){
                $where = array(
                    "user_trade_id" => $user_trade_id
                );

                $user_trade = $this->User_trade_model->get_where($where);
                
                $user_trade = $user_trade[0];

                // $this->debug($user_trade);

                if($user_trade['deducted'] == 0){
                    $where = array(
                        "user_listing_id" => $user_trade["user_listing_id"]
                    );

                    $data = array(
                        'amount_sold' => $user_trade["amount_sold"] + $user_trade["btc_amount"],
                        'amount_available' => $user_trade["amount_available"] - $user_trade["btc_amount"]
                    );

                    $this->User_listing_model->update_where($where, $data);

                    $where = array(
                        'user_crypto.user_id' => $user_trade["seller_id"],
                        'user_crypto.crypto_id' => $user_trade["crypto_id"]
                    );

                    $seller = $this->User_crypto_model->get_where($where);

                    $data = array(
                        'amount' => $seller[0]['amount'] - $user_trade['btc_amount']
                    );

                    $this->User_crypto_model->update_where($where, $data);

                    $where = array(
                        'user_crypto.user_id' => $user_trade["buyer_id"],
                        'user_crypto.crypto_id' => $user_trade["crypto_id"]
                    );

                    $buyer = $this->User_crypto_model->get_where($where);

                    if(!empty($buyer)){
                        $data = array(
                            'amount' => $buyer[0]['amount'] + $user_trade['btc_amount']
                        );

                        $this->User_crypto_model->update_where($where, $data); 

                    } else{
                        $data = $where;
                        $data['amount'] = $user_trade["btc_amount"];
                        
                        $this->User_crypto_model->insert($data);
                    }

                    $where = array(
                        "user_trade_id" => $user_trade['user_trade_id']
                    );

                    $data = array(
                        "deducted" => 1
                    );

                    $this->User_trade_model->update_where($where, $data);
                }
            }

            $where = array(
                "user_trade_id" => $user_trade_id
            );

            $data = array(
                'user_trade_status_id' => $input['user_trade_status_id']
            );

            $this->User_trade_model->update_where($where, $data);

            redirect('admin_transaction/internal/' . $user_trade_id, 'refresh');
        }
    }

    function reject_receipt($user_trade_id)
    {
        $input = $this->input->post();

        $where = array(
            "user_trade_id" => $user_trade_id
        );

        $data = array(
            'user_trade_status_id' => 1,
            'receipt' => null,
        );

        $this->User_trade_model->update_where($where, $data);

        redirect('admin_transaction/internal/' . $user_trade_id, 'refresh');
    }

    public function add()
    {
        $this->page_data["user_listing"] = $this->User_listing_model->get_all();
        $this->page_data["users"] = $this->Users_model->get_all();

        if($_POST){
            $input = $this->input->post();

            $data = array(
                "buyer_id" => $input["buyer_id"],
                "seller_id" => $input["seller_id"],
                "user_listing_id" => $input["user_listing_id"],
                "myr_amount" => $input["myr_amount"],
                "btc_amount" => $input["btc_amount"],
                "user_trade_status_id" => 1,
            );

            $this->User_trade_model->insert($data);

            redirect('admin_transaction', 'refresh');
        }

        $this->load->view("admin/header", $this->page_data);
        $this->load->view("admin/Transaction/add");
        $this->load->view("admin/footer");
    }

    public function delete($admin_id)
    {

    }

    public function details($admin_id)
    {

    }

    public function edit($admin_id)
    {


    }

}
