<?php


namespace modava\affiliate\helpers;

/*
 * Implement by Hoang Duc
 * Date:    2020-07-29
 * Purpose: Provide a Util class*/

class MyAurisApi
{
    public static function getListThaoTac () {
        $cache = \Yii::$app->cache;
        $cacheKey = 'redis-affiliate-dashboard-myauris-list-thao-tac';

        $apiParam = \Yii::$app->controller->module->params['myauris_config'];

        if ($cache->exists($cacheKey)) return $cache->get($cacheKey);

        $curlHelper2 = new CurlHelper($apiParam['url_end_point'] . $apiParam['endpoint']['list_thao_tac']);
        $curlHelper2->setHeader($apiParam['header']);
        $response2 = $curlHelper2->execute();

        $listThaoTac = json_decode($response2['result'], true);
        $cache->set($cacheKey, $listThaoTac, 86400); // Cache 1 day

        return $listThaoTac;
    }

    public static function getCompleteCustomerService ($payload) {
        $cache = \Yii::$app->cache;
        $cacheKey = 'redis-affiliate-dashboard-myauris';
        foreach ($payload as $key => $value) {
            $cacheKey .= "-{$key}-{$value}";
        }

        if ($cache->exists($cacheKey)) return $cache->get($cacheKey);

        $apiParam = \Yii::$app->controller->module->params['myauris_config'];

        $url = $apiParam['url_end_point'] . $apiParam['endpoint']['complete_customer_service'] . '?per-page=' . $apiParam['row_per_page'] . '&' . http_build_query($payload);

        $curlHelper = new CurlHelper($url);
        $curlHelper->setHeader($apiParam['header']);
        $response = $curlHelper->execute();

        $cache->set($cacheKey, $response, 86400); // Cache 1 day

        return $response;
    }
}