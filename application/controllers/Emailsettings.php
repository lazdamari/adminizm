<?php

class Emailsettings extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "email_settings_v";

        $this->load->model("emailsettings_model");
        if (!get_active_user()) {
            redirect(base_url("login"));
        }
    }

    public function index()
    {

        $viewData = new stdClass();

        $items = $this->emailsettings_model->get_all(
            array()
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function new_form()
    {


        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";
        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index", $viewData);


    }

    public function save()
    {

        $this->load->library("form_validation");

        // Kurallar yazilir..
        $this->form_validation->set_rules("protokol", "Protokol", "required|trim");
        $this->form_validation->set_rules("host", "E-Posta Sunucu", "required|trim");
        $this->form_validation->set_rules("port", "Port Numarası", "required|trim");
        $this->form_validation->set_rules("user", "E-Posta Adresi", "required|trim|valid_email");
        $this->form_validation->set_rules("user_name", "E-Posta Başlık", "required|trim");
        $this->form_validation->set_rules("password", "Şifre", "required|trim");
        $this->form_validation->set_rules("re_password", "Şifre Tekrar", "required|trim|matches[password]");
        $this->form_validation->set_rules("gonderici", "Gönderici E-Posta Adresi", "required|trim|valid_email");
        $this->form_validation->set_rules("alici", "Alıcı E-Posta Adresi", "required|trim|valid_email");
        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır.",
                "valid_email" => "Lütfen geçerli bir e-posta adresi giriniz.",
                "matches" => "Şifreler birbirleriyle uyuşmuyor.",
            )
        );
        // Form Validation Calistirilir..
        // TRUE - FALSE
        $validate = $this->form_validation->run();


        if ($validate) {
            $insert = $this->emailsettings_model->add(
                array(
                    "protocol" => $this->input->post("protokol"),
                    "host" => $this->input->post("host"),
                    "port" => $this->input->post("port"),
                    "user" => $this->input->post("user"),
                    "user_name" => $this->input->post("user_name"),
                    "password" => md5($this->input->post("password")),
                    "gonderici" => $this->input->post("gonderici"),
                    "alici" => $this->input->post("alici"),
                    "isActive" => 1,
                )
            );

            if ($insert) {
                $alert = array(
                    "text" => "İşleminiz başarıyla gerçekleştirilmiştir.",
                    "type" => "success"
                );

            } else {
                $alert = array(
                    "text" => "Hata! Lütfen işleminizi kontrol edin.",
                    "type" => "error"
                );


                redirect(base_url("emailsettings"));

            }


            // ' işlemin sonucunu sessiona yazdırdım. unutma!

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("emailsettings"));

        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }


    }

    public function update($id)
    {


        $this->load->library("form_validation");


        // Kurallar yazilir..
        $this->form_validation->set_rules("protokol", "Protokol", "required|trim");
        $this->form_validation->set_rules("host", "E-Posta Sunucu", "required|trim");
        $this->form_validation->set_rules("port", "Port Numarası", "required|trim");
        $this->form_validation->set_rules("user", "E-Posta Adresi", "required|trim|valid_email");
        $this->form_validation->set_rules("user_name", "E-Posta Başlık", "required|trim");
        $this->form_validation->set_rules("gonderici", "Gönderici E-Posta Adresi", "required|trim|valid_email");
        $this->form_validation->set_rules("alici", "Alıcı E-Posta Adresi", "required|trim|valid_email");

        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır.",
                "valid_email" => "Lütfen geçerli bir e-posta adresi giriniz.",
                "is_unique" => "<b>{field}</b> alanı daha önceden kullanılmış.",
            )
        );

        $validate = $this->form_validation->run();


        if ($validate) {


            $update = $this->emailsettings_model->update(
                array("id" => $id),
                array(
                    "protocol" => $this->input->post("protokol"),
                    "host" => $this->input->post("host"),
                    "port" => $this->input->post("port"),
                    "user" => $this->input->post("user"),
                    "user_name" => $this->input->post("user_name"),
                    "password" => $this->input->post("password"),
                    "gonderici" => $this->input->post("gonderici"),
                    "alici" => $this->input->post("alici"),
                )
            );

            if ($update) {
                $alert = array(
                    "text" => "İşleminiz başarıyla gerçekleştirilmiştir.",
                    "type" => "success"
                );

            } else {
                $alert = array(
                    "text" => "Hata! Lütfen işleminizi kontrol edin.",
                    "type" => "error"
                );


            }


            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("emailsettings"));

        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $this->emailsettings_model->get(
                array(
                    "id" => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function update_password($id)
    {

        $this->load->library("form_validation");

        $this->form_validation->set_rules("password", "Şifre", "required|trim|min_length[6]|max_length[10]");
        $this->form_validation->set_rules("re_password", "Şifre Tekrar", "required|trim|min_length[6]|max_length[10]|matches[password]");

        // Kurallar yazilir..

        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır.",
                "matches" => "Şifreler birbirleriyle uyuşmuyor.",
                "min_length" => "Şifreniz minimum 6 karakter olmalıdır",
                "max_length" => "Şifreniz maksimum 10 karakter olmalıdır",
            )
        );

        $validate = $this->form_validation->run();


        if ($validate) {


            $update = $this->emailsettings_model->update(
                array("id" => $id),
                array(
                    "password" => $this->input->post("password"),
                )
            );

            if ($update) {
                $alert = array(
                    "text" => "İşleminiz başarıyla gerçekleştirilmiştir.",
                    "type" => "success"
                );

            } else {
                $alert = array(
                    "text" => "Hata! Lütfen işleminizi kontrol edin.",
                    "type" => "error"
                );
            }


            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("emailsettings"));

        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "password";
            $viewData->form_error = true;
            $viewData->item = $this->emailsettings_model->get(
                array(
                    "id" => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function update_form($id)
    {

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $item = $this->emailsettings_model->get(
            array(
                "id" => $id,
            )
        );

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);


    }

    public function update_password_form($id)
    {

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $item = $this->emailsettings_model->get(
            array(
                "id" => $id,
            )
        );

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "password";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);


    }

    public function delete($id)

    {

        $delete = $this->emailsettings_model->delete(
            array(
                "id" => $id
            )
        );

        if ($delete) {
            $alert = array(
                "text" => "İşleminiz başarıyla gerçekleştirilmiştir.",
                "type" => "success"
            );

        } else {
            $alert = array(
                "text" => "Hata! Lütfen işleminizi kontrol edin.",
                "type" => "error"
            );


            redirect(base_url("emailsettings"));

        }


        // ' işlemin sonucunu sessiona yazdırdım. unutma!

        $this->session->set_flashdata("alert", $alert);

        redirect(base_url("emailsettings"));

    }

    public function isActiveSetter($id)
    {

        if ($id) {

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->emailsettings_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "isActive" => $isActive
                )
            );
        }
    }

    public function rankSetter()
    {


        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $id) {

            $this->emailsettings_model->update(
                array(
                    "id" => $id,
                    "rank !=" => $rank
                ),
                array(
                    "rank" => $rank
                )
            );

        }

    }


    /**
     * @return object
     */


}
