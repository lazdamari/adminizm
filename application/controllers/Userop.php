<?php

class Userop extends CI_Controller
{

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "users_v";


        $this->load->model("user_model");
    }

    public function login()
    {
        $viewData = new stdClass();
        $this->load->library("form_validation");

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "login";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function do_login()
    {
        $this->load->library("form_validation");

        $this->form_validation->set_rules("user_email", "E-Posta Adresi", "required|trim|valid_email");
        $this->form_validation->set_rules("user_password", "Şifre", "required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır.",
                "valid_email" => "Lütfen geçerli bir e-posta adresi giriniz.",

            )
        );

        $validate = $this->form_validation->run();

        if (!$validate) {
            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "login";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        } else {
            $user = $this->user_model->get(
                array(
                    "email" => $this->input->post("user_email"),
                    "password" => md5($this->input->post("user_password")),
                )
            );

            if ($user) {
                $alert = array(
                    "text" => "$user->full_name hoşgeldiniz.",
                    "type" => "success"
                );
                $this->session->set_flashdata("alert", $alert);
                $this->session->set_userdata("user", $user);

                redirect(base_url());
            } else {
                $alert = array(
                    "text" => "Hata! Lütfen giriş bilgilerinizi kontrol ediniz.",
                    "type" => "error"
                );
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("login"));
            }
        }

    }
}