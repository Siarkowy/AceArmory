<?php // AceArmory (c) 2015 by Siarkowy. All rights reserved. See LICENSE for licensing info.

class Character
{
    public $name;
    public $level;
    public $race;
    public $class;

    public $prefix;
    public $suffix;

    public $guild;
    public $guildlong;
    public $guildurl;
    public $url;

    public $inventory;
    public $spec;
    public $profs;

    public function __construct($xml)
    {
        $obj  = new SimpleXMLElement($xml);

        $data =& $obj->characterInfo->character;
        $tab  =& $obj->characterInfo->characterTab;

        $this->name     = $data['name'];
        $this->level    = (int) $data['level'];
        $this->race     = $data['race'];
        $this->class    = $data['class'];

        $this->prefix   = $data['prefix'];
        $this->suffix   = $data['suffix'];

        $this->guild    = $data['guildName'];
        $this->guildurl = $data['guildUrl'];
        $this->guildlong = isset($chardata['guildName']) ? sprintf(' of <a href="%s?%s">&lt;%s&gt;</a>', GUILD_URL, $this->guildurl, $this->guild) : '';
        $this->url      = CHARSHEET_URL . '?' . $data['charUrl'];

        // items
        $this->inventory = array();
        foreach ($tab->items->item as $entry)
            $this->inventory[(int) $entry['slot']] = new Item($entry['id'], $entry['icon']);

        ksort($this->inventory);

        // talent specs
        $spec =& $tab->talentSpecs->talentSpec[0];
        $this->spec = new Spec($spec['prim'], $spec['icon'], $spec['treeOne'], $spec['treeTwo'], $spec['treeThree']);

        // professions
        $this->profs = array();
        foreach ($tab->professions->skill as $prof)
            $this->profs[] = new Profession($prof['name'], $prof['value'], $prof['max']);
    }
}
