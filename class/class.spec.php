<?php // AceArmory (c) 2015 by Siarkowy. All rights reserved. See LICENSE for licensing info.

class Spec
{
    public $icon;
    public $name;
    public $one;
    public $two;
    public $three;

    public function __construct($name, $icon, $one, $two, $three)
    {
        $this->name = $name;
        $this->icon = $icon;
        $this->one = (int) $one;
        $this->two = (int) $two;
        $this->three = (int) $three;
    }

    public function __toString()
    {
        return sprintf('<img src="%s%s.jpg" class="icon" alt="%s"> %s (%d/%d/%d)',
            SPEC_ICON_URL, $this->icon, $this->name, $this->name, $this->one, $this->two, $this->three);
    }
}
