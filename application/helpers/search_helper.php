<?
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* =================================================================
* �˻� ����
================================================================= */

	// ������ ���̼�
	function page_lists($table,$order_by,$data,$where=NULL,$clm=NULL,$where2=NULL,$clm2=NULL,$where3=NULL,$clm3=NULL,$where4=NULL,$clm4=NULL,$where5=NULL,$clm5=NULL)
	{

		define('SEARCH_URL', current_url());

		$CI =& get_instance();
		$CI->load->library('pagination');

		$sys = $page = $CI->uri->segment(2);
		$smt = $CI->uri->segment(3);
		$page = $CI->uri->segment(4);

		$data['st'] = $CI->uri->segment(7,0);
		$data['sc'] = $CI->uri->segment(9);


		$data['st'] = $CI->uri->segment(7,0);
		$data['sc'] = $CI->uri->segment(9);





		$sc_post = preg_replace("/\s+/", "", $CI->input->post('sc'));

		// �˻������� �ִٸ�
		if ($CI->input->post('st') and $CI->input->post('sc')) {
			redirect('/admin/'.$sys.'/'.$smt.'/page/1/st/'.$CI->input->post('st').'/sc/'. urlencode($sc_post).'/from_date/'.$CI->input->post('from_date').'/to_date/'.$CI->input->post('to_date'));
		}


		// page �ѹ� ���� ���׸�Ʈ ���
		if ($CI->uri->segment(6) == "st" and  $CI->uri->segment(8) == "sc") {
			$q = array('st' => $data['st'], 'sc' => $data['sc']);
			$qstr = $CI->uri->assoc_to_uri($q);
			$config['suffix']      = "/".$qstr;
		}
		$data['from_date'] = $CI->uri->segment(11);
		$data['to_date'] = $CI->uri->segment(13);


		$config['per_page'] = 10;  //���������� ������ �Խù�
		$config['num_links'] = 5;  // �ִ뺸���� ������ �ѹ�
		$config['base_url'] = '/'.$CI->uri->segment(1).'/'.$sys.'/'.$smt.'/page/';


		// ������
		$config['first_tag_open']  = '<span id=page>';
		$config['first_tag_close']  = '</span>';
		$config['last_tag_open']  = '<span id=page>';
		$config['last_tag_close']  = '</span>';
		$config['cur_tag_open']  = '<span id=page_con>';
		$config['cur_tag_close']  = '</span>';
		$config['next_tag_open']  = '<span id=page>';
		$config['next_tag_close']  = '</span>';
		$config['prev_tag_open']  = '<span id=';
		$config['prev_tag_open']  = '<span id=page>';
		$config['prev_tag_close']  = '</span>';
		$config['num_tag_open']  = '<span id=page>';
		$config['num_tag_close']  = '</span>';


		//������ ������������ 1���϶��
		$page_num = $CI->uri->segment(5);
		if ($page_num == 1 or $page_num == NULL ) {
			$page_num = 0;
		}
		else {
			$page_num = $page_num * $config['per_page'] - $config['per_page'];
		}

		// �˻� ������ ������ (���� �ڵ� ����)
		if ($CI->uri->segment(6) == "st" and  $CI->uri->segment(8) == "sc") {

			$data['item'] = $CI->m_admin->get_sc_lists($table,$config['per_page'],$page_num,$order_by,$data['st'],$data['sc'],$where,$clm,$where2,$data['from_date'],$where3,$data['to_date'],$where4,$clm4,$where5,$clm5);


			$config['total_rows'] = $CI->m_admin->get_sc_total($table,$config['per_page'],$page_num,$order_by,$data['st'],$data['sc'],$where,$clm,$where2,$data['from_date'],$where3,$data['to_date'],$where4,$clm4,$where5,$clm5);
		}

		else {
			$data['item'] = $CI->m_admin->get_lists($table,$config['per_page'],$page_num,$order_by,$where,$clm,$where2,$clm2,$where3,$clm3,$where4,$clm4,$where5,$clm5);
			$config['total_rows'] = $CI->m_admin->get_total($table,$where,$clm,$where2,$clm2,$where3,$clm3,$where4,$clm4,$where5,$clm5);
		}




		$data['total_count'] = $config['total_rows'] - $page_num;

		$data['search'] =  urldecode($data['sc']);
		$CI->pagination->initialize($config);
		define('PAGE_URL', $CI->pagination->create_links());
		return $data;

	}
function page_lists_partner($table,$order_by,$data,$where=NULL,$clm=NULL,$where2=NULL,$clm2=NULL,$where3=NULL,$clm3=NULL,$where4=NULL,$clm4=NULL,$where5=NULL,$clm5=NULL)
{
	define('SEARCH_URL', current_url());

	$CI =& get_instance();
	$CI->load->library('pagination');

	$sys = $page = $CI->uri->segment(2);
	$smt = $CI->uri->segment(3);
	$page = $CI->uri->segment(4);

	$data['st'] = $CI->uri->segment(7,0);


	$data['sc'] = $CI->uri->segment(9);
	$sc_post = preg_replace("/\s+/", "", $CI->input->post('sc'));

	// �˻������� �ִٸ�
	if ($CI->input->post('st') and $CI->input->post('sc')) {
		redirect('/partner/'.$sys.'/'.$smt.'/page/1/st/'.$CI->input->post('st').'/sc/'. urlencode($sc_post).'');
	}

	// page �ѹ� ���� ���׸�Ʈ ���
	if ($CI->uri->segment(6) == "st" and  $CI->uri->segment(8) == "sc") {
		$q = array('st' => $data['st'], 'sc' => $data['sc']);
		$qstr = $CI->uri->assoc_to_uri($q);
		$config['suffix']      = "/".$qstr;
	}

	$config['per_page'] = 10;  //���������� ������ �Խù�
	$config['num_links'] = 5;  // �ִ뺸���� ������ �ѹ�
	$config['base_url'] = '/'.$CI->uri->segment(1).'/'.$sys.'/'.$smt.'/page/';


	// ������
	$config['first_tag_open']  = '<span id=page>';
	$config['first_tag_close']  = '</span>';
	$config['last_tag_open']  = '<span id=page>';
	$config['last_tag_close']  = '</span>';
	$config['cur_tag_open']  = '<span id=page_con>';
	$config['cur_tag_close']  = '</span>';
	$config['next_tag_open']  = '<span id=page>';
	$config['next_tag_close']  = '</span>';
	$config['prev_tag_open']  = '<span id=';
	$config['prev_tag_open']  = '<span id=page>';
	$config['prev_tag_close']  = '</span>';
	$config['num_tag_open']  = '<span id=page>';
	$config['num_tag_close']  = '</span>';


	//������ ������������ 1���϶��
	$page_num = $CI->uri->segment(5);
	if ($page_num == 1 or $page_num == NULL ) {
		$page_num = 0;
	}
	else {
		$page_num = $page_num * $config['per_page'] - $config['per_page'];
	}

	// �˻� ������ ������ (���� �ڵ� ����)
	if ($CI->uri->segment(6) == "st" and  $CI->uri->segment(8) == "sc") {

		$data['item'] = $CI->m_admin->get_sc_lists($table,$config['per_page'],$page_num,$order_by,$data['st'],$data['sc'],$where,$clm,$where2,$clm2,$where3,$clm3,$where4,$clm4,$where5,$clm5);

		$config['total_rows'] = $CI->m_admin->get_sc_total($table,$config['per_page'],$page_num,$order_by,$data['st'],$data['sc'],$where,$clm,$where2,$clm2,$where3,$clm3,$where4,$clm4,$where5,$clm5);
	}
	else {
		$data['item'] = $CI->m_admin->get_lists($table,$config['per_page'],$page_num,$order_by,$where,$clm,$where2,$clm2,$where3,$clm3,$where4,$clm4,$where5,$clm5);
		$config['total_rows'] = $CI->m_admin->get_total($table,$where,$clm,$where2,$clm2,$where3,$clm3,$where4,$clm4,$where5,$clm5);
	}

	$data['total_count'] = $config['total_rows'] - $page_num;

	$data['search'] =  urldecode($data['sc']);
	$CI->pagination->initialize($config);
	define('PAGE_URL', $CI->pagination->create_links());
	return $data;

}
function page_lists3($table,$order_by,$data,$where=NULL,$clm=NULL,$where2=NULL,$clm2=NULL,$where3=NULL,$clm3=NULL,$where4=NULL,$clm4=NULL,$where5=NULL,$clm5=NULL)
{
	define('SEARCH_URL', current_url());

	$CI =& get_instance();
	$CI->load->library('pagination');

	$sys = $page = $CI->uri->segment(2);
	$smt = $CI->uri->segment(3);
	$page = $CI->uri->segment(4);

	$data['st'] = $CI->uri->segment(7,0);


	$data['sc'] = $CI->uri->segment(9);
	$sc_post = preg_replace("/\s+/", "", $CI->input->post('sc'));

	// �˻������� �ִٸ�
	if ($CI->input->post('st') and $CI->input->post('sc')) {
		redirect('/admin/'.$sys.'/'.$smt.'/page/1/st/'.$CI->input->post('st').'/sc/'. urlencode($sc_post).'');
	}

	// page �ѹ� ���� ���׸�Ʈ ���
	if ($CI->uri->segment(6) == "st" and  $CI->uri->segment(8) == "sc") {
		$q = array('st' => $data['st'], 'sc' => $data['sc']);
		$qstr = $CI->uri->assoc_to_uri($q);
		$config['suffix']      = "/".$qstr;
	}

	$config['per_page'] = 100;  //���������� ������ �Խù�
	$config['num_links'] = 5;  // �ִ뺸���� ������ �ѹ�
	$config['base_url'] = '/'.$CI->uri->segment(1).'/'.$sys.'/'.$smt.'/page/';


	// ������
	$config['first_tag_open']  = '<span id=page>';
	$config['first_tag_close']  = '</span>';
	$config['last_tag_open']  = '<span id=page>';
	$config['last_tag_close']  = '</span>';
	$config['cur_tag_open']  = '<span id=page_con>';
	$config['cur_tag_close']  = '</span>';
	$config['next_tag_open']  = '<span id=page>';
	$config['next_tag_close']  = '</span>';
	$config['prev_tag_open']  = '<span id=';
	$config['prev_tag_open']  = '<span id=page>';
	$config['prev_tag_close']  = '</span>';
	$config['num_tag_open']  = '<span id=page>';
	$config['num_tag_close']  = '</span>';


	//������ ������������ 1���϶��
	$page_num = $CI->uri->segment(5);
	if ($page_num == 1 or $page_num == NULL ) {
		$page_num = 0;
	}
	else {
		$page_num = $page_num * $config['per_page'] - $config['per_page'];
	}

	// �˻� ������ ������ (���� �ڵ� ����)
	if ($CI->uri->segment(6) == "st" and  $CI->uri->segment(8) == "sc") {

		$data['item'] = $CI->m_admin->get_sc_lists($table,$config['per_page'],$page_num,$order_by,$data['st'],$data['sc'],$where,$clm,$where2,$clm2,$where3,$clm3,$where4,$clm4,$where5,$clm5);
		$config['total_rows'] = $CI->m_admin->get_sc_total($table,$config['per_page'],$page_num,$order_by,$data['st'],$data['sc'],$where,$clm,$where2,$clm2,$where3,$clm3,$where4,$clm4,$where5,$clm5);
	}
	else {
		$data['item'] = $CI->m_admin->get_lists($table,$config['per_page'],$page_num,$order_by,$where,$clm,$where2,$clm2,$where3,$clm3,$where4,$clm4,$where5,$clm5);
		$config['total_rows'] = $CI->m_admin->get_total($table,$where,$clm,$where2,$clm2,$where3,$clm3,$where4,$clm4,$where5,$clm5);
	}

	$data['total_count'] = $config['total_rows'] - $page_num;

	$data['search'] =  urldecode($data['sc']);
	$CI->pagination->initialize($config);
	define('PAGE_URL', $CI->pagination->create_links());
	return $data;

}
	
	// ������ ���̼�
	function page_lists_mssql($table,$order_by,$data,$where=NULL,$clm=NULL,$where2=NULL,$clm2=NULL,$where3=NULL,$clm3=NULL,$where4=NULL,$clm4=NULL,$where5=NULL,$clm5=NULL)
	{
		define('SEARCH_URL', current_url());

		$CI =& get_instance();
		$CI->load->library('pagination');

		$sys = $page = $CI->uri->segment(2);
		$smt = $CI->uri->segment(3);
		$page = $CI->uri->segment(4);

		$data['st'] = $CI->uri->segment(7,0);
		
		
		$data['sc'] = $CI->uri->segment(9);
		$sc_post = preg_replace("/\s+/", "", $CI->input->post('sc'));

		// �˻������� �ִٸ�
		if ($CI->input->post('st') and $CI->input->post('sc')) {
			redirect('/admin/'.$sys.'/'.$smt.'/page/1/st/'.$CI->input->post('st').'/sc/'. urlencode($sc_post).'');
		}
		// page �ѹ� ���� ���׸�Ʈ ���
		if ($CI->uri->segment(6) == "st" and  $CI->uri->segment(8) == "sc") {
			$q = array('st' => $data['st'], 'sc' => $data['sc']);
			$qstr = $CI->uri->assoc_to_uri($q);
			$config['suffix']      = "/".$qstr;
		}

		$config['per_page'] = 10;  //���������� ������ �Խù�
		$config['num_links'] = 5;  // �ִ뺸���� ������ �ѹ�
		$config['base_url'] = '/'.$CI->uri->segment(1).'/'.$sys.'/'.$smt.'/page/';


		// ������
		$config['first_tag_open']  = '<span id=page>';
		$config['first_tag_close']  = '</span>';
		$config['last_tag_open']  = '<span id=page>';
		$config['last_tag_close']  = '</span>';
		$config['cur_tag_open']  = '<span id=page_con>';
		$config['cur_tag_close']  = '</span>';
		$config['next_tag_open']  = '<span id=page>';
		$config['next_tag_close']  = '</span>';
		$config['prev_tag_open']  = '<span id=';
		$config['prev_tag_open']  = '<span id=page>';
		$config['prev_tag_close']  = '</span>';
		$config['num_tag_open']  = '<span id=page>';
		$config['num_tag_close']  = '</span>';


		//������ ������������ 1���϶��
		$page_num = $CI->uri->segment(5);
		if ($page_num == NULL ) {
			$page_num = 1;
		}

		// �˻� ������ ������ (���� �ڵ� ����)
		if ($CI->uri->segment(6) == "st" and  $CI->uri->segment(8) == "sc") {
			$data['item'] = $CI->m_admin->get_sc_lists_mssql($table,$config['per_page'],$page_num,$order_by,$data['st'],$data['sc'],$where,$clm,$where2,$clm2,$where3,$clm3,$where4,$clm4,$where5,$clm5);
			$config['total_rows'] = $CI->m_admin->get_sc_total($table,$config['per_page'],$page_num,$order_by,$data['st'],$data['sc'],$where,$clm,$where2,$clm2,$where3,$clm3,$where4,$clm4,$where5,$clm5);
		}
		else {
			$data['item'] = $CI->m_admin->get_lists_mssql($table,$config['per_page'],$page_num,$order_by,$where,$clm,$where2,$clm2,$where3,$clm3,$where4,$clm4,$where5,$clm5);
			$config['total_rows'] = $CI->m_admin->get_total($table,$where,$clm,$where2,$clm2,$where3,$clm3,$where4,$clm4,$where5,$clm5);
		}

		$data['total_count'] = $config['total_rows'] - ($page_num - 1)  * 10;

		$data['search'] =  urldecode($data['sc']);
		$CI->pagination->initialize($config);
		define('PAGE_URL', $CI->pagination->create_links());
		return $data;

	}
	
	
	
	// ������ ���̼�
	function page_lists1($table,$order_by,$data,$where=NULL,$clm=NULL,$where2=NULL,$clm2=NULL,$where3=NULL,$clm3=NULL,$where4=NULL,$clm4=NULL,$where5=NULL,$clm5=NULL)
	{
		define('SEARCH_URL', current_url());

		$CI =& get_instance();
		$CI->load->library('pagination');

		$sys = $page = $CI->uri->segment(2);
		$smt = $CI->uri->segment(3);
		$page = $CI->uri->segment(4);

		$data['st'] = $CI->uri->segment(7,0);
		
		
		$data['sc'] = $CI->uri->segment(9);
		$sc_post = preg_replace("/\s+/", "", $CI->input->post('sc'));

		// �˻������� �ִٸ�
		if ($CI->input->post('st') and $CI->input->post('sc')) {
			redirect('/admin/'.$sys.'/'.$smt.'/page/1/st/'.$CI->input->post('st').'/sc/'. urlencode($sc_post).'');
		}

		// page �ѹ� ���� ���׸�Ʈ ���
		if ($CI->uri->segment(6) == "st" and  $CI->uri->segment(8) == "sc") {
			$q = array('st' => $data['st'], 'sc' => $data['sc']);
			$qstr = $CI->uri->assoc_to_uri($q);
			$config['suffix']      = "/".$qstr;
		}

		$config['per_page'] = 10;  //���������� ������ �Խù�
		$config['num_links'] = 5;  // �ִ뺸���� ������ �ѹ�
		$config['base_url'] = '/'.$CI->uri->segment(1).'/'.$sys.'/'.$smt.'/page/';


		// ������
		$config['first_tag_open']  = '<span id=page>';
		$config['first_tag_close']  = '</span>';
		$config['last_tag_open']  = '<span id=page>';
		$config['last_tag_close']  = '</span>';
		$config['cur_tag_open']  = '<span id=page_con>';
		$config['cur_tag_close']  = '</span>';
		$config['next_tag_open']  = '<span id=page>';
		$config['next_tag_close']  = '</span>';
		$config['prev_tag_open']  = '<span id=';
		$config['prev_tag_open']  = '<span id=page>';
		$config['prev_tag_close']  = '</span>';
		$config['num_tag_open']  = '<span id=page>';
		$config['num_tag_close']  = '</span>';


		//������ ������������ 1���϶��
		$page_num = $CI->uri->segment(5);
		if ($page_num == 1 or $page_num == NULL ) {
			$page_num = 0;
		}
		else {
			$page_num = $page_num * $config['per_page'] - $config['per_page'];
		}

		// �˻� ������ ������ (���� �ڵ� ����)
		if ($CI->uri->segment(6) == "st" and  $CI->uri->segment(8) == "sc") {

			$data['item'] = $CI->m_admin->get_sc_lists($table,$config['per_page'],$page_num,$order_by,$data['st'],$data['sc'],$where,$clm,$where2,$clm2,$where3,$clm3,$where4,$clm4,$where5,$clm5);
			$config['total_rows'] = $CI->m_admin->get_sc_total($table,$config['per_page'],$page_num,$order_by,$data['st'],$data['sc'],$where,$clm,$where2,$clm2,$where3,$clm3,$where4,$clm4,$where5,$clm5);
		}
		else {
			$data['item'] = $CI->m_admin->get_lists($table,$config['per_page'],$page_num,$order_by,$where,$clm,$where2,$clm2,$where3,$clm3,$where4,$clm4,$where5,$clm5);
			$config['total_rows'] = $CI->m_admin->get_total($table,$where,$clm,$where2,$clm2,$where3,$clm3,$where4,$clm4,$where5,$clm5);
		}

		$data['total_count'] = $config['total_rows'] - $page_num;

		$data['search'] =  urldecode($data['sc']);
		$CI->pagination->initialize($config);
		define('PAGE_URL', $CI->pagination->create_links());
		return $data;

	}

	
	// ������ ���̼�
	function page_lists2($model,$table,$data)
	{
		define('SEARCH_URL', current_url());

		$CI =& get_instance();
		$CI->load->library('pagination');

		$sys = $page = $CI->uri->segment(2);
		$smt = $CI->uri->segment(3);
		$page = $CI->uri->segment(4);

		$data['st'] = $CI->uri->segment(7,0);
		
		
		$data['sc'] = $CI->uri->segment(9);
		$sc_post = preg_replace("/\s+/", "", $CI->input->post('sc'));

		// �˻������� �ִٸ�
		if ($CI->input->post('st') and $CI->input->post('sc')) {
			redirect('/admin/'.$sys.'/'.$smt.'/page/1/st/'.$CI->input->post('st').'/sc/'. urlencode($sc_post).'');
		}

		// page �ѹ� ���� ���׸�Ʈ ���
		if ($CI->uri->segment(6) == "st" and  $CI->uri->segment(8) == "sc") {
			$q = array('st' => $data['st'], 'sc' => $data['sc']);
			$qstr = $CI->uri->assoc_to_uri($q);
			$config['suffix']      = "/".$qstr;
		}

		$config['per_page'] = 10;  //���������� ������ �Խù�
		$config['num_links'] = 5;  // �ִ뺸���� ������ �ѹ�
		$config['base_url'] = '/'.$CI->uri->segment(1).'/'.$sys.'/'.$smt.'/page/';


		// ������
		$config['first_tag_open']  = '<span id=page>';
		$config['first_tag_close']  = '</span>';
		$config['last_tag_open']  = '<span id=page>';
		$config['last_tag_close']  = '</span>';
		$config['cur_tag_open']  = '<span id=page_con>';
		$config['cur_tag_close']  = '</span>';
		$config['next_tag_open']  = '<span id=page>';
		$config['next_tag_close']  = '</span>';
		$config['prev_tag_open']  = '<span id=';
		$config['prev_tag_open']  = '<span id=page>';
		$config['prev_tag_close']  = '</span>';
		$config['num_tag_open']  = '<span id=page>';
		$config['num_tag_close']  = '</span>';


		//������ ������������ 1���϶��
		$page_num = $CI->uri->segment(5);
		if ($page_num == 1 or $page_num == NULL ) {
			$page_num = 0;
		} else {
			$page_num = $page_num * $config['per_page'] - $config['per_page'];
		}
		
		// �˻� ��
		$data['item'] = $CI->{$model}->{$table}($config['per_page'],$page_num,$data['st'],urldecode($data['sc']));
		$config['total_rows'] = $data['item']['lists_total'];
		$data['total_count'] = $config['total_rows'] - $page_num;

		$data['search'] =  urldecode($data['sc']);
		$CI->pagination->initialize($config);
		define('PAGE_URL', $CI->pagination->create_links());
		return $data;

	}

?>
