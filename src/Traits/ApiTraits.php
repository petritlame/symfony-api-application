<?php


namespace App\Traits;


use Symfony\Component\HttpFoundation\JsonResponse;

trait ApiTraits
{
    /**
     * @param $responseMessage
     * @param $statusId
     * @param array $data
     * @return JsonResponse
     */
    public function responseToJson($responseMessage, $statusId, $data = [])
    {
        $response = [
            'message' => $responseMessage,
            'status' => $statusId,
            'data' => $data,
        ];
        return new JsonResponse($response);
    }

    /**
     * @param string $error
     * @param array $errorMessages
     * @param int $code
     * @return JsonResponse
     */
    public function sendErrorResponse(string $error, $errorMessages = [], int $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error
        ];

        if (!empty($errorMessages)) {
            foreach ($errorMessages->getMessages() as $key => $value) {
                $response['data'][$key] = $value;
            }
        }

        return new JsonResponse($response, $code);
    }

}