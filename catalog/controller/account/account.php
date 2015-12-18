<?php
class ControllerAccountAccount extends Controller {
	public function index() {
		if (!$this->customer->isLogged()) {
			$this->session->data['redirect'] = $this->url->link('account/account', '', 'SSL');
			$this->response->redirect($this->url->link('account/login', '', 'SSL'));
		}
		$this->load->language('account/account');
		$this->document->setTitle($this->language->get('heading_title'));
		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_account'),
			'href' => $this->url->link('account/account', '', 'SSL')
		);

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];
			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}
 
		$data['heading_title'] = $this->language->get('heading_title');
		$data['text_address'] = $this->language->get('text_address');
		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_password'] = $this->language->get('text_password');
		$data['text_my_account'] = $this->language->get('text_my_account');
		$data['text_wishlist'] = $this->language->get('text_wishlist');
		$data['text_order'] = $this->language->get('text_order');
		$data['text_download'] = $this->language->get('text_download');
		$data['text_reward'] = $this->language->get('text_reward');
		$data['text_return'] = $this->language->get('text_return');
		$data['text_transaction'] = $this->language->get('text_transaction');
		$data['text_newsletter'] = $this->language->get('text_newsletter');
		$data['text_recurring'] = $this->language->get('text_recurring');
		$data['text_logout'] = $this->language->get('text_logout');

		
		$data['address'] = $this->url->link('account/address', '', 'SSL');
		$data['wishlist'] = $this->url->link('account/wishlist');
		$data['order'] = $this->url->link('account/order', '', 'SSL');
		$data['download'] = $this->url->link('account/download', '', 'SSL');
		$data['return'] = $this->url->link('account/return', '', 'SSL');
		$data['transaction'] = $this->url->link('account/transaction', '', 'SSL');
		$data['newsletter'] = $this->url->link('account/newsletter', '', 'SSL');
		$data['recurring'] = $this->url->link('account/recurring', '', 'SSL');
		$data['edit'] = $this->url->link('account/edit', '', 'SSL');
		$data['password'] = $this->url->link('account/password', '', 'SSL');
		$data['logout'] = $this->url->link('account/logout', '', 'SSL');

		
		if ($this->config->get('reward_status')) {
			$data['reward'] = $this->url->link('account/reward', '', 'SSL');
		} else {
			$data['reward'] = '';
		}
		

		//подгрузим модели
		$this->load->model('account/customer');
		$this->load->model('group/group');
		$this->load->model('project/project');
		$this->load->model('tool/upload');
		$this->load->model('tool/image');
		//информация о пользователе
		if ($this->request->server['REQUEST_METHOD'] != 'POST') {
			$customer_info = $this->model_account_customer->getCustomer($this->customer->getId());
		}
		$customer_id = $this->customer->getId();
		//стандартные поля
		$data['firstname'] = $customer_info['firstname'];
		$data['lastname'] = $customer_info['lastname'];
		$data['email'] = $customer_info['email'];
		$data['telephone'] = $customer_info['telephone'];

		// Custom Fields
		$this->load->model('account/custom_field');
		$data['custom_fields'] = $this->model_account_custom_field->getCustomFields($this->config->get('config_customer_group_id'));
		$data['account_custom_field'] = unserialize($customer_info['custom_field']);

		if (!empty($customer_info) && !empty($customer_info['image'])){

			if(preg_match('/http/', $customer_info['image'])){
				$data['avatar'] = $customer_info['image'];
			}else{

				$upload_info = $this->model_tool_upload->getUploadByCode($customer_info['image']);

				$filename = $upload_info['filename'];
				$data['avatar'] = $this->model_tool_upload->resize($filename , 360, 490, 'h');
			}
		}else{
			$data['avatar'] = $this->model_tool_image->resize('account.jpg', 360, 490, 'h');
		}

		/***************** тесты и баллы *******************/
		$this->load->model('catalog/quiz');
		

		$data['btn_start_test'] = $this->language->get('btn_start_test');
		//подтянем список тестов которые прошел пользователь
		
		$results_customer_to_quiz  = $this->model_catalog_quiz->getQuizsForCustomer($customer_id);
		$customer_to_quiz = array();
		foreach ($results_customer_to_quiz as $vcq) {
			$customer_to_quiz[$vcq['quiz_id']][] = array(
				'quiz_id' 		=> $vcq['quiz_id'],
				'customer_id'	=> $vcq['customer_id'],
				'mark'			=> $vcq['mark'],
				'quiz_date'		=> $vcq['date_added']
			);
		}

		$filter_data = array();
		$filter_data = array(
			'filter_status' 		=> 	1
		);

		$quiz_results = $this->model_catalog_quiz->getQuizs($filter_data);
		$quizs = array();
		//список всех существующих тестов
		//попыток / quiz_count_attempts - попыток котрые возможны
		$total = 0;
		foreach ($quiz_results  as $result_q) {
			
			//подсчитаем баллы
			//набранное количество правильных ответов
			$quiz_correct_answer = 0;
			//статусы /
			//- 2 незачет - не сдала но еше есть попытки
			//- 1 зачет 
			//- 3 не сдал  - если закончились попытки и тест не сдан
			//- 0 не сдавал -  еше не разу не сдавал 

			$quiz_count_attempts = $result_q['quiz_count_attempts'];
			
			$customer_mark = 0;//количество набранных правильных ответов
			$quiz_status = 0;
			$quiz_status_text = 	$this->language->get('text_not_tested');
			$quiz_balls = 0;
			$mark_date_added		 = '';
			$action =array();
			$action =array(
				'quiz_text_btn'				=> $this->language->get('text_be_tested'),
				'quiz_view'						=> $this->url->link('information/quiz/view', 'quiz_id='.$result_q['quiz_id'], 'SSL')
			);
			
			if(!empty( $customer_to_quiz[$result_q['quiz_id']] )){
				$customer_attempts = count($customer_to_quiz[$result_q['quiz_id']]);// - количество попыток котрые уже сделал пользователь
				$quiz_count_attempts = $quiz_count_attempts-$customer_attempts;
				$mark_date_added		 = '';
				$quiz_correct_answer = '';
				//делаем проверку на количество прохождений в тесте $result_q['quiz_count_attempts']
				//делаем проверку на макссимальноеколичество очков
				foreach ($customer_to_quiz[$result_q['quiz_id']] as $vctq) {
						$mark_date_added		 = '';
					if($vctq['mark'] > $customer_mark  ){
						$customer_mark 		= $vctq['mark'];
						$mark_date_added	= $vctq['quiz_date'];
						
					}
				}
				
				if($result_q['quiz_correct_answer'] <= $customer_mark){
					//прошли тест
					$quiz_status = 1;
					$quiz_status_text = 	$this->language->get('text_passed');
					$quiz_balls = 5;
					$action 	=	array();
					$total = $total + $quiz_balls;
				}elseif ($result_q['quiz_correct_answer'] > $customer_mark && $quiz_count_attempts > 0) {
					//незачет
					$quiz_status = 2;
					$quiz_status_text = 	$this->language->get('text_not_passed');
				}elseif($result_q['quiz_correct_answer'] > $customer_mark && $quiz_count_attempts == 0){
					//провал
					$quiz_status = 3;
					$quiz_status_text = 	$this->language->get('text_fail');
					$action 	=	array();
				}else{
					//по умолчанию
					$quiz_status = 0;
					$quiz_status_text = 	$this->language->get('text_not_tested');
					$mark_date_added = '';

				}
				
			}





			$data['quizs'][] = array(
				'quiz_id'				=> $result_q['quiz_id'],
				'quiz_title'			=> $result_q['title'],
				'quiz_correct_answer'	=> $customer_mark ,
				'quiz_count_attempts'	=> $quiz_count_attempts,
				'quiz_status'			=> $quiz_status,
				'quiz_status_text'		=> $quiz_status_text,
				'quiz_date_added'		=> $mark_date_added,
				'quiz_balls'			=> $quiz_balls,
				'quiz_action'			=> $action

			);



		}
		
		//quiz_correct_answer - количество правильныхх ответов 

		//quiz_count_attempts - количестов попыток
		//пока за прохождение теста получаем по 5 балов

		



		//подсчитаем баллы за промокоды
		$this->load->model('account/promocode');
		
		$filter_data = array();
		$filter_data = array(
			'filter_customer_id' 		=> 	$customer_id
		);
		$results_promocode = $this->model_account_promocode->getPromocodes($filter_data);
		//за каждый код прибавляем 10 баллов
		$data['promocode'] = count($results_promocode)*10;

		$data['total']	= $total + $data['promocode'];
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/account/account.tpl')) {
			$this->document->addScript('catalog/view/theme/'.$this->config->get('config_template') . '/assets/js/account.js');
		} else {
			$this->document->addScript('catalog/view/theme/default/assets/js/account.js');
		}


		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');


		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/account/account.tpl')) {
			$this->response->setOutput($this->load->view($this->config->get('config_template') . '/template/account/account.tpl', $data));
		} else {
			$this->response->setOutput($this->load->view('default/template/account/account.tpl', $data));
		}
	}

	public function country() {
		$json = array();

		$this->load->model('localisation/country');

		$country_info = $this->model_localisation_country->getCountry($this->request->get['country_id']);

		if ($country_info) {
			$this->load->model('localisation/zone');

			$json = array(
				'country_id'        => $country_info['country_id'],
				'name'              => $country_info['name'],
				'iso_code_2'        => $country_info['iso_code_2'],
				'iso_code_3'        => $country_info['iso_code_3'],
				'address_format'    => $country_info['address_format'],
				'postcode_required' => $country_info['postcode_required'],
				'zone'              => $this->model_localisation_zone->getZonesByCountryId($this->request->get['country_id']),
				'status'            => $country_info['status']
			);
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function upload() {
		$this->load->language('tool/upload');

		$json = array();

		if (!empty($this->request->files['file']['name']) && is_file($this->request->files['file']['tmp_name'])) {
			// Sanitize the filename
			$filename = basename(preg_replace('/[^a-zA-Z0-9\.\-\s+]/', '', html_entity_decode($this->request->files['file']['name'], ENT_QUOTES, 'UTF-8')));

			// Validate the filename length
			if ((utf8_strlen($filename) < 3) || (utf8_strlen($filename) > 64)) {
				$json['error'] = $this->language->get('error_filename');
			}

			// Allowed file extension types
			$allowed = array();

			$extension_allowed = preg_replace('~\r?\n~', "\n", $this->config->get('config_file_ext_allowed'));

			$filetypes = explode("\n", $extension_allowed);

			foreach ($filetypes as $filetype) {
				$allowed[] = trim($filetype);
			}

			if (!in_array(strtolower(substr(strrchr($filename, '.'), 1)), $allowed)) {
				$json['error'] = $this->language->get('error_filetype');
			}

			// Allowed file mime types
			$allowed = array();

			$mime_allowed = preg_replace('~\r?\n~', "\n", $this->config->get('config_file_mime_allowed'));

			$filetypes = explode("\n", $mime_allowed);

			foreach ($filetypes as $filetype) {
				$allowed[] = trim($filetype);
			}

			if (!in_array($this->request->files['file']['type'], $allowed)) {
				$json['error'] = $this->language->get('error_filetype');
			}

			// Check to see if any PHP files are trying to be uploaded
			$content = file_get_contents($this->request->files['file']['tmp_name']);

			if (preg_match('/\<\?php/i', $content)) {
				$json['error'] = $this->language->get('error_filetype');
			}

			// Return any upload error
			if ($this->request->files['file']['error'] != UPLOAD_ERR_OK) {
				$json['error'] = $this->language->get('error_upload_' . $this->request->files['file']['error']);
			}
		} else {
			$json['error'] = $this->language->get('error_upload');
		}

		if (!$json) {
			
			$code = md5(mt_rand());
			if (!$this->customer->isLogged()) {
				$file = $filename. '.' . $code ;
			}else{
				$customer_id = $this->customer->getId();
				$folder_name = md5($customer_id).'/';
				//создаем папку с назанием 
				if (!is_dir(DIR_UPLOAD . $folder_name)) {
					mkdir(DIR_UPLOAD . $folder_name, 0777);
				}
				$file = $folder_name . $filename. '.' . $code ;
				//code поправить!!!!!!!
			}
			
			move_uploaded_file($this->request->files['file']['tmp_name'], DIR_UPLOAD . $file  );

			// Hide the uploaded file name so people can not link to it directly.
			$this->load->model('tool/upload');
			$this->load->model('account/customer');

			$json['code'] = $this->model_tool_upload->addUpload($filename, $file);

			//добавим изображение в аватар
			$this->model_account_customer->changeAvatar($json['code']);

			//рендерим изображение если это оно
			$json['thumb'] = $this->model_tool_upload->resize($file , 360, 490, 'h');

			$json['success'] = $this->language->get('text_upload');
		}
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}


}