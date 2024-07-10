<?php

namespace Sovic\Common\Controller\Trait;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @method json(mixed $data, int $status = 200, array $headers = [], array $context = []): JsonResponse
 */
trait JsonResponseTrait
{
    protected array $data = [];

    /**
     * Implement https://github.com/omniti-labs/jsend
     */
    protected function sendSuccess(int $code = 200): JsonResponse
    {
        return $this->json([
            'status' => 'success',
            'data' => $this->data,
        ], $code);
    }

    /**
     * Implement https://github.com/omniti-labs/jsend
     */
    protected function sendFail(int $code = 500): JsonResponse
    {
        return $this->json([
            'status' => 'fail',
            'data' => $this->data,
        ], $code);
    }

    /**
     * Implement https://github.com/omniti-labs/jsend
     */
    protected function sendError(string $errorMessage, int $code = 400): JsonResponse
    {
        return $this->json([
            'status' => 'error',
            'message' => $errorMessage,
        ], $code);
    }
}
