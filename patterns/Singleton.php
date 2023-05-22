<?php

class Config
{
    protected static Config|null $config = null;

    public array $configs = [];

    protected function __construct()
    {
        $this->configs = [
            'var1' => 'value1',
            'var2' => 'value2',
            'var3' => 'value3'
        ];
    }

    public static function getInstance(): Config
    {
        if (is_null(static::$config)) {
            static::$config = new Config();
        }

        return static::$config;
    }
}

$config = Config::getInstance();
d($config);

$config->configs['new_config'] = 'new value';

$config = Config::getInstance();
d($config);
