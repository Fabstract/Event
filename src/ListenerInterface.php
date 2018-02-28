<?php

namespace Fabs\Component\Event;

interface ListenerInterface
{
    /**
     * @param $event
     * @return void
     */
    function onEvent($event);
}
