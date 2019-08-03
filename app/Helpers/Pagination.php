<?php

	namespace App\Helpers;

	use App\Library\Config;

    abstract class Pagination {
	    
	    static $totalPages = 10;

	    // pagination range set to 10
	    const PAGINATION_RANGE = 10;


        /**
         * Getter to fetch total pages
         *
         * @return int
         */
        private function getTotalPages()
        {
            return self::$totalPages;
        }


        /**
         * Setter to set total pages
         *
         * @param int $totalPages
         */
        private function setTotalPages($totalPages)
        {
            self::$totalPages = $totalPages;
        }


        /**
         * Parse parameter array into url params
         *
         * @param $params
         * @return string
         */
        private function parseParams($params)
        {
            $parsedParams = '';
            foreach ($params as $key => $value) {
                $parsedParams .= $key . '=' . $value. '&';
            }

            return $parsedParams;
        }


        /**
         *
         * Paginate method that renders pagination across the filtered records
         *
         * @param $totalRecords
         * @param $limit
         * @param int $currentPage
         * @param null $additionalParams
         */
        public function paginate($totalRecords, $perPage, $currentPage, $additionalParams = null)
		{
            $maxPage = ceil($totalRecords / $perPage);
            Config::load(BASEPATH . 'config/pagination.php');

            $recordsLimit = Config::get('records_limit');
            if ($totalRecords > $recordsLimit) {
                $maxPage = $recordsLimit / $perPage;
            }

            // set last page of the pagination to max page if max page is grater than 10.
            // else we don't need to render last page in pagination
            $lastPage = ($maxPage > self::PAGINATION_RANGE || $maxPage < $currentPage) ? $maxPage : null;

            if ($currentPage < $maxPage) {
                if ($currentPage < self::PAGINATION_RANGE) {
                    self::setTotalPages(self::PAGINATION_RANGE); //if current page is less than 10 set total page to 10
                } else {
                    $totalPages = self::getTotalPages() + $currentPage; //otherwise, set total page to sum of totalpage and current page
                    self::setTotalPages($totalPages);
                }
            }

			$pagLink = "<nav aria-label=\"Page navigation mx-auto\"><ul class=\"pagination justify-content-center\">";

            $i = 1;
            if ($currentPage > (self::PAGINATION_RANGE - 1)) {
                $i = $currentPage - (self::PAGINATION_RANGE / 2);
                self::setTotalPages($currentPage + (self::PAGINATION_RANGE / 2));
            }

            if (self::getTotalPages() > $maxPage) {
                self::setTotalPages($maxPage);
            }

            $pagLink = self::generatePaginateLinks($pagLink, $currentPage, 1, $additionalParams, "First");

            if ($currentPage > 9)
                $pagLink .= "<li class=\"page-item'\"><a class=\"page-link\" href='javascript:;'>...</a></li>";

            for ($i; $i <= self::getTotalPages(); $i++) {
			    $pagLink = self::generatePaginateLinks($pagLink, $currentPage, $i, $additionalParams);
			};

            if ($currentPage < $lastPage- (self::PAGINATION_RANGE / 2))
                $pagLink .= "<li class=\"page-item'\"><a class=\"page-link\" href='javascript:;'>...</a></li>";

			if ($lastPage) {
                $pagLink = self::generatePaginateLinks($pagLink, $currentPage, $lastPage, $additionalParams, "Last");
            }

			$pagLink .= "</ul></nav>";
			$pagLink .= "<i>Showing Page " . $currentPage. " out of " . $lastPage . " pages.</i>";
			echo $pagLink; //renders pagination html dom elements
		}


        /**
         * Generate Pagination Links
         *
         * @param $pagLink
         * @param $page
         * @param null $additionalParams
         * @return string
         */
        public function generatePaginateLinks($pagLink, $currentPage, $page, $additionalParams = null, $firstOrLast = null)
        {
            $linkStatus = !$firstOrLast && $currentPage == $page ? "active" : "" ;

            $pagLink .= '<li class="page-item ' . $linkStatus . '"><a class="page-link" href="/image-gallery';
            $showPage = $firstOrLast ? $firstOrLast : $page;

            if ($additionalParams) {
                $pagLink .= '?' . self::parseParams($additionalParams) .'page=' . $page . '">' . $showPage . '</a></li>';
            } else {
                $pagLink .= '?page=' . $page . '">' . $page . '</a></li>';
            }

            return $pagLink;
		}
    }