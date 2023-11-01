<?php
spl_autoload_register(function ($class) {
    // Lista de diretórios onde as classes podem estar
    $directories = [
        'core',
        'app/views',
        'app/controllers',
        'app/models'
    ];

    foreach ($directories as $dir) {
        $file = __DIR__ . '/' . $dir . '/' . $class . '.php';

        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});