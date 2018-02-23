<?php 
error_reporting(E_ALL);

$ip = @$_GET['ip'];
if($ip) {
  echo "<h2>geoip</h2><pre>";

  echo "geoip_record_by_name($ip):";
  print_r(geoip_record_by_name($ip));
  echo "\nASN:" . geoip_asnum_by_name($ip);

  echo "\n\n<b>Installed DBs</b>";
  //watch out, non-installed DBs give seg-fault, E.g.  GEOIP_CITY_EDITION_REV0
  echo "\nGEOIP_COUNTRY_EDITION:   ". geoip_database_info(GEOIP_COUNTRY_EDITION);
  echo "\nGEOIP_CITY_EDITION_REV1: ". geoip_database_info(GEOIP_CITY_EDITION_REV1);
  echo "\nGEOIP_ASNUM_EDITION:     ". geoip_database_info(GEOIP_ASNUM_EDITION);
  echo "</pre>";
}

echo "<h1>It works</h1>"; 

if(!$ip) $ip = $_SERVER['REMOTE_ADDR'];
echo '<form method="GET">geoip test <input name="ip" value="'.$ip.'"><input type="submit" value="Go"></form>';

phpinfo();
