<?php
class M_presale extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	//인서트
	function insert_presale($coin_id, $tokens, $type) {
        $query = array(
            'coin_id' => $coin_id,
            'wallet' => $this->input->post('mywallet'),
            'coin' => $this->input->post('coin'),
            'type' => $type,
            'tokens' => $tokens,
            'result' => '0',
        );

        $this->db->set('regdate', 'now()', FALSE);
        $this->db->insert('m_presale', $query);
    }

    //coin_id로 내 목록 조회
    function findByCoinId($coin_id) {
	    $this -> db -> select('*');
        $this -> db -> from('m_presale');
        $this -> db -> where('coin_id', $coin_id);
        $query = $this -> db -> get();
        $item = $query -> result();
        return $item;
    }

    //전체 코인신청수량 조회
    function findAppliedConi() {
        $this -> db -> select('count(token) as cnt');
        $this -> db -> from('m_presale');
        $query = $this -> db -> get();
        return $query -> result();
    }


}
?>