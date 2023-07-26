<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Absensi extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function get_absensi()
	{
		$this->db->select('*');
		$this->db->from('tb_anggota');
		$this->db->order_by('piket');
		$query = $this->db->get();

		return $query;
	}

	public function get_history($date = false)
	{
		$this->db->select("COUNT(CASE WHEN status_piket='1' THEN 1 END) AS hadir,
		COUNT(CASE WHEN status_piket='2' THEN 1 END) AS cadangan,
		COUNT(CASE WHEN status_piket='3' THEN 1 END) AS lepas,
		COUNT(CASE WHEN status_piket='4' THEN 1 END) AS tidak_hadir,tgl_piket");
		$this->db->from('tb_absensi');
		$this->db->where('tgl_piket', $date);
		$query = $this->db->get();

		return $query->result();
	}

	public function detail_history($date, $idpik)
	{
		$this->db->select("tb_absensi.nama,tb_absensi.jabatan,ket,jadwal_piket");
		$this->db->from('tb_absensi');
		$this->db->join('tb_anggota', 'tb_anggota.idx=tb_absensi.id_anggota');
		$this->db->join('tb_piket', 'tb_piket.id_piket=tb_anggota.piket');
		$this->db->where("tb_absensi.tgl_piket='$date' and status_piket='$idpik'");
		$this->db->group_by('id_anggota');
		$query = $this->db->get();

		return $query->result();
	}
}
