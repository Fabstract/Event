<?php

namespace Fabstract\Component\Event;

interface EventEmitterInterface
{
    /**
     * @param EventInterface $event
     * @return $this
     */
    public function emit($event);

    /**
     * @param ListenerInterface|string $listener
     * @return $this
     */
    public function addListener($listener);

    /**
     * @param ListenerInterface|string $listener
     * @return $this
     */
    public function removeListener($listener);
}
