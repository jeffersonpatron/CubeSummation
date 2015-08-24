<?php

require_once "LiteTestPHP.php";

require_once "Matrix.class.php";

/**
 * 
 */
class TestMatrix extends TestCase {

    public function test_my_class() {
        $my_class = new MatrixNxn(4);
        $this->assert_true($my_class instanceof MatrixNxn);
    }
    
    public function  test_firstArray(){
        $fArray = new MatrixNxn(4);
        $fArray->firstArray();
/*        
        echo "<pre>";
        print_r($fArray->getMatrix());
		echo "<pre>";
*/
        $fArray->updateVal(1,1,1,5);
		
/*
		echo "<pre>";
        print_r($fArray->getMatrix());
		echo "<pre>";
*/       

        $this->assert_equals(5,$fArray->sumArray());
    }

 
    
}
?>