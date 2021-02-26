<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User_model class.
 *
 * @extends CI_Model
 */
class Orders_model extends CI_Model {

	public function __construct()
	{

		parent::__construct();
		$this->load->database();

	}

	// mode 1=day 2=month 3=year
	public function getAllOrdersByDateRange($from, $to, $mode = 1)
	{
		$dateMode = [
			1=>'DATE',
			2=>'MONTH',
			3=>'YEAR',
		];
		$to = $to . ' 23:59:59';
		$query = $this->db->query("
			SELECT SUM(total_paid) as amount, ".$dateMode[$mode]."(created_at) as created_date ". ( $mode==2 ? ", YEAR(created_at) as created_year" : ''  ) ."
			FROM orders
			WHERE created_at BETWEEN '".$from."' AND '".$to."'
			GROUP BY created_date " . ( $mode==2 ? ", created_year" : ''  ) . "
		");
		return $query->result_array();

	}

	public function getAllOrdersForDashboard($id = 0)
	{
		$this->db->from('orders');
		$this->db->join('customers', 'orders.id_customer = customers.id_customer', 'left');
		$this->db->order_by('orders.created_at', 'DESC');
		// echo '<pre>';print_r($id);echo '</pre>';die();
		if($id != 0) {
			$this->db->where('orders.id_order', $id);
		}

		return $this->db->get()->result_array();

	}

	public function getOrderViewRecord($id = 0)
	{
		$query = $this->db->query("
			SELECT
				ord.id_order,
				cust.firstname,
				cust.lastname,
				curr.iso_code,
				ord.created_at,
				ord.total_shipping,
				ord.total_paid
		 	FROM
			orders ord
			LEFT JOIN customers cust on ord.id_customer = cust.id_customer
			LEFT JOIN currency curr on ord.id_currency = curr.id_currency
			WHERE ord.id_order = " . $id . "
		");

		return $query->result_array();

	}

	public function deleteOrder($id)
	{
		$this->db->where('id_order', $id);
		$this->db->delete('orders');
	}

	public function getOrderById($id)
	{
		$this->db->from('orders');
		$this->db->where('id_order', $id);

		return $this->db->get()->result_array();

	}

	public function getOrderDetailById($id)
	{
		$this->db->from('order_detail');
		$this->db->where('id_order', $id);

		return $this->db->get()->result_array();

	}
}
