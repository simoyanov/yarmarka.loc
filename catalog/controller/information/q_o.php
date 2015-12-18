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
		//получим список аветивных рейтингов
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

		
		/* временная заплатка */
		


if ($quiz_id < 11 || $quiz_id > 12 ) {
	$data['poll'] = $this->load->controller('quiz/quiz'.$quiz_id);




    $data['column_left'] = $this->load->controller('common/column_left');
    $data['column_right'] = $this->load->controller('common/column_right');
    $data['content_top'] = $this->load->controller('common/content_top');
    $data['content_bottom'] = $this->load->controller('common/content_bottom');
    $data['footer'] = $this->load->controller('common/footer');
    $data['header'] = $this->load->controller('common/header');
    //подтянем результаты тестирования 



    if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/quiz/main_quiz_template.tpl')) {
      $this->response->setOutput($this->load->view($this->config->get('config_template') . '/template/information/quiz/main_quiz_template.tpl', $data));
    } else {
      $this->response->setOutput($this->load->view('default/template/information/quiz/main_quiz_template.tpl', $data));
    }
}else{

	$this->load->language('information/quiz');
		$this->load->model('catalog/quiz');
		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home', '', 'SSL')
		);
		//подтянем инфу о рейтинге
		$quiz_info = $this->model_catalog_quiz->getQuiz($quiz_id);
		//seo 
		$this->document->setTitle($quiz_info['meta_title']);
		$this->document->setDescription($quiz_info['meta_description']);
		$this->document->setKeywords($quiz_info['meta_keyword']);

		$data['heading_title'] = $quiz_info['title'];
		$data['quiz_id'] = $quiz_id;
		$template_name = $quiz_info['template_id'];
 
 		$data['count_quiz'] =  $this->model_catalog_quiz->getTotalQuizStatsFor($quiz_id);
 		$data['count_quiz'] +=5500;
		$data['t_voices'] = getNumEnding( $data['count_quiz'],array('человек', 'человека', 'человек'));
		if($quiz_id == 12){
			$data['t_voices'] = getNumEnding( $data['count_quiz'],array('бой', 'бои', 'боёв'));
		}
			$results_stats = $this->model_catalog_quiz->getStatsForQuiz($quiz_id);
			$data['count_voices'] = count($results_stats);
			$data['results_battle'] = array(
				'win_mer_1' => 0,
				'win_mer_2' => 0, 
				'friend'    => 0
			);
			//всего 14 вопросов
			$count_all_q = 14;

			foreach ($results_stats as $result) {
				$data_voice = array();
				$data_voice = unserialize($result['value']);
				// 0  - уволить
				// 1 - в команду
				// 2 - не знаю кто это
				
				$count_win_mer_1 = 0;
				foreach ($data_voice as $k => $voice) {
					if($voice == 1 ){
						$count_win_mer_1++;
					}			
				}
				if($count_win_mer_1 > 7){
					$data['results_battle'] = array(
						'win_mer_1' => $data['results_battle']['win_mer_1']+1,
						'win_mer_2' => $data['results_battle']['win_mer_2'], 
						'friend'    => $data['results_battle']['friend']
					);
				}
				if($count_win_mer_1 < 7){
					$data['results_battle'] = array(
						'win_mer_1' => $data['results_battle']['win_mer_1'],
						'win_mer_2' => $data['results_battle']['win_mer_2']+1, 
						'friend'    => $data['results_battle']['friend']
					);
				}
				if($count_win_mer_1 == 7){
					$data['results_battle'] = array(
						'win_mer_1' => $data['results_battle']['win_mer_1'],
						'win_mer_2' => $data['results_battle']['win_mer_2'], 
						'friend'    => $data['results_battle']['friend']+1
					);
				}
				
				
			}
			$_win_percent = ($data['results_battle']['win_mer_1']*100)/$data['count_voices'];
			$_fail_percent = ($data['results_battle']['win_mer_2']*100)/$data['count_voices'];
			$_friend_percent = ($data['results_battle']['friend']*100)/$data['count_voices'];

			$data['results_battle'] = array(
				'win_mer_1' => $data['results_battle']['win_mer_1']+2000+2500,
				'win_mer_2' => $data['results_battle']['win_mer_2']+500, 
				'word_win_mer_1' => getNumEnding( ($data['results_battle']['win_mer_1']+2000),array('бое', 'боях', 'боёв')),
				'word_win_mer_2' => getNumEnding( ($data['results_battle']['win_mer_2']+500),array('бое', 'боях', 'боёв')),
				'friend'    => $data['results_battle']['friend']+500,
				'word_friend' => getNumEnding( ($data['results_battle']['friend']+500),array('бое', 'боях', 'боёв')),
				'_win_percent' => $_win_percent,
				'_fail_percent' => $_fail_percent, 
				'_friend_percent'    => $_friend_percent

			);
		//подтянуть чиновников !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		//вынести в конфиг
		if($quiz_id == 11){
			$raiting_id = 9;
			$this->load->model('catalog/achievement');
			$this->load->model('tool/image');
			$filter_data = array(
				'filter_status'    => 1,
				'filter_raiting_id' => $raiting_id,
				'start' => 0,
				'limit' => 40
			);

			$achievements = $this->model_catalog_achievement->getAchievements($filter_data);
			$data['achievements'] = array();
			foreach ($achievements as $achievement) {
				if (!empty($achievement['image'])) {
					$image_face 		= $this->model_tool_image->resize($achievement['image'], 230,230,'h');
					$image_face_small   = $this->model_tool_image->resize($achievement['image'], 53,53,'h');
				}else{
					$image_face 		= $this->model_tool_image->resize('placeholder.png', 230,230,'h');
					$image_face_small	= $this->model_tool_image->resize('placeholder.png', 53,53,'h');
				}
				$data['achievements'][] = array(
					'achievement_id' 				=> $achievement['achievement_id'],
					'achievement_title' 			=> $achievement['title'],
					'achievement_description' 			=> $achievement['description'],
					'achievement_image_face' 		=> $image_face,
					'achievement_image_face_small' 	=> $image_face_small
				);
			}
			shuffle($data['achievements']);
		}

		$data['share_rbtn_ya']  = 'rbtn_'.$template_name;

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/quiz/'.$template_name.'.tpl')) {
			$this->response->setOutput($this->load->view($this->config->get('config_template') . '/template/information/quiz/'.$template_name.'.tpl', $data));
		} else {
			$this->response->setOutput($this->load->view('default/template/information/quiz/'.$template_name.'.tpl', $data));
		}

}
/******************************/

		
	}

	
	public function result(){ 
		
		if (isset($this->request->get['qshare_id']) ) {
			$qshare_id = $this->request->get['qshare_id'];
		}else{
			$this->response->redirect($this->url->link('common/home', '', 'SSL'));
		}
		$this->load->model('catalog/quiz');
		$result_quiz =  $this->model_catalog_quiz->getMyStatsForQuiz($qshare_id);
				/* временная заплатка */
	$quiz_id = 10;////////
	if(!empty($result_quiz)){
		$quiz_id = $result_quiz['quiz_id'];
	}
if ($quiz_id < 11 || $quiz_id > 12 ) {

		$data['result_share'] = $this->load->controller('quiz/quiz'.$quiz_id.'/result');
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/quiz/share_quiz_template.tpl')) {
	      $this->response->setOutput($this->load->view($this->config->get('config_template') . '/template/quiz/share_quiz_template.tpl', $data));
	    } else {
	      $this->response->setOutput($this->load->view('default/template/quiz/share_quiz_template.tpl', $data));
	    }
	    
	} else {
		
		$this->load->language('information/quiz');
		$this->load->model('tool/image');
		
		$this->load->model('catalog/achievement');
		
		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home', '', 'SSL')
		);

		//определим с какой соц сети пришел рефер
		// ok - однокласник
		// fb - facebook
		// tw - twitter
		// vk - vkontakte
		$data['social'] = 'false';
		$template_name = 'quiz/result_quiz.tpl';
		if($quiz_id == 12){

			//подтянем результаты тестирования 
			$results_stats = $this->model_catalog_quiz->getStatsForQuiz($quiz_id);
			$data['count_voices'] = count($results_stats);
			$data['results_battle'] = array(
				'win_mer_1' => 0,
				'win_mer_2' => 0, 
				'friend'    => 0
			);
			//всего 14 вопросов
			$count_all_q = 14;

			foreach ($results_stats as $result) {
				$data_voice = array();
				$data_voice = unserialize($result['value']);
				// 0  - уволить
				// 1 - в команду
				// 2 - не знаю кто это
				
				$count_win_mer_1 = 0;
				foreach ($data_voice as $k => $voice) {
					if($voice == 1 ){
						$count_win_mer_1++;
					}			
				}
				if($count_win_mer_1 > 7){
					$data['results_battle'] = array(
						'win_mer_1' => $data['results_battle']['win_mer_1']+1,
						'win_mer_2' => $data['results_battle']['win_mer_2'], 
						'friend'    => $data['results_battle']['friend']
					);
				}
				if($count_win_mer_1 < 7){
					$data['results_battle'] = array(
						'win_mer_1' => $data['results_battle']['win_mer_1'],
						'win_mer_2' => $data['results_battle']['win_mer_2']+1, 
						'friend'    => $data['results_battle']['friend']
					);
				}
				if($count_win_mer_1 == 7){
					$data['results_battle'] = array(
						'win_mer_1' => $data['results_battle']['win_mer_1'],
						'win_mer_2' => $data['results_battle']['win_mer_2'], 
						'friend'    => $data['results_battle']['friend']+1
					);
				}
				
				
			}
			$_win_percent = ($data['results_battle']['win_mer_1']*100)/$data['count_voices'];
			$_fail_percent = ($data['results_battle']['win_mer_2']*100)/$data['count_voices'];
			$_friend_percent = ($data['results_battle']['friend']*100)/$data['count_voices'];

			$data['results_battle'] = array(
				'win_mer_1' => $data['results_battle']['win_mer_1']+2000+2500,
				'win_mer_2' => $data['results_battle']['win_mer_2']+500, 
				'word_win_mer_1' => getNumEnding( $data['results_battle']['win_mer_1'],array('бое', 'боях', 'боёв')),
				'word_win_mer_2' => getNumEnding( $data['results_battle']['win_mer_2'],array('бое', 'боях', 'боёв')),
				'friend'    => $data['results_battle']['friend'],
				'_win_percent' => $_win_percent,
				'_fail_percent' => $_fail_percent, 
				'_friend_percent'    => $_friend_percent

			);



			$template_name = 'quiz/result_quiz_battle.tpl';
		}
		if(!empty($this->request->get['uid'])){
			$data['social'] = 'true';
			$social_name = $this->request->get['uid'];
			switch ($social_name) {
				case 'vk':
					$template_name = 'quiz/my_quiz_template_vk.tpl';
					break;
				case 'fb':
					$template_name = 'quiz/my_quiz_template_fb.tpl';
					break;
				case 'ok':
					$template_name = 'quiz/my_quiz_template_fb.tpl';
					break;
				case 'tw':
					$template_name = 'quiz/my_quiz_template_fb.tpl';
					break;
				default:
					$template_name = 'quiz/result_quiz.tpl';
					break;
			}
		}

		$data['heading_title'] = $this->language->get('text_your_choise');
		$data['sub_heading_title'] = $this->language->get('text_sub_your_choise');
		$more_link = $this->url->link('information/raiting/topresult', '', 'SSL');
		$data['text_more_raiting'] = sprintf( $this->language->get('text_more_raiting'), $more_link );

		//расчехляем количество процентов полученных у данного игрока
		
		
		
		$value_result = unserialize($result_quiz['value']);
		//получим quiz_id и quiz_template
		$quiz_id = 10;////////
		if(!empty($result_quiz)){
			$quiz_id = $result_quiz['quiz_id'];
		}
		



		//получаем результируюшую картинку 
		$result_calculate = $this->getCalculateResult($value_result,$quiz_id,$qshare_id);
		// ok - однокласник
		// fb - facebook
		// tw - twitter
		// vk - vkontakte
		//подтянем инфу о quiz
		$quiz_info = $this->model_catalog_quiz->getQuiz($quiz_id);
		//добавим url для шаринга для каждой соцсети
		$template_id = $quiz_info['template_id'];
		$data['share_url_ok'] = $result_calculate['share_url_ok'] ;
		$data['share_btn_ok']  = 'share_ok_'.$template_id;
		$data['share_url_vk'] = $result_calculate['share_url_vk'] ;
		$data['share_btn_vk']  = 'share_vk_'.$template_id;
		$data['share_url_fb'] = $result_calculate['share_url_fb'] ;
		$data['share_btn_fb']  = 'share_fb_'.$template_id;
		$data['share_url_tw'] = $result_calculate['share_url_tw'] ;
		$data['share_btn_tw']  = 'share_tw_'.$template_id;

		if(!empty($this->request->get['uid'])){
			$social_name = $this->request->get['uid'];
			switch ($social_name) {
				case 'vk':
					$data['share_image'] = $result_calculate['share_img_cub'];
					break;
				case 'fb':
					$data['share_image'] = $result_calculate['share_img_normal']; 
					break;
				case 'ok':
					$data['share_image'] = $result_calculate['share_img_cub']; 
					break;
				case 'tw':
					$data['share_image'] = $result_calculate['share_img_normal']; 
					break;
				default:
					$data['share_image'] = $result_calculate['share_img_normal'];
					break;
			}
		}else{
			$data['share_image'] = $result_calculate['share_img_normal'];
			$data['image'] 	= $result_calculate['image'];
			$data['share_title'] 	= $result_calculate['share_title'];
			$data['share_text']		= $result_calculate['share_text'];
		}
		$this->document->setTitle($result_calculate['share_title']);
		$this->document->setDescription($result_calculate['share_text']);
		$this->document->setSocialImg($result_calculate['share_img_normal']);
		$data['redirect'] = $result_calculate['redirect'];

		$filter_data = array(
			'filter_visibility'    => 1,
			'limit' => 5,
			'start' => 0
		);
		$quizs = $this->model_catalog_quiz->getQuizs($filter_data);
		$data['quizs'] = array();
		foreach ($quizs as $quiz) {
			if($quiz['quiz_id'] != $quiz_id){
				$data['quizs'][] = array(
					'quiz_id' 		=> $quiz['quiz_id'],
					'status' 		  => $quiz['status'],
					'quiz_title'	=> html_entity_decode($quiz['title']),
					'quiz_href'		=> $this->url->link('information/quiz/view', 'quiz_id=' . $quiz['quiz_id'] ),
					'share_id'    => 'btn_'.$quiz['template_id']
				);
			}else{
				$data['quizs'][] = array(
					'status' 		=> 1,
					'quiz_title'	=> 'Поучаствовать в рейтинге',
					'quiz_href'		=> $this->url->link('information/raiting', ''),
					'share_id'    => 'btn_independent_rating'
				);
			}
			
		}



		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');
		$data['social_header'] 	= $this->load->controller('common/sheader');

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/'.$template_name)) {
			$this->response->setOutput($this->load->view($this->config->get('config_template') . '/template/information/'.$template_name, $data));
		} else {
			$this->response->setOutput($this->load->view('default/template/information/'.$template_name, $data));
		}
}/***********************/
	}
	private function getCalculateResult($array_result = array(),$quiz_id = 10,$qshare_id){
		$calculate_data = array();
		//вычисляем результат для теста москвича
		
		if($quiz_id == 10){
			$arr_count_yes = 0;
			$arr_count_no  = 0;
			$my_choice = array();
			
			foreach ($array_result as $result) {
					
				switch ($result) {
					case '0':
						$arr_count_no++;
						break;
					case '1':
						$arr_count_yes++;
						break;
					default:
						break;
				}
				$my_choice[] = array(
					'value' 			=> $result
				);
			}
			$arr_count = count($my_choice);
			$result_procent = ($arr_count_yes/$arr_count)*100;
			//надо придумать более простой обход процентов
			if($arr_count_yes == 0){
				$share_name_file = 'share_5.jpg';
				$name_file = 'minor.jpg';
				$share_title 	= 'Я – минорный москвич.';
			    $share_text	= 'Столичная жизнь – дно и безысходность. Пора валить или лучше взять себя в руки и стать социально активным? Глубокий вдох, глубокий выдох. Неужели я правда такой?';
			}else if($arr_count_yes == $arr_count){
				$share_name_file = 'share_1.jpg';
				$name_file = 'magic.jpg';
				$share_title 	= 'Я – волшебный москвич.';
			    $share_text	= 'Когда я надеваю свои розовые очки, жители столицы превращаются в сказочных существ, улицы сами становятся чище и я улетаю в… воу-воу, не пора ли в реальность? Расскажите, что происходит в Москве?';
			}else if($result_procent < 100 && $result_procent > 70){
				$share_name_file = 'share_2.jpg';
				$name_file = 'qual.jpg';
				$share_title 	= 'Я – качественный москвич.';
			    $share_text	= 'Жизнь столицы – моя жизнь. Я знаю, что городские службы делали прошлым летом, а по ночам мне снится, что я мэр. Могу ответить на любой вопрос о Москве, только не забудьте встать в очередь.';
			}else if($result_procent <= 70 && $result_procent > 50){
				$share_name_file = 'share_3.jpg';
				$name_file = 'know_how.jpg';
				$share_title 	= 'Я – осведомленный москвич. ';
			    $share_text	= 'Каждую секунду я получаю новую информацию о жизни в Москве, но вся ли она правдива? Может, надо отдохнуть от интернета и проверить всё лично?';
			}else if($result_procent <= 50 && $result_procent > 30){
				$share_name_file = 'share_4.jpg';
				$name_file = 'gore.jpg';
				$share_title 	= 'Я – горе-москвич.';
			    $share_text	= 'Всё, что меня не касается – не интересно, иногда я не узнаю собственный район, а прохожие принимают меня за туриста. Ой, а почему мою машину эвакуировали?';
			}else if($result_procent <= 30 && $result_procent > 0){
				$share_name_file = 'share_5.jpg';
				$name_file = 'minor.jpg';
				$share_title 	= 'Я – минорный москвич.';
			    $share_text	= 'Столичная жизнь – дно и безысходность. Пора валить или лучше взять себя в руки и стать социально активным? Глубокий вдох, глубокий выдох. Неужели я правда такой?';
			}
			//подтянем инфу о рейтинге
			$quiz_info = $this->model_catalog_quiz->getQuiz($quiz_id);
			$template_name = $quiz_info['template_id'];
			
			$calculate_data['share_title'] 	= $share_title;
			$calculate_data['share_text'] 	= $share_text;
			$calculate_data['share_url'] 	= $this->url->link('information/quiz/result', 'qshare_id='.$qshare_id.'&uid=1', 'SSL');
			if ($this->request->server['HTTPS']) {
				$calculate_data['share_img_normal']  = $this->config->get('config_ssl') . 'image/' . 'share/'.$template_name.'/soc_'.$share_name_file;
			} else {
				$calculate_data['share_img_normal']  = $this->config->get('config_url') . 'image/' . 'share/'.$template_name.'/soc_'.$share_name_file;
			}
			
			$calculate_data['share_img_cub'] = $calculate_data['share_img_normal'] ;  
			$calculate_data['image'] 		= $this->model_tool_image->resize('share/'.$template_name.'/'.$name_file, 403,226,'h'); 
			$calculate_data['redirect']     = str_replace( HTTP_SERVER, '', $this->url->link('information/quiz/view', 'quiz_id='.$quiz_id, 'SSL')) ;
			// ok - однокласник
			// fb - facebook
			// tw - twitter
			// vk - vkontakte

			//добавим url для шаринга для каждой соцсети

			$calculate_data['share_url_ok'] = $this->url->link('information/quiz/result', 'qshare_id='.$qshare_id.'&uid=ok', 'SSL');
			$calculate_data['share_url_vk'] = $this->url->link('information/quiz/result', 'qshare_id='.$qshare_id.'&uid=vk', 'SSL');
			$calculate_data['share_url_fb'] = $this->url->link('information/quiz/result', 'qshare_id='.$qshare_id.'&uid=fb', 'SSL');
			$calculate_data['share_url_tw'] = $this->url->link('information/quiz/result', 'qshare_id='.$qshare_id.'&uid=tw', 'SSL');


			//подтянем инфу о рейтинге
			$template_name = $quiz_info['template_id'];



		}else if($quiz_id == 11){
//тест мера
			//получим картинки
			$raiting_id = 9;
			$this->load->model('catalog/achievement');
			$this->load->model('tool/image');
			$filter_data = array(
				'filter_status'    => 1,
				'filter_raiting_id' => $raiting_id
			);

			$achievements = $this->model_catalog_achievement->getAchievements($filter_data);
			$data['achievements'] = array();
			foreach ($achievements as $achievement) {
				if (!empty($achievement['image'])) {
					$image_face 		= $this->model_tool_image->resize($achievement['image'], 210,210,'h');
				}else{
					$image_face 		= $this->model_tool_image->resize('placeholder.png', 210,210,'h');
				}
				$data['achievements'][$achievement['achievement_id']] = array(
					'achievement_id' 				=> $achievement['achievement_id'],
					'achievement_title' 			=> $achievement['title'],
					'achievement_image_face' 		=> $image_face
				);
			}

			//если все в 1  то share_all_love
			//если все в 0  то share_all_kill
			//если все в 2  то share_all_other
			//если = 5 то рисуем топ 5
			//подсичтаем

			$count_correct = 0;
			$count_no_correct = 0;
			$count_other = 0;
			$top_my_team = array();
			foreach ($array_result as $key => $value) {
				if($value== 1) {
					$count_correct++;
					$top_my_team = array(
						'achievement_id' => $key,
						'value'			 => $value
						);
				}
				if($value == 0) {
					$count_no_correct++;
				}
				if($value == 2) {
					$count_other++;
				}
			}
			/*
			print_r('<pre>');
			print_r('correct ->>'.$count_correct);
			print_r('</pre>');
			print_r('<pre>');
			print_r('no_correct ->>'.$count_no_correct);
			print_r('</pre>');
			print_r('<pre>');
			print_r('other ->>'.$count_other);
			print_r('</pre>');
	*/
			//подтянем инфу о рейтинге
				$quiz_info = $this->model_catalog_quiz->getQuiz($quiz_id);
				$template_name = $quiz_info['template_id'];
			if ($count_no_correct == count($array_result)) {
				$share_name_file = 'share_all_fire.png';
			}
			if ($count_correct == count($array_result)) {
				$share_name_file = 'share_all_love.png';
			}
			if ($count_other == count($array_result)) {
				$share_name_file = 'share_all_other.png';
			}

			if ($count_other != 0 && $count_no_correct != 0 && $count_correct ==0) {
				$share_name_file = 'share_all_other.png';
			}
			

			if($count_correct <= 5 && $count_correct >0){
					/*********************/
					$share_bg_template = 'share/'.$template_name.'/bg_image.png';
					$share_template = 'share/'.$template_name.'/main_image.png';
					//делаеме картинку
					$old_image = $share_bg_template;
					//путь до геенреруемой картинки
					$new_image = 'result_share/'.$qshare_id.'.jpg';
					if (!is_file(DIR_IMAGE.$share_bg_template)) {
						return;
					}
					if (!is_file(DIR_IMAGE . $new_image) || (filectime(DIR_IMAGE . $old_image) > filectime(DIR_IMAGE . $new_image)) ) {
						//
						$path = '';

						$directories = explode('/', dirname(str_replace('../', '', $new_image)));

						foreach ($directories as $directory) {
							$path = $path . '/' . $directory;

							if (!is_dir(DIR_IMAGE . $path)) {
								@mkdir(DIR_IMAGE . $path, 0777);
							}
						}
						
						//для шаблона рейтинга топ-5
						$image = new Image(DIR_IMAGE . $old_image);
						//404*226
						$final_image = DIR_IMAGE.$share_template;
						$my_choice = array();
						
						foreach ($array_result as $key => $result) {
							if($result == 1){
								$my_choice[] = array(
									'image_top' 	=> $data['achievements'][$key]['achievement_image_face'],
									'image_text'	=> $data['achievements'][$key]['achievement_title']
								);
								
							}
							
						}
						$x = 144;
						$y = 317;
						for ($i=0; $i < 5 ; $i++) { 
							if(!empty( $my_choice[$i] )){
								$image_top = $my_choice[$i]['image_top'];
								$image->addImage($image_top,$x,$y,'jpeg');
							}else{
								$image_top = 'image/share/'.$template_name.'/placeholder.png';;
								$image->addImage($image_top,$x,$y,'jpeg');
							}
							$x += 228;
						}
						$image->addImage($final_image,600,315,'png');
						$font_size = 22;
						$font_path = DIR_APPLICATION.'/assets/fonts/PFDinDisplay/PFDinDisplay.ttf';
						$x = 144;
						$y = 477;
						for ($i=0; $i < 5 ; $i++) { 
							if(!empty( $my_choice[$i] )){
								$image->addTextCenterForSecondLine($my_choice[$i]['image_text'], $font_size , $x, $y,'000000',$font_path,45);
							}else{
								$image->addTextCenterForSecondLine('Вакансия', $font_size , $x, $y,'000000',$font_path,45);
							}
							$x += 228;
						}

						$image->save(DIR_IMAGE . $new_image);
					}

						if ($this->request->server['HTTPS']) {
							$share_name_file = $this->config->get('config_ssl') . 'image/' . $new_image;
						} else {
							$share_name_file = $this->config->get('config_url') . 'image/' . $new_image;
						}
					$calculate_data['share_img_normal'] = $share_name_file;  	

					/*********************/
			}else{
				$share_name_file  = 'share/'.$template_name.'/'.$share_name_file; 
				$calculate_data['share_img_normal'] = $this->model_tool_image->resize($share_name_file, 600,315);  
			}
			


				
				
				$calculate_data['share_title'] 	= 'Первый день в должности мэра прошел успешно! ';
				$calculate_data['share_text'] 	= 'Теперь попробуй поучаствовать в независимом народном рейтинге';
				$calculate_data['share_url'] 	= $this->url->link('information/quiz/result', 'qshare_id='.$qshare_id.'&uid=1', 'SSL');
				 
				$calculate_data['share_img_cub'] =   $calculate_data['share_img_normal'];
				$calculate_data['image'] 		=  $calculate_data['share_img_normal'];
				$calculate_data['redirect']     = str_replace( HTTP_SERVER, '', $this->url->link('information/quiz/view', 'quiz_id='.$quiz_id, 'SSL')) ;
				// ok - однокласник
				// fb - facebook
				// tw - twitter
				// vk - vkontakte

				//добавим url для шаринга для каждой соцсети

				$calculate_data['share_url_ok'] = $this->url->link('information/quiz/result', 'qshare_id='.$qshare_id.'&uid=ok', 'SSL');
				$calculate_data['share_url_vk'] = $this->url->link('information/quiz/result', 'qshare_id='.$qshare_id.'&uid=vk', 'SSL');
				$calculate_data['share_url_fb'] = $this->url->link('information/quiz/result', 'qshare_id='.$qshare_id.'&uid=fb', 'SSL');
				$calculate_data['share_url_tw'] = $this->url->link('information/quiz/result', 'qshare_id='.$qshare_id.'&uid=tw', 'SSL');

				//подтянем инфу о рейтинге
				$template_name = $quiz_info['template_id'];


		}else if($quiz_id == 12){
			$arr_count_yes = 0;
			$arr_count_no  = 0;
			$my_choice = array();
			foreach ($array_result as $result) {
					
				switch ($result) {
					case '0':
						$arr_count_no++;
						break;
					case '1':
						$arr_count_yes++;
						break;
					default:
						break;
				}
				$my_choice[] = array(
					'value' 			=> $result
				);
			}
			$arr_count = count($my_choice);
			$result_procent = ($arr_count_yes/$arr_count)*100;
			//надо придумать более простой обход процентов
			if($arr_count_yes > $arr_count_no){
				$share_name_file = 'sobyanin_winner.jpg';
				$name_file = 'sobyanin_winner.jpg';
				$share_title 	= 'Славная была битва! Ещё раунд?';
			    $share_text	= '';
			}else if($arr_count_yes < $arr_count_no){
				$share_name_file = 'sobyanin_lose.jpg';
				$name_file = 'sobyanin_lose.jpg';
				$share_title 	= 'Славная была битва! Ещё раунд?';
			    $share_text	= '';
			}else if($arr_count_yes == $arr_count_no){
				$share_name_file = 'friendship.jpg';
				$name_file = 'friendship.jpg';
				$share_title 	= 'Славная была битва! Ещё раунд?';
			    $share_text	= '';
			}
			//подтянем инфу о рейтинге
			$quiz_info = $this->model_catalog_quiz->getQuiz($quiz_id);
			$template_name = $quiz_info['template_id'];
			
			$calculate_data['share_title'] 	= $share_title;
			$calculate_data['share_text'] 	= $share_text;
			$calculate_data['share_url'] 	= $this->url->link('information/quiz/result', 'qshare_id='.$qshare_id.'&uid=1', 'SSL');
			if ($this->request->server['HTTPS']) {
				$calculate_data['share_img_normal']  = $this->config->get('config_ssl') . 'image/' . 'share/'.$template_name.'/'.$share_name_file;
			} else {
				$calculate_data['share_img_normal']  = $this->config->get('config_url') . 'image/' . 'share/'.$template_name.'/'.$share_name_file;
			}
			
			$calculate_data['share_img_cub'] = $calculate_data['share_img_normal'] ;  
			$calculate_data['image'] 		= $calculate_data['share_img_normal']; 
			$calculate_data['redirect']     = str_replace( HTTP_SERVER, '', $this->url->link('information/quiz/view', 'quiz_id='.$quiz_id, 'SSL')) ;
			// ok - однокласник
			// fb - facebook
			// tw - twitter
			// vk - vkontakte

			//добавим url для шаринга для каждой соцсети

			$calculate_data['share_url_ok'] = $this->url->link('information/quiz/result', 'qshare_id='.$qshare_id.'&uid=ok', 'SSL');
			$calculate_data['share_url_vk'] = $this->url->link('information/quiz/result', 'qshare_id='.$qshare_id.'&uid=vk', 'SSL');
			$calculate_data['share_url_fb'] = $this->url->link('information/quiz/result', 'qshare_id='.$qshare_id.'&uid=fb', 'SSL');
			$calculate_data['share_url_tw'] = $this->url->link('information/quiz/result', 'qshare_id='.$qshare_id.'&uid=tw', 'SSL');


			//подтянем инфу о рейтинге
			$template_name = $quiz_info['template_id'];
		}
		return $calculate_data;
	}
	public function ajaxsendquiz(){
		//для теста узнай каккой ты москвич
		$json = array();
		$this->language->load('information/occasion');
		$this->load->model('catalog/quiz');
		$this->load->model('account/customer');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			//делаем проверку есть ли такой пользователь
			$data_customer = array();

			if (!$this->customer->isLogged()) {
				$customer_id = 0;
				/*if ($this->model_account_customer->getTotalCustomersByEmail($this->request->post['email'])) {
					$customer = $this->model_account_customer->getCustomerByEmail($this->request->post['email']);
					$customer_id = $customer['customer_id'];
				}else{
					$customer_id = $this->model_account_customer->addCustomer($this->request->post);
				}*/
				$data_customer = array();//$this->request->post;
			}else{
				$customer_id = $this->customer->getId();

				$data_customer = $this->model_account_customer->getCustomer($customer_id);
				//$data_customer['occasion_id'] = $this->request->post['occasion_id'];

			}
			//делаем запись голоса
			$array_qshare = $this->model_catalog_quiz->addVoice($this->request->post,$data_customer,$customer_id);
			//$this->session->data['success'] = $this->language->get('text_success');

			if (!empty($array_qshare) ) {
				$json['success'] = 1;
				$json['redirect'] = $this->url->link('information/quiz/result', 'qshare_id='.$array_qshare['qshare_id'], 'SSL');// str_replace('&amp;', '&', $this->url->link('information/quiz/result', '', 'SSL'))  ;
			}else{
				$this->error['warning'] = $this->language->get('error_warning');
				$json['error'] = $this->error;
			}
            
		}else {
			$json['error'] = $this->error;
        }
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	protected function validate() {
		if(!$this->customer->isLogged()){
			/*if ((utf8_strlen($this->request->post['firstname']) < 3) || (utf8_strlen($this->request->post['firstname']) > 100)) {
				$this->error['firstname'] = $this->language->get('error_customer_name');
			}
			if ((utf8_strlen($this->request->post['telephone']) < 3) || (utf8_strlen($this->request->post['telephone']) > 100)) {
				$this->error['telephone'] = $this->language->get('error_customer_phone');
			}
			if ((utf8_strlen($this->request->post['email']) > 96) || !preg_match('/^[^\@]+@.*.[a-z]{2,15}$/i', $this->request->post['email'])) {
				$this->error['email'] = $this->language->get('error_customer_email');
			}*/
		}
		if (!$this->error) {
      		return true;
    	} else {
      		return false;
    	} 
	}
}