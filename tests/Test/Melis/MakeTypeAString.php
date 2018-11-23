<?php

namespace Test\Melis;

use Test\Analyzer;

include 'Test/Analyzer.php';

class MakeTypeAString extends Analyzer {
    /* 2 methods */

    public function testMelis_MakeTypeAString01()  { $this->generic_test('Melis/MakeTypeAString.01'); }
    public function testMelis_MakeTypeAString02()  { $this->generic_test('Melis/MakeTypeAString.02'); }
}
?>