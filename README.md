# PHP_Unit

composer run-script tests

phpunit tests/ --filter=TestReturnsFullName
./vendor/bin/phpunit tests/ --filter=TestReturnsFullName

phpunit tests/ --color
./vendor/bin/phpunit tests/ --filter=TestReturnsFullName --color

PSR-4 autoloading: https://getcomposer.org/doc/04-schema.md#autoload