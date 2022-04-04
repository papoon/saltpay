<?php

$loader = require_once '../libs/vendor/autoload.php';
$loader->setUseIncludePath(true);

use Luracast\Restler\Defaults;
use Luracast\Restler\Restler;

Defaults::$cacheDirectory = 'cache/';
Defaults::$useUrlBasedVersioning = true;

$r = new Restler();
$r->setOverridingFormats('JsonFormat');
$r->setAPIVersion(1);
$r->addAPIClass('PlayWithStrings');
$r->handle();
