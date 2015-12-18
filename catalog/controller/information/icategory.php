<?php
class ControllerInformationIcategory extends Controller {
	public function index() {
		$this->load->language('information/icategory');

		$this->load->model('catalog/icategory');

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		if (isset($this->request->get['icategory_id'])) {
			$icategory_id = (int)$this->request->get['icategory_id'];
		} else {
			$icategory_id = 0;
		}

		$icategory_info = $this->model_catalog_icategory->getIcategory($icategory_id);

		if (!empty($icategory_info)) {
			$this->document->setTitle($icategory_info['meta_title']);
			$this->document->setDescription($icategory_info['meta_description']);
			$this->document->setKeywords($icategory_info['meta_keyword']);

			$data['breadcrumbs'][] = array(
				'text' => $icategory_info['title'],
				'href' => $this->url->link('information/icategory', 'icategory_id=' .  $icategory_id)
			);

			$data['heading_title'] = $icategory_info['title'];

			$data['button_continue'] = $this->language->get('button_continue');

			$data['description'] = html_entity_decode($icategory_info['description'], ENT_QUOTES, 'UTF-8');

			$this->load->model('tool/image');
			
			//подтянем список статей для данной категории
			$url = '';
		
			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}	

			if (isset($this->request->get['page'])) {
				$page = $this->request->get['page'];
			} else { 
				$page = 1;
			}
			$this->load->model('catalog/information');
			
					

			$data['informations'] = array();
			$filter_data_total = array(
				'filter_parent' => $icategory_id
			);

			$filter_data = array(
				'filter_parent' 		=> $icategory_id,
				'start' 				=> ($page - 1) * $this->config->get('config_product_limit'),
				'limit'					=> $this->config->get('config_product_limit')
			);

			$information_total = $this->model_catalog_information->getTotalInformations($filter_data_total);

			$results = $this->model_catalog_information->getInformations($filter_data);

			foreach ($results as $result) {
				if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], 360, 200, 'w');
				} else {
					$image = $this->model_tool_image->resize('placeholder.png', 360, 200, 'w');
				}
				$data['informations'][] = array(
					'information_id' 	=> $result['information_id'],
					'title'          	=> $result['title'],
					'image'						=> $image,
					'sub_description'	=> ( strlen(strip_tags( html_entity_decode($result['sub_description'], ENT_QUOTES))) ) > 95 ? mb_substr(strip_tags(html_entity_decode($result['sub_description'], ENT_QUOTES)), 0, 95) . '...' : strip_tags(html_entity_decode($result['sub_description'], ENT_QUOTES)),
					'information_href'=> $this->url->link('information/information', 'information_id=' . $result['information_id']),
				);
			}


			$pagination = new Pagination();
			$pagination->total 	= $information_total;
			$pagination->page 	= $page;
			$pagination->limit 	= $this->config->get('config_product_limit');
			$pagination->url 	= $this->url->link('information/icategory', 'icategory_id='.$icategory_id.'&page={page}', 'SSL');

			
			$data['pagination'] = $pagination->render();
			


			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/icategory.tpl')) {
				$this->response->setOutput($this->load->view($this->config->get('config_template') . '/template/information/icategory.tpl', $data));
			} else {
				$this->response->setOutput($this->load->view('default/template/information/icategory.tpl', $data));
			}
		} else {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_error'),
				'href' => $this->url->link('information/icategory', 'icategory_id=' . $icategory_id)
			);

			$this->document->setTitle($this->language->get('text_error'));

			$data['heading_title'] = $this->language->get('text_error');

			$data['text_error'] = $this->language->get('text_error');

			$data['button_continue'] = $this->language->get('button_continue');

			$data['continue'] = $this->url->link('common/home');

			$this->response->addHeader($this->request->server['SERVER_PROTOCOL'] . ' 404 Not Found');

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/error/not_found.tpl')) {
				$this->response->setOutput($this->load->view($this->config->get('config_template') . '/template/error/not_found.tpl', $data));
			} else {
				$this->response->setOutput($this->load->view('default/template/error/not_found.tpl', $data));
			}
		}
	}

	public function agree() {
		$this->load->model('catalog/icategory');

		if (isset($this->request->get['icategory_id'])) {
			$icategory_id = (int)$this->request->get['icategory_id'];
		} else {
			$icategory_id = 0;
		}

		$output = '';

		$icategory_info = $this->model_catalog_information->getIcategory($icategory_id);

		if ($icategory_info) {
			$output .= html_entity_decode($icategory_info['description'], ENT_QUOTES, 'UTF-8') . "\n";
		}

		$this->response->setOutput($output);
	}
}