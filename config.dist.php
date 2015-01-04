<?php

////////////////////////////////////////////////////////////////////////////////
// AceArmory configuration file

////////////////////////////////////////////////////////////////////////////////
// General settings
// Adjust to your needs

// Character Armory
define('ARMORY_URL',      'http://your_armory_site_url_here/');
define('ARMORY_REALM',    'RealmNameHere');

// Item database (for icons)
define('ITEMDB_URL',      'http://your_item_database_url_here/');

// Item database (local)
define('DATABASE_PATH',   './db/item_template.db');

// Character database (local)
define('SHEETS_DIR_PATH', './characters/');

////////////////////////////////////////////////////////////////////////////////
// Advanced settings
// You probably do NOT need to modify anything below

// Armory URLs
define('GUILD_URL',       ARMORY_URL . 'guild-info.xml');
define('CHARSHEET_URL',   ARMORY_URL . 'character-sheet.xml');

// Item URLs
define('ITEMS_URL',       ITEMDB_URL . '?item=');
define('ICONS_URL',       ITEMDB_URL . 'images/icons/medium/');
define('SPEC_ICON_URL',   ITEMDB_URL . 'images/icons/small/');

// Priest Holy spec fix URLs
define('HOLY_SPEC_TEX',   'spell_holy_guardianspirit');
define('HOLY_SPEC_ICO',   ARMORY_URL . 'wow-icons/_images/21x21/spell_holy_guardianspirit.png');
