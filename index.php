<?php // AceArmory (c) 2015 by Siarkowy. All rights reserved. See LICENSE for licensing info.

include './config.php';

function __autoload($class) { include './class/class.' . strtolower($class) . '.php'; }

// Database
$dbh = new PDO('sqlite:' . DATABASE_PATH) or die('Could not open item database.');

if (isset($_GET['sheet']) && is_array($_GET['sheet']))
{
    list($sheet, $compareto) = $_GET['sheet'];
}
else
{
    $sheet = isset($_GET['sheet']) ? $_GET['sheet'] : null;
    $compareto = isset($_GET['compareto']) ? $_GET['compareto'] : null;
}

if (isset($_POST['newsheet']) && !empty($_POST['newsheet']))
{
    $newsheet = htmlspecialchars($_POST['newsheet']);
    $filename = $newsheet . ' ' . date("Y-m-d His");
    $xml = file_get_contents(CHARSHEET_URL . '?r=' . ARMORY_REALM . '&n=' . $newsheet);
    file_put_contents(SHEETS_DIR_PATH . $filename . '.xml', $xml);
    header('Location: ?sheet=' . urlencode($filename));
    exit;
}

if (!$sheet)
{
    $sheetlist = array();
    $sheetdir = opendir(SHEETS_DIR_PATH);

    while ($file = readdir($sheetdir))
        if ($file != '.' && $file != '..' && $file != '.htaccess')
            $sheetlist[] = $file;

    closedir($sheetdir);
    sort($sheetlist);
}

if (!$sheet)
{
    $title = 'Dashboard';
    $view = 'dashboard.php';
}
else
{
    $char = new Character(file_get_contents(SHEETS_DIR_PATH . $sheet . '.xml'));
    $char2 = isset($compareto) ? new Character(file_get_contents(SHEETS_DIR_PATH . $compareto . '.xml')) : null;

    $title = $char->prefix . $char->name . $char->suffix;
    if ($char->guild)
        $title .= " of &lt;{$char->guild}&gt;";
    $view = 'character.php';
}

include('views/template.php');
