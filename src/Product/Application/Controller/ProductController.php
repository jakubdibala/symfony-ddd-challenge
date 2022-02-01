<?php

namespace App\Product\Application\Controller;

use App\Product\Command\GetProductDetailCommand;
use App\Product\Command\GetProductDetailCommandHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductController extends AbstractController
{
    private GetProductDetailCommandHandler $getProductDetailCommandHandler;

    public function __construct(
        GetProductDetailCommandHandler $getProductDetailCommandHandler
    ) {
        $this->getProductDetailCommandHandler = $getProductDetailCommandHandler;
    }

    public function detail(string $id): JsonResponse
    {
        $product = $this->getProductDetailCommandHandler->__invoke(
            new GetProductDetailCommand($id)
        );

        return $this->json($product->toArray());
    }
}