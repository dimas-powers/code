<?php declare(strict_types=1);

namespace App\Domain;

/**
 * Class CarId
 * @package App\Domain
 */
class CarId extends AbstractUuid
{
    /**
     * @return CarId
     */
    public static function create(): CarId
    {
        return static::createUuid();
    }
}