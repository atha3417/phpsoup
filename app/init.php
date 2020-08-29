<?php

require_once 'Config/config.php';

if ($config['composer_autoload'] === true) {
    require_once 'Package/vendor/autoload.php';
}

if ($config['package'] !== false) {
    if (is_array($config['package'])) {
        for ($i = 0; $i < count($config['package']); $i++) {
            require_once 'Package/' . $config['package'][$i];
        }
    } else {
        require_once 'Package/' . $config['package'];
    }
}

spl_autoload_register(function ($class) {
    require_once 'Core/' . $class . '.php';
});

function base_url($url = null)
{
    global $config;
    $base_url = $config['base_url'] . "/public";
    if ($url != null) {
        return $base_url . "/" . $url;
    } else {
        return $base_url;
    }
}

function redirect($url)
{
    header("Location: " . base_url($url));
}
