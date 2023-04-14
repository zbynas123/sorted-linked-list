<?php

namespace App\Controller;

use App\Service\SortedLinkedList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class InsertValueController extends AbstractController
{

    public function __construct(private readonly SortedLinkedList $sortedLinkedList) {}

    #[Route('api/insert/value', name: 'insert_values', methods: 'POST')]
    public function insertValues(Request $request): JsonResponse
    {
        if ($request->request->has('values') === false) {
            return new JsonResponse(
                ['message' => 'Wrong parameters, request must contain value'],
                JsonResponse::HTTP_BAD_REQUEST
            );
        }

        $values = $request->get('values');
        if (!is_array($values)) {
            return new JsonResponse(
                ['message' => 'Wrong format, values must be array'],
                JsonResponse::HTTP_BAD_REQUEST
            );
        }
        $this->sortedLinkedList->insertValues($values);

        return new JsonResponse(['list' => $this->sortedLinkedList->getList()]);
    }
}
