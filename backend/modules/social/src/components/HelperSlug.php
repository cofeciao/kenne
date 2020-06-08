<?php


namespace modava\social\components;


use common\helpers\MyHelper;

class HelperSlug
{
    public function __invoke($name)
    {
        var_dump($name);
        return MyHelper::createAlias($name);
    }
}