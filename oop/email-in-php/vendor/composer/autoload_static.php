<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit31c7b3d4a9a0437ff4bca5b2d0429f60
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit31c7b3d4a9a0437ff4bca5b2d0429f60::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit31c7b3d4a9a0437ff4bca5b2d0429f60::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}