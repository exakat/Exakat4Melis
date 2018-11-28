<?php


class AutoloadRemoteTest {
    public static function autoload($name) {
        $file = __DIR__.'/'.str_replace('\\', DIRECTORY_SEPARATOR, $name).'.php';

        if (file_exists($file)) {
            include $file;
        }
    }

    public function registerAutoload() {
        spl_autoload_register(array($this, 'autoload'));
    }
}

?>