<?php

namespace Tests;

use Composer\Composer;
use Composer\Config;
use Composer\Downloader\DownloadManager;
use Composer\IO\IOInterface;
use Mockery;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Xpressengine\Installer\XpressengineInstaller;

class XpressengineInstallerTest extends TestCase
{
    public function test_get_package_base_path_returns_base_path_string()
    {
        $installer = $this->getInstaller();

        $package = Mockery::mock('Composer\Package\PackageInterface');
        $package->shouldReceive('getPrettyName')->andReturn('xe-foo/bar');
        $package->shouldReceive('getTargetDir')->andReturn('xe-foo/bar');

        $reflection = new ReflectionClass(XpressengineInstaller::class);
        $method = $reflection->getMethod('getPackageBasePath');
        $method->setAccessible(true);

        $path = $method->invokeArgs($installer, [
            $package,
        ]);

        $this->assertEquals('plugins/bar', $path);
    }

    public function test_supports_returns_true_when_right_package_type()
    {
        $installer = $this->getInstaller();

        $this->assertFalse($installer->supports('foobar-plugin'));
        $this->assertTrue($installer->supports('xpressengine-plugin'));
    }

    private function getInstaller()
    {
        $composer = Mockery::mock(Composer::class);
        $io = Mockery::mock(IOInterface::class);
        $config = Mockery::mock(Config::class);
        $downloadManager = Mockery::mock(DownloadManager::class);

        $composer->shouldReceive('getDownloadManager')->andReturn($downloadManager);
        $composer->shouldReceive('getConfig')->andReturn($config);

        // https://getcomposer.org/doc/06-config.md#vendor-dir
        $config->shouldReceive('get')->once()->with('vendor-dir')->andReturn('vendor');
        // https://getcomposer.org/doc/06-config.md#bin-dir
        $config->shouldReceive('get')->once()->with('bin-dir')->andReturn('vendor/bin');
        // https://getcomposer.org/doc/06-config.md#bin-compat
        $config->shouldReceive('get')->once()->with('bin-compat')->andReturn('auto');

        return new XpressengineInstaller($io, $composer);
    }
}
