<?php

namespace Fabstract\Component\Event;

interface ListenerInterface
{
    /**
     * @param $event
     * @return void
     */
    public function onEvent($event);

    /**
     * @return string
     */
    public function getChannel();
}
