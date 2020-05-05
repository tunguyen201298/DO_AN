<?php

/**
 * @return link sort title table
 * @ $name: fields table need sort 
 * @ $title: string show header table
 * */
if (!function_exists('sort_title')) {

    function sort_title($name = '', $title = '') {
        if (Input::has('filter')) {
            return $title;
        }

        $base_url = Request::all();
        $base_url['sortfield'] = $name;
        $base_url['sorttype'] = "ASC";
        if (Input::has('page')) {
            $base_url['page'] = Input::get('page');
        }

        //sorting
        if (Input::has('sortfield') && Input::has('sorttype')) {
            $base_url['sortfield'] = $name;
            $base_url['sorttype'] = (Input::get('sorttype') == "ASC") ? "DESC" : "ASC";
        }

        $type_sort = Input::get('sorttype') == "ASC" ? '<i class="fa fa-sort-amount-asc"></i>' : '<i class="fa fa-sort-amount-desc"></i>';
        $link = "<a href=" . base_url($base_url) . ">" . (($name == Input::get('sortfield')) ? $type_sort : '') . " " . (($title != '') ? $title : $name) . "</a>";

        return $link;
    }

}

if (!function_exists('page_url')) {

    /**
     * 
     * @return url and parameters type get
     */
    function page_url() {
        $data = Request::all();
        return base_url($data);
    }

}

if (!function_exists('base_url')) {

    /**
     * 
     * @param type $base_url
     * @return type
     */
    function base_url($base_url = array()) {
        $url = Request::url() . '?';
        foreach ($base_url as $key => $value) {
            $url .= $key . "=" . $value . "&";
        }
        //remove last '&'

        return rtrim($url, "&");
    }

}
if (!function_exists('alert_message')) {

    /**
     * 
     * @param type $message
     * @param type $type
     * @return string
     */
    function alert_message($message = '', $type = '') {
        $str = '<div class="alert alert-' . $type . ' alert-dismissable">
                        <button data-dismiss="alert" class="close" type="button">
                            <i class="ace-icon fa fa-times"></i>
                        </button>
                        ' . $message . '
                    </div>';

        return $str;
    }

}


if (!function_exists('classActivePath')) {

    function classActivePath($path) {
        return Request::is($path) ? ' class="active"' : '';
    }

}

if (!function_exists('convertDate')) {

    function convertDate($strtotime) {
        if ($strtotime) {
            return date('d-m-Y', $strtotime);
        }
        return "";
    }

}

if (!function_exists('classActiveSegment')) {

    function classActiveSegment($segment, $value) {
        if (!is_array($value)) {
            return Request::segment($segment) == $value ? ' class="active"' : '';
        }
        foreach ($value as $v) {
            if (Request::segment($segment) == $v)
                return ' class="active"';
        }
        return '';
    }

}

if (!function_exists('classActiveOnlyPath')) {

    function classActiveOnlyPath($path) {
        return Request::is($path) ? ' active' : '';
    }

}

if (!function_exists('classActiveOnlySegment')) {

    function classActiveOnlySegment($segment, $value) {
        if (!is_array($value)) {
            return Request::segment($segment) == $value ? ' active' : '';
        }
        foreach ($value as $v) {
            if (Request::segment($segment) == $v)
                return ' active';
        }
        return '';
    }

}

function debug($data) {
    if (Illuminate\Support\Facades\Config::get('common.is_debug') == 1) {
        echo "=================================================================<br/>";
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        die();
    }
}

if (!function_exists('guid')) {

    function guid() {
        mt_srand((double) microtime() * 10000); //optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45); // "-"
        $uuid = chr(123)// "{"
                . substr($charid, 0, 8) . $hyphen
                . substr($charid, 8, 4) . $hyphen
                . substr($charid, 12, 4) . $hyphen
                . substr($charid, 16, 4) . $hyphen
                . substr($charid, 20, 12)
                . chr(125); // "}"
        return trim($uuid, "{}");
    }

}

if (!function_exists('sendMail')) {

    /**
     * 
     * @param type $template
     * @param type $data
     */
    function sendMail($template = '', $data = array()) {
        $beautymail = app()->make(Snowfire\Beautymail\Beautymail::class);
        $beautymail->send($template, $data, function($message) use ($data) {
            $message->from(\Config::get('common.email_admin'))
                    ->to($data['email'], 'Quản Lý Tuyến Truyền Dẫn')
                    ->subject($data['subject']);
        });
    }

}

//if (!function_exists('sendMailDocumentRequest')) {
//
//    /**
//     * 
//     * @param type $template
//     * @param type $data
//     */
//    function sendMailDocumentRequest($template = '', $data = array()) {
//        $beautymail = app()->make(Snowfire\Beautymail\Beautymail::class);
//        $beautymail->send("emails", $data, function($message) use ($data) {
//            $message->from("nguyenvantruc92@gmail.com");
//                    $message = $message->to("user1@yopmail.com", 'Quản Lý Tuyến Truyền Dẫn');
//                    $message = $message->to("user2@yopmail.com", 'Quản Lý Tuyến Truyền Dẫn');
//                    $message = $message->subject("Test mail");
//        });
//    }
//}

if (!function_exists('getIconCheck')) {

    /**
     * 
     * @param type $val
     */
    function getIconCheck($val = '') {
        if ($val) {
            return '<i class="fa fa-check-circle green"></i>';
        }
        return false;
    }

}

if (!function_exists('isPayStatus')) {

    /**
     * 
     * @param type $val
     */
    function isPayStatus($val = '') {
        if ($val) {
            return '<span class="label label-success">Đã thanh toán</span>';
        }
        return '<span class="label label-danger">Chưa thanh toán</span>';
    }

}

if (!function_exists('timestampToDate')) {

    /**
     * 
     * @param type $timestamp
     */
    function timestampToDate($timestamp = '') {
        if ($timestamp) {
            return date('d-m-Y', $timestamp);
        } else {
            return '';
        }
    }

}

if (!function_exists('timestampToDateTime')) {

    /**
     * 
     * @param type $timestamp
     */
    function timestampToDateTime($timestamp = '') {
        if ($timestamp) {
            return date('d-m-Y H:i:s', $timestamp);
        } else {
            return '';
        }
    }

}

if (!function_exists('formatDateVNToEN')) {

    /**
     * 
     * @param type $dateVN
     */
    function formatDateVNToEN($dateVN = '') {
        if ($dateVN) {
            return date('Y-m-d', strtotime($dateVN));
        } else {
            return '';
        }
    }

}

if (!function_exists('generatorString')) {

    function generatorString($str) {
        $unicode = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd' => 'đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i' => 'í|ì|ỉ|ĩ|ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D' => 'Đ',
            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );
        foreach ($unicode as $nonUnicode => $uni) {
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        }
        return strtolower(str_replace(" ", '-', trim($str)));
    }

}

if (!function_exists('barCode')) {

    function barCode($code, $number, $length = 8) {
        $arr = createBarCode($code, $number, $length);
        $barcode = $code;
        foreach ($arr as $digit) {
            $barcode .= $digit;
        };
        return $barcode;
    }

}

if (!function_exists('createBarCode')) {

    function createBarCode($code, $number, $length) {
        $strlen = strlen($number);

        $arr = array();
        $diff = $length - $strlen;

        // Push Leading Zeros
        while ($diff > 0) {
            array_push($arr, 0);
            $diff--;
        }

        // For PHP 4.x
        $arrNumber = array();
        for ($i = 0; $i < $strlen; $i++) {
            $arrNumber[] = substr($number, $i, 1);
        }

        // For PHP 5.x: $arrNumber    =    str_split( $number );
        $arr = array_merge($arr, $arrNumber);

        return $arr;
    }

}

if (!function_exists('compareVibaAndFrequencyLicense')) {

    /**
     * 
     * @param type $timestamp
     */
    function compareVibaAndFrequencyLicense($obj_viba, $obj_frequency_license) {
        $text_html = '<span class="label label-primary">NOT OK</span>';
        //debug($obj_viba);


        if (trim($obj_viba->name) != trim($obj_frequency_license->name)) {
            return $text_html;
        }

        if ($obj_viba->first_point_id != $obj_frequency_license->first_point_id) {
            return $text_html;
        }

        if ($obj_viba->final_point_id != $obj_frequency_license->final_point_id) {
            return $text_html;
        }

        if ($obj_viba->frequency_send != $obj_frequency_license->frequency_send) {
            return $text_html;
        }

        if ($obj_viba->frequency_receive != $obj_frequency_license->frequency_receive) {
            return $text_html;
        }

        if ($obj_viba->device_id != $obj_frequency_license->device_id) {
            return $text_html;
        }

        if ($obj_viba->capacity != $obj_frequency_license->capacity) {
            return $text_html;
        }

        if ($obj_viba->height_anten_ne != $obj_frequency_license->height_anten_ne) {
            return $text_html;
        }

        if ($obj_viba->height_anten_fe != $obj_frequency_license->height_anten_fe) {
            return $text_html;
        }

        if ($obj_viba->size_anten_ne != $obj_frequency_license->size_anten_ne) {
            return $text_html;
        }

        if ($obj_viba->size_anten_fe != $obj_frequency_license->size_anten_fe) {
            return $text_html;
        }

        return '<span class="label label-success">OK</span>';
    }

}

if (!function_exists('alertBox')) {

    function alertBox($type, $message, $line) {
        return '<div class="alert alert-' . $type . '">
                    <strong>' . ($line ? "Dòng số " . $line . ":" : "") . '</strong>
                    <div stype="width: 100%">' . $message . '</div>
                </div>';
    }

}

if (!function_exists('alertBoxImport')) {

    function alertBoxImport($type, $message, $line) {
        $str = '<div class="box-message type-' . $type . '" style="' . ($type == "success" ? "display:none;" : "") . '">';
        $str .= '<h3>Dòng số ' . $line . ': ' . ($type == "success" ? "Thành công" : "Có lỗi xảy ra") . '</h3>';
        $str .= '<div stype="width: 100%">' . $message . '</div>';
        $str .= '</div>';
        return $str;
    }

}

if (!function_exists('dateIsValid')) {

    function dateIsValid($str) {
        if ($str == "") {
            return false;
        }
        $array = explode('/', $str);
        if (count($array) < 3) {
            return false;
        }
        $day = $array[0];
        $month = $array[1];
        $year = $array[2];

        $isDateValid = checkdate($month, $day, $year);
        return $isDateValid;
    }

}

function treeview($deparments = null, $parent_id = null, $level = null) {
    $bool = false;
    $str = '';

    foreach ($deparments as $deparment) {
        if ($deparment['parent_id'] == $parent_id) {
            $bool = true;
            break;
        }
    }

    if ($bool) {
        $att_id = ($level == 0) ? 'navigation' : '';
        $str .= '<ul id="' . $att_id . '">';
    }

    $a = 1 + $level;
    foreach ($deparments as $deparment) {
        if ($deparment['parent_id'] == $parent_id) {
            if ($deparment['is_visible']) {
                $icon_active = '<i class="ace-icon fa fa-check-circle green"></i>';
            } else {
                $icon_active = '<i class="ace-icon fa fa-times-circle red"></i>';
            }
            $link = $parent_id != 0 ? url('admin/courses/index?subject_id=' . $deparment['id']) : 'javascript:;';
            $str .= '<li>
                <div class="subject_clear tv_format' . $a . '">
                    <div class="subject_name">
                        <a href="' . $link . '">' . $deparment['name'] . '</a>
                        <input type="hidden" id="getparent_id" value=' . $deparment['parent_id'] . ' />
                    </div>
                    <div class="subject_action">
                    <a class="hide_show" href="javascript:;" showid="' . $deparment['id'] . '" showac="' . $deparment['is_visible'] . '">                      
                        ' . $icon_active . '
                    </a>
                        <a href="' . url('admin/subjects/edit/' . $deparment['id']) . '"><i class="fa fa-pencil edit_color"></i></a>
                        <a data-toggle="modal" data-target="#subjectModal" onclick="delete_item_sub(' . $deparment['id'] . ')" class="red" href="javascript:;" title="' . trans("common.action_delete") . '">
                            <i class="fa fa-trash-o red"></i>
                        </a>
                    </div>
                </div>';
            $str .= treeview($deparments, $deparment['id'], $a);
            $str .= '</li>';
        }
    }
    if ($bool) {
        $str .= "</ul>";
    }
    return $str;
}

if (!function_exists('getPathUser')) {

    function getPathUser($image) {
        if ($image == null) {
            return 'public/img/no-image.png';
        }
        return asset('storage/app/users/' . $image);
    }

}

if (!function_exists('checkPermissionMultiAction')) {

    function checkPermissionMultiAction($name_module = "") {
        return App\Libs\Constants::checkPermissionMultiAction($name_module);
    }

}

if (!function_exists('checkPermissionReceiveDocumentPropose')) {

    function checkPermissionReceiveDocumentPropose() {
        $position = App\Models\Position::where("id", "=", Illuminate\Support\Facades\Auth::user()->position_id)
                        ->where("is_receive_document_proposed", "=", 1)->count();
        if ($position) {
            return true;
        }
        return false;
    }

}

if (!function_exists('getTimeago')) {

    function getTimeago($ptime) {
        $estimate_time = time() - $ptime;

        if ($estimate_time < 1) {
            return 'less than 1 second ago';
        }

        $condition = array(
            12 * 30 * 24 * 60 * 60 => 'year',
            30 * 24 * 60 * 60 => 'month',
            24 * 60 * 60 => 'day',
            60 * 60 => 'hour',
            60 => 'minute',
            1 => 'second'
        );

        foreach ($condition as $secs => $str) {
            $d = $estimate_time / $secs;

            if ($d >= 1) {
                $r = round($d);
                return 'about ' . $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
            }
        }
    }

}

if (!function_exists('thBasic')) {

    function thBasic() {
        $colspan = 4; //10;
        $width = 510; //1630;
        if (Input::get('basic_field_ngay_dua_vao_su_dung')) {
            $colspan += 1;
            $width += 140;
        }

        if (Input::get('basic_field_don_vi_dung_chung')) {
            $colspan += 1;
            $width += 220;
        }

        if (Input::get('basic_field_han_muc_dung_chung')) {
            $colspan += 1;
            $width += 200;
        }

        if (Input::get('basic_field_dia_chi')) {
            $colspan += 1;
            $width += 300;
        }

        if (Input::get('basic_field_long')) {
            $colspan += 1;
            $width += 80;
        }

        if (Input::get('basic_field_lat')) {
            $colspan += 1;
            $width += 80;
        }

        return '<th colspan="' . $colspan . '" class="text-center" style="width: ' . $width . 'px; border-bottom: 1px">Thông tin cơ bản</th>';
    }

}

if (!function_exists('thAnten')) {

    function thAnten() {
        $colspan = 0; //20;
        $width = 0; //2560;

        if (Input::get('anten_field_don_vi_so_huu') || Input::has('anten_don_vi_so_huus')) {
            $colspan += 1;
            $width += 140;
        }
        

        if (Input::get('anten_field_loai') || Input::has('anten_loais')) {
            $colspan += 1;
            $width += 50;
        }

        if (Input::get('anten_field_chieu_cao') || Input::has('anten_do_caos')) {
            $colspan += 1;
            $width += 90;
        }

        if (Input::get('anten_field_so_canh')) {
            $colspan += 1;
            $width += 90;
        }

        if (Input::get('anten_field_so_luong_mo_co')) {
            $colspan += 1;
            $width += 100;
        }

        if (Input::get('anten_field_so_tang_co')) {
            $colspan += 1;
            $width += 90;
        }

        if (Input::get('anten_field_vi_tri_cot') || Input::has('anten_vi_tris')) {
            $colspan += 1;
            $width += 90;
        }

        if (Input::get('anten_field_tinh_trang') || Input::has('anten_tinh_trangs')) {
            $colspan += 1;
            $width += 130;
        }

        if (Input::get('anten_field_outdoor') || Input::has('anten_outdoor_tinh_trangs')) {
            $colspan += 2;
            $width += 280;
        }

        if (Input::get('anten_field_tiep_dat') || Input::has('anten_tiep_dat_tinh_trangs') || Input::has('anten_tiep_dat_chu_so_huus')) {
            $colspan += 7;
            $width += 1060;
        }

        if (Input::get('anten_field_den_bao_khong') || Input::has('anten_den_bao_khong_loais') || Input::has('anten_den_bao_khong_tinh_trangs')) {
            $colspan += 3;
            $width += 440;
        }

        if ($colspan > 0) {
            return '<th colspan="' . $colspan . '" class="text-center" style="width: ' . $width . 'px; border-bottom: 1px">Cột anten</th>';
        } else {
            return '';
        }
    }

}

if (!function_exists('thStation')) {

    function thStation() {
        $colspan = 0; //15;
        $width = 0; //1850;

        if (Input::get('station_phong_may_loais') || Input::get('station_field_phong_may') || Input::has('station_phong_may_chu_quans') || Input::has('station_phong_may_vi_tris') || Input::has('station_phong_may_tinh_trangs')) {
            $colspan += 6;
            $width += 700;
        }
        
        

        if (Input::get('station_phong_may_no_loais') || Input::get('station_field_phong_may_no') || Input::has('station_phong_may_no_chu_quans') || Input::has('station_phong_may_no_vi_tris') || Input::has('station_phong_may_no_tinh_trangs')) {
            $colspan += 6;
            $width += 700;
        }

        if (Input::get('station_field_hang_rao') || Input::has('station_hang_rao_chu_quans') || Input::has('station_hang_rao_loais') || Input::has('station_hang_rao_tinh_trangs')) {
            $colspan += 5;
            $width += 650;
        }

        if ($colspan > 0) {
            return '<th colspan="' . $colspan . '" class="text-center" style="width: ' . $width . 'px; border-bottom: 1px">Nhà trạm</th>';
        } else {
            return '';
        }
    }

}

if (!function_exists('thPowerSystemAc')) {

    function thPowerSystemAc() {
        $colspan = 0; //12;
        $width = 0; //1780;

        if (Input::get('power_system_ac_field_bien_ap') || Input::has('power_system_ac_bien_ap_chu_so_huus') || Input::has('power_system_ac_bien_ap_cong_suats')) {
            $colspan += 5;
            $width += 760;
        }

        if (Input::get('power_system_ac_field_ac') || Input::has('power_system_ac_ac_chu_so_huus') || Input::has('power_system_ac_ac_so_phas') || Input::has('power_system_ac_ac_tinh_trangs')) {
            $colspan += 7;
            $width += 1020;
        }

        if ($colspan > 0) {
            return '<th colspan="' . $colspan . '" class="text-center" style="width: ' . $width . 'px; border-bottom: 1px">Hệ thống điện AC</th>';
        } else {
            return '';
        }
    }

}

if (!function_exists('thSupportDevice')) {

    function thSupportDevice() {
        $colspan = 0; //63;
        $width = 0; //6500;

        if (Input::get('support_device_field_on_ap') || Input::has('support_device_on_ap_chu_so_huus') || Input::has('support_device_on_ap_nhan_hieus') || Input::has('support_device_on_ap_so_phas') || Input::has('support_device_on_ap_cong_suats') || Input::has('support_device_on_ap_tinh_trangs')) {
            $colspan += 7;
            $width += 1150;
        }

        if (Input::get('support_device_field_ac') || Input::has('support_device_ac_chu_so_huus') || Input::has('support_device_ac_nhan_hieus') || Input::has('support_device_ac_so_phas') || Input::has('support_device_ac_tinh_trangs')) {
            $colspan += 6;
            $width += 910;
        }

        if (Input::get('support_device_field_may_phat_dien') || Input::has('support_device_mpd_chu_so_huus') || Input::has('support_device_mpd_nhan_hieus') || Input::has('support_device_mpd_cong_suats') || Input::has('support_device_mpd_nhien_lieus') || Input::has('support_device_mpd_so_phas') || Input::has('support_device_mpd_tinh_trangs')) {
            $colspan += 9;
            $width += 1170;
        }

        if (Input::get('support_device_field_ats') || Input::has('support_device_ats_chu_so_huus') || Input::has('support_device_ats_nhan_hieus') || Input::has('support_device_ats_so_phas') || Input::has('support_device_ats_tinh_trangs')) {
            $colspan += 6;
            $width += 780;
        }

        if (Input::get('support_device_field_canh_bao_ngoai') || Input::has('support_device_canh_bao_ngoai_chu_so_huus') || Input::has('support_device_canh_bao_ngoai_nhan_hieus') || Input::has('support_device_canh_bao_ngoai_tinh_trangs')) {
            $colspan += 6;
            $width += 780;
        }

        if (Input::get('support_device_field_dhkk1')) {
            $colspan += 8;
            $width += 1040;
        }

        if (Input::get('support_device_field_dhkk2')) {
            $colspan += 8;
            $width += 1040;
        }

        if (Input::get('support_device_field_dhkk3')) {
            $colspan += 8;
            $width += 1040;
        }

        if (Input::get('support_device_field_quat_hut_dc') || Input::has('support_device_quat_hut_dcs') || Input::has('support_device_quat_hut_dc_nhan_hieus') || Input::has('support_device_quat_hut_dc_tinh_trangs')) {
            $colspan += 5;
            $width += 650;
        }

        if ($colspan > 0) {
            return '<th colspan="' . $colspan . '" class="text-center" style="width: ' . $width . 'px; border-bottom: 1px">Thiết bị hỗ trợ</th>';
        } else {
            return '';
        }
    }

}

if (!function_exists('thCofferPowerDC')) {

    function thCofferPowerDC() {
        $colspan = 0; //52;
        $width = 0; //5320;

        if (Input::get('coffer_power_dc_field_tu_nguon_2g') || Input::has('coffer_power_dc_tu_nguon_2g_nhan_hieus') || Input::has('coffer_power_dc_tu_nguon_2g_cong_suats') || Input::has('coffer_power_dc_tu_nguon_2g_tinh_trangs')) {
            $colspan += 6;
            $width += 660;
        }

        if (Input::get('coffer_power_dc_field_tu_nguon_2g_accu') || Input::has('coffer_power_dc_tu_nguon_2g_nhan_hieu_accus') || Input::has('coffer_power_dc_tu_nguon_2g_tinh_trang_accus')) {
            $colspan += 7;
            $width += 700;
        }

        if (Input::get('coffer_power_dc_field_tu_nguon_3g') || Input::has('coffer_power_dc_tu_nguon_3g_nhan_hieus') || Input::has('coffer_power_dc_tu_nguon_3g_cong_suats') || Input::has('coffer_power_dc_tu_nguon_3g_tinh_trangs')) {
            $colspan += 6;
            $width += 660;
        }

        if (Input::get('coffer_power_dc_field_tu_nguon_3g_accu') || Input::has('coffer_power_dc_tu_nguon_3g_nhan_hieu_accus') || Input::has('coffer_power_dc_tu_nguon_3g_tinh_trang_accus')) {
            $colspan += 7;
            $width += 700;
        }

        if (Input::get('coffer_power_dc_field_tu_nguon_td') || Input::has('coffer_power_dc_tu_nguon_td_nhan_hieus') || Input::has('coffer_power_dc_tu_nguon_td_cong_suats') || Input::has('coffer_power_dc_tu_nguon_td_tinh_trangs')) {
            $colspan += 6;
            $width += 600;
        }

        if (Input::get('coffer_power_dc_field_tu_nguon_td_accu') || Input::has('coffer_power_dc_tu_nguon_td_nhan_hieu_accus') || Input::has('coffer_power_dc_tu_nguon_td_tinh_trang_accus')) {
            $colspan += 7;
            $width += 600;
        }

        if (Input::get('coffer_power_dc_field_tu_nguon_khac') || Input::has('coffer_power_dc_tu_nguon_khac_nhan_hieus') || Input::has('coffer_power_dc_tu_nguon_khac_cong_suats') || Input::has('coffer_power_dc_tu_nguon_khac_tinh_trangs')) {
            $colspan += 6;
            $width += 700;
        }

        if (Input::get('coffer_power_dc_field_tu_nguon_khac_accu') || Input::has('coffer_power_dc_tu_nguon_khac_nhan_hieu_accus') || Input::has('coffer_power_dc_tu_nguon_khac_tinh_trang_accus')) {
            $colspan += 7;
            $width += 700;
        }

        if ($colspan > 0) {
            return '<th colspan="' . $colspan . '" class="text-center" style="width: ' . $width . 'px; border-bottom: 1px">Tủ nguồn DC</th>';
        } else {
            return '';
        }
    }

}

if (!function_exists('thDeviceOther')) {

    function thDeviceOther() {
        $colspan = 0; //10;
        $width = 0; //840;

        if (Input::get('device_other_field_co2')) {
            $colspan += 2;
            $width += 160;
        }

        if (Input::get('device_other_field_bot')) {
            $colspan += 2;
            $width += 160;
        }

        if (Input::get('device_other_field_bang')) {
            $colspan += 5;
            $width += 500;
        }

        if (Input::get('device_other_field_hop_luu_tru_ho_so')) {
            $colspan += 1;
            $width += 120;
        }

        if ($colspan > 0) {
            return '<th colspan="' . $colspan . '" class="text-center" style="width: ' . $width . 'px; border-bottom: 1px">Thiết bị khác</th>';
        } else {
            return '';
        }
    }

}

if (!function_exists('convertDateViToEn')) {

    function convertDateViToEn($date) {
        return date("Y-m-d", strtotime($date));
    }

}

if (!function_exists('checkStringISDate')) {

    function checkStringISDate($string) {
        $arr_date = explode("/", str_replace("-", "/", substr($string, 0, 10)));
        if (count($arr_date) != 3) {
            return "1";
        }
        
        if(strlen($arr_date[2]) > 4){
            $arr_date[2] = substr($arr_date[2], 0, 4);
        }
        if (!is_numeric($arr_date[0]) || !is_numeric($arr_date[1]) || !is_numeric($arr_date[2])) {
            return "2";
        }

        if ($arr_date[0] == 0 || $arr_date[1] == 0 || $arr_date[2] < 1950) {
            return "3";
        }

        if(!checkdate($arr_date[1], $arr_date[0], $arr_date[2])){
            return "4";
        }
        return $arr_date[2] . "-" . $arr_date[1] . "-" . $arr_date[0];
    }
}
    