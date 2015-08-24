<?php
error_reporting(E_ALL  ^ E_NOTICE);
ini_set('display_errors', '1');

require_once "LiteTestPHP.php";


require_once "TestMatrix.class.php";

$test_runner = new TestRunnerCLI();

$test_runner->add_test_case(new TestMatrix());

$test_runner->print_results();


?>