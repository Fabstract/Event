<?php

namespace Fabstract\Component\Event;

use Fabstract\Component\Event\Exception\TypeConflictException;

class Assert extends \Fabstract\Component\Assert\Assert
{

    protected static function generateException($name, $expected, $given)
    {
        $exception = parent::generateException($name, $expected, $given);
        return new TypeConflictException(
            $exception->getMessage(),
            $exception->getCode(),
            $exception
        );
    }
}
