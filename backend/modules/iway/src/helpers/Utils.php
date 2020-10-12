<?php


namespace modava\iway\helpers;

/*
 * Implement by Hoang Duc
 * Date:    2020-07-29
 * Purpose: Provide a Util class*/

use modava\auth\models\User;
use Yii;

class Utils
{
    const DB_DATE_FORMART = 'Y-m-d';
    const DB_DATETIME_FORMART = 'Y-m-d H:i:s';
    const DB_SHORT_DATETIME_FORMART = 'Y-m-d H:i';
    const DISPLAY_DATE_FORMART = 'd-m-Y';
    const DISPLAY_DATETIME_FORMART = 'd-m-Y H:i:s';
    const DISPLAY_SHORT_DATETIME_FORMART = 'd-m-Y H:i';

    public static function decamelize($string)
    {
        return str_replace('_', '-', strtolower(preg_replace(['/([a-z\d])([A-Z])/', '/([^_])([A-Z][a-z])/'], '$1_$2', $string)));
    }

    public static function convertDateToDBFormat($date)
    {
        if ($date == '') return null;

        return date(self::DB_DATE_FORMART, strtotime($date));
    }

    public static function convertDateToDisplayFormat($date)
    {
        if ($date == '') return null;

        return date(self::DISPLAY_DATE_FORMART, strtotime($date));
    }

    public static function convertDateTimeToDBFormat($datetime, $isShortDateTime = false)
    {
        if ($datetime == '') return null;

        if ($isShortDateTime) return date(self::DB_SHORT_DATETIME_FORMART, strtotime($datetime));

        return date(self::DB_DATETIME_FORMART, strtotime($datetime));
    }

    public static function convertDateTimeToDisplayFormat($datetime, $isShortDateTime = false)
    {
        if ($datetime == '') return null;

        if ($isShortDateTime) return date(self::DISPLAY_SHORT_DATETIME_FORMART, strtotime($datetime));

        return date(self::DISPLAY_DATETIME_FORMART, strtotime($datetime));
    }

    public static function isReleaseObject($obj)
    {
        return !in_array($obj, Yii::$app->getModule('affiliate')->params['not_release_object']) || Yii::$app->user->can(User::DEV) || Yii::$app->user->can('admin');
    }

    public static function convertToRawNumber($number)
    {
        return str_replace(',', '', $number);
    }
}