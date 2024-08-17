<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends CI_Controller 
{

	public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-LGpI_J8dg9sqPrwcUuHHqQtt', 'production' => false);
		$this->load->library('veritrans');
		$this->veritrans->config($params);
		$this->load->helper('url');
		
    }

	public function index()
	{
		$json_result = file_get_contents('php://input');
		$result = json_decode($json_result, "true");
		$order_id = $result['order_id'];
		$data = [
			'status_code' => $result['status_code']
		];
		if($result['status_code']==200){
			$val = $this->db->get_where('pembayaran', ['order_id' => $order_id])->row_array();
			$id = $val['IdAdmin'];
			$dtAdmin = [
				'status' => 1
			];
			$this->db->update('pembayaran', $data, array('order_id' => $order_id));
			$this->db->update('admin', $dtAdmin, array('IdAkun' => $id));
		}

	}
}
