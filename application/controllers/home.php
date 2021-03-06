<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		if ( ! $this->session->userdata('is_logged_in')) {
			redirect('login');
		}
	}
	
	function index() {
		$a['page']	= "d_amain";
		$this->load->view('admin/aaa', $a);
	}
	
	function agenda_surat_masuk() {
		$a['page']	= "f_config_cetak_agenda";
		$this->load->view('admin/aaa', $a);
	}

	function agenda_surat_keluar() {
		$a['page']	= "f_config_cetak_agenda";
		$this->load->view('admin/aaa', $a);
	} 
	
	function cetak_agenda() {
		$jenis_surat	= $this->input->post('tipe');
		$tgl_start		= $this->input->post('tgl_start');
		$tgl_end		= $this->input->post('tgl_end');
		
		$a['tgl_start']	= $tgl_start;
		$a['tgl_end']	= $tgl_end;		

		if ($jenis_surat == "agenda_surat_masuk") {	
			$a['data']	= $this->db->query("SELECT * FROM surat_masuk WHERE tanggal_surat >= '$tgl_start' AND tanggal_surat <= '$tgl_end' ORDER BY tanggal_surat")->result(); 
			$this->load->view('admin/agenda_surat_masuk', $a);
		} else {
			$a['data']	= $this->db->query("SELECT * FROM surat_keluar WHERE tanggal_surat >= '$tgl_start' AND tanggal_surat <= '$tgl_end' ORDER BY tanggal_surat")->result();
			$this->load->view('admin/agenda_surat_keluar', $a);
		}
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */