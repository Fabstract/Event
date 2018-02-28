<?php

namespace Fabs\Component\Event;

interface PriorityAwareListenerInterface extends ListenerInterface
{
    /**
     * @return int
     */
    function getPriority();
}
