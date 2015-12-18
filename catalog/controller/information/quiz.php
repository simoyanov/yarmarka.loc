<?php 
class ControllerInformationQuiz extends Controller {
	private $error = array();
	public function in(){
		/*$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "quiz_stats WHERE quiz_id = 10 ORDER BY  qstat_id LIMIT 40000");

		$data =  $query->rows;

		$ser_data = array();
		foreach ($data as $value) {
				$ser_data[ $value['qshare_id'] ]['value'][ $value['answer_id'] ] = $value['value'];
				$ser_data[ $value['qshare_id'] ]['qshare_id'] = $value['qshare_id'];
				$ser_data[ $value['qshare_id'] ]['quiz_id'] = $value['quiz_id'].'0';
				$ser_data[ $value['qshare_id'] ]['ip'] = $value['ip'];
				$ser_data[ $value['qshare_id'] ]['date_added'] = $value['date_added'];
				$ser_data[ $value['qshare_id'] ]['customer_id'] = $value['customer_id'];
		}
		
		foreach ($ser_data as $val) {
			print_r('<pre>');
			print_r("DELETE FROM " . DB_PREFIX . "quiz_stats WHERE qshare_id = '" . $val['qshare_id'] . "' AND quiz_id = 10 ");
			$this->db->query("DELETE FROM " . DB_PREFIX . "quiz_stats WHERE qshare_id = '" . $val['qshare_id'] . "'");
			print_r('</pre>');

			print_r('<pre>');
			print_r("INSERT INTO " . DB_PREFIX . "quiz_stats SET qshare_id = '" .  $this->db->escape($val['qshare_id']) . "', customer_id = '" . (int)$val['customer_id'] . "', quiz_id = '" . (int)$val['quiz_id'] . "', value = '" .  $this->db->escape(serialize($val['value']) )  . "', ip = '" . $this->db->escape($val['ip']) . "',date_added ='" . $this->db->escape($val['date_added']) . "' ");
			$this->db->query("INSERT INTO " . DB_PREFIX . "quiz_stats SET qshare_id = '" .  $this->db->escape($val['qshare_id']) . "', customer_id = '" . (int)$val['customer_id'] . "', quiz_id = '" . (int)$val['quiz_id'] . "', value = '" .  $this->db->escape(serialize($val['value']) )  . "', ip = '" . $this->db->escape($val['ip']) . "',date_added ='" . $this->db->escape($val['date_added']) . "' ");
			print_r('</pre>');
		}
		print_r( count($ser_data) );
		
		$this->db->query("UPDATE  " . DB_PREFIX . "quiz_stats SET  `quiz_id`=10 WHERE quiz_id = '100'");
		$this->db->query("UPDATE  " . DB_PREFIX . "quiz_stats SET  `quiz_id`=11 WHERE quiz_id = '110'");
		$this->db->query("UPDATE  " . DB_PREFIX . "quiz_stats SET  `quiz_id`=12 WHERE quiz_id = '120'");*/
	}
	public function index() {
	//	$this->response->redirect($this->url->link('common/home', '', 'SSL'));
		$this->language->load('information/quiz');
		$this->load->model('tool/image');
		$this->load->model('catalog/quiz');
		$data['heading_title'] = $this->language->get('heading_title');
		$detect = new Mobile_Detect();
		// Если не планшет и не мобильное устройство
		

		//seo
		$this->document->setTitle($data['heading_title']);
		$this->document->setDescription($this->language->get('heading_description'));
		$this->document->setKeywords($this->language->get('heading_keywords'));
		//получим список активных рейтингов
		$filter_data = array(
			'filter_status'    => 1,
			'filter_visibility'    => 1
		);
		
		$quizs = $this->model_catalog_quiz->getQuizs($filter_data);
		$data['quizs'] = array();
		foreach ($quizs as $quiz) {
			if (!empty($quiz['image'])) {
				if( !$detect->isMobile() && !$detect->isTablet() ){
					$image = $this->model_tool_image->resize($quiz['image'], 1920,1080,'h');
				}else{
					$image = $this->model_tool_image->resize($quiz['image'], 1024,768,'h');
				}
				
			}else{
				$image 		= $this->model_tool_image->resize('placeholder.png', 1024,768,'h');
			}
			$random_csore = rand(2000, 2500);
			$data['quizs'][] = array(
				'quiz_id' 			=> $quiz['quiz_id'],
				'quiz_title' 		=> $quiz['title'],
				'quiz_voice' 		=> sprintf($this->language->get('text_quiz_voice'), $random_csore, getNumEnding($random_csore,array('человек', 'человека', 'человек'))),
				'quiz_image' 		=> $image,
				'quiz_href' 	 		=> $this->url->link('information/quiz/view', 'quiz_id=' . $quiz['quiz_id'])
			);
		}



		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/quiz/quizs_list.tpl')) {
			$this->response->setOutput($this->load->view($this->config->get('config_template') . '/template/information/quiz/quizs_list.tpl', $data));
		} else {
			$this->response->setOutput($this->load->view('default/template/information/quiz/quizs_list.tpl', $data));
		}

	}
	


	public function view(){
		if (isset($this->request->get['quiz_id'])) {
			$quiz_id = (int)$this->request->get['quiz_id'];
		} else {
			$this->response->redirect($this->url->link('common/home', '', 'SSL'));
		}
		

		
		$this->load->language('information/quiz');
    	$this->load->model('catalog/quiz');
		//подсасываем скрипт для данного опроса
        $this->document->addScript('catalog/view/javascript/antibioticquiz.v.1.1.js');
        $this->document->addStyle('catalog/view/javascript/quiz.css');
        
        //подтянем инфу о сушности опрос
	    $quiz_info = $this->model_catalog_quiz->getQuiz($quiz_id);
	    $data['quiz_id'] = $quiz_id;

	    /********** проверки ***********/
		//записываем количество попыток 
		if(!$this->customer->isLogged()){
			$this->response->redirect($this->url->link('account/account', '', 'SSL'));
		}

		$customer_id = $this->customer->getId();
		
		//узнаем сколько раз проходил тест пользователь
		
		$customer_to_quiz  = $this->model_catalog_quiz->getQuizsForCustomer($customer_id);
		$data['customer_to_quiz'] = array();
		foreach ($customer_to_quiz as $vcq) {
			$data['customer_to_quiz'][$vcq['quiz_id']] = array(
				'quiz_id' 		=> $vcq['quiz_id'],
				'customer_id'	=> $vcq['customer_id'],
				'mark'			=> $vcq['mark'],
				'quiz_date'		=> $vcq['date_added']
			);
		}
		

		//количесво попыток пройти тест
		$quiz_count_attempts =  $quiz_info['quiz_count_attempts'];
		$count_req_quiz = (!empty($data['customer_to_quiz'][$quiz_id]))?count($data['customer_to_quiz'][$quiz_id]):0;
		if($quiz_count_attempts < $count_req_quiz){
			$this->response->redirect($this->url->link('account/account', '', 'SSL'));
		}

	    //seo 
	    $this->document->setTitle($quiz_info['meta_title']);
	    $this->document->setDescription($quiz_info['meta_description']);
	    $this->document->setKeywords($quiz_info['meta_keyword']);

	    //получим количество шагов для данного опроса $quiz_id
	    $data['step_questions'] = $this->model_catalog_quiz->getSteps($quiz_id);
	    //так как тест без картинок то не паримся насчет картинок и сразу отдаем его в шаблон
	    shuffle($data['step_questions']);


		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		
		$template_name = 'quiz';

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/quiz/'.$template_name.'.tpl')) {
			$this->response->setOutput($this->load->view($this->config->get('config_template') . '/template/quiz/'.$template_name.'.tpl', $data));
		} else {
			$this->response->setOutput($this->load->view('default/template/quiz/'.$template_name.'.tpl', $data));
		}
	}



	public function result(){

	}


	
	
	public function ajaxsendquiz(){
		//для теста узнай каккой ты москвич
		$json = array();
		$this->language->load('information/occasion');
		$this->load->model('catalog/quiz');
		$this->load->model('account/customer');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			
			//проверяем результат
			$array_answer = $this->request->post['answer'];

			$str_qitems = "'";
		    foreach ($array_answer  as $k => $qitem) {
		      $str_qitems = $str_qitems.$k."','";
		    }
		    $qitems = substr($str_qitems, 0, -2);
		    //получили id вопросов
		    $result_data_answer = $this->model_catalog_quiz->getQuizAnswer($qitems);

			//проверяем кореектность
		    $standard_data_answer = array();
		    foreach ($result_data_answer as $qitem_r) {
		      if($qitem_r['correct'] == 1){
		         $standard_data_answer[$qitem_r['qitem_id']] =  $qitem_r['question_id'];
		      }
		    }
		    $arr_count_yes = 0;
		    $count_arr = count($array_answer);
		    //добавить сравнение
		    foreach ($array_answer as $k => $result) {
		      if(!empty($standard_data_answer[$k]) && $standard_data_answer[$k] == $result){
		         $arr_count_yes++;
		      }
		    }
		    $mark = $arr_count_yes;
			//делаем запись голоса
			$customer_id 	= $this->customer->getId();
			$customer_to_quiz_id 	= $this->model_catalog_quiz->addAnswerForQuiz($this->request->post,$customer_id,$mark);
			if($customer_to_quiz_id > 0){
				$this->session->data['success'] = $this->language->get('text_success');
				$json['success'] = 1;
				$json['redirect'] = $this->url->link('account/account', '', 'SSL');
			}else{
				$json['error'] = 'ERROR DB';
			}
			
		}else {
			$json['error'] = $this->error;
        }
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	protected function validate() {
		if(!$this->customer->isLogged()){
			$this->error['login'] = $this->language->get('error_customer_login');
		}
		//добавить проверку на количесво попыток


		if (!$this->error) {
      		return true;
    	} else {
      		return false;
    	} 
	}
}