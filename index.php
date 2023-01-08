<?php
use Processor\OrderProcessor;
use Interface\Biller\LinePay;


$biller = new LinePay();
$orderProcessor = new OrderProcessor($biller);

try {
	$orderProcessor->process($order);
} catch (\Exception $exception) {

}

?>