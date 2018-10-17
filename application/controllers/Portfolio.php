<?php

class Portfolio extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "portfolio_v";

        $this->load->model("portfolio_model");
        $this->load->model("portfolio_resim_model");
        $this->load->model("portfolio_category_model");
        if (!get_active_user()) {
            redirect(base_url("login"));
        }
    }

    public function index()
    {

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $items = $this->portfolio_model->get_all(
            array(), "rank ASC"
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function new_form()
    {

        $viewData = new stdClass();

        $category = $this->portfolio_category_model->get_all(
            array(
                "isActive" => 1
            )
        );
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";
        $viewData->category = $category;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function save()
    {

        $this->load->library("form_validation");

        // Kurallar yazilir..
        $this->form_validation->set_rules("title", "Başlık", "required|trim");
        $this->form_validation->set_rules("category_id", "Kategori", "required|trim");
        $this->form_validation->set_rules("client", "Müşteri/Firma", "required|trim");
        $this->form_validation->set_rules("finishedAt", "Bitiş Tarihi", "required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

        // Form Validation Calistirilir..
        // TRUE - FALSE
        $validate = $this->form_validation->run();



        if ($validate) {

            $insert = $this->portfolio_model->add(
                array(
                    "title" => $this->input->post("title"),
                    "description" => $this->input->post("description"),
                    "finishedAt" => $this->input->post("finishedAt"),
                    "client" => $this->input->post("client"),
                    "category_id" => $this->input->post("category_id"),
                    "portfolio_url" => $this->input->post("portfolio_url"),
                    "place" => $this->input->post("place"),
                    "url" => convertToSEO($this->input->post("title")),
                    "rank" => 0,
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


                redirect(base_url("portfolio"));

            }


            // ' işlemin sonucunu sessiona yazdırdım. unutma!

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("portfolio"));

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

    public function update_form($id)
    {

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $item = $this->portfolio_model->get(
            array(
                "id" => $id,
            )
        );
        $viewData->category = $this->portfolio_category_model->get_all(
            array(
                "isActive" => 1
            )
        );
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);


    }

    public function update($id)
    {

        $this->load->library("form_validation");

        // Kurallar yazilir..
        $this->form_validation->set_rules("title", "Başlık", "required|trim");
        $this->form_validation->set_rules("category_id", "Kategori", "required|trim");
        $this->form_validation->set_rules("client", "Müşteri/Firma", "required|trim");
        $this->form_validation->set_rules("finishedAt", "Bitiş Tarihi", "required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

        // Form Validation Calistirilir..
        // TRUE - FALSE
        $validate = $this->form_validation->run();

        // Monitör Askısı
        // monitor-askisi

        if ($validate) {

            $update = $this->portfolio_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "title" => $this->input->post("title"),
                    "description" => $this->input->post("description"),
                    "finishedAt" => $this->input->post("finishedAt"),
                    "client" => $this->input->post("client"),
                    "category_id" => $this->input->post("category_id"),
                    "place" => $this->input->post("place"),
                    "portfolio_url" => $this->input->post("portfolio_url"),
                    "url" => convertToSEO($this->input->post("title")),
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


                redirect(base_url("portfolio"));

            }


            // ' işlemin sonucunu sessiona yazdırdım. unutma!

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("portfolio"));

        } else {

            $viewData = new stdClass();

            /** Tablodan Verilerin Getirilmesi.. */
            $item = $this->portfolio_model->get(
                array(
                    "id" => $id,
                )
            );

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $item;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

        // Başarılı ise
        // Kayit işlemi baslar
        // Başarısız ise
        // Hata ekranda gösterilir...

    }

    public function delete($id)
    {

        $delete = $this->portfolio_model->delete(
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


            redirect(base_url("portfolio"));

        }


        // ' işlemin sonucunu sessiona yazdırdım. unutma!

        $this->session->set_flashdata("alert", $alert);

        redirect(base_url("portfolio"));

    }

    public function imageDelete($id, $parent_id)
    {

        $fileName = $this->portfolio_resim_model->get(
            array(
                "id" => $id
            )
        );

        $delete = $this->portfolio_resim_model->delete(
            array(
                "id" => $id
            )
        );


        // TODO Alert Sistemi Eklenecek...
        if ($delete) {
            unlink("uploads/{$this->viewFolder}/$fileName->img_url");

            redirect(base_url("portfolio/image_form/$parent_id"));


        } else {
            redirect(base_url("portfolio"));
        }

    }

    public function isActiveSetter($id)
    {

        if ($id) {

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->portfolio_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "isActive" => $isActive
                )
            );
        }
    }

    public function imageIsActiveSetter($id)
    {

        if ($id) {

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->portfolio_resim_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "isActive" => $isActive
                )
            );
        }
    }

    public function isCoverSetter($id, $parent_id)
    {

        if ($id && $parent_id) {

            $isCover = ($this->input->post("data") === "true") ? 1 : 0;

            // Kapak yapılmak istenen kayıt
            $this->portfolio_resim_model->update(
                array(
                    "id" => $id,
                    "portfolio_id" => $parent_id
                ),
                array(
                    "isCover" => $isCover
                )
            );


            // Kapak yapılmayan diğer kayıtlar
            $this->portfolio_resim_model->update(
                array(
                    "id !=" => $id,
                    "portfolio_id" => $parent_id
                ),
                array(
                    "isCover" => 0
                )
            );

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "image";

            $viewData->item_images = $this->portfolio_resim_model->get_all(
                array(
                    "portfolio_id" => $parent_id
                ),
                "rank ASC"
            );

            $render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_v", $viewData, true);

            echo $render_html;

        }
    }

    public function rankSetter()
    {


        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $id) {

            $this->portfolio_model->update(
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

    public function imageRankSetter()
    {


        $data = $this->input->post("data");

        parse_str($data, $order);

        $items = $order["ord"];

        foreach ($items as $rank => $id) {

            $this->portfolio_resim_model->update(
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

    public function image_form($id)
    {

        $viewData = new stdClass();

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";

        $viewData->item = $this->portfolio_model->get(
            array(
                "id" => $id
            )
        );

        $viewData->item_images = $this->portfolio_resim_model->get_all(
            array(
                "portfolio_id" => $id
            ),
            "rank ASC"
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function image_upload($id)
    {

        $file_name = convertToSEO(pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

        $config["allowed_types"] = "jpg|jpeg|png";
        $config["upload_path"] = "uploads/$this->viewFolder/";
        $config["file_name"] = $file_name;

        $this->load->library("upload", $config);

        $upload = $this->upload->do_upload("file");

        if ($upload) {

            $uploaded_file = $this->upload->data("file_name");

            $this->portfolio_resim_model->add(
                array(
                    "img_url" => $uploaded_file,
                    "rank" => 0,
                    "isActive" => 1,
                    "isCover" => 0,
                    "createdAt" => date("Y-m-d H:i:s"),
                    "portfolio_id" => $id
                ),
                "rank ASC"
            );


        } else {
            echo "islem basarisiz";
        }

    }

    public function refresh_image_list($id)
    {

        $viewData = new stdClass();

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";

        $viewData->item_images = $this->portfolio_resim_model->get_all(
            array(
                "portfolio_id" => $id
            )
        );

        $render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_v", $viewData, true);

        echo $render_html;

    }

}
