<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 *
 * @extends CI_Controller
 */
class Order extends CI_Controller {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('orders_model');
		$this->load->model('customers_model');

	}

	public function getOrderView()
	{
		$id = $this->input->post('id');
		$order = $this->orders_model->getOrderViewRecord($id)[0];

        
		foreach ($order as $key => $val) {
			$newCol = $this->maskCol($key);
			$order[$newCol] = $val;
			unset($order[$key]);
		}
		$orderDetail = $this->orders_model->getOrderDetailById($id);

		$response = [
			'view' => $order,
			'viewOrderDetail' => $orderDetail,
		];

		echo json_encode($response);
	}

	public function maskCol($key)
	{
		$mask = '';
		switch ($key) {
			case 'id_order': $mask = 'ID Order'; break;
			case 'firstname': $mask = 'First name'; break;
			case 'lastname': $mask = 'Last Name'; break;
			case 'iso_code': $mask = 'Currency'; break;
			case 'total_shipping': $mask = 'Shipping fee'; break;
			case 'total_paid': $mask = 'Order Total'; break;
			case 'created_at': $mask = 'Order Date'; break;
		}

		return $mask;
	}

}
