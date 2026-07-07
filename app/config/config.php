<?php
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    // DB Params
    define('DB_HOST', 'localhost');
    define('DB_USER', 'leadstar_mitre');
    define('DB_PASS', 'Avalanche@25');
    define('DB_NAME', 'leadstar_mitre');

    // App Root
    define('APPROOT', dirname(dirname(__FILE__)));
    // URL Root
    define('URLROOT', 'https://mitre.com.ng');
    // Site Name
    define('SITENAME', 'MITRE');

    // Display Errors
    error_reporting(E_ALL);
    ini_set('display_errors', 1);


    // Fetch settings from the database
    if (!$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME)) {
        die("failed to connect");
    }

    $sql = "SELECT * FROM settings";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query);

    //
    define('SENIOR', $result['senior']);
    // 
    define('JUNIOR', $result['junior']);
    // 
    define('S_CONCLAVE', $result['s_conclave']);
    // 
    define('J_CONCLAVE', $result['j_conclave']);
} else {
    // DB Params
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'mitre');

    // App Root
    define('APPROOT', dirname(dirname(__FILE__)));
    // URL Root
    define('URLROOT', 'http://localhost/mitre');
    // Site Name
    define('SITENAME', 'MITRE');

    // Display Errors
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Fetch settings from the database
    if (!$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME)) {
        die("failed to connect");
    }

    $sql = "SELECT * FROM settings";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query);

    //
    define('SENIOR', $result['senior']);
    // 
    define('JUNIOR', $result['junior']);
    // 
    define('S_CONCLAVE', $result['s_conclave']);
    // 
    define('J_CONCLAVE', $result['j_conclave']);
}


// 
define('FULLDAY1', 'Monday');
// 
define('FULLDAY2', 'Tuesday');
// 
define('FULLDAY3', 'Wednesday');
// 
define('FIRSTDAY', 'Arrival');

$date = date('d-m-Y');
$day = '';

switch ($date) {
    case '29-02-2024':
        $day = 'MITRE Alumni Retreat Ongoing';
        break;

    case '01-03-2024':
        $day = 'MITRE Alumni Retreat Ongoing';
        break;

    case '02-03-2024':
        $day = 'MITRE Alumni Retreat Ongoing';
        break;

    case '09-03-2026':
        $day = 'First Full Day Of MITRE';
        break;

    case '10-03-2026':
        $day = 'Second Full Day Of MITRE';
        break;

    case '11-03-2026':
        $day = 'Third Full Day Of MITRE';
        break;

    case '12-03-2026':
        $day = 'Fourth Full Day Of MITRE';
        break;

    case '13-03-2026':
        $day = 'Last Full Day Of MITRE';
        break;

    case '14-03-2026':
        $day = 'Last Day Of MITRE';
        break;
    default:
        $day = 'Not currently in MITRE session';
}

define('DAY', $day);
