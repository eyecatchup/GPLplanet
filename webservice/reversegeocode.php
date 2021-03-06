<?php


/**
 * Web Service Wrapper for Reverse Geocoding (demonstration)
 * 'lon' and 'lat' parameters take coordinate values (default format is json; use 'serialized' for php)
 * @example http://example.com/gplplanet/webservice/reversegeocode.php?lon=-122.042482&lat=37.370415
 * @return more-or-less native geoplanet webservice return
 * @package gplplanet
 * @author Tyler Bell tylerwbell[at]gmail[dot]com
 * @copyright (C) 2009,2010 - Tyler Bell
 */

error_reporting(0);

require_once ('../class.geoengine.php');
$engine = geoengine :: getInstance();
$res = array ();
if (!empty ($_REQUEST['lon']) && !empty ($_REQUEST['lat'])) {
	$res = $engine->reversegeocode($_REQUEST['lon'], $_REQUEST['lat']);
} else {
	$engine->logMsg(__METHOD__. " parameter missing");
	$res = null;
}

//Format, return
if ($_REQUEST['format'] == "serialized") {
	$res = serialize($res);
} else {
	$res = json_encode($res);
}
echo $res."\n";
?>
