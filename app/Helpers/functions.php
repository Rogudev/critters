<?php

namespace App\Helpers;

class functions
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function makePagination($start, $url, $totalNumber)
    {
        $limit = 30;

        if ($totalNumber < $limit) {
            $pagination = '<div class="container d-flex flex-row justify-content-center align-items-center">';
            $pagination .= '<div class="row d-flex flex-row justify-content-center align-items-center"><div>';

            $pagination .= '<span>Página: 1 de 1</span><br>';

            return $pagination;
        }

        $pages = ceil($totalNumber / $limit);

        $next = $start + $limit;
        $previous = max(0, $start - $limit);

        $activePage = ceil(($start + 1) / $limit);

        $pagination = '<div class="container d-flex flex-row justify-content-center align-items-center">';
        $pagination .= '<div class="row d-flex flex-row justify-content-center align-items-center"><div>';

        $pagination .= '<span>Página: ' . $activePage . ' de ' . $pages . '</span><br>';
        $pagination .= '<ul class="pagination d-flex flex-row justify-content-around list-unstyled m-0">';

        if ($start > 0) {
            $pagination .= '<li><a href="/' . $url . '/' . $previous . '">«</a></li>';
        }

        for ($i = 0; $i < $pages; $i++) {
            $pageNumber = $i + 1;
            $pagination .= '<li class="page-item ' . ($i == ($activePage - 1) ? "active" : "") . '">';

            if ($i == ($activePage - 1)) {
                $pagination .= '<span>' . $pageNumber . '</span>';
            } else {
                $pagination .= '<a href="/' . $url . '/' . ($i * $limit) . '">' . $pageNumber . '</a>';
            }
            $pagination .= '</li>';
        }

        if ($next < $totalNumber) {
            $pagination .= '<li><a href="/' . $url . '/' . $next . '">»</a></li>';
        }

        $pagination .= '</ul></div></div></div>';

        return $pagination;
    }
}
