<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 *
 * @extends CI_Controller
 */
class Customer extends CI_Controller {

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

	public function getCustomerView()
	{
		$id = $this->input->post('id');
		$order = $this->customers_model->getCustomerById($id)[0];

		foreach ($order as $key => $val) {
			$newCol = $this->maskCol($key);
			$order[$newCol] = $val;
			unset($order[$key]);
		}

		$response = [
			'view' => $order,
		];

		echo json_encode($response);
	}

	public function maskCol($key)
	{
		$mask = '';
		switch ($key) {
			case 'id_customer': $mask = 'ID Order'; break;
			case 'firstname': $mask = 'First name'; break;
			case 'lastname': $mask = 'Last name'; break;
			case 'address': $mask = 'Address'; break;
		}

		return $mask;
	}

}
