<?php

namespace Fabs\Component\Event;

interface EventEmitterInterface
{
    /**
     * @param EventInterface $event
     */
    function emit($event);

    /**
     * @param string $event_class_name
     * @param ListenerInterface|string $listener
     */
    function addListener($event_class_name, $listener);

    /**
     * @param string $event_class_name
     * @param ListenerInterface|string $listener
     */
    function removeListener($event_class_name, $listener);
}
