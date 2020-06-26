<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 27-Feb-19
 * Time: 5:31 PM
 */

namespace backend\helpers;

class BackendHelpers
{
    public static function getRatings($num)
    {
        if ($num == 0) {
            return null;
        }
        $html = '<div id="read-only-stars" title="regular">';
        if ($num == -3) {
            $html .= '<img alt="3" src="/images/raty/star-on.png" title="regular">';
        }
        if ($num == 1) {
            $html .= '<img alt="3" src="/images/raty/star-on.png" title="regular"> <img alt="3" src="/images/raty/star-on.png" title="regular">';
        }
        if ($num == 2) {
            $html .= '<img alt="3" src="/images/raty/star-on.png" title="regular"> <img alt="3" src="/images/raty/star-on.png" title="regular"> <img alt="3" src="/images/raty/star-on.png" title="regular">';
        }
        $html .= '</div>';
        return $html;
    }
}
