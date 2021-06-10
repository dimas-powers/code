<?php declare(strict_types=1);

namespace App\Api\Response;

use App\Domain\AbstractUuid;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class DataResponse
 * @package App\Api\Response
 */
class DataResponse extends JsonResponse
{
    /**
     * @var array
     */
    protected $meta = [];

    /**
     * DataResponse constructor.
     *
     * @param mixed|null $data
     * @param int $status
     * @param array $headers
     * @param array $meta
     */
    public function __construct($data = null, int $status = 200, array $headers = [], array $meta = [])
    {
        $this->meta = $meta;
        parent::__construct($data, $status, $headers);
    }

    /**
     * @param AbstractUuid $id
     * @param array $meta
     * @param array $headers
     *
     * @return DataResponse
     */
    public static function created(AbstractUuid $id, array $meta = [], array $headers = []): DataResponse
    {
        return new static(
            ['id' => $id],
            JsonResponse::HTTP_CREATED,
            $meta,
            $headers
        );
    }
}