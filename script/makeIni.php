<?php

$config = parse_ini_file('./config.ini');

$ini = array('; Themes lists for '.$config['name'],
             '; Generated on '.date('r'),
             '; Version : '.$config['version'],
             '; Build : '.$config['build'],
             PHP_EOL,
             );

$files = glob('Analyzer/*/*.php');
foreach($files as $file) {
    $conf = substr($file, 9, -4);
    $ini[] = "All[] = \"$conf\";";
}

$folders = glob('Analyzer/*');
foreach($folders as $folder) {
    $ini[] = PHP_EOL;
    $base = basename($folder);
    $files = glob("Analyzer/$base/*");
    foreach($files as $file) {
        $conf = substr($file, 9, -4);
        $ini[] = "{$base}[] = \"$conf\";";
    }
}

$iniFile = implode(PHP_EOL, $ini);
file_put_contents('analyzers.ini', $iniFile);

?>