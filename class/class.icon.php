<?php // AceArmory (c) 2015 by Siarkowy. All rights reserved. See LICENSE for licensing info.

class Icon
{
    public $alt;
    public $tex;
    public $url;

    public function __construct($texture, $alt = NULL)
    {
        $this->alt = ! is_null($alt) ? $alt : 'ico';
        $this->tex = $texture;
        $this->url = SPEC_ICON_URL . $this->tex . '.jpg';
    }

    public function __toString()
    {
        return sprintf('<img src="%s" alt="%s" class="icon">',
            $this->tex == HOLY_SPEC_TEX ? HOLY_SPEC_ICO : $this->url,
            $this->alt);
    }
}
