$(document).ready(function () {        $(".news_type_select").change(function () {        $value = $(this).val();        if ($value === "image") {            $(".video_url_container").hide();            $(".image_upload_container").fadeIn();        } else if ($value === "video") {            $(".image_upload_container").hide();            $(".video_url_container").fadeIn();        }    })})