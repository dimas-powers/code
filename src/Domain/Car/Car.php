<?php declare(strict_types=1);

namespace App\Domain\Car;

use App\Domain\CarId;
use Doctrine\ORM\Mapping as ORM;
use App\Domain\Car\CarRepository;

/**
 * @ORM\Entity(repositoryClass="App\Domain\Car\CarRepository")
 * @ORM\Table(name="car")
 *
 * @package App\Domain\Car
 */
class Car
{
    /**
     * Car constructor.
     * @param string $type
     * @param string $model
     */
    public function __construct(
        string $type,
        string $model
    ) {
        $this->id = CarId::create();
        $this->type = $type;
        $this->model = $model;
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="car_id")
     *
     * @var CarId
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64, unique=true)
     *
     * @var string
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=64)
     *
     * @var string
     */
    private $model;

    /**
     * @return CarId
     */
    public function getId(): CarId
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }
}