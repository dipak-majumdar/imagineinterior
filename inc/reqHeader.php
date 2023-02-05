<?php
require_once dirname(__DIR__)."/inc/constants.inc.php";

require_once ABSPATH."_config/dbconnect.php";
require_once ABSPATH."classes/site.class.php";

$SiteInfo   = new SiteInfo();

$site = $SiteInfo->showSiteInfo();


?>