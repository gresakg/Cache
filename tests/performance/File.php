<?php

/**
 * This file is part of the Cache proyect.
 *
 * Copyright (c)
 *
 * This source file is subject to the MIT license that is bundled
 * with this package in the file LICENSE.
 *
 * @author : Daniel González <daniel.gonzalez@freelancemadrid.es>
 * @file : File.php , UTF-8
 * @date : Nov 27, 2012 , 10:53:29 PM
 *
 */

require_once __DIR__ . '/../bootstrap.php';

use Desarrolla2\Cache\Cache;
use Desarrolla2\Cache\Adapter\File;

$cache = new Cache(new File('/tmp'));

require_once __DIR__ . '/common.php';
