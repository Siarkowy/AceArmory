<?php // AceArmory (c) 2015 by Siarkowy. All rights reserved. See LICENSE for licensing info.

error_reporting(E_NONE);

include './config.php';
$dbh = new PDO('sqlite:' . DATABASE_PATH) or die('Could not open item database.');

function __autoload($class) { include './class/class.' . strtolower($class) . '.php'; }

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
$errors = array();
$view = null;

switch ($action)
{
    case 'compare':
    case 'show':
    {
        if (isset($_GET['sheet']) && is_array($_GET['sheet']))
        {
            list($sheet, $compareto) = $_GET['sheet'];
        }
        else
        {
            $sheet = isset($_GET['sheet']) ? $_GET['sheet'] : null;
            $compareto = isset($_GET['compareto']) ? $_GET['compareto'] : null;
        }

        if (isset($sheet))
        {
            $char = new Character(file_get_contents(SHEETS_DIR_PATH . $sheet . '.xml'));
            $char2 = isset($compareto) ? new Character(file_get_contents(SHEETS_DIR_PATH . $compareto . '.xml')) : null;
            $maxslot = $char2 ? 19 : 20;

            $title = $char->prefix . $char->name . $char->suffix;
            $view = 'character.php';

            if ($char->guild)
                $title .= " <small>of &lt;{$char->guild}&gt</small>";

        }
        else
            header('Location: ?');

        break;
    }

    case 'delete':
    {
        header('Location: ?');
        break;
    }

    case 'download':
    {
        header('Location: ?');
        break;
    }

    default:
    {
        $title = 'Saved characters';
        $view = 'dashboard.php';

        $sheetlist = array();
        $sheetdir = opendir(SHEETS_DIR_PATH);

        while ($file = readdir($sheetdir))
            if ($file != '.' && $file != '..' && $file != '.htaccess')
                $sheetlist[] = $file;

        closedir($sheetdir);
        sort($sheetlist);
    }
}

include('views/template.php');
