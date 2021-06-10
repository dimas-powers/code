<?php declare(strict_types=1);

namespace App\Domain;

use Cassandra\Uuid;

/**
 * Class AbstractUuid
 * @package App\Domain
 */
class AbstractUuid
{
    /**
     * @return static
     */
    protected static function createUuid()
    {
        return new static(
            Uuid::uuid4()->toString()
        );
    }
}