<?php declare(strict_types=1);

namespace App\Api\Request;

/**
 * Class CreateCarRequest
 * @package App\Api\Request
 */
class CreateCarRequest
{
    /**
     * @var string
     *
     * @Assert\NotNull
     * @Assert\NotBlank
     *
     * @SWG\Property(type="string")
     */
    public $type;

    /**
     * @var string
     *
     * @Assert\NotNull
     * @Assert\NotBlank
     *
     * @SWG\Property(type="string")
     */
    public $model;
}