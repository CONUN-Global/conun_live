<?
class M_cfg extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
/* =================================================================
* config
================================================================= */

	function get_cfg() {
		$this->db->select('*');
		$this->db->from('m_config');
		$query = $this->db->get();
		$item = $query->row();
		return $item;
	}
	
	function get_config() {
		$this->db->select('*');
		$this->db->from('m_config');
		$this->db->where('cfg_no',1);
		$query = $this->db->get();
		$item = $query->row();
		return $item;
	}
	
	function set_config() {
		
		$regdate = nowdate();
		
		$query = array(
			'coin1_name' => $this->input->post('coin1_name'),
			'coin1_symbol' => $this->input->post('coin1_symbol'),
			'coin1_total' => $this->input->post('coin1_total'),
			'coin1_unit' => $this->input->post('coin1_unit'),
			'coin1_state' => $this->input->post('coin1_state'),
			'coin1_volume' => $this->input->post('coin1_volume'),
			'coin1_flgs' => $this->input->post('coin1_flgs'),
			'exchange' => $this->input->post('exchange'),
			'change_name' => $this->input->post('change_name'),
			'regdate' => $regdate				
		);

		if($this->input->post('cfg_no') == 1){
			$this->db->where('cfg_no', $this->input->post('cfg_no'));
			$this->db->update('m_config', $query);
		}
		else{
			$this->db->insert('m_config', $query);			
		}
	}
	
	function set_config2() {
		
		$regdate = nowdate();
		
		$query = array(
			'su_recommend' => $this->input->post('su_recommend'),
			'su_sponsor' => $this->input->post('su_sponsor'),
			'sponsor_sub' => $this->input->post('sponsor_sub'),
			'su_day' => $this->input->post('su_day'),
			'global1_state' => $this->input->post('global1_state'),
			'su_global1' => $this->input->post('su_global1'),
			'global2_state' => $this->input->post('global2_state'),
			'su_global2' => $this->input->post('su_global2'),
			'global3_state' => $this->input->post('global3_state'),
			'su_global3' => $this->input->post('su_global3'),
			'su_level1' => $this->input->post('su_level1'),
			'level1_state' => $this->input->post('level1_state'),
			'level1_name' => $this->input->post('level1_name'),
			'su_level2' => $this->input->post('su_level2'),
			'level2_state' => $this->input->post('level2_state'),
			'level2_name' => $this->input->post('level2_name'),
			'su_level3' => $this->input->post('su_level3'),
			'level3_state' => $this->input->post('level3_state'),
			'level3_name' => $this->input->post('level3_name'),
			'su_maching1' => $this->input->post('su_maching1'),
			'su_maching2' => $this->input->post('su_maching2'),
			'su_maching3' => $this->input->post('su_maching3'),
			'su_maching4' => $this->input->post('su_maching4'),
			'su_maching5' => $this->input->post('su_maching5'),
			'su_maching6' => $this->input->post('su_maching6'),
			'su_maching7' => $this->input->post('su_maching7'),
			'su_maching8' => $this->input->post('su_maching8'),
			'su_maching9' => $this->input->post('su_maching9'),
			'su_maching10' => $this->input->post('su_maching10'),
			'regdate' => $regdate				
		);

		if($this->input->post('cfg_no') == 1){
			$this->db->where('cfg_no', $this->input->post('cfg_no'));
			$this->db->update('m_config', $query);
		}
		else{
			$this->db->insert('m_config', $query);			
		}
	}
	
	function set_config3() {
		
		$regdate = nowdate();
		
		$query = array(
			'package1TR' => $this->input->post('package1TR'),
			'package1CR' => $this->input->post('package1CR'),
			'package1JSC' => $this->input->post('package1JSC'),
			'package1HSC' => $this->input->post('package1HSC'),
			'package2TR' => $this->input->post('package2TR'),
			'package2CR' => $this->input->post('package2CR'),
			'package2JSC' => $this->input->post('package2JSC'),
			'package2HSC' => $this->input->post('package2HSC'),
			'package3TR' => $this->input->post('package3TR'),
			'package3CR' => $this->input->post('package3CR'),
			'package3JSC' => $this->input->post('package3JSC'),
			'package3HSC' => $this->input->post('package3HSC'),
			'package4TR' => $this->input->post('package4TR'),
			'package4CR' => $this->input->post('package4CR'),
			'package4JSC' => $this->input->post('package4JSC'),
			'package4HSC' => $this->input->post('package4HSC'),
			'package5TR' => $this->input->post('package5TR'),
			'package5CR' => $this->input->post('package5CR'),
			'package5JSC' => $this->input->post('package5JSC'),
			'package5HSC' => $this->input->post('package5HSC'),
			'package6TR' => $this->input->post('package6TR'),
			'package6CR' => $this->input->post('package6CR'),
			'package6JSC' => $this->input->post('package6JSC'),
			'package6HSC' => $this->input->post('package6HSC'),
			'change' => $this->input->post('change'),
			'change_name' => $this->input->post('change_name'),
			'regdate' => $regdate				
		);

		if($this->input->post('cfg_no') == 1){
			$this->db->where('cfg_no', $this->input->post('cfg_no'));
			$this->db->update('m_config', $query);
		}
		else{
			$this->db->insert('m_config', $query);			
		}
	}
	
	
}