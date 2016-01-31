<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
use Secondtruth\Compiler\Compiler;

$compiler = new Compiler('./');

$compiler->addIndexFile('cli.php');
$compiler->addFile('vendor/autoload.php');
$compiler->addFile('config.php');
$compiler->addDirectory('vendor/composer', '!*.php');
$compiler->addDirectory('vendor/zendframework', '!*.php');
$compiler->addDirectory('vendor/league', '!*.php');
$compiler->addDirectory('src', '!*.php');
$compiler->compile('.' . DIRECTORY_SEPARATOR . 'deploy/cli.phar');


$compiler->addIndexFile('openhab-command.php');
$compiler->addFile('vendor/autoload.php');
$compiler->addFile('config.php');
$compiler->addDirectory('vendor/composer', '!*.php');
$compiler->addDirectory('vendor/zendframework', '!*.php');
$compiler->addDirectory('vendor/league', '!*.php');
$compiler->addDirectory('src', '!*.php');
$compiler->compile('.' . DIRECTORY_SEPARATOR . 'deploy/openhab-command.phar');


$compiler->addIndexFile('openhab-sitemap.php');
$compiler->addFile('vendor/autoload.php');
$compiler->addFile('config.php');
$compiler->addDirectory('vendor/composer', '!*.php');
$compiler->addDirectory('vendor/zendframework', '!*.php');
$compiler->addDirectory('vendor/league', '!*.php');
$compiler->addDirectory('src', '!*.php');
$compiler->compile('.' . DIRECTORY_SEPARATOR . 'deploy/openhab-sitemap.phar');