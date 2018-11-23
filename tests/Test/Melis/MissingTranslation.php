<?php

namespace Test\Melis;

use Test\Analyzer;

include 'Test/Analyzer.php';

class MissingTranslation extends Analyzer {
    /* 1 methods */

    public function testMelis_MissingTranslation01()  { $this->generic_test('Melis/MissingTranslation.01'); }
}
?>