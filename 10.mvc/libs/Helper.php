<?php
class Helper {

    public static function formatNumber($number = 0, $option = null) {
        if($option == null) {
            return number_format($number, 0, '',".") . ' VND';
        } 
        if($option == 'admin') {
            return  number_format($number, 0, '',".") . 'đ';
        } 
    }

    public static function createStatus($status = 0, $url = null, $option = null) {
        $xhtml = '';
        if($option == null) {
            if($status == 1) {
                $xhtml .= '<a href="' . $url .'" class="btn btn-warning">Active</a>';
            } else {
                $xhtml .= '<a href="' . $url .'" class="btn btn-info">Inactive</a>';
            }
        } 
        if($option == 'order') {
            if($status == 1) {
                $xhtml .= '<a href="' . $url .'" class="btn btn-warning">Đã giao</a>';
            } else {
                $xhtml .= '<a href="' . $url .'" class="btn btn-info">Mới nhận</a>';
            }
        } 
        return $xhtml;
    }
}