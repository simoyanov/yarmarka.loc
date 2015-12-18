<?php  
class ControllerModuleNews extends Controller {
	public function index() {
		$this->language->load('module/news');
		$this->load->model('catalog/news');
		
		$filter_data = array(
			'page' => 1,
			'limit' => 5,
			'start' => 0,
		);
	 
		$data['heading_title'] = $this->language->get('heading_title');
	 
		$results = $this->model_catalog_news->getAllNews($filter_data);
	 
		$data['all_news'] = array();
	 	$this->load->model('tool/image');

		foreach ($results as $result) {
			$image = array();
			if ($result['image']) {
				$image = array(
					'h' => $this->model_tool_image->resize($result['image'], 373, 240, 'h'),
					'w' => $this->model_tool_image->resize($result['image'], 373, 240, 'w')
				);
			} else {
				$image = array(
					'h' => $this->model_tool_image->resize('placeholder.png', 373, 240, 'h'),
					'w' => $this->model_tool_image->resize('placeholder.png', 373, 240, 'w')
				);
			}
			$data['all_news'][] = array (
				'title' 		=> (strlen(strip_tags(html_entity_decode($result['title'], ENT_QUOTES))) > 20 ? mb_substr(strip_tags(html_entity_decode($result['title'], ENT_QUOTES)), 0, 20) . '...' : strip_tags(html_entity_decode($result['title'], ENT_QUOTES))),
				'full_title'	=> strip_tags(html_entity_decode($result['title'], ENT_QUOTES)),
				'image'			=> $image,

				'short_description' => (strlen(strip_tags(html_entity_decode($result['short_description'], ENT_QUOTES))) > 65 ? mb_substr(strip_tags(html_entity_decode($result['short_description'], ENT_QUOTES)), 0, 65) . '...' : strip_tags(html_entity_decode($result['short_description'], ENT_QUOTES))),
				'view' 			=> $this->url->link('information/news/news', 'news_id=' . $result['news_id']),
				'date_added' 	=> date($this->language->get('date_format_short'), strtotime($result['date_added']))
			);
		}
	 
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/news.tpl')) {
			return $this->load->view($this->config->get('config_template') . '/template/module/news.tpl', $data);
		} else {
			return $this->load->view('default/template/module/news.tpl', $data);
		}
	}
}