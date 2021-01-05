<?php

namespace API\Platform\Http\Controllers\Utils;

class PaginatedResponseUtil
{
    const FIRST_PAGE = 1;

    /**
     * @param string $message
     * @param mixed  $data
     *
     * @return array
     */
    public static function makePaginatedResponse($message, $data, $total, $limit, $model, $page)
    {
        $frontEndDiff = 1;
        $frontEndPage = $page + $frontEndDiff;
        $pagesAsInt = floor($total / $limit);
        if ($pagesAsInt == $total / $limit) {
            $pagesAsInt -= 1;
        }
        $lastPage = $pagesAsInt + $frontEndDiff;
        $pageString = '/' . $model . '?page=';
        $paginator = [
            '@id' => $pageString . $frontEndPage,
            '@type' => 'hydra:PartialCollectionView',
            'hydra:first' => '/' . $model . '/',
            'hydra:last' => $pageString . $lastPage,
        ];
        if (self::FIRST_PAGE < $frontEndPage) {
            $previousPage = $frontEndPage - 1;
            $paginator['hydra:previous'] = $pageString . $previousPage;

        }
        if (self::FIRST_PAGE <= $frontEndPage && $lastPage > $frontEndPage) {
            $nextPage = $frontEndPage + 1;
            $paginator['hydra:next'] = $pageString . $nextPage;

        }
        return [
            'success' => true,
            'data' => $data,
            "hydra:totalItems" => $total,
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
