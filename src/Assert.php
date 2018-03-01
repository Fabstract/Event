<?php


namespace Fabs\Component\Event;


use Fabs\Component\Event\Exception\TypeConflictException;

class Assert extends \Fabs\Component\Assert\Assert
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