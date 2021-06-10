<?php declare(strict_types=1);


namespace App\Api\Controller\Car;

use App\Api\Request\CreateCarRequest;
use App\Api\Response\DataResponse;
use App\Domain\Car\Car;
use App\Domain\Car\CarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateController extends AbstractController
{
    /**
     * @var CarRepository
     */
    private $repository;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(CarRepository $repository, EntityManagerInterface $entityManager)
    {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/car/create", name="car_create", methods={"POST"})
     *
     * @param CreateCarRequest $request
     *
     * @return DataResponse
     */
    public function __invoke(CreateCarRequest $request)
    {
        $car = new Car(
            $request->type,
            $request->model
        );

        $this->entityManager->persist($car);
        $this->entityManager->flush();

        return DataResponse::created($car->getId());
    }
}