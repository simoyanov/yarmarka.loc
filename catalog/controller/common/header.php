<?php
class ControllerCommonHeader extends Controller {
	public function index() {
		$data['title'] = $this->document->getTitle();

		if ($this->request->server['HTTPS']) {
			$server = $this->config->get('config_ssl');
		} else {
			$server = $this->config->get('config_url');
		}

		$data['base'] = $server;
		$data['description'] = $this->document->getDescription();
		$data['keywords'] = $this->document->getKeywords();
		$data['links'] = $this->document->getLinks();
		$data['styles'] = $this->document->getStyles();
		$data['scripts'] = $this->document->getScripts();
		$data['lang'] = $this->language->get('code');
		$data['direction'] = $this->language->get('direction');

		$detect = new Mobile_Detect();
		
		$data['mobile'] = 'false';//'false';
		$data['tablet'] = 'false';//'false';
		if( $detect->isMobile() &&  !$detect->isTablet()){
			$data['mobile'] = 'true';
		}
		if($detect->isTablet()){
			$data['tablet'] = 'true';
		}
		

		
		if ($this->config->get('config_google_analytics_status')) {
			$data['google_analytics'] = html_entity_decode($this->config->get('config_google_analytics'), ENT_QUOTES, 'UTF-8');
		} else {
			$data['google_analytics'] = '';
		}

		$data['name'] = $this->config->get('config_name');

		if (is_file(DIR_IMAGE . $this->config->get('config_icon'))) {
			$data['icon'] = $server . 'image/' . $this->config->get('config_icon');
		} else {
			$data['icon'] = '';
		}

		if (is_file(DIR_IMAGE . $this->config->get('config_logo'))) {
			$data['logo'] = $server . 'image/' . $this->config->get('config_logo');
		} else {
			$data['logo'] = '';
		}

		$this->load->language('common/header');

		$data['text_home'] = $this->language->get('text_home');
		$data['text_wishlist'] = sprintf($this->language->get('text_wishlist'), (isset($this->session->data['wishlist']) ? count($this->session->data['wishlist']) : 0));
		$data['text_shopping_cart'] = $this->language->get('text_shopping_cart');
		$data['text_logged'] = sprintf($this->language->get('text_logged'), $this->url->link('account/account', '', 'SSL'), $this->customer->getFirstName(), $this->url->link('account/logout', '', 'SSL'));

		$data['text_account'] = $this->language->get('text_account');
		$data['text_register'] = $this->language->get('text_register');
		$data['text_login'] = $this->language->get('text_login');
		$data['text_order'] = $this->language->get('text_order');
		$data['text_transaction'] = $this->language->get('text_transaction');
		$data['text_download'] = $this->language->get('text_download');
		$data['text_logout'] = $this->language->get('text_logout');
		$data['text_checkout'] = $this->language->get('text_checkout');
		$data['text_category'] = $this->language->get('text_category');
		$data['text_all'] = $this->language->get('text_all');

		$data['text_people'] 			= $this->language->get('text_people');
		$data['text_init_groups'] 	= $this->language->get('text_init_group');
		$data['text_customers'] 	= $this->language->get('text_customers');
		
		$data['text_about'] 		= $this->language->get('text_about');
		$data['text_projects'] 		= $this->language->get('text_projects');
		$data['text_contest'] 		= $this->language->get('text_contest');
		$data['text_partners'] 		= $this->language->get('text_partners');
		$data['text_about_us'] 		= $this->language->get('text_about_us');
		$data['text_news'] 			= $this->language->get('text_news');
		$data['text_places'] 			= $this->language->get('text_places');
		$data['text_announcement']  = $this->language->get('text_announcement');
		$data['text_materials']  	= $this->language->get('text_materials');
		$data['text_faq']  			= $this->language->get('text_faq');

		$data['home'] = $this->url->link('common/home');
		$data['wishlist'] = $this->url->link('account/wishlist', '', 'SSL');
		$data['logged'] = $this->customer->isLogged();
		$data['account'] = $this->url->link('account/account', '', 'SSL');
		$data['register'] = $this->url->link('account/register', '', 'SSL');
		$data['login'] = $this->url->link('account/login', '', 'SSL');
		$data['order'] = $this->url->link('account/order', '', 'SSL');
		$data['transaction'] = $this->url->link('account/transaction', '', 'SSL');
		$data['download'] = $this->url->link('account/download', '', 'SSL');
		$data['logout'] = $this->url->link('account/logout', '', 'SSL');
		$data['shopping_cart'] = $this->url->link('checkout/cart');
		$data['checkout'] = $this->url->link('checkout/checkout', '', 'SSL');
		$data['contact'] = $this->url->link('information/contact');
		$data['telephone'] = $this->config->get('config_telephone');

		$data['init_groups'] = $this->url->link('group/group', '', 'SSL');
		$data['customers'] = $this->url->link('account/customers', '', 'SSL');
		$data['projects'] = $this->url->link('project/project', '', 'SSL');
		$data['contests'] = $this->url->link('contest/contest', '', 'SSL');
		$data['materials'] = $this->url->link('material/material', '', 'SSL');
		$data['news'] = $this->url->link('information/news', '', 'SSL');
		$data['places'] = $this->url->link('information/place', '', 'SSL');
		//надо сделать автоматический подсос
		$data['about_us'] = $this->url->link('information/information', 'information_id=8', 'SSL');

		$status = true;

		if (isset($this->request->server['HTTP_USER_AGENT'])) {
			$robots = explode("\n", str_replace(array("\r\n", "\r"), "\n", trim($this->config->get('config_robots'))));

			foreach ($robots as $robot) {
				if ($robot && strpos($this->request->server['HTTP_USER_AGENT'], trim($robot)) !== false) {
					$status = false;

					break;
				}
			}
		}

		// Menu
		
		$data['search'] = $this->load->controller('common/search');

		// For page specific css
		if (isset($this->request->get['route'])) {
			if (isset($this->request->get['product_id'])) {
				$class = '-' . $this->request->get['product_id'];
			} elseif (isset($this->request->get['path'])) {
				$class = '-' . $this->request->get['path'];
			} elseif (isset($this->request->get['manufacturer_id'])) {
				$class = '-' . $this->request->get['manufacturer_id'];
			} else {
				$class = '';
			}

			$data['class'] = str_replace('/', '-', $this->request->get['route']) . $class;
		} else {
			$data['class'] = 'common-home';
		}


		//******* подтянем категории *******//
		$this->load->model('catalog/icategory');
		$data['icategories'] = array();

		$filter_data = array(
			'filter_parent' => 0,
			'filter_top' 	=> 1,
		);

		$results_icategories = $this->model_catalog_icategory->getIcategorys($filter_data);

		foreach ($results_icategories as $ric) {
			$data['icategories'][] = array(
				'icategory_title'  =>	$ric['title'],
				'icategory_href'   =>	$this->url->link('information/icategory', 'icategory_id='.$ric['icategory_id'], 'SSL')
			);
		}




		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/header.tpl')) {
			return $this->load->view($this->config->get('config_template') . '/template/common/header.tpl', $data);
		} else {
			return $this->load->view('default/template/common/header.tpl', $data);
		}
	}
}