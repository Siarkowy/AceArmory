<?php // AceArmory (c) 2015 by Siarkowy. All rights reserved. See LICENSE for licensing info.

class Profession
{
    public $name;
    public $curval;
    public $maxval;

    public function __construct($name, $curval, $maxval)
    {
        $this->name = $name;
        $this->curval = (int) $curval;
        $this->maxval = (int) $maxval;
    }

    public function __toString()
    {
        return "{$this->name} {$this->curval}/{$this->maxval}";
    }
}
