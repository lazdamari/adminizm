<?php

class Users extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "users_v";

        $this->load->model("user_model");

    }

    public function index()
    {

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $items = $this->user_model->get_all(
            array()
        );

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
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
        $this->form_validation->set_rules("user_name", "Kullanıcı Adı", "required|trim|is_unique[users.kullanici_adi]");
        $this->form_validation->set_rules("full_name", "Ad Soyad", "required|trim");
        $this->form_validation->set_rules("email", "E-Posta Adresi", "required|trim|valid_email|is_unique[users.email]");
        $this->form_validation->set_rules("password", "Şifre", "required|trim|min_length[6]|max_length[10]");
        $this->form_validation->set_rules("re_password", "Şifre Tekrar", "required|trim|min_length[6]|max_length[10]|matches[password]");

        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır.",
                "valid_email" => "Lütfen geçerli bir e-posta adresi giriniz.",
                "is_unique" => "<b>{field}</b> alanı daha önceden kullanılmış.",
                "matches" => "Şifreler birbirleriyle uyuşmuyor.",
                "min_length" => "Şifreniz minimum 6 karakter olmalıdır",
                "max_length" => "Şifreniz maksimum 10 karakter olmalıdır",
            )
        );
        // Form Validation Calistirilir..
        // TRUE - FALSE
        $validate = $this->form_validation->run();


        if ($validate) {
            $insert = $this->user_model->add(
                array(
                    "kullanici_adi" => $this->input->post("user_name"),
                    "full_name" => $this->input->post("full_name"),
                    "email" => $this->input->post("email"),
                    "password" => md5($this->input->post("password")),
                    "isActive" => 1,
                    "createdAt" => date("Y-m-d H:i:s")
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


                redirect(base_url("users"));

            }


            // ' işlemin sonucunu sessiona yazdırdım. unutma!

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("users"));

        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

        // Başarılı ise
        // Kayit işlemi baslar
        // Başarısız ise
        // Hata ekranda gösterilir...

    }

    public function update($id)
    {

        $this->load->library("form_validation");
        $oldUser = $this->user_model->get(
            array(
                "id" => $id
            )
        );

        if ($oldUser->kullanici_adi != $this->input->post("user_name")) {
            $this->form_validation->set_rules("user_name", "Kullanıcı Adı", "required|trim|is_unique[users.kullanici_adi]");
        }

        if ($oldUser->email != $this->input->post("email")) {
            $this->form_validation->set_rules("email", "E-Posta Adresi", "required|trim|valid_email|is_unique[users.email]");
        }
        // Kurallar yazilir..
        $this->form_validation->set_rules("full_name", "Ad Soyad", "required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır.",
                "valid_email" => "Lütfen geçerli bir e-posta adresi giriniz.",
                "is_unique" => "<b>{field}</b> alanı daha önceden kullanılmış.",
            )
        );

        $validate = $this->form_validation->run();


        if ($validate) {


            $update = $this->user_model->update(
                array("id" => $id),
                array(
                    "kullanici_adi" => $this->input->post("user_name"),
                    "full_name" => $this->input->post("full_name"),
                    "email" => $this->input->post("email"),
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

            redirect(base_url("users"));

        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $this->user_model->get(
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


            $update = $this->user_model->update(
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

            redirect(base_url("users"));

        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "password";
            $viewData->form_error = true;
            $viewData->item = $this->user_model->get(
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
        $item = $this->user_model->get(
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
        $item = $this->user_model->get(
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

        $delete = $this->user_model->delete(
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


            redirect(base_url("users"));

        }


        // ' işlemin sonucunu sessiona yazdırdım. unutma!

        $this->session->set_flashdata("alert", $alert);

        redirect(base_url("users"));

    }

    public function isActiveSetter($id)
    {

        if ($id) {

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->user_model->update(
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

            $this->user_model->update(
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
