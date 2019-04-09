<?php
$ip = "2600:1700:b650:a690:e9fa:a73b:8cca:1ec5";

if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
    echo("$ip is a valid IPv4 address");
} else if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
    echo("$ip is a valid IPv6 address");
} else {
    echo("$ip is not a valid IP address");
}
?>