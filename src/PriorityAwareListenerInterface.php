<?php

namespace Fabstract\Component\Event;

interface PriorityAwareListenerInterface extends ListenerInterface
{
    /**
     * @return int
     */
    function getPriority();
}
