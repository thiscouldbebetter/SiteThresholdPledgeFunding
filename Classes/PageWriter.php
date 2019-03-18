<?php

class PageWriter
{
	public static function displayStatusMessage($statusMessage)
	{
		echo "<pre>" . wordwrap($statusMessage) . "</pre>";
	}

	public static function elementHeadWrite($pageTitle)
	{
		$configuration = include($_SERVER["DOCUMENT_ROOT"] . "/Store/Configuration.php");
		$siteTitle = $configuration["SiteTitle"];
		echo("<title>" . $siteTitle . " - " . $pageTitle . "</title>");
		echo("<link rel='stylesheet' href='Style.css'>");
	}

	public static function footerWrite()
	{
		echo("<script id='scriptFooter' type='text/javascript' src='Footer.js'></script>");
	}

	public static function headerWrite()
	{
		echo("<script id='scriptHeader' type='text/javascript' src='Header.js'></script>");
	}

	public static function licenseVerifyForProductID($productIDToVerify)
	{
		$session = $_SESSION["Session"];
		$userLoggedIn = $session->user;
		$licenses = $userLoggedIn->licenses;
		$isUserLicensedForProduct = false;
		foreach ($licenses as $license)
		{
			$licenseProductID = $license->productID;
			if ($licenseProductID == $productIDToVerify)
			{
				$isUserLicensedForProduct = true;
				break;
			}
		}
		if ($isUserLicensedForProduct == false)
		{
			echo "You do not yet have a license to access this content.  ";
			echo "You can buy a license by clicking the link below.<br />";
			echo "<a href='../../Pages/Product.php?productID=" . $productIDToVerify . "'>View Product</a>";
			die();
		}
	}
}

?>
