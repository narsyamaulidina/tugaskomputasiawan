<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Penitipan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_penitipan');
	}
	
	function index(){
		$x['data']=$this->m_penitipan->show_penitipan();
		$this->load->view('v_penitipan',$x);
	}

	function simpan_penitipan(){
		$kode_barang=$this->input->post('kode_barang');
		$penitip_barang=$this->input->post('penitip_barang');
		$jumlah_barang=$this->input->post('jumlah_barang');
		$waktu_penitipan=$this->input->post('waktu_penitipan');
		$waktu_pengambilan=$this->input->post('waktu_pengambilan');
		$this->m_penitipan->simpan_penitipan($kode_barang,$penitip_barang,$jumlah_barang,$waktu_penitipan,$waktu_pengambilan);
		redirect('penitipan');
	}

	function edit_penitipan(){
		$kode_barang=$this->input->post('kode_barang');
		$penitip_barang=$this->input->post('penitip_barang');
		$jumlah_barang=$this->input->post('jumlah_barang');
		$waktu_penitipan=$this->input->post('waktu_penitipan');
		$waktu_pengambilan=$this->input->post('waktu_pengambilan');
		$this->m_penitipan->edit_penitipan($kode_barang,$penitip_barang,$jumlah_barang,$waktu_penitipan,$waktu_pengambilan);
		redirect('penitipan');
	}

	function hapus_penitipan(){
		$kode_barang=$this->input->post('kode_barang');
		$this->m_penitipan->hapus_penitipan($kode_barang);
		redirect('penitipan');
	}
}
