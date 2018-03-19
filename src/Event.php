<?php

namespace Fabstract\Component\Event;

class Event implements EventInterface
{
    /**
     * @return string
     */
    public function getChannel()
    {
        return static::class;
    }
}
