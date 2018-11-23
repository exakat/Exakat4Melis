<?php

$files = glob('Analyzer/*/*.php');

$ini = array();
foreach($files as $file) {
    $conf = substr($file, 9, -4);
    $ini[] = "All[] = \"$conf\";";
}

$iniFile = implode(PHP_EOL, $ini);
file_put_contents('analyzers.ini', $iniFile);
?>