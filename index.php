<?php
$user_agent = $_SERVER['HTTP_USER_AGENT'];

function get_user_device($user_agent) {
    $devices = array("Mobile", "Tablet", "Desktop");

    foreach ($devices as $device) {
        if (strpos($user_agent, $device) !== false) {
            return $device;
        }
    }

    return "Unknown Device";
}

function get_user_os($user_agent) {
    $os_platform  = "Unknown OS";

    $os_array     = array(
        '/windows nt 10/i'      =>  'Windows 10',
        '/windows nt 6.3/i'     =>  'Windows 8.1',
        '/windows nt 6.2/i'     =>  'Windows 8',
        '/windows nt 6.1/i'     =>  'Windows 7',
        '/windows nt 6.0/i'     =>  'Windows Vista',
        '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
        '/windows nt 5.1/i'     =>  'Windows XP',
        '/windows xp/i'         =>  'Windows XP',
        '/windows nt 5.0/i'     =>  'Windows 2000',
        '/windows me/i'         =>  'Windows ME',
        '/win98/i'              =>  'Windows 98',
        '/win95/i'              =>  'Windows 95',
        '/win16/i'              =>  'Windows 3.11',
        '/macintosh|mac os x/i' =>  'Mac OS X',
        '/mac_powerpc/i'        =>  'Mac OS 9',
        '/linux/i'              =>  'Linux',
        '/ubuntu/i'             =>  'Ubuntu',
        '/iphone/i'             =>  'iPhone',
        '/ipod/i'               =>  'iPod',
        '/ipad/i'               =>  'iPad',
        '/android/i'            =>  'Android',
        '/blackberry/i'         =>  'BlackBerry',
        '/webos/i'              =>  'Mobile',
        '/windows nt 10.0/i'    =>  'Windows 11'
    );

    foreach ($os_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $os_platform = $value;
        }
    }

    return $os_platform;
}

function get_user_browser($user_agent) {
    $browser        = "Unknown Browser";

    $browser_array  = array(
        '/msie/i'       => 'Internet Explorer',
        '/trident/i'    => 'Internet Explorer',
        '/edge/i'       => 'Edge',
        '/firefox/i'    => 'Firefox',
        '/safari/i'     => 'Safari',
        '/chrome/i'     => 'Chrome',
        '/opera/i'      => 'Opera',
        '/netscape/i'   => 'Netscape',
        '/maxthon/i'    => 'Maxthon',
        '/konqueror/i'  => 'Konqueror',
        '/mobile/i'     => 'Handheld Browser',
        '/brave/i'      => 'Brave',
        '/vivaldi/i'    => 'Vivaldi',
        '/puffin/i'     => 'Puffin',
        '/ucbrowser/i'  => 'UC Browser',
        '/SamsungBrowser/i' => 'Samsung Internet'
    );

    foreach ($browser_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $browser = $value;
        }
    }

    return $browser;
}

function get_user_language() {
    $language = isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : 'Unknown Language';
    return $language;
}

function get_user_ip_address() {
    $ip_address = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'Unknown IP Address';
    return $ip_address;
}

function get_user_ipv4_address() {
    $ipv4_address = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'Unknown IPv4 Address';
    return $ipv4_address;
}

function get_user_ipv6_address() {
    $ipv6_address = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'Unknown IPv6 Address';
    return $ipv6_address;
}

function get_user_geolocation() {
    $geolocation = file_get_contents("https://ipapi.co/json/");
    $geolocation_data = json_decode($geolocation, true);
    $location = "Unknown Location";

    if ($geolocation_data && isset($geolocation_data['city']) && isset($geolocation_data['country_name'])) {
        $location = $geolocation_data['city'] . ', ' . $geolocation_data['country_name'];
    }

    return $location;
}

function get_user_current_time() {
    date_default_timezone_set('UTC');
    $current_time = date("Y-m-d H:i:s");
    return $current_time;
}

$device = get_user_device($user_agent);
$os = get_user_os($user_agent);
$browser = get_user_browser($user_agent);
$language = get_user_language();
$ip_address = get_user_ip_address();
$ipv4_address = get_user_ipv4_address();
$ipv6_address = get_user_ipv6_address();
$geolocation = get_user_geolocation();
$current_time = get_user_current_time();

echo "Device: $device<br>";
echo "Operating System: $os<br>";
echo "Browser: $browser<br>";
echo "Language: $language<br>";
echo "IP Address: $ip_address<br>";
echo "IPv4 Address: $ipv4_address<br>";
echo "IPv6 Address: $ipv6_address<br>";
echo "Geolocation: $geolocation<br>";
echo "Current Time: $current_time<br>";
echo "Zuazuaman developer<br>";
echo "zidan web development<br>";
?>
