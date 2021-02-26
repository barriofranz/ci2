<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 *
 * @extends CI_Controller
 */
class Dashboard extends CI_Controller {

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
		$this->load->model('user_model');
		$this->load->model('orders_model');
		$this->load->model('customers_model');
		$this->load->model('product_model');
	}


	public function index() {

		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {

			$allOrders = $this->orders_model->getAllOrdersForDashboard(0);


			$allProducts = $this->product_model->getProducts();
			$allCustomer = $this->customers_model->getCustomers();
			// echo '<pre>';print_r($allCustomer);echo '</pre>';die();

			$data = [
				'allOrders' => $allOrders,
				'allProducts' => $allProducts,
				'allCustomer' => $allCustomer,
			];


			$this->load->view('header');
			$this->load->view('dashboard/dashboard', $data);
			$this->load->view('footer');
		} else {
			redirect('login');
		}

	}

	public function getDayChart()
	{
		$from = $this->input->post('from');
		$to = $this->input->post('to');

		$allOrders = $this->orders_model->getAllOrdersByDateRange($from, $to, '1');

		$labels = [];
		$data = [];

		foreach ( $allOrders as $order){
			$labels[] = $order['created_date'];
			$data[] = $order['amount'];
		}
		$response = [
			'labels' => $labels,
			'data' => $data,
		];

		echo json_encode($response);
	}



	public function getMonthChart()
	{
		$from = $this->input->post('from');
		$to = $this->input->post('to');


		$allOrders = $this->orders_model->getAllOrdersByDateRange($from, $to, '2');


		$labels = [];
		$data = [];

		foreach ( $allOrders as $order){

			$monthNum = $order['created_date'];
			$dateObj = DateTime::createFromFormat('!m', $monthNum);
			$monthName = $dateObj->format('M'); // March
			$labels[] = $order['created_year'] . '-' . $monthName;
			$data[] = $order['amount'];
		}
		$response = [
			'labels' => $labels,
			'data' => $data,
		];

		echo json_encode($response);
	}


	public function getYearChart()
	{
		$from = $this->input->post('from');
		$to = $this->input->post('to');


		$allOrders = $this->orders_model->getAllOrdersByDateRange($from, $to, '3');


		$labels = [];
		$data = [];

		foreach ( $allOrders as $order){
			$labels[] = $order['created_date'];
			$data[] = $order['amount'];
		}
		$response = [
			'labels' => $labels,
			'data' => $data,
		];

		echo json_encode($response);
	}

}
