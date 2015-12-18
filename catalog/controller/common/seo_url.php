<?php
class ControllerCommonSeoUrl extends Controller {
	public function index() {
		// Add rewrite to url class
		if ($this->config->get('config_seo_url')) {
			$this->url->addRewrite($this);
		}

		// Decode URL
		if (isset($this->request->get['_route_'])) {
			$parts = explode('/', $this->request->get['_route_']);

			// remove any empty arrays from trailing
			if (utf8_strlen(end($parts)) == 0) {
				array_pop($parts);
			}

			foreach ($parts as $part) {
				$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "url_alias WHERE keyword = '" . $this->db->escape($part) . "'");

				if ($query->num_rows) {
					$url = explode('=', $query->row['query']);

					if ($url[0] == 'product_id') {
						$this->request->get['product_id'] = $url[1];
					}

					if ($url[0] == 'category_id') {
						if (!isset($this->request->get['path'])) {
							$this->request->get['path'] = $url[1];
						} else {
							$this->request->get['path'] .= '_' . $url[1];
						}
					}
					
					if ($url[0] == 'rshare_id') {
						$this->request->get['rshare_id'] = $url[1];
					}
					if ($url[0] == 'qshare_id') {
						$this->request->get['qshare_id'] = $url[1];
					}
					if ($url[0] == 'manufacturer_id') {
						$this->request->get['manufacturer_id'] = $url[1];
					}

					if ($url[0] == 'information_id') {
						$this->request->get['information_id'] = $url[1];
					}

					if ($url[0] == 'icategory_id') {
						$this->request->get['icategory_id'] = $url[1];
					}

					if ($url[0] == 'news_id') {
						$this->request->get['news_id'] = $url[1];
					}

					if ($url[0] == 'place_id') {
						$this->request->get['place_id'] = $url[1];
					}
					if ($url[0] == 'raiting_id') {
						$this->request->get['raiting_id'] = $url[1];
					}
					if ($url[0] == 'quiz_id') {
						$this->request->get['quiz_id'] = $url[1];
					}

					if ($url[0] == 'occasion_id') {
						$this->request->get['occasion_id'] = $url[1];
					}

					if ($query->row['query'] && $url[0] != 'information_id' && $url[0] != 'icategory_id' && $url[0] != 'manufacturer_id' && $url[0] != 'category_id' && $url[0] != 'product_id' && $url[0] != 'news_id' && $url[0] != 'occasion_id' && $url[0] != 'place_id' && $url[0] != 'raiting_id' && $url[0] != 'quiz_id' && $url[0] != 'rshare_id' && $url[0] != 'qshare_id' ) {
						$this->request->get['route'] = $query->row['query'];
					}
				} else {
					$this->request->get['route'] = 'error/not_found';

					break;
				}
			}

			if (!isset($this->request->get['route'])) {
				if (isset($this->request->get['product_id'])) {
					$this->request->get['route'] = 'product/product';
				} elseif (isset($this->request->get['path'])) {
					$this->request->get['route'] = 'product/category';
				} elseif (isset($this->request->get['manufacturer_id'])) {
					$this->request->get['route'] = 'product/manufacturer/info';
				} elseif (isset($this->request->get['information_id'])) {
					$this->request->get['route'] = 'information/information';
				} elseif (isset($this->request->get['icategory_id'])) {
					$this->request->get['route'] = 'information/icategory';
				} elseif (isset($this->request->get['news_id'])) {
					$this->request->get['route'] = 'information/news/news';
				} elseif (isset($this->request->get['place_id'])) {
					$this->request->get['route'] = 'information/place/view';
				} elseif (isset($this->request->get['raiting_id'])) {
					$this->request->get['route'] = 'information/raiting/view';
				} elseif (isset($this->request->get['quiz_id'])) {
					$this->request->get['route'] = 'information/quiz/view';
				} elseif (isset($this->request->get['rshare_id'])) {
					$this->request->get['route'] = 'information/raiting/result';
				} elseif (isset($this->request->get['qshare_id'])) {
					$this->request->get['route'] = 'information/quiz/result';
				} elseif (isset($this->request->get['occasion_id'])) {
					$this->request->get['route'] = 'information/occasion/view';
				}
				/* SEO Custom URL 1 */
				else {
	                $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "url_alias WHERE keyword = '" . $this->db->escape($this->request->get['_route_']) . "'");
	                if ($query->num_rows) {
	                    $this->request->get['route'] = $query->row['query'];
	                }
	           }
				/* SEO Custom URL 1 */

			}

			if (isset($this->request->get['route'])) {
				return new Action($this->request->get['route']);
			}
		}
	}

	public function rewrite($link) {
		$url_info = parse_url(str_replace('&amp;', '&', $link));

		$url = '';

		$data = array();

		parse_str($url_info['query'], $data);
		foreach ($data as $key => $value) {
			if (isset($data['route'])) {
				if (
					($data['route'] == 'information/occasion/view' && $key == 'occasion_id') || 
					($data['route'] == 'information/place/view' && $key == 'place_id') || 
					($data['route'] == 'information/raiting/view' && $key == 'raiting_id') || 
					($data['route'] == 'information/quiz/view' && $key == 'quiz_id') || 
					($data['route'] == 'information/news/news' && $key == 'news_id') || 
					($data['route'] == 'information/raiting/result' && $key == 'rshare_id') || 
					($data['route'] == 'information/quiz/result' && $key == 'qshare_id') || 
					($data['route'] == 'product/product' && $key == 'product_id') || 
					(($data['route'] == 'product/manufacturer/info' || $data['route'] == 'product/product') && $key == 'manufacturer_id') || 
					($data['route'] == 'information/icategory' && $key == 'icategory_id')||
					($data['route'] == 'information/information' && $key == 'information_id')
				) {
					$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "url_alias WHERE `query` = '" . $this->db->escape($key . '=' . (int)$value) . "'");

					if ($query->num_rows && $query->row['keyword']) {
						$url .= '/' . $query->row['keyword'];

						unset($data[$key]);
					}
				} elseif ($key == 'path') {
					$categories = explode('_', $value);

					foreach ($categories as $category) {
						$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "url_alias WHERE `query` = 'category_id=" . (int)$category . "'");

						if ($query->num_rows && $query->row['keyword']) {
							$url .= '/' . $query->row['keyword'];
						} else {
							$url = '';

							break;
						}
					}

					unset($data[$key]);
				}/* SEO Custom URL 2 */
					else {

                        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "url_alias WHERE `query` = '" . $this->db->escape($data['route']) . "'");
                      
                        if ($query->num_rows) {
                            $url .= '/' . $query->row['keyword'];

                            unset($data[$key]);
                        }
                   }
					/* SEO Custom URL 2 */

			}
		}

		if ($url) {
			unset($data['route']);

			$query = '';

			if ($data) {
				foreach ($data as $key => $value) {
					$query .= '&' . rawurlencode((string)$key) . '=' . rawurlencode((string)$value);
				}

				if ($query) {
					$query = '?' . str_replace('&', '&amp;', trim($query, '&'));
				}
			}

			return $url_info['scheme'] . '://' . $url_info['host'] . (isset($url_info['port']) ? ':' . $url_info['port'] : '') . str_replace('/index.php', '', $url_info['path']) . $url . $query;
		} else {
			return $link;
		}
	}
}
