<?php

namespace Fabstract\Component\Event;

class SimpleEvent extends Event
{
    /** @var string */
    private $channel = null;

    /**
     * @param string $channel
     * @return SimpleEvent
     */
    public function setChannel($channel)
    {
        Assert::isNotEmptyString($channel, false, 'channel');
        $this->channel = $channel;
        return $this;
    }

    /**
     * @return string
     */
    public function getChannel()
    {
        if ($this->channel !== null) {
            return $this->channel;
        }

        return parent::getChannel();
    }
}
