<?php

class References extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "references_v";

        $this->load->model("reference_model");
        if (!get_active_user()) {
            redirect(base_url("login"));
        }
    }

    public function index()
    {

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $items = $this->reference_model->get_all(
            array(), "rank ASC"
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

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function save()
    {

        $this->load->library("form_validation");

        // Kurallar yazilir..


        if ($_FILES["img_url"]["name"] == "") {

            $alert = array(
                "text" => "Lütfen bir görsel seçiniz.",
                "type" => "error"
            );

            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("references/new_form"));
        }

        $this->form_validation->set_rules("title", "Başlık", "required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );


        // TRUE - FALSE
        $validate = $this->form_validation->run();


        if ($validate) {
            $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

            $config["allowed_types"] = "jpg|jpeg|png";
            $config["upload_path"] = "uploads/$this->viewFolder/";
            $config["file_name"] = $file_name;

            $this->load->library("upload", $config);

            $upload = $this->upload->do_upload("img_url");

            if ($upload) {

                $uploaded_file = $this->upload->data("file_name");

                $insert = $this->reference_model->add(
                    $data = array(
                        "title" => $this->input->post("title"),
                        "description" => $this->input->post("description"),
                        "url" => convertToSEO($this->input->post("title")),
                        "img_url" => $uploaded_file,
                        "rank" => 0,
                        "isActive" => 1,
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


                    redirect(base_url("references"));

                }

            } else {
                $alert = array(
                    "text" => "Hata! Lütfen işleminizi kontrol edin.",
                    "type" => "error"
                );
                $this->session->set_flashdata("alert", $alert);

                redirect(base_url("references/new_form"));
            }


            // ' işlemin sonucunu sessiona yazdırdım. unutma!

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("references"));

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

        $this->form_validation->set_rules("title", "Başlık", "required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

        $validate = $this->form_validation->run();


        if ($validate) {

            if ($_FILES["img_url"]["name"] !== "") {


                $file_name = convertToSEO(pathinfo($_FILES["img_url"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["img_url"]["name"], PATHINFO_EXTENSION);

                $config["allowed_types"] = "jpg|jpeg|png";
                $config["upload_path"] = "uploads/$this->viewFolder/";
                $config["file_name"] = $file_name;

                $this->load->library("upload", $config);

                $upload = $this->upload->do_upload("img_url");

                if ($upload) {

                    $uploaded_file = $this->upload->data("file_name");
                    $data = array(
                        "title" => $this->input->post("title"),
                        "description" => $this->input->post("description"),
                        "url" => convertToSEO($this->input->post("title")),
                        "img_url" => $uploaded_file,

                    );

                } else {
                    $alert = array(
                        "text" => "Hata! Lütfen işleminizi kontrol edin.",
                        "type" => "error"
                    );
                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("references/update_form($id"));
                }
            } else {
                $data = array(
                    "title" => $this->input->post("title"),
                    "description" => $this->input->post("description"),
                    "url" => convertToSEO($this->input->post("title")),

                );
            }

            $update = $this->reference_model->update(array("id" => $id), $data);

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


                redirect(base_url("references"));

            }


            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("references"));

        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $this->reference_model->get(
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
        $item = $this->reference_model->get(
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

    public function delete($id)
        
    {

        $delete = $this->reference_model->delete(
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


            redirect(base_url("references"));

        }


        // ' işlemin sonucunu sessiona yazdırdım. unutma!

        $this->session->set_flashdata("alert", $alert);

        redirect(base_url("references"));

    }

    public function isActiveSetter($id)
    {

        if ($id) {

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->reference_model->update(
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

            $this->reference_model->update(
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

}
