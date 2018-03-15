<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf4461103541e0901acfd9b668b44be21
{
    public static $prefixLengthsPsr4 = array (
        'N' => 
        array (
            'Nonce\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Nonce\\' => 
        array (
            0 => __DIR__ . '/..' . '/elhardoum/nonce-php/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'SecurityLib' => 
            array (
                0 => __DIR__ . '/..' . '/ircmaxell/security-lib/lib',
            ),
        ),
        'R' => 
        array (
            'RandomLib' => 
            array (
                0 => __DIR__ . '/..' . '/ircmaxell/random-lib/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf4461103541e0901acfd9b668b44be21::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf4461103541e0901acfd9b668b44be21::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitf4461103541e0901acfd9b668b44be21::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
