<?php
class PaymentClient
{	
	public static function fromConfigString($configString)
	{
		// hack - Assuming Square.
		$configuration = include($_SERVER["DOCUMENT_ROOT"] . "/Store/Configuration.php");
		$configString = $configuration["PaymentClientConfig"];
		return PaymentClientSquare::fromConfigString($configString);
	}
}	
?>
