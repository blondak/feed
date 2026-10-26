<?php

declare(strict_types=1);

error_reporting(E_ALL);
set_error_handler(static function (int $severity, string $message, string $file, int $line): bool {
    if (error_reporting() & $severity) {
        throw new ErrorException($message, 0, $severity, $file, $line);
    }
    return false;
});

require getenv('COMPAT_AUTOLOAD') ?: __DIR__ . '/vendor/autoload.php';
spl_autoload_register(static function (string $class): void {
    $prefix = 'Mk\\Feed\\';
    if (strpos($class, $prefix) === 0) {
        $file = __DIR__ . '/../../src/' . str_replace('\\', '/', substr($class, strlen($prefix))) . '.php';
        if (is_file($file)) {
            require $file;
        }
    }
}, true, true);

$checks = 0;
function compatSame($expected, $actual): void
{
    global $checks;
    if ($expected !== $actual) {
        throw new RuntimeException('Expected ' . var_export($expected, true) . ', got ' . var_export($actual, true));
    }
    $checks++;
}

function compatTypeError(callable $callback): void
{
    try {
        $callback();
    } catch (TypeError $e) {
        compatSame(true, true);
        return;
    }
    throw new RuntimeException('Expected TypeError for an invalid argument.');
}

foreach (['Custom', 'Glami', 'Heureka', 'HeurekaAvailability', 'Mall', 'Shoptet', 'Zbozi'] as $generator) {
    $class = 'Mk\\Feed\\Generators\\' . $generator . '\\CategoriesHelper';
    compatSame($class, get_class(new $class()));
    compatSame($class, get_class(new $class(null)));

    $storage = new Nette\Caching\Storages\MemoryStorage();
    $categories = [10 => 'Animals | Cats', 20 => 'Animals | Dogs'];
    (new Nette\Caching\Cache($storage, $class))->save('categories', $categories);
    compatSame($categories, (new $class($storage))->getCategories());
    compatTypeError(static function () use ($class): void {
        new $class(new stdClass());
    });
}

$item = new Mk\Feed\Generators\Luigi\Item();
compatSame(null, $item->getAvailabilityDate());
compatSame($item, $item->setAvailabilityDate(null));
$date = new DateTime('2026-10-26T13:45:00+01:00');
compatSame($item, $item->setAvailabilityDate($date));
compatSame('2026-10-26T13:45:00+01:00', $item->getAvailabilityDate());
compatSame($item, $item->setAvailabilityDate());
compatSame(null, $item->getAvailabilityDate());
compatTypeError(static function () use ($item): void {
    $item->setAvailabilityDate('2026-10-26');
});

echo 'OK: ' . $checks . " feed compatibility assertions under E_ALL\n";
