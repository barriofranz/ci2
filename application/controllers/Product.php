<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 *
 * @extends CI_Controller
 */
class Product extends CI_Controller {

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
		$this->load->model('product_model');
		$this->load->model('customers_model');

	}

	public function saveProduct()
	{
		$id_product = $this->input->post('id_product');
		$name = $this->input->post('name');
		$desc = $this->input->post('desc');
		$price = $this->input->post('price');

		$data = [
			'id_product' => $id_product,
			'name' => $name,
			'desc' => $desc,
			'price' => $price,
		];

		$id_product = $this->product_model->saveProducts($data);

		$product = $product = $this->product_model->getProductById($id_product)[0];

		$response = [
			'error' => 0,
			'product' => $product,

		];
		echo json_encode($response);

	}


	public function updateProduct()
	{
		$id_product = $this->input->post('id_product');
		$name = $this->input->post('name');
		$desc = $this->input->post('desc');
		$price = $this->input->post('price');

		$data = [
			'name' => $name,
			'desc' => $desc,
			'price' => $price,
		];

		$this->product_model->updateProduct($id_product, $data);

		$product = $product = $this->product_model->getProductById($id_product)[0];

		$response = [
			'error' => 0,
			'product' => $product,

		];
		echo json_encode($response);

	}

	public function deleteProduct()
	{
		$id = $this->input->post('id');

		$this->product_model->deleteProduct($id);

		$response = [
			'error' => 0,
		];

		echo json_encode($response);
	}


	public function loadEditProduct()
	{
		$id = $this->input->post('id');
		$product = $this->product_model->getProductById($id)[0];

		$response = [
			'product' => $product,
		];

		echo json_encode($response);
	}

	public function getProductView()
	{
		$id = $this->input->post('id');
		$product = $this->product_model->getProductById($id)[0];

		foreach ($product as $key => $val) {

			$newCol = $this->maskCol($key);
			$product[$newCol] = $val;
			unset($product[$key]);
		}

		$response = [
			'view' => $product,
		];

		echo json_encode($response);
	}

	public function maskCol($key)
	{
		$mask = '';
		switch ($key) {
			case 'id_product': $mask = 'ID Product'; break;
			case 'name': $mask = 'Name'; break;
			case 'desc': $mask = 'Description'; break;
			case 'price': $mask = 'Price'; break;
		}

		return $mask;
	}

}
