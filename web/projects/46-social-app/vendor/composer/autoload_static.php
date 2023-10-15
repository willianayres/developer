<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb41e8fe09a349d9f3f7ee3cb502f5b75
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Classes\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Classes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Classes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb41e8fe09a349d9f3f7ee3cb502f5b75::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb41e8fe09a349d9f3f7ee3cb502f5b75::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb41e8fe09a349d9f3f7ee3cb502f5b75::$classMap;

        }, null, ClassLoader::class);
    }
}