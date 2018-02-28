<?php

namespace Fabs\Component\Event;

use Fabs\Component\Assert\Assert;

class EventEmitter implements EventEmitterInterface
{
    /**
     * @var ListenerInterface[][]
     */
    private $listener_channel_lookup = [];

    /**
     * @param EventInterface $event
     * @return $this
     */
    public function emit($event)
    {
        Assert::assertType($event, EventInterface::class, 'event');

        foreach ($this->getListeners($event) as $listener) {
            $listener->onEvent($event);
        }

        return $this;
    }

    /**
     * @param ListenerInterface|string $listener
     * @return $this
     */
    public function addListener($listener)
    {
        if (is_string($listener)) {
            Assert::assertClassExists($listener);
            $listener = new $listener;
        }

        Assert::assertType($listener, ListenerInterface::class, 'listener');

        $channel = $listener->getChannel();

        $this->listener_channel_lookup[$channel][] = $listener;
        return $this;
    }

    /**
     * @param ListenerInterface|string $listener
     * @return $this
     */
    public function removeListener($listener)
    {
        if (!is_string($listener)) {
            Assert::assertType($listener, ListenerInterface::class, 'listener');
            $listener = get_class($listener);
        }

        foreach ($this->listener_channel_lookup as $channel => $listener_list) {
            foreach ($listener_list as $key => $listener_x) {
                if ($listener_x instanceof $listener) {
                    unset($this->listener_channel_lookup[$channel][$key]);
                }
            }
        }

        return $this;
    }

    /**
     * @param EventInterface $event
     * @return ListenerInterface[]
     */
    protected function getListeners($event)
    {
        Assert::assertNonEmptyString($event->getChannel(), false, 'event.channel');
        return $this->getListenersByChannel($event->getChannel());
    }

    /**
     * @param string $channel
     * @return ListenerInterface[]
     */
    protected function getListenersByChannel($channel)
    {
        if (array_key_exists($channel, $this->listener_channel_lookup)) {
            return $this->orderListeners($this->listener_channel_lookup[$channel]);
        }
        return [];
    }

    /**
     * @param ListenerInterface[] $listeners
     * @return ListenerInterface[]
     */
    private function orderListeners($listeners)
    {
        usort($listeners, function ($listener_1, $listener_2) {
            $priority_1 = -INF;
            $priority_2 = -INF;

            if ($listener_1 instanceof PriorityAwareListenerInterface) {
                $priority_1 = $listener_1->getPriority();
            }
            if ($listener_2 instanceof PriorityAwareListenerInterface) {
                $priority_2 = $listener_1->getPriority();
            }

            if (is_infinite($priority_1) && is_infinite($priority_2)) {
                return 0;
            }

            if ($priority_1 === $priority_2) {
                return 0;
            }

            if ($priority_1 > $priority_2) {
                return 1;
            }

            return -1;
        });

        return $listeners;
    }
}
