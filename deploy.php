<?php
/**

 * @see https://github.com/secondtruth/php-phar-compiler
 */
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
use Secondtruth\Compiler\Compiler;

$compiler = new Compiler('./');

$compiler->addIndexFile('cli.php');


$compiler->addFile('vendor/autoload.php');
$compiler->addDirectory('vendor/composer', '!*.php');
$compiler->addDirectory('vendor/zendframework', '!*.php');
$compiler->addDirectory('src', '!*.php');


$compiler->compile("./mvv-cli.phar");