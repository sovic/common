<?php

namespace Sovic\Common\Controller\Trait;

use JsonException;
use Symfony\Component\HttpFoundation\Request;

trait JsonRequestTrait
{
    public function getRequestData(Request $request): array
    {
        try {
            $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException) {
            $data = [];
        }

        return $data;
    }
}
