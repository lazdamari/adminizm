<?php
function convertToSeo($text)
{
    $turkce = array("ç", "Ç", "ğ", "Ğ", "ü", "Ü", "ö", "Ö", "İ", "ı", "Ş", "ş", ".", ",", "|", "'", "\"", " ", "?", "*", "_", "!", "=", "(", ")", "{", "}", "[", "]", "&", "%");
    $convert = array("c", "c", "g", "g", "u", "u", "o", "o", "i", "i", "s", "s", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-");

    $seo = strtolower(str_replace($turkce, $convert, $text));
    return $seo;
}


function get_readable_date($date)
{
    setlocale(LC_ALL, 'tr_TR.UTF-8');
    return strftime('%d %B %Y', strtotime($date));
}

function get_active_user()
{
    $t = &get_instance();
    $user = $t->session->userdata("user");
    if ($user) {
        return $user;
    } else {
        return false;
    }
}

function get_settings()
{
    $t = &get_instance();
    $t->load->model("settings_model");

        if ($t->session->userdata("settings")){
            $settings= $t->session->userdata("settings");
        }else{
            $settings = $t->settings_model->get();
            if (!$settings) {
                $settings = new stdClass();
                $settings->company_name = "adminizm";
                $settings->logo         = "default";
            }

            $t->session->set_userdata("settings",$settings);
        }

    return $settings;

}