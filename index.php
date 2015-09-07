<?php

require_once('vendor/autoload.php');
require_once('config.php');

use Brzoski\DbDiff;

error_reporting(E_ALL);
ini_set('display_errors',1);

$dbDiff = new DbDiff($config['source'], $config['target']);
$differences = $dbDiff->diff();

echo "<pre>";

foreach($differences as $difference) {
    echo "<p>========================================================================</p>";
    echo "<p>".$difference->getMessage()."</p>";
    echo "<p>".$difference->generateQuery()."</p>";
}


