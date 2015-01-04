<?php // AceArmory (c) 2015 by Siarkowy. All rights reserved. See LICENSE for licensing info.

class Item
{
    public $id;
    public $name;
    public $quality;
    public $url;
    public $icon;
    public $iconurl;
    public $itemlevel;

    public function __construct($id, $icon)
    {
        $this->id = (int) $id;
        $this->url = ITEMS_URL . $this->id;
        $this->icon = $icon;
        $this->iconurl = ICONS_URL . $this->icon . '.jpg';

        $proto = $this->getItemProto();

        $this->name = $proto->name;
        $this->quality = $proto->Quality;
        $this->itemlevel = $proto->ItemLevel;
    }

    public function __toString()
    {
        return sprintf('<a href="%s" class="itemlink rarity%d"><img src="%s" alt="%s" class="icon"> <span>[%s]</span></a>',
            $this->url, $this->quality, $this->iconurl, $this->icon, $this->name);
    }

    public function getItemProto()
    {
        global $dbh;

        $sth = $dbh->prepare("SELECT * FROM `item_template` WHERE `entry` = :entry LIMIT 1");
        $sth->execute(array(':entry' => $this->id));
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Item');

        return $sth->fetchObject();
    }
}
