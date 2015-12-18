<?php
class ControllerCatalogIcategory extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('catalog/icategory');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/icategory');

		$this->getList();
	}

	public function add() {
		$this->load->language('catalog/icategory');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/icategory');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_catalog_icategory->addIcategory($this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/icategory', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}

	public function edit() {
		$this->load->language('catalog/icategory');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/icategory');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_catalog_icategory->editIcategory($this->request->get['icategory_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/icategory', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}

	public function delete() {
		$this->load->language('catalog/icategory');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/icategory');

		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $icategory_id) {
				$this->model_catalog_icategory->deleteIcategory($icategory_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('catalog/icategory', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getList();
	}

	protected function getList() {
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'id.title';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('catalog/icategory', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		$data['add'] = $this->url->link('catalog/icategory/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$data['delete'] = $this->url->link('catalog/icategory/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');

		$data['icategorys'] = array();

		$filter_data = array(
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);

		$icategory_total = $this->model_catalog_icategory->getTotalIcategorys();

		$results = $this->model_catalog_icategory->getIcategorys($filter_data);

		foreach ($results as $result) {
			$data['icategorys'][] = array(
				'icategory_id' => $result['icategory_id'],
				'title'          => $result['title'],
				'sort_order'     => $result['sort_order'],
				'edit'           => $this->url->link('catalog/icategory/edit', 'token=' . $this->session->data['token'] . '&icategory_id=' . $result['icategory_id'] . $url, 'SSL')
			);
		}

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_list'] = $this->language->get('text_list');
		$data['text_no_results'] = $this->language->get('text_no_results');
		$data['text_confirm'] = $this->language->get('text_confirm');

		$data['column_title'] = $this->language->get('column_title');
		$data['column_sort_order'] = $this->language->get('column_sort_order');
		$data['column_action'] = $this->language->get('column_action');

		$data['button_add'] = $this->language->get('button_add');
		$data['button_edit'] = $this->language->get('button_edit');
		$data['button_delete'] = $this->language->get('button_delete');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		if (isset($this->request->post['selected'])) {
			$data['selected'] = (array)$this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}

		$url = '';

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_title'] = $this->url->link('catalog/icategory', 'token=' . $this->session->data['token'] . '&sort=id.title' . $url, 'SSL');
		$data['sort_sort_order'] = $this->url->link('catalog/icategory', 'token=' . $this->session->data['token'] . '&sort=i.sort_order' . $url, 'SSL');

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $icategory_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('catalog/icategory', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($icategory_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($icategory_total - $this->config->get('config_limit_admin'))) ? $icategory_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $icategory_total, ceil($icategory_total / $this->config->get('config_limit_admin')));

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('catalog/icategory/icategory_list.tpl', $data));
	}

	protected function getForm() {
		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_form'] = !isset($this->request->get['icategory_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
		$data['text_default'] = $this->language->get('text_default');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_empty'] = $this->language->get('text_empty');

		$data['entry_title'] = $this->language->get('entry_title');
		$data['entry_description'] = $this->language->get('entry_description');
		$data['entry_meta_title'] = $this->language->get('entry_meta_title');
		$data['entry_meta_description'] = $this->language->get('entry_meta_description');
		$data['entry_meta_keyword'] = $this->language->get('entry_meta_keyword');
		$data['entry_keyword'] = $this->language->get('entry_keyword');
		$data['entry_store'] = $this->language->get('entry_store');
		$data['entry_bottom'] = $this->language->get('entry_bottom');
		$data['entry_parent'] = $this->language->get('entry_parent');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_layout'] = $this->language->get('entry_layout');

		$data['text_image'] = $this->language->get('text_image');
		$data['text_browse'] = $this->language->get('text_browse');
		$data['text_clear'] = $this->language->get('text_clear');
		$data['text_image_manager'] = $this->language->get('text_image_manager');

		$data['help_keyword'] = $this->language->get('help_keyword');
		$data['help_bottom'] = $this->language->get('help_bottom');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		$data['tab_general'] = $this->language->get('tab_general');
		$data['tab_data'] = $this->language->get('tab_data');
		$data['tab_design'] = $this->language->get('tab_design');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['title'])) {
			$data['error_title'] = $this->error['title'];
		} else {
			$data['error_title'] = array();
		}

		if (isset($this->error['description'])) {
			$data['error_description'] = $this->error['description'];
		} else {
			$data['error_description'] = array();
		}

		if (isset($this->error['meta_title'])) {
			$data['error_meta_title'] = $this->error['meta_title'];
		} else {
			$data['error_meta_title'] = array();
		}

		if (isset($this->error['keyword'])) {
			$data['error_keyword'] = $this->error['keyword'];
		} else {
			$data['error_keyword'] = '';
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('catalog/icategory', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		if (!isset($this->request->get['icategory_id'])) {
			$data['action'] = $this->url->link('catalog/icategory/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		} else {
			$data['action'] = $this->url->link('catalog/icategory/edit', 'token=' . $this->session->data['token'] . '&icategory_id=' . $this->request->get['icategory_id'] . $url, 'SSL');
		}

		$data['cancel'] = $this->url->link('catalog/icategory', 'token=' . $this->session->data['token'] . $url, 'SSL');

		if (isset($this->request->get['icategory_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$icategory_info = $this->model_catalog_icategory->getIcategory($this->request->get['icategory_id']);
		}

		$data['token'] = $this->session->data['token'];

		$this->load->model('localisation/language');

		$data['languages'] = $this->model_localisation_language->getLanguages();

		if (isset($this->request->post['icategory_description'])) {
			$data['icategory_description'] = $this->request->post['icategory_description'];
		} elseif (isset($this->request->get['icategory_id'])) {
			$data['icategory_description'] = $this->model_catalog_icategory->getIcategoryDescriptions($this->request->get['icategory_id']);
		} else {
			$data['icategory_description'] = array();
		}


		if (isset($this->request->post['image'])) {
			$data['image'] = $this->request->post['image'];
		} elseif (!empty($icategory_info)) {
			$data['image'] = $icategory_info['image'];
		} else {
			$data['image'] = '';
		}
		
		$this->load->model('tool/image');
		
		if (isset($this->request->post['image'])) {
			$data['thumb'] = $this->model_tool_image->resize($this->request->post['image'], 100, 100);
		} elseif (!empty($icategory_info)) {
			$data['thumb'] = $this->model_tool_image->resize($icategory_info['image'] ? $icategory_info['image'] : 'no_image.png', 100, 100);
		} else {
			$data['thumb'] = $this->model_tool_image->resize('no_image.png', 100, 100);;
		}
		
		$data['no_image'] = $this->model_tool_image->resize('no_image.png', 100, 100);


		$this->load->model('setting/store');

		$data['stores'] = $this->model_setting_store->getStores();

		if (isset($this->request->post['icategory_store'])) {
			$data['icategory_store'] = $this->request->post['icategory_store'];
		} elseif (isset($this->request->get['icategory_id'])) {
			$data['icategory_store'] = $this->model_catalog_icategory->getIcategoryStores($this->request->get['icategory_id']);
		} else {
			$data['icategory_store'] = array(0);
		}



		//*категории ;//


		$data['icategories'] = array();

		$filter_data = array();
		$result_categories = array();
		$result_categories = $this->model_catalog_icategory->getIcategorys($filter_data);
		foreach ($result_categories as $rc) {
			if( isset($this->request->get['icategory_id']) && $rc['icategory_id'] != $this->request->get['icategory_id'] ){
				$data['icategories'][] = array(
					'icategory_id' 		=> $rc['icategory_id'],
					'icategory_title' 	=> $rc['title'],
				);
			} else {
				$data['icategories'][] = array(
					'icategory_id' 		=> $rc['icategory_id'],
					'icategory_title' 	=> $rc['title'],
				);
			}	
		}

		if (isset($this->request->post['parent_id'])) {
			$data['parent_id'] = $this->request->post['parent_id'];
		} elseif (!empty($icategory_info)) {
			$data['parent_id'] = $icategory_info['parent_id'];
		} else {
			$data['parent_id'] = 0;
		}

		if (isset($this->request->post['keyword'])) {
			$data['keyword'] = $this->request->post['keyword'];
		} elseif (!empty($icategory_info)) {
			$data['keyword'] = $icategory_info['keyword'];
		} else {
			$data['keyword'] = '';
		}

		if (isset($this->request->post['bottom'])) {
			$data['bottom'] = $this->request->post['bottom'];
		} elseif (!empty($icategory_info)) {
			$data['bottom'] = $icategory_info['bottom'];
		} else {
			$data['bottom'] = 0;
		}

		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($icategory_info)) {
			$data['status'] = $icategory_info['status'];
		} else {
			$data['status'] = true;
		}

		if (isset($this->request->post['sort_order'])) {
			$data['sort_order'] = $this->request->post['sort_order'];
		} elseif (!empty($icategory_info)) {
			$data['sort_order'] = $icategory_info['sort_order'];
		} else {
			$data['sort_order'] = '';
		}

		if (isset($this->request->post['icategory_layout'])) {
			$data['icategory_layout'] = $this->request->post['icategory_layout'];
		} elseif (isset($this->request->get['icategory_id'])) {
			$data['icategory_layout'] = $this->model_catalog_icategory->getIcategoryLayouts($this->request->get['icategory_id']);
		} else {
			$data['icategory_layout'] = array();
		}

		$this->load->model('design/layout');

		$data['layouts'] = $this->model_design_layout->getLayouts();

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('catalog/icategory/icategory_form.tpl', $data));
	}

	protected function validateForm() {
		if (!$this->user->hasPermission('modify', 'catalog/icategory')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		foreach ($this->request->post['icategory_description'] as $language_id => $value) {
			if ((utf8_strlen($value['title']) < 3) || (utf8_strlen($value['title']) > 64)) {
				$this->error['title'][$language_id] = $this->language->get('error_title');
			}

			if (utf8_strlen($value['description']) < 3) {
				$this->error['description'][$language_id] = $this->language->get('error_description');
			}

			if ((utf8_strlen($value['meta_title']) < 3) || (utf8_strlen($value['meta_title']) > 255)) {
				$this->error['meta_title'][$language_id] = $this->language->get('error_meta_title');
			}
		}

		if (utf8_strlen($this->request->post['keyword']) > 0) {
			$this->load->model('catalog/url_alias');

			$url_alias_info = $this->model_catalog_url_alias->getUrlAlias($this->request->post['keyword']);

			if ($url_alias_info && isset($this->request->get['icategory_id']) && $url_alias_info['query'] != 'icategory_id=' . $this->request->get['icategory_id']) {
				$this->error['keyword'] = sprintf($this->language->get('error_keyword'));
			}

			if ($url_alias_info && !isset($this->request->get['icategory_id'])) {
				$this->error['keyword'] = sprintf($this->language->get('error_keyword'));
			}
		}

		if ($this->error && !isset($this->error['warning'])) {
			$this->error['warning'] = $this->language->get('error_warning');
		}

		return !$this->error;
	}

	protected function validateDelete() {
		if (!$this->user->hasPermission('modify', 'catalog/icategory')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		$this->load->model('setting/store');

		foreach ($this->request->post['selected'] as $icategory_id) {
			if ($this->config->get('config_account_id') == $icategory_id) {
				$this->error['warning'] = $this->language->get('error_account');
			}

			if ($this->config->get('config_checkout_id') == $icategory_id) {
				$this->error['warning'] = $this->language->get('error_checkout');
			}

			if ($this->config->get('config_affiliate_id') == $icategory_id) {
				$this->error['warning'] = $this->language->get('error_affiliate');
			}

			if ($this->config->get('config_return_id') == $icategory_id) {
				$this->error['warning'] = $this->language->get('error_return');
			}

			$store_total = $this->model_setting_store->getTotalStoresByIcategoryId($icategory_id);

			if ($store_total) {
				$this->error['warning'] = sprintf($this->language->get('error_store'), $store_total);
			}
		}

		return !$this->error;
	}
}