<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'config.php';
use Secondtruth\Compiler\Compiler;

$compiler = new Compiler('./');

$pharFiles = array(
	'cli.php' => '.' . DIRECTORY_SEPARATOR . 'deploy/openhab-cli.phar',
	'openhab-command.php' => '.' . DIRECTORY_SEPARATOR . 'deploy/openhab-command.phar',
	'openhab-sitemap.php' => '.' . DIRECTORY_SEPARATOR . 'deploy/openhab-sitemap.phar'
);

foreach ($pharFiles as $indexFile => $compileTarget) {
	$compiler->addIndexFile($indexFile);
	$compiler->addFile('vendor/autoload.php');
	$compiler->addFile('config.php');
	$compiler->addDirectory('vendor/composer', '!*.php');
	$compiler->addDirectory('vendor/zendframework', '!*.php');
	$compiler->addDirectory('vendor/league', '!*.php');
	$compiler->addDirectory('src', '!*.php');
	$compiler->compile($compileTarget);
	chmod($compileTarget, 0755);

	if (true === defined('DEPLOY_TARGET')) {
		copy($compileTarget, DEPLOY_TARGET . pathinfo($compileTarget)['filename']);
	}
}
