<?php

	namespace App\Library;

	abstract class Pagination {

		public function paginate($total_records, $limit, $additionalParams = null)
		{
			//$total_pages = ceil($total_records / $limit);
			$total_pages = 10;

			$pagLink = "<nav aria-label=\"Page navigation\">
                    <ul class=\"pagination\">";

			for ($i=1; $i <= $total_pages; $i++) {
				$pagLink .= '<li class="page-item"><a class="page-link" href="/';
				if ($additionalParams) {
					$pagLink .= '?' . self::parseParams($additionalParams) .'page=' . $i . '">' . $i . '</a></li>';
				} else {
					$pagLink .= '?page=' . $i . '">' . $i . '</a></li>';
				}
			};

			$pagLink .= "</ul></nav>";
			echo $pagLink;
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
	}