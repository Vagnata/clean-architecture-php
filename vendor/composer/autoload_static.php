<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0bca7d713b1cd3db411e0846a727deda
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Alura\\Arquitetura\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Alura\\Arquitetura\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0bca7d713b1cd3db411e0846a727deda::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0bca7d713b1cd3db411e0846a727deda::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
