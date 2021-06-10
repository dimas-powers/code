<?php declare(strict_types=1);

namespace App\Api\Controller\Health;

use Doctrine\DBAL\DBALException;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class LivenessCheckController
 *
 * @package App\Api\Controller\Health
 */
class LivenessCheckController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * LivenessCheckController constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * @Route("/health-check/liveness", name="health_check_liveness", methods={"GET"})
     *
     * @param Request $request
     *
     * @return JsonResponse
     * @throws DBALException
     * @throws Exception
     */
    public function __invoke(Request $request): JsonResponse
    {
        $checkDataBase = filter_var($request->get('checkDataBase', true), FILTER_VALIDATE_BOOLEAN);
        if ($checkDataBase && !$this->checkDataBase()) {
            throw new Exception('Not valid database');
        }

        return new JsonResponse(['liveness' => true]);
    }

    /**
     * @return bool
     * @throws \Doctrine\DBAL\Driver\Exception
     * @throws \Doctrine\DBAL\Exception
     */
    private function checkDataBase(): bool
    {
        $connection = $this->em->getConnection();
        $statement = $connection->prepare('SELECT version();');
        $statement->executeQuery();

        return (bool) $statement->fetchAll();
    }
}
