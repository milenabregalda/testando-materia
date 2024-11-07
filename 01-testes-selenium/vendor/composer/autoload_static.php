<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitad590a429ae9cbd2ca2624527d4f4d21
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Facebook\\WebDriver\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Facebook\\WebDriver\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-webdriver/webdriver/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitad590a429ae9cbd2ca2624527d4f4d21::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitad590a429ae9cbd2ca2624527d4f4d21::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitad590a429ae9cbd2ca2624527d4f4d21::$classMap;

        }, null, ClassLoader::class);
    }
}