<?php

class Settings extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "settings_v";
        $this->load->model("settings_model");
        if (!get_active_user()) {
            redirect(base_url("login"));
        }
    }

    public function index()
    {

        $viewData = new stdClass();
        $item = $this->settings_model->get();
        if ($item) {
            $viewData->subViewFolder = "update";
        } else {
            $viewData->subViewFolder = "no_content";
        }
        $viewData->viewFolder = $this->viewFolder;
        $viewData->item = $item;

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


        if ($_FILES["logo"]["name"] == "") {

            $alert = array(
                "text" => "Lütfen bir görsel seçiniz.",
                "type" => "error"
            );

            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("settings/new_form"));
        }

        $this->form_validation->set_rules("company_name", "Şirket Adı / Firma Adı", "required|trim");
        $this->form_validation->set_rules("phone_1", "Telefon Numarası (1)", "required|trim");
        $this->form_validation->set_rules("email", "E-Posta Adresi", "required|trim|valid_email");
        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır",
                "valid_email" => "Lütfen geçerli bir <b>{field}</b> adresi giriniz."
            )
        );

        $validate = $this->form_validation->run();


        if ($validate) {
            $file_name = convertToSEO($this->input->post("company_name")) . "." . pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);

            $config["allowed_types"] = "jpg|jpeg|png";
            $config["upload_path"] = "uploads/$this->viewFolder/";
            $config["file_name"] = $file_name;

            $this->load->library("upload", $config);

            $upload = $this->upload->do_upload("logo");

            if ($upload) {

                $uploaded_file = $this->upload->data("file_name");

                $insert = $this->settings_model->add(
                    $data = array(
                        "company_name" => $this->input->post("company_name"),
                        "phone_1" => $this->input->post("phone_1"),
                        "phone_2" => $this->input->post("phone_2"),
                        "fax_1" => $this->input->post("fax_1"),
                        "fax_2" => $this->input->post("fax_2"),
                        "address" => $this->input->post("address"),
                        "about_us" => $this->input->post("about_us"),
                        "mission" => $this->input->post("mission"),
                        "vision" => $this->input->post("vission"),
                        "email" => $this->input->post("email"),
                        "facebook" => $this->input->post("facebook"),
                        "twitter" => $this->input->post("twitter"),
                        "instagram" => $this->input->post("instagram"),
                        "linkedin" => $this->input->post("linkedin"),

                        "logo" => $uploaded_file,
                        "createdAt" => date("Y-m-d H:i:s")
                    ));

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


                    redirect(base_url("settings"));

                }

            } else {
                $alert = array(
                    "text" => "Hata! Lütfen işleminizi kontrol edin.",
                    "type" => "error"
                );
                $this->session->set_flashdata("alert", $alert);

                redirect(base_url("settings/new_form"));
            }


            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("settings"));

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

        $this->form_validation->set_rules("company_name", "Şirket Adı / Firma Adı", "required|trim");
        $this->form_validation->set_rules("phone_1", "Telefon Numarası (1)", "required|trim");
        $this->form_validation->set_rules("email", "E-Posta Adresi", "required|trim|valid_email");

        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır",
                "valid_email" => "Lütfen geçerli bir <b>{field}</b> adresi giriniz."
            )
        );

        $validate = $this->form_validation->run();


        if ($validate) {

            if ($_FILES["logo"]["name"] !== "") {


                $file_name = convertToSEO($this->input->post("company_name")) . "." . pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);

                $config["allowed_types"] = "jpg|jpeg|png";
                $config["upload_path"] = "uploads/$this->viewFolder/";
                $config["file_name"] = $file_name;

                $this->load->library("upload", $config);

                $upload = $this->upload->do_upload("logo");

                if ($upload) {

                    $uploaded_file = $this->upload->data("file_name");
                    
                    $data = array(
                        "company_name" => $this->input->post("company_name"),
                        "phone_1" => $this->input->post("phone_1"),
                        "phone_2" => $this->input->post("phone_2"),
                        "fax_1" => $this->input->post("fax_1"),
                        "fax_2" => $this->input->post("fax_2"),
                        "address" => $this->input->post("address"),
                        "about_us" => $this->input->post("about_us"),
                        "mission" => $this->input->post("mission"),
                        "vision" => $this->input->post("vission"),
                        "email" => $this->input->post("email"),
                        "facebook" => $this->input->post("facebook"),
                        "twitter" => $this->input->post("twitter"),
                        "instagram" => $this->input->post("instagram"),
                        "linkedin" => $this->input->post("linkedin"),
                        "logo" => $uploaded_file,
                        "updatedAt" => date("Y-m-d H:i:s")
                    );

                } else {
                    $alert = array(
                        "text" => "Hata! Lütfen işleminizi kontrol edin.",
                        "type" => "error"
                    );
                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("settings"));
                }
            } else {
                $data = array(
                    "company_name"  => $this->input->post("company_name"),
                    "phone_1"       => $this->input->post("phone_1"),
                    "phone_2"       => $this->input->post("phone_2"),
                    "fax_1"         => $this->input->post("fax_1"),
                    "fax_2"         => $this->input->post("fax_2"),
                    "address"       => $this->input->post("address"),
                    "about_us"      => $this->input->post("about_us"),
                    "mission"       => $this->input->post("mission"),
                    "vision"        => $this->input->post("vission"),
                    "email"         => $this->input->post("email"),
                    "facebook"      => $this->input->post("facebook"),
                    "twitter"       => $this->input->post("twitter"),
                    "instagram"     => $this->input->post("instagram"),
                    "linkedin"      => $this->input->post("linkedin"),
                    "updatedAt" => date("Y-m-d H:i:s")
                );
            }

            $update = $this->settings_model->update(array("id" => $id), $data);

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


                redirect(base_url("settings/update_form/$id"));

            }


            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("settings"));

        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $this->settings_model->get(
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


            $update = $this->settings_model->update(
                array("id" => $id),
                array(
                    "password" => md5($this->input->post("password")),
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

            redirect(base_url("settings"));

        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "password";
            $viewData->form_error = true;
            $viewData->item = $this->settings_model->get(
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
        $item = $this->settings_model->get(
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
        $item = $this->settings_model->get(
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

        $delete = $this->settings_model->delete(
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


            redirect(base_url("settings"));

        }


        // ' işlemin sonucunu sessiona yazdırdım. unutma!

        $this->session->set_flashdata("alert", $alert);

        redirect(base_url("settings"));

    }

    public function isActiveSetter($id)
    {

        if ($id) {

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->settings_model->update(
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

            $this->settings_model->update(
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
