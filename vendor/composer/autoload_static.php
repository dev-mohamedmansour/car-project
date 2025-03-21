<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit83aef6bfe1f1c59a30a5e5f7f7955a1a
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Car\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Car\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Logic',
        ),
    );

    public static $classMap = array (
        'Car\\Models\\Db' => __DIR__ . '/../..' . '/Logic/Models/Db.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit83aef6bfe1f1c59a30a5e5f7f7955a1a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit83aef6bfe1f1c59a30a5e5f7f7955a1a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit83aef6bfe1f1c59a30a5e5f7f7955a1a::$classMap;

        }, null, ClassLoader::class);
    }
}
