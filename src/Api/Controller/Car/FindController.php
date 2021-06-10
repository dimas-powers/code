<?php declare(strict_types=1);


namespace App\Api\Controller\Car;


use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class FindController
{
//    /**
//     * @Route("/checkouts/{paymentId}", name="checkout_payment_get", methods={"GET"})
//     *
//     * @SWG\Response(
//     *     response=200,
//     *     description="View payment info",
//     *     @Model(type=CheckoutPaymentView::class)
//     * )
//     *
//     * @param PaymentId $paymentId
//     * @param EntityManagerInterface $em
//     *
//     * @return JsonResponse
//     *
//     * @throws NonUniqueResultException
//     */
//    public function __invoke(PaymentId $paymentId, EntityManagerInterface $em)
//    {
//        try {
//            $view = new PaymentView($em);
//            $view
//                ->whereType(PaymentView::TYPE_CHECKOUT)
//                ->whereId($paymentId);
//
//            $res = $view->getSingleResult();
//
//            return DataResponse::entity($res);
//        } catch (NoResultException $e) {
//            return new JsonResponse(['message' => 'Entity not found'], 404);
//        }
//    }
}