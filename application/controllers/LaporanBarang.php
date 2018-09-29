<?php 
/**
* 
*/
class LaporanBarang extends CI_Controller
{




	
	public function index()
	{
		$this->mainlib->logged_in();


		$barang = $this->db->query('SELECT b.barang, sum(dp.jumlahJual) as jumlahJual, w.warna, s.size, db.stokAwal, db.idCabang FROM warna w, size s, detailpenjualan DP, detailbarang DB, barang b, penjualan p 
			WHERE db.id=dp.idBarang AND b.id=db.idBarang AND db.idUkuran=s.id AND db.idWarna=w.id AND p.id=dp.idPenjualan 
			AND DATE_FORMAT(p.tanggal,"%m")="'.date("m").'"
			GROUP BY db.id ORDER BY jumlahJual  DESC')->result();


		$barang_hari_ini = $this->db->query('SELECT b.barang, sum(dp.jumlahJual) as jumlahJual, w.warna, s.size, db.idCabang FROM warna w, size s, detailpenjualan DP, detailbarang DB, barang b, penjualan p			WHERE db.id=dp.idBarang AND b.id=db.idBarang AND db.idUkuran=s.id AND db.idWarna=w.id AND p.id=dp.idPenjualan 
			AND DATE_FORMAT(p.tanggal,"%d")="'.date("d").'"
			GROUP BY db.id ORDER BY jumlahJual DESC')->result();

		$data=array(

			'stok_barang_1'=>$this->db->query('SELECT	kodeBarang, barang, merek, warna, size, stokAwal FROM merek m, detailbarang db, barang b, warna w, size s 
				WHERE b.idMerek=m.id AND b.id=db.idBarang AND db.idWarna=w.id AND db.idUkuran=s.id and idCabang=1 GROUP BY stokAwal DESC limit 20
				')->result(),
			'stok_barang_2'=>$this->db->query('SELECT	kodeBarang, barang, merek, warna, size, stokAwal FROM merek m, detailbarang db, barang b, warna w, size s 
				WHERE b.idMerek=m.id AND b.id=db.idBarang AND db.idWarna=w.id AND db.idUkuran=s.id and idCabang=2 GROUP BY stokAwal DESC limit 20
				')->result(),
			
			//data barang rusak
			'lainlain'=>$this->db->query('SELECT SUM(jumlah) AS jumlah FROM barangrusak WHERE penyebab="lain-lain" 
				')->row_array(),
			'debu'=>$this->db->query('SELECT SUM(jumlah) AS jumlah FROM barangrusak WHERE penyebab="debu" 
				')->row_array(),
			'supplier'=>$this->db->query('SELECT SUM(jumlah) AS jumlah FROM barangrusak WHERE penyebab="supplier" 
				')->row_array(),
			'jatuh'=>$this->db->query('SELECT SUM(jumlah) AS jumlah FROM barangrusak WHERE penyebab="jatuh" 
				')->row_array(),

			'lama'=>$this->db->query('SELECT SUM(jumlah) AS jumlah FROM barangrusak WHERE penyebab="lama" 
				')->row_array(),

// laporan kategori
			'kategori_penjualan'=>$this->db->query('SELECT SUM(jumlahJual) as jumlah, kategori FROM detailpenjualan dp, detailbarang db, penjualan p, barang b, kategori k, warna w, size s
				WHERE dp.idPenjualan = p.id AND dp.idBarang=db.id AND b.id=db.idBarang AND b.idKategori=k.id AND db.idUkuran=s.id AND db.idWarna=w.id
				and date_format(P.TANGGAL,"%m")="'.date('m').'"
				GROUP BY kategori limit 5')->result(),

			'kategori_saat_ini'=>$this->db->query('SELECT SUM(stokAwal) as jumlah, kategori 
				FROM barang b, detailbarang db, kategori k 
				WHERE b.id=db.idBarang AND k.id=b.idKategori
				GROUP BY b.idKategori limit 5')->result(),

			'kategori_cabang1'=>$this->db->query('SELECT SUM(jumlahJual) as jumlah, kategori FROM detailpenjualan dp, detailbarang db, penjualan p, barang b, kategori k, warna w, size s
				WHERE dp.idPenjualan = p.id AND dp.idBarang=db.id AND b.id=db.idBarang AND b.idKategori=k.id AND db.idUkuran=s.id AND db.idWarna=w.id
				and db.idCabang=1 and date_format(P.TANGGAL,"%m")="'.date('m').'"
				GROUP BY kategori limit 5')->result(),

			'kategori_cabang2'=>$this->db->query('SELECT SUM(jumlahJual) as jumlah, kategori FROM detailpenjualan dp, detailbarang db, penjualan p, barang b, kategori k, warna w, size s
				WHERE dp.idPenjualan = p.id AND dp.idBarang=db.id AND b.id=db.idBarang AND b.idKategori=k.id AND db.idUkuran=s.id AND db.idWarna=w.id
				and db.idCabang=2 and date_format(P.TANGGAL,"%m")="'.date('m').'"
				GROUP BY kategori limit 5')->result(),


//laporan merek
			'merek_penjualan'=>$this->db->query('SELECT SUM(jumlahJual) as jumlah, merek FROM detailpenjualan dp, detailbarang db, penjualan p, barang b, merek k, warna w, size s
				WHERE dp.idPenjualan = p.id AND dp.idBarang=db.id AND b.id=db.idBarang AND b.idMerek=k.id AND db.idUkuran=s.id AND db.idWarna=w.id
				and date_format(P.TANGGAL,"%m")="'.date('m').'"
				GROUP BY merek limit 5')->result(),

			'merek_saat_ini'=>$this->db->query('SELECT SUM(stokAwal) as jumlah, merek 
				FROM barang b, detailbarang db, merek k 
				WHERE b.id=db.idBarang AND k.id=b.idMerek
				GROUP BY b.idMerek limit 5')->result(),


//laporan barang terjual
			'barang_hari_ini'=>$barang_hari_ini,
			'barang'=>$barang,

			// laporan warna
			'warna_saat_ini'=>$this->db->query('SELECT SUM(stokAwal) as jumlah, warna FROM barang b, detailbarang db, warna k WHERE b.id=db.idBarang AND k.id=db.idWarna
				GROUP BY db.idWarna LIMIT 5')->result(),

			'warna_penjualan'=>$this->db->query('SELECT SUM(jumlahJual) as jumlah, warna FROM detailpenjualan dp, detailbarang db, penjualan p, barang b, merek k, warna w, size s
				WHERE dp.idPenjualan = p.id AND dp.idBarang=db.id AND b.id=db.idBarang AND b.idMerek=k.id AND db.idUkuran=s.id AND db.idWarna=w.id
				and date_format(P.TANGGAL,"%m")="'.date('m').'"
				GROUP BY warna limit 5')->result(),

// laporan size
			'size_saat_ini'=>$this->db->query('SELECT SUM(stokAwal) as jumlah, size FROM barang b, detailbarang db, size k WHERE b.id=db.idBarang AND k.id=db.idUkuran
				GROUP BY db.idUkuran LIMIT 5')->result(),

			'size_penjualan'=>$this->db->query('SELECT SUM(jumlahJual) as jumlah, size FROM detailpenjualan dp, detailbarang db, penjualan p, barang b, merek k, warna w, size s
				WHERE dp.idPenjualan = p.id AND dp.idBarang=db.id AND b.id=db.idBarang AND b.idMerek=k.id AND db.idUkuran=s.id AND db.idWarna=w.id
				and date_format(P.TANGGAL,"%m")="'.date('m').'"
				GROUP BY size limit 5')->result(),



			);

$this->template->load('template','laporan2',$data);
}
}


?>