<?php

namespace API\Platform\Http\Controllers;

use App\Http\Controllers\Controller;
use InfyOm\Generator\Utils\ResponseUtil;
use API\Platform\Http\Controllers\Utils\PaginatedResponseUtil;
use Response;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{
    public function sendPaginatedResponse($result, $message, $total, $limit, $model, $page)
    {
        return Response::json(PaginatedResponseUtil::makePaginatedResponse($message, $result, $total, $limit, $model, $page));
    }

    public function sendResponse($result, $message)
    {
        return Response::json(ResponseUtil::makeResponse($message, $result));
    }

    public function sendError($error, $code = 404)
    {
        return Response::json(ResponseUtil::makeError($error), $code);
    }

    public function sendSuccess($message)
    {
        return Response::json([
            'success' => true,
            'message' => $message
        ], 200);
    }
}
