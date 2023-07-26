<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_absensi');
		$this->load->database();
	}
	public function index()
	{
		$data = [
			'title' => 'Input absensi',
			'absensi' => $this->M_absensi->get_absensi()
		];
		$this->load->view('layout/helper_login', $data);
		$this->load->view('layout/header', $data);
		$this->load->view('layout/navbar', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('absensi/index', $data);
		$this->load->view('layout/footer');
	}

	public function insert()
	{
		if ($this->input->post('submit')) {
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$jabatan = $this->input->post('jabatan');
			$piket = $this->input->post('piket');
			$ket = $this->input->post('ket');


			for ($i = 1; $i <= count($id); $i++) {
				if ($piket[$i] == '4') {
					$keterangan = $ket[$i];
				} else {
					$keterangan = NULL;
				}
				$idx = $id[$i];
				$date = date('Y-m-d');
				$tgl_piket = date('Y-06-23');
				$sql = "SELECT count(idx) as jml
            FROM tb_absensi
            WHERE idx = '$idx'
            AND tgl_piket='$tgl_piket'";
				$query = $this->db->query($sql);
				foreach ($query->result() as $data) {
					$jml = $data->jml;
				}
				if ($jml == 0) {
					$this->db->insert('tb_absensi', array(
						'tgl_input' => date('Y-m-d H:i:s'),
						'adm_input' => $this->session->userdata('nama'),
						'id_anggota' => $idx,
						'nama' => $nama[$i],
						'jabatan' => $jabatan[$i],
						'status_piket' => $piket[$i],
						'ket' => $keterangan,
						'tgl_piket' => date('Y-06-23')

					));
				}
			}
			$suk = base64_encode('sukses');
			redirect('absensi/index/' . $suk);
		}
	}

	public function history()
	{
		$tgl = $this->input->get('tgl');
		$data = [
			'title' => 'History absensi',
			'histori' => $this->M_absensi->get_history($tgl)
		];
		$this->load->view('layout/helper_login', $data);
		$this->load->view('layout/header', $data);
		$this->load->view('layout/navbar', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('absensi/history', $data);
		$this->load->view('layout/footer');
	}

	public function detail_history()
	{

		$date = $_GET['date'];
		$piket = $_GET['piket'];
		$data 	= $this->M_absensi->detail_history($date, $piket);
		$this->load->view('absensi/detail_history', array('data' => $data, 'piket' => $piket));
	}
}
