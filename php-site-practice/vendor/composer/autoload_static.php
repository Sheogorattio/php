<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit42a658fb9a764dcb214651dec4cbf5fa
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Skysn\\PhpSitePractice\\' => 22,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Skysn\\PhpSitePractice\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit42a658fb9a764dcb214651dec4cbf5fa::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit42a658fb9a764dcb214651dec4cbf5fa::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit42a658fb9a764dcb214651dec4cbf5fa::$classMap;

        }, null, ClassLoader::class);
    }
}
