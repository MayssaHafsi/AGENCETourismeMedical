<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {


	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login');
	}
	public function service ()
	{
		$this->load->view('header3');
		$this->load->view('sidebar3');
		$this->load->view('service');
		$this->load->view('footer3');
	}
	public function utilisateur ()
	{
		$this->load->view('header3');
		$this->load->view('sidebar3');
		$this->load->view('utilisateur');
		$this->load->view('footer3');
	}
	//public function type ()
	//{
		//$this->load->view('header3');
		//$this->load->view('sidebar3');
		////$this->load->view('typepartenaire');
		//$this->load->view('footer3');
	//}
	public function partenaire ()
	{
		$this->load->view('header3');
		$this->load->view('sidebar3');
		$this->load->view('partenaire');
		$this->load->view('footer3');
	}
	public function acceuil ()
	{
		$this->load->view('header3');
		$this->load->view('sidebar3');
		$this->load->view('acceuil');
		$this->load->view('footer3');
	}
	public function profil ()
	{
		$this->load->view('header3');
		$this->load->view('sidebar3');
		$this->load->view('profil');
		$this->load->view('footer3');
	}
	public function session ()
	{
		$this->load->view('session');
		
	}
	
	
	
}
?>
