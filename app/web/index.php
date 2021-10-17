<?php
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;

include_once __DIR__.'/../vendor/autoload.php';

spl_autoload_register(function ($class) {
    $path =  __DIR__.'/../../'. str_replace('\\', '/', $class) . '.php';
    include_once $path;
});

$config    = new FileLocator(__DIR__ . '/../config');
$container = new ContainerBuilder();
$loader    = new YamlFileLoader($container, $config);

print_r([$container->has('redis.client'), $container->has('component.logic')]);
foreach (['services.yml'] as $file) {
    try {
       $loader->load($file);
    } catch (\Exception $e) {
       echo $e->getMessage()."\n";
    }
}
print_r([$container->has('redis.client'), $container->has('component.logic')]);
$logic = $container->get('component.logic');
print_r($logic->getName());
