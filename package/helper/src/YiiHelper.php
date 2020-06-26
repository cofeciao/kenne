<?php


namespace modava\helper;


class YiiHelper
{
    /**
     * Displays status of all.
     * @param integer $status
     * @return mixed
     */
    public static function GetStatus($status)
    {
        switch ($status) {
            case 1:
                return 'Hiển thị';
            case 0:
                return 'Tạm ngưng';
            default:
                return null;
        }
    }
}