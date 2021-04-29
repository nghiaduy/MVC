<?php
include_once("Model/model.php");
include_once("Function/function.php");

Class Controller{
	public $model;
	public function Controller() {
		  $this->model=new Model();
		}
	public function index() {
		//$result = $this->model->user_index();
		include 'View/index.php';
	}
	public function login() {
		$result = $this->model->user_login();
		include 'View/login.php';
	}
	public function logout() {
		include 'View/logout.php';
	}
	public function register(){
		$mes_register = $this->model->register_user();
		include 'View/register.php';
	}
	public function show_home() {
		check_login('name');
		$mes_delete = $this->model->delete_post();
		include 'View/home.php';
	}
	public function post() {
		check_login('name');
		$mes_post = $this->model->new_update_post();
		include 'View/newpost.php';
	}
	public function account() {
		check_login('name');
		$mes_acc = $this->model->update_account();
		include 'View/myaccount.php';
	}
}

?>