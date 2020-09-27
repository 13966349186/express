<?php


namespace app\core\express;

class ExpressFactory
{
    public function create(string $model, array $config = [])
    {
        $model = 'app\core\express\factory\\' . lcfirst($model) . '\\' . $model;
        if (class_exists($model)) {
            return new $model($config);
        }
        throw new \Exception('调用错误');
    }
}