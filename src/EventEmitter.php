<?php

namespace Fabs\Component\Event;

class EventEmitter implements EventEmitterInterface
{
    /**
     * @param EventInterface $event
     */
    public function emit($event)
    {

    }

    /**
     * @param string $event_class_name
     * @param ListenerInterface $listener
     */
    public function addListener($event_class_name, $listener)
    {

    }

    /**
     * @param string $event_class_name
     * @param ListenerInterface $listener
     */
    public function removeListener($event_class_name, $listener)
    {

    }
}
