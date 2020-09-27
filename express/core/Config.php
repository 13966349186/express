<?php
namespace app\core\express\core;

class Config
{
    //单独配置
    private $kd100 = [
        'code' => '',
        'customer' => '',
    ];
    private $wd = [
        'code' => ''
    ];
    private $func_name;

    public function setFuncName($type): Config
    {
        if (!isset($this->{$type})) {
            throw new \Exception('config func error');
        }
        $this->func_name = $type;
        return $this;
    }

    public function config($config)
    {
        $arr = $this->{$this->func_name};
        array_walk($arr, function ($item, $key) use ($config) {
            if (!isset($config[$key]) || empty($config[$key])) {
                throw new \InvalidArgumentException('config key error');
            }
            $this->{$this->func_name}[$key] = $config[$key];
        });
        return $this->{$this->func_name};
    }
}
