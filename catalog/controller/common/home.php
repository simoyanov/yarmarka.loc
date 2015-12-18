<?php
class ControllerCommonHome extends Controller {
	public function index() {
		$this->document->setTitle($this->config->get('config_meta_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));
		$this->document->setKeywords($this->config->get('config_meta_keyword'));

		if (isset($this->request->get['route'])) {
			$this->document->addLink(HTTP_SERVER, 'canonical');
		}

		//подтянем новости пока все сразу

		$this->load->model('catalog/news');
		$this->load->model('tool/image');
		$filter_data = array();
		$results_news = $this->model_catalog_news->getAllNews($filter_data);
	 	$data['news'] = array();
		foreach ($results_news as $news) {
			if ($news['image']) {
				$image = $this->model_tool_image->resize($news['image'], 373, 240, 'h');
			} else {
				$image = $this->model_tool_image->resize('placeholder.png', 373, 240, 'h');
			}
			$data['news'][] = array (
				'title' 		=> html_entity_decode($news['title'], ENT_QUOTES),
				'image'			=> $image,
				'description' 	=> (strlen(strip_tags(html_entity_decode($news['short_description'], ENT_QUOTES))) > 100 ? mb_substr(strip_tags(html_entity_decode($news['short_description'], ENT_QUOTES)), 0, 150) . '...' : strip_tags(html_entity_decode($news['short_description'], ENT_QUOTES))),
				'date_added' 	=> rus_date($this->language->get('date_day_date_format'), strtotime($news['date_added']))
			);
		}

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/home.tpl')) {
			$this->response->setOutput($this->load->view($this->config->get('config_template') . '/template/common/home.tpl', $data));
		} else {
			$this->response->setOutput($this->load->view('default/template/common/home.tpl', $data));
		}
	}
}