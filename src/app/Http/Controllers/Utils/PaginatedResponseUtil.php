<?php

namespace API\Platform\Http\Controllers\Utils;

class PaginatedResponseUtil
{
    /**
     * @param string $message
     * @param mixed  $data
     *
     * @return array
     */
    public static function makePaginatedResponse($message, $data, $total, $limit, $model, $page)
    {
        $lastPage = floor($total / $limit);
        $paginator = [
            'hydra:first' => '/' . $model . '/',
            // 'hydra:last' => '/politiebureaus/?page=' . $lastPage,
            'hydra:last' => '?page=' . $lastPage,
        ];
        if (1 < $page) {
            $previousPage = $page - 1;
            $paginator['hydra:previous'] = '?page=' . $previousPage;

        }
        if (1 <= $page && $lastPage > $page) {
            $nextPage = $page + 1;
            $paginator['hydra:next'] = '?page=' . $nextPage;

        }
        return [
            'success' => true,
            'data' => $data,
            // 'hydra:member' => $data,
            "hydra:totalItems" => $limit,
            'hydra:view' => $paginator,
            'message' => $message,
        ];
    }

    /**
     * @param string $message
     * @param array  $data
     *
     * @return array
     */
    public static function makeError($message, array $data = [])
    {
        $res = [
            'success' => false,
            'message' => $message,
        ];

        if (!empty($data)) {
            $res['data'] = $data;
        }

        return $res;
    }
}
