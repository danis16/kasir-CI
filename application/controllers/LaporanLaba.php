<?php 

/**
* 
*/
class LaporanLaba extends CI_Controller
{




	public function index()
	{

		$this->mainlib->logged_in();

		if (empty($_GET['bulan_pembelian'])) {
			$tanggal_pembelian='DATE_FORMAT(p.tanggal,"%m")="'.date("m").'"';
			$bulan= date("m");
			$tanggal=date("d");

		} 
		else {
			$tanggal_pembelian='DATE_FORMAT(p.tanggal,"%m")="'.$_GET['bulan_pembelian'].'"';
			$bulan=$_GET['bulan_pembelian'];
			$tanggal=$_GET['tanggal_pembelian'];
		}

		// if (empty($_GET['tanggal_pembelian'])) {
		// }
		// else{
		// }


		

		//LAPORAN BULAN INI

		$total_penjualan = $this->db->query('SELECT SUM((dp.jumlahJual*db.hargaEcer)-(dp.potongan)) AS total_penjualan
			FROM detailpenjualan dp, detailbarang db, penjualan p 
			WHERE db.id=dp.idBarang AND p.id=dp.idPenjualan AND '.$tanggal_pembelian.'')->row_array();;


		$total_retur_penjualan = $this->db->query('SELECT SUM(drp.jumlah*db.hargaEcer) as total_retur_penjualan 
			FROM detailreturpenjualan drp, detailbarang db, returpenjualan r 
			WHERE db.id=drp.idDetailBarang and r.idRetur=drp.idRetur and DATE_FORMAT(tangal,"%m")="'.$bulan.'"')->row_array();

		// $modal = $this->db->query('SELECT SUM(hargaBeliSatuan*jumlahBeli) as modal FROM detailpembelian')->row_array();
		$pembelian = $this->db->query('SELECT SUM((hargaBeliSatuan*jumlahJual)-dpb.potongan) AS pembelian FROM penjualan p, detailpenjualan dpj, pembelian pe, detailpembelian dpb, detailbarang db 
			WHERE dpb.idBarang=db.id AND dpb.idPembelian=pe.id AND dpj.idBarang=db.id AND dpj.idPenjualan=p.id 			
			and '.$tanggal_pembelian.'')->row_array();
// 				$pembelian = $this->db->query('SELECT SUM((hargaBeliSatuan*jumlahJual)-dp.potongan) AS pembelian FROM penjualan p, detailbarang db, detailpembelian dp, detailpenjualan dpj 
// WHERE dp.id=db.idDetailPembelian AND db.id=dpj.idBarang AND p.id=dpj.idPenjualan

// 			and DATE_FORMAT(tanggal,"%m")="'.date("m").'"')->row_array();
		
		$potongan = $this->db->query('SELECT SUM(potongan) as potongan FROM detailpembelian dp, pembelian p WHERE p.id=dp.idPembelian and DATE_FORMAT(p.tanggal,"%m")="'.$bulan.'"')->row_array();

		$retur_pembelian=$this->db->query('SELECT SUM(jumlah*hargaBeliSatuan) AS retur_pembelian
			FROM detailreturpembelian drp, returpembelian rp, detailpembelian dp, detailbarang db
			WHERE rp.idRetur=drp.idReturpembelian 
			AND rp.idPembelian=dp.idPembelian
			AND db.id=drp.idDetailBarang
			AND db.id=dp.idBarang  
			and DATE_FORMAT(tanggal,"%m")="'.$bulan.'"
			')->row_array();

		$barang_rusak=$this->db->query('SELECT SUM(jumlah*hargaBeliSatuan) as barang_rusak FROM barangrusak br, detailpembelian dp, detailbarang db WHERE br.idDetailBarang=db.id AND br.idDetailPembelian=dp.id and DATE_FORMAT(tanggal,"%m")="'.$bulan.'"
			')->row_array();


		$beban = $this->db->query('select sum(jumlah) as jumlah from totalbeban where DATE_FORMAT(tanggal,"%m")="'.$bulan.'"')->row_array();
		
		$stok_keluar = $this->db->query('SELECT SUM(jumlah*hargaBeliSatuan) as stok_keluar FROM stokmasuk sm, detailbarang db, detailpembelian dp, pembelian p 
			WHERE sm.idDetalBarang=db.id AND dp.idBarang = db.id and sm.status="keluar" AND p.id=dp.idPembelian and DATE_FORMAT(sm.tanggal,"%m")="'.$bulan.'"')->row_array();


		$stok_masuk = $this->db->query('SELECT SUM(jumlah*hargaBeliSatuan) as stok_masuk FROM stokmasuk sm, detailbarang db, detailpembelian dp, pembelian p 
			WHERE sm.idDetalBarang=db.id AND dp.idBarang = db.id and sm.status="masuk" AND p.id=dp.idPembelian and DATE_FORMAT(sm.tanggal,"%m")="'.$bulan.'"')->row_array();

		
//LAPORAN HARI INI


		$penjualan_hari_ini = $this->db->query('SELECT SUM((dp.jumlahJual*db.hargaEcer)-(dp.potongan)) AS penjualan
			FROM detailpenjualan dp, detailbarang db, penjualan p 
			WHERE db.id=dp.idBarang AND p.id=dp.idPenjualan AND DATE_FORMAT(p.tanggal,"%d")="'.$tanggal.'" AND DATE_FORMAT(p.tanggal,"%m")="'.$bulan.'"')->row_array();;


		$retur_penjualan_hari_ini = $this->db->query('SELECT SUM(drp.jumlah*db.hargaEcer) as total_retur_penjualan 
			FROM detailreturpenjualan drp, detailbarang db, returpenjualan r 
			WHERE db.id=drp.idDetailBarang and r.idRetur=drp.idRetur and DATE_FORMAT(tangal,"%d")="'.date("d").'" AND DATE_FORMAT(tangal,"%m")="'.$bulan.'"')->row_array();

		$pembelian_hari_ini = $this->db->query('SELECT SUM(hargaBeliSatuan*jumlahJual) AS pembelian FROM penjualan p, detailpenjualan dpj, pembelian pe, detailpembelian dpb, detailbarang db 
			WHERE dpb.idBarang=db.id AND dpb.idPembelian=pe.id AND dpj.idBarang=db.id AND dpj.idPenjualan=p.id 			
			and DATE_FORMAT(p.tanggal,"%d")="'.$tanggal.'" AND DATE_FORMAT(p.tanggal,"%m")="'.$bulan.'"')->row_array();
		
		$tanggal_hari_ini='and DATE_FORMAT(tanggal,"%d")="'.date("d").'"';

		$retur_pembelian_hari_ini=$this->db->query('SELECT SUM(jumlah*hargaBeliSatuan) AS retur_pembelian
			FROM detailreturpembelian drp, returpembelian rp, detailpembelian dp, detailbarang db
			WHERE rp.idRetur=drp.idReturpembelian 
			AND rp.idPembelian=dp.idPembelian
			AND db.id=drp.idDetailBarang
			AND db.id=dp.idBarang  
			and DATE_FORMAT(tanggal,"%d")="'.$tanggal.'" AND DATE_FORMAT(tanggal,"%m")="'.$bulan.'"')->row_array();

		$barang_rusak_hari_ini=$this->db->query('SELECT SUM(jumlah*hargaBeliSatuan) as barang_rusak FROM barangrusak br, detailpembelian dp, detailbarang db WHERE br.idDetailBarang=db.id AND br.idDetailPembelian=dp.id '.$tanggal_hari_ini.'
			AND DATE_FORMAT(tanggal,"%m")="'.$bulan.'"')->row_array();


		$beban_hari_ini = $this->db->query('select sum(jumlah) as jumlah from totalbeban where DATE_FORMAT(tanggal,"%d")="'.date("d").'" AND DATE_FORMAT(tanggal,"%m")="'.$bulan.'" ')->row_array();
		
		$stok_keluar_hari_ini = $this->db->query('SELECT SUM(jumlah*hargaBeliSatuan) as stok_keluar FROM stokmasuk sm, detailbarang db, detailpembelian dp, pembelian p 
			WHERE sm.idDetalBarang=db.id AND dp.idBarang = db.id AND p.id=dp.idPembelian and sm.status="keluar" and DATE_FORMAT(sm.tanggal,"%d")="'.date("d").'" AND DATE_FORMAT(sm.tanggal,"%m")="'.$bulan.'"')->row_array();

		$stok_masuk_hari_ini = $this->db->query('SELECT SUM(jumlah*hargaBeliSatuan) as stok_masuk FROM stokmasuk sm, detailbarang db, detailpembelian dp, pembelian p 
			WHERE sm.idDetalBarang=db.id AND dp.idBarang = db.id AND p.id=dp.idPembelian and sm.status="masuk" and DATE_FORMAT(sm.tanggal,"%d")="'.date("d").'" AND DATE_FORMAT(sm.tanggal,"%m")="'.$bulan.'"')->row_array();

		$potongan_hari_ini = $this->db->query('SELECT * FROM detailpembelian dp, pembelian p WHERE p.id=dp.idPembelian and DATE_FORMAT(p.tanggal,"%d")="'.date("d").'" AND DATE_FORMAT(p.tanggal,"%m")="'.$bulan.'"')->row_array();



//Barang paling banyak terjua;

//LABA

		$debit=$penjualan_hari_ini['penjualan']+$retur_pembelian_hari_ini['retur_pembelian']+$potongan_hari_ini['potongan']+$stok_masuk_hari_ini['stok_masuk']; 
		$kredit = $retur_penjualan_hari_ini['total_retur_penjualan']+$pembelian_hari_ini['pembelian']+$barang_rusak_hari_ini['barang_rusak']+$beban_hari_ini['jumlah']+$stok_keluar_hari_ini['stok_keluar'];  
		$hasil=$debit-$kredit;


//bulan
		$bulan_pembelian=$this->db->query('SELECT MONTHNAME(tanggal) AS bulan, DATE_FORMAT(tanggal,"%m") AS b FROM penjualan GROUP BY DATE_FORMAT(tanggal,"%m") ORDER BY DATE_FORMAT(tanggal,"%m") DESC 
			');

		$tampil_bulan = $this->db->query('SELECT MONTHNAME(tanggal) AS bulan, DATE_FORMAT(tanggal,"%m") AS b FROM penjualan where DATE_FORMAT(tanggal,"%m")='.$bulan.'')->row_array();




		$data=array(
			'total_penjualan'=>$total_penjualan,
			'total_retur_penjualan'=>$total_retur_penjualan,
			'pembelian'=>$pembelian,
			'retur_pembelian'=>$retur_pembelian,
			'barang_rusak'=>$barang_rusak,
			'beban'=>$beban,
			'stok_keluar'=>$stok_keluar,
			'stok_masuk'=>$stok_masuk,
			'potongan'=>$potongan,

			//hari ini

			
			'penjualan_hari_ini'=>$penjualan_hari_ini,
			'retur_penjualan_hari_ini'=>$retur_penjualan_hari_ini,
			'pembelian_hari_ini'=>$pembelian_hari_ini,
			'retur_pembelian_hari_ini'=>$retur_pembelian_hari_ini,
			'barang_rusak_hari_ini'=>$barang_rusak_hari_ini,
			'beban_hari_ini'=>$beban_hari_ini,
			'stok_keluar_hari_ini'=>$stok_keluar_hari_ini,
			'stok_masuk_hari_ini'=>$stok_masuk_hari_ini,
			'potongan_hari_ini'=>$potongan_hari_ini,
			'tanggal_penjualan'=>$this->db->query('select * from penjualan p where '.$tanggal_pembelian.' group by tanggal')->result(),

			//tanggal
			'tanggal_pembelian'=>$this->db->query('SELECT DATE_FORMAT(tanggal,"%d") AS t FROM penjualan WHERE DATE_FORMAT(tanggal,"%m")='.$bulan.' group by tanggal'),

			// hutang piutang

			'hutang'=>$this->db->query('SELECT nama,kekuranganPembayaran AS hutang, SUM(bayar) AS yangsudahdibayar,  kekuranganPembayaran-SUM(bayar) AS kekuranganpembayaran, tanggalWajibBayar, h.status 
				FROM hutang h, detailhutang dh, pelanggan p WHERE h.id=dh.idHutang AND p.id=h.idSupplier and h.status="BELUM LUNAS" GRouP BY idHutang 
				')->result(),
			'piutang'=>$this->db->query('SELECT nama, SUM(jumlah) AS yangsudahdibayar, kekuraganPembayaran-SUM(jumlah) AS kurang, kekuraganPembayaran AS piutang, tanggalWajibBayar
				FROM detailpiutang dp, piutang p, pelanggan pe WHERE dp.idPiutang=p.id AND pe.id=p.idPelanggan AND p.status="BELUM LUNAS" group by idPiutang
				')->result(),

			//beban 
			'bebanpengeluaran'=>$this->db->query('SELECT b.beban, tb.jumlah, tb.tanggal, tb.noNota, a.username FROM totalbeban tb, beban b, admin a WHERE b.id=tb.idBeban AND a.id=tb.idAdmin and DATE_FORMAT(tb.tanggal,"%m")='.$bulan.'')->result(),		


			//laba


			// data grafik
			
			'penjualan_tanggal'=>$this->db->query('SELECT SUM(totalBayar) AS totalbayar,DATE_FORMAT(tanggal,"%d") AS tanggal, status FROM penjualan p 
				WHERE '.$tanggal_pembelian.' GROUP BY tanggal')->result(),
			'pembelian_tanggal'=>$this->db->query('SELECT SUM(WajibMembayar) AS totalbayar,DATE_FORMAT(tanggal,"%d") AS tanggal FROM pembelian p 
				WHERE '.$tanggal_pembelian.' GROUP BY tanggal')->result(),
			'penjualan_cabang1'=>$this->db->query('SELECT SUM(jumlahJual*hargaEcer-potongan) as jual FROM DETAILPENJUALAN DP, detailbarang DB, ADMIN A, PENJUALAN P 
				WHERE '.$tanggal_pembelian.' and A.ID=DP.IDADMIN AND DP.IDBARANG=DB.ID AND P.ID=DP.IDPENJUALAN AND a.idcabang=1 GROUP by p.tanggal')->result(),
			'penjualan_cabang2'=>$this->db->query('SELECT SUM(jumlahJual*hargaEcer-potongan) as jual FROM DETAILPENJUALAN DP, detailbarang DB, ADMIN A, PENJUALAN P 
				WHERE '.$tanggal_pembelian.' and A.ID=DP.IDADMIN AND DP.IDBARANG=DB.ID AND P.ID=DP.IDPENJUALAN AND a.idcabang=2 GROUP by p.tanggal')->result(),


			//select
			'bulan_pembelian'=>$bulan_pembelian,
			'tampil_bulan'=>$tampil_bulan,


			);

$this->template->load('template','laporan1',$data);



}

public function laporanbarangterjual()
{

	$bulan_pembelian=$this->db->query('SELECT MONTHNAME(tanggal) AS bulan, DATE_FORMAT(tanggal,"%m") AS b FROM penjualan GROUP BY DATE_FORMAT(tanggal,"%m") ORDER BY DATE_FORMAT(tanggal,"%m") DESC 
		');



	if (empty($_GET['bulan_pembelian'])) {
		$tanggal_pembelian='DATE_FORMAT(p.tanggal,"%m")="'.date("m").'"';
		$bulan= date("m");
		$tanggal=date("d");
		
	}
	else {
		$tanggal_pembelian='DATE_FORMAT(p.tanggal,"%m")="'.$_GET['bulan_pembelian'].'"';
		$bulan=$_GET['bulan_pembelian'];
		$tanggal=$_GET['tanggal_pembelian'];
	}
//bulan
	$bulan_pembelian=$this->db->query('SELECT MONTHNAME(tanggal) AS bulan, DATE_FORMAT(tanggal,"%m") AS b FROM penjualan GROUP BY DATE_FORMAT(tanggal,"%m") ORDER BY DATE_FORMAT(tanggal,"%m") DESC 
		');

	$tampil_bulan = $this->db->query('SELECT MONTHNAME(tanggal) AS bulan, DATE_FORMAT(tanggal,"%m") AS b FROM penjualan where DATE_FORMAT(tanggal,"%m")='.$bulan.'')->row_array();

	$data=array(
		'tampil_bulan'=>$tampil_bulan,
		'bulan_pembelian'=>$bulan_pembelian,
		'tanggal_pembelian'=>$this->db->query('SELECT DATE_FORMAT(tanggal,"%d") AS t FROM penjualan WHERE DATE_FORMAT(tanggal,"%m")='.$bulan.' group by tanggal'),


		'barang'=>$this->db->query('SELECT jb.barang, sum(dp.jumlahJual) as jumlahJual, w.warna, s.size, db.stokAwal, db.idCabang FROM jenisbarang jb, warna w, size s, detailpenjualan DP, detailbarang DB, barang b, penjualan p 
			WHERE b.barang=jb.id and db.id=dp.idBarang AND b.id=db.idBarang AND db.idUkuran=s.id AND db.idWarna=w.id AND p.id=dp.idPenjualan 
			AND DATE_FORMAT(p.tanggal,"%m")="'.$bulan.'"
			GROUP BY db.id ORDER BY jumlahJual DESC LIMIT 20')->result(),


		'barang_hari_ini'=> $this->db->query('SELECT jb.barang, sum(dp.jumlahJual) as jumlahJual, w.warna, s.size, db.idCabang FROM warna w, size s, detailpenjualan DP, detailbarang DB, barang b, penjualan p, jenisbarang jb		
			WHERE db.id=dp.idBarang AND b.id=db.idBarang AND db.idUkuran=s.id AND db.idWarna=w.id AND jb.id=b.barang and p.id=dp.idPenjualan 
			AND DATE_FORMAT(p.tanggal,"%d")="'.$tanggal.'" and DATE_FORMAT(p.tanggal,"%m")="'.$bulan.'"
			GROUP BY db.id ORDER BY jumlahJual DESC LIMIT 20')->result(),
		);

$this->template->load('template','laporan4',$data);

}

public function laporanbarangstok()
{
	$data=array(
		'stok_barang_1'=>$this->db->query('SELECT jb.barang, merek, SUM(stokAwal) AS stokAwal FROM jenisbarang jb, merek m, detailbarang db, barang b, warna w, size s 
			WHERE jb.id=b.barang AND b.idMerek=m.id AND b.id=db.idBarang AND db.idWarna=w.id AND db.idUkuran=s.id AND idCabang=1 
			GROUP BY jb.Barang, merek ORDER BY stokAwal DESC LIMIT 25
			')->result(),
		'stok_barang_1_sedikit'=>$this->db->query('SELECT jb.barang, merek, SUM(stokAwal) AS stokAwal FROM jenisbarang jb, merek m, detailbarang db, barang b, warna w, size s 
			WHERE jb.id=b.barang AND b.idMerek=m.id AND b.id=db.idBarang AND stokAwal is not null and stokAwal != 0 and db.idWarna=w.id AND db.idUkuran=s.id AND idCabang=1 
			GROUP BY jb.Barang, merek ORDER BY stokAwal ASC LIMIT 25
			')->result(),
		'stok_barang_2'=>$this->db->query('SELECT jb.barang, merek, SUM(stokAwal) AS stokAwal FROM jenisbarang jb, merek m, detailbarang db, barang b, warna w, size s 
			WHERE jb.id=b.barang AND b.idMerek=m.id AND b.id=db.idBarang AND db.idWarna=w.id AND db.idUkuran=s.id AND idCabang=2 
			GROUP BY jb.Barang, merek ORDER BY stokAwal DESC LIMIT 25')->result(),
		'stok_barang_2_sedikit'=>$this->db->query('SELECT jb.barang, merek, SUM(stokAwal) AS stokAwal FROM jenisbarang jb, merek m, detailbarang db, barang b, warna w, size s 
			WHERE jb.id=b.barang AND stokAwal is not null and stokAwal != 0 and b.idMerek=m.id AND b.id=db.idBarang AND db.idWarna=w.id AND db.idUkuran=s.id AND idCabang=2 
			GROUP BY jb.Barang, merek ORDER BY stokAwal ASC LIMIT 25')->result(),

		);

$this->template->load('template','laporan3',$data);
}

public function laporanbarang()
{
	//bulan
	$bulan_pembelian=$this->db->query('SELECT MONTHNAME(tanggal) AS bulan, DATE_FORMAT(tanggal,"%m") AS b FROM penjualan GROUP BY DATE_FORMAT(tanggal,"%m") ORDER BY DATE_FORMAT(tanggal,"%m") DESC 
		');

	
	if (empty($_GET['bulan_pembelian'])) {
		// $tanggal_pembelian='DATE_FORMAT(p.tanggal,"%m")="'.date("m").'"';
		$bulan= date("m");
		// $tanggal=date("d");
		
	}
	else {
		// $tanggal_pembelian='DATE_FORMAT(p.tanggal,"%m")="'.$_GET['bulan_pembelian'].'"';
		$bulan=$_GET['bulan_pembelian'];
		// $tanggal=$_GET['tanggal_pembelian'];
	}


	if (empty($_GET['pilih_barang'])) {
		$pilihbarang='NULL';
	}
	else{
		$pilihbarang=$_GET['pilih_barang'];
	}

	// $barang = $this->db->query('SELECT jb.barang, sum(dp.jumlahJual) as jumlahJual, w.warna, s.size, db.stokAwal, db.idCabang FROM jenisbarang jb, warna w, size s, detailpenjualan DP, detailbarang DB, barang b, penjualan p 
	// 	WHERE b.barang=jb.id and db.id=dp.idBarang AND b.id=db.idBarang AND db.idUkuran=s.id AND db.idWarna=w.id AND p.id=dp.idPenjualan 
	// 	AND DATE_FORMAT(p.tanggal,"%m")="'.date("m").'"
	// 	GROUP BY db.id ORDER BY jumlahJual DESC LIMIT 20')->result();


	// $barang_hari_ini = $this->db->query('SELECT jb.barang, sum(dp.jumlahJual) as jumlahJual, w.warna, s.size, db.idCabang FROM warna w, size s, detailpenjualan DP, detailbarang DB, barang b, penjualan p, jenisbarang jb		
	// 	WHERE db.id=dp.idBarang AND b.id=db.idBarang AND db.idUkuran=s.id AND db.idWarna=w.id AND jb.id=b.barang and p.id=dp.idPenjualan 
	// 	AND DATE_FORMAT(p.tanggal,"%d")="'.date("d").'" and DATE_FORMAT(p.tanggal,"%m")="'.date("m").'"
	// 	GROUP BY db.id ORDER BY jumlahJual DESC LIMIT 20')->result();

	$data=array(

		// 'stok_barang_1'=>$this->db->query('SELECT jb.barang, merek, SUM(stokAwal) AS stokAwal FROM jenisbarang jb, merek m, detailbarang db, barang b, warna w, size s 
		// 	WHERE jb.id=b.barang AND b.idMerek=m.id AND b.id=db.idBarang AND db.idWarna=w.id AND db.idUkuran=s.id AND idCabang=1 
		// 	GROUP BY jb.Barang, merek ORDER BY stokAwal DESC LIMIT 25
		// 	')->result(),
		// 'stok_barang_1_sedikit'=>$this->db->query('SELECT jb.barang, merek, SUM(stokAwal) AS stokAwal FROM jenisbarang jb, merek m, detailbarang db, barang b, warna w, size s 
		// 	WHERE jb.id=b.barang AND b.idMerek=m.id AND b.id=db.idBarang AND stokAwal is not null and stokAwal != 0 and db.idWarna=w.id AND db.idUkuran=s.id AND idCabang=1 
		// 	GROUP BY jb.Barang, merek ORDER BY stokAwal ASC LIMIT 25
		// 	')->result(),
		// 'stok_barang_2'=>$this->db->query('SELECT jb.barang, merek, SUM(stokAwal) AS stokAwal FROM jenisbarang jb, merek m, detailbarang db, barang b, warna w, size s 
		// 	WHERE jb.id=b.barang AND b.idMerek=m.id AND b.id=db.idBarang AND db.idWarna=w.id AND db.idUkuran=s.id AND idCabang=2 
		// 	GROUP BY jb.Barang, merek ORDER BY stokAwal DESC LIMIT 25')->result(),
		// 'stok_barang_2_sedikit'=>$this->db->query('SELECT jb.barang, merek, SUM(stokAwal) AS stokAwal FROM jenisbarang jb, merek m, detailbarang db, barang b, warna w, size s 
		// 	WHERE jb.id=b.barang AND stokAwal is not null and stokAwal != 0 and b.idMerek=m.id AND b.id=db.idBarang AND db.idWarna=w.id AND db.idUkuran=s.id AND idCabang=2 
		// 	GROUP BY jb.Barang, merek ORDER BY stokAwal ASC LIMIT 25')->result(),

		'jenisbarang'=>$this->db->query('SELECT jb.id, jb.Barang FROM jenisbarang jb, barang b, penjualan p, detailpenjualan dp, detailbarang db 
			WHERE b.barang=jb.id AND b.id=db.idBarang AND p.id=dp.idPenjualan AND dp.idBarang=db.id AND DATE_FORMAT(p.tanggal,"%m")='.$bulan.' GROUP BY jb.Barang asc')->result(),
		
		'jenisbarangg'=>$this->db->query('select Barang from jenisbarang where id='.$pilihbarang.'')->row_array(),
		
		'tampil_bulan'=>$this->db->query('SELECT MONTHNAME(tanggal) AS bulan, DATE_FORMAT(tanggal,"%m") AS b FROM penjualan where DATE_FORMAT(tanggal,"%m")='.$bulan.'')->row_array(),


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
		'kategori_penjualan'=>$this->db->query('SELECT SUM(dp.jumlahJual) AS jumlah, kategori 
			FROM detailpenjualan dp, detailbarang db, penjualan p, barang b, kategori k, warna w, size s, jenisbarang jb
			WHERE dp.idPenjualan = p.id AND dp.idBarang=db.id AND b.id=db.idBarang AND jb.id=b.barang AND jb.idKategori=k.id AND db.idUkuran=s.id AND db.idWarna=w.id 
			and date_format(P.TANGGAL,"%m")="'.date('m').'"
			GROUP BY kategori order by jumlah desc limit 5')->result(),

		'kategori_saat_ini'=>$this->db->query('SELECT SUM(stokAwal) as jumlah, kategori 
			FROM barang b, detailbarang db, kategori k, jenisbarang jb 
			WHERE b.id=db.idBarang AND k.id=jb.idKategori
			GROUP BY jb.idKategori order by jumlah desc limit 5')->result(),

		'kategori_cabang1'=>$this->db->query('SELECT SUM(dp.jumlahJual) AS jumlah, kategori 
			FROM detailpenjualan dp, detailbarang db, penjualan p, barang b, kategori k, warna w, size s, jenisbarang jb
			WHERE dp.idPenjualan = p.id AND dp.idBarang=db.id AND b.id=db.idBarang AND jb.id=b.barang AND jb.idKategori=k.id AND db.idUkuran=s.id AND db.idWarna=w.id and db.idCabang=1 and date_format(P.TANGGAL,"%m")="'.date('m').'"
			GROUP BY kategori order by jumlah desc limit 5')->result(),

		'kategori_cabang2'=>$this->db->query('SELECT SUM(dp.jumlahJual) AS jumlah, kategori 
			FROM detailpenjualan dp, detailbarang db, penjualan p, barang b, kategori k, warna w, size s, jenisbarang jb
			WHERE dp.idPenjualan = p.id AND dp.idBarang=db.id AND b.id=db.idBarang AND jb.id=b.barang AND jb.idKategori=k.id AND db.idUkuran=s.id AND db.idWarna=w.id and db.idCabang=2 and date_format(P.TANGGAL,"%m")="'.date('m').'"
			GROUP BY kategori order by jumlah desc limit 5')->result(),


//laporan merek
		'merek_penjualan'=>$this->db->query('SELECT SUM(jumlahJual) AS jumlah, merek FROM detailpenjualan dp, detailbarang db, penjualan p, barang b, merek k, warna w, size s
			WHERE dp.idPenjualan = p.id AND dp.idBarang=db.id AND b.id=db.idBarang AND b.idMerek=k.id AND db.idUkuran=s.id AND db.idWarna=w.id 
			and date_format(P.TANGGAL,"%m")="'.date('m').'"
			GROUP BY merek ORDER BY jumlah DESC LIMIT 5')->result(),

		'merek_saat_ini'=>$this->db->query('SELECT SUM(stokAwal) as jumlah, merek 
			FROM barang b, detailbarang db, merek k 
			WHERE b.id=db.idBarang AND k.id=b.idMerek
			GROUP BY merek ORDER BY jumlah DESC LIMIT 5')->result(),


//laporan barang terjual
		// 'barang_hari_ini'=>$barang_hari_ini,
		// 'barang'=>$barang,

			// laporan warna
		'warna_saat_ini'=>$this->db->query('SELECT SUM(stokAwal) as jumlah, warna FROM barang b, detailbarang db, warna k WHERE b.id=db.idBarang AND k.id=db.idWarna
			GROUP BY db.idWarna order by jumlah desc LIMIT 5')->result(),

		'warna_penjualan'=>$this->db->query('SELECT SUM(jumlahJual) as jumlah, warna FROM detailpenjualan dp, detailbarang db, penjualan p, barang b, merek k, warna w, size s
			WHERE dp.idPenjualan = p.id AND dp.idBarang=db.id AND b.id=db.idBarang AND b.idMerek=k.id AND db.idUkuran=s.id AND db.idWarna=w.id
			and date_format(P.TANGGAL,"%m")="'.date('m').'"
			GROUP BY warna order by jumlah desc limit 5')->result(),

// laporan size
		'size_saat_ini'=>$this->db->query('SELECT SUM(stokAwal) as jumlah, size FROM barang b, detailbarang db, size k WHERE b.id=db.idBarang AND k.id=db.idUkuran
			GROUP BY db.idUkuran order by jumlah desc LIMIT 5')->result(),

		'size_penjualan'=>$this->db->query('SELECT SUM(jumlahJual) as jumlah, size FROM detailpenjualan dp, detailbarang db, penjualan p, barang b, merek k, warna w, size s
			WHERE dp.idPenjualan = p.id AND dp.idBarang=db.id AND b.id=db.idBarang AND b.idMerek=k.id AND db.idUkuran=s.id AND db.idWarna=w.id
			and date_format(P.TANGGAL,"%m")="'.date('m').'"
			GROUP BY size order by jumlah desc limit 5')->result(),

//penjualan barang terbanyak
		'penjualan_terbanyak'=>$this->db->query('SELECT jb.barang, SUM(dp.jumlahJual) AS jumlahJual, db.stokAwal, db.idCabang FROM jenisbarang jb, warna w, size s, detailpenjualan DP, detailbarang DB, barang b, penjualan p 
			WHERE b.barang=jb.id AND db.id=dp.idBarang AND b.id=db.idBarang AND db.idUkuran=s.id AND db.idWarna=w.id AND p.id=dp.idPenjualan 
			GROUP BY jb.barang ORDER BY jumlahJual DESC LIMIT 5')->result(),

		'penjualan_terbanyak_bulan'=>$this->db->query('SELECT jb.barang, SUM(dp.jumlahJual) AS jumlahJual, db.stokAwal, db.idCabang FROM jenisbarang jb, warna w, size s, detailpenjualan DP, detailbarang DB, barang b, penjualan p 
			WHERE b.barang=jb.id AND db.id=dp.idBarang AND b.id=db.idBarang AND db.idUkuran=s.id AND db.idWarna=w.id AND p.id=dp.idPenjualan and DATE_FORMAT(p.tanggal,"%m")="'.date("m").'"
			GROUP BY jb.barang ORDER BY stokAwal DESC LIMIT 5')->result(),


			//select
		'bulan_pembelian'=>$bulan_pembelian,
						//tanggal
		'tanggal_pembelian'=>$this->db->query('SELECT DATE_FORMAT(tanggal,"%d") AS t FROM penjualan WHERE DATE_FORMAT(tanggal,"%m")='.$bulan.' group by tanggal'),

		'custom_merek'=>$this->db->query('SELECT jb.barang,m.merek, SUM(jumlahJual) AS jumlah FROM detailpenjualan dp, detailbarang db, penjualan p, barang b, jenisbarang jb, merek m, warna w, size s 
			WHERE b.idMerek = m.id AND jb.id=b.barang AND dp.idBarang=db.id AND b.id=db.idBarang AND db.idwarna=w.id AND db.idukuran=s.id AND p.id=dp.idPenjualan
			AND DATE_FORMAT(p.tanggal,"%m")='.$bulan.' AND jb.id='.$pilihbarang.' GROUP BY m.merek LIMIT 5')->result(),


		'custom_size'=>$this->db->query('SELECT jb.barang,s.size, SUM(jumlahJual) AS jumlah FROM detailpenjualan dp, detailbarang db, penjualan p, barang b, jenisbarang jb, merek m, warna w, size s 
			WHERE b.idMerek = m.id AND jb.id=b.barang AND dp.idBarang=db.id AND b.id=db.idBarang AND db.idwarna=w.id AND db.idukuran=s.id AND p.id=dp.idPenjualan
			AND DATE_FORMAT(p.tanggal,"%m")='.$bulan.' AND jb.id='.$pilihbarang.' GROUP BY s.size LIMIT 5')->result(),

		'custom_warna'=>$this->db->query('SELECT jb.barang,w.warna, SUM(jumlahJual) AS jumlah FROM detailpenjualan dp, detailbarang db, penjualan p, barang b, jenisbarang jb, merek m, warna w, size s 
			WHERE b.idMerek = m.id AND jb.id=b.barang AND dp.idBarang=db.id AND b.id=db.idBarang AND db.idwarna=w.id AND db.idukuran=s.id AND p.id=dp.idPenjualan
			AND DATE_FORMAT(p.tanggal,"%m")='.$bulan.' AND jb.id='.$pilihbarang.' GROUP BY w.warna LIMIT 5')->result(),


		);

$this->template->load('template','laporan2',$data);
}







public function cetak_laporan_penjualan(){
	header("Content-type: application/vnd.ms-word");
	header("Content-Disposition: attachment;Filename=laporan_penjualan.doc");



	$this->mainlib->logged_in();

	
	
	if (empty($_GET['bulan_pembelian'])) {
		$tanggal_pembelian='DATE_FORMAT(p.tanggal,"%m")="'.date("m").'"';
		$bulan= date("m");
		$tanggal=date("d");

	} 
	else {
		$tanggal_pembelian='DATE_FORMAT(p.tanggal,"%m")="'.$_GET['bulan_pembelian'].'"';
		$bulan=$_GET['bulan_pembelian'];
		$tanggal=$_GET['tanggal_pembelian'];
	}

		// if (empty($_GET['tanggal_pembelian'])) {
		// }
		// else{
		// }


	

		//LAPORAN BULAN INI

	$total_penjualan = $this->db->query('SELECT SUM((dp.jumlahJual*db.hargaEcer)-(dp.potongan)) AS total_penjualan
		FROM detailpenjualan dp, detailbarang db, penjualan p 
		WHERE db.id=dp.idBarang AND p.id=dp.idPenjualan AND '.$tanggal_pembelian.'')->row_array();;


	$total_retur_penjualan = $this->db->query('SELECT SUM(drp.jumlah*db.hargaEcer) as total_retur_penjualan 
		FROM detailreturpenjualan drp, detailbarang db, returpenjualan r 
		WHERE db.id=drp.idDetailBarang and r.idRetur=drp.idRetur and DATE_FORMAT(tangal,"%m")="'.$bulan.'"')->row_array();

		// $modal = $this->db->query('SELECT SUM(hargaBeliSatuan*jumlahBeli) as modal FROM detailpembelian')->row_array();
	$pembelian = $this->db->query('SELECT SUM((hargaBeliSatuan*jumlahJual)-dpb.potongan) AS pembelian FROM penjualan p, detailpenjualan dpj, pembelian pe, detailpembelian dpb, detailbarang db 
		WHERE dpb.idBarang=db.id AND dpb.idPembelian=pe.id AND dpj.idBarang=db.id AND dpj.idPenjualan=p.id 			
		and '.$tanggal_pembelian.'')->row_array();
// 				$pembelian = $this->db->query('SELECT SUM((hargaBeliSatuan*jumlahJual)-dp.potongan) AS pembelian FROM penjualan p, detailbarang db, detailpembelian dp, detailpenjualan dpj 
// WHERE dp.id=db.idDetailPembelian AND db.id=dpj.idBarang AND p.id=dpj.idPenjualan

// 			and DATE_FORMAT(tanggal,"%m")="'.date("m").'"')->row_array();
	
	$potongan = $this->db->query('SELECT SUM(potongan) as potongan FROM detailpembelian dp, pembelian p WHERE p.id=dp.idPembelian and DATE_FORMAT(p.tanggal,"%m")="'.$bulan.'"')->row_array();

	$retur_pembelian=$this->db->query('SELECT SUM(jumlah*hargaBeliSatuan) AS retur_pembelian
		FROM detailreturpembelian drp, returpembelian rp, detailpembelian dp, detailbarang db
		WHERE rp.idRetur=drp.idReturpembelian 
		AND rp.idPembelian=dp.idPembelian
		AND db.id=drp.idDetailBarang
		AND db.id=dp.idBarang  
		and DATE_FORMAT(tanggal,"%m")="'.$bulan.'"
		')->row_array();

	$barang_rusak=$this->db->query('SELECT SUM(jumlah*hargaBeliSatuan) as barang_rusak FROM barangrusak br, detailpembelian dp, detailbarang db WHERE br.idDetailBarang=db.id AND br.idDetailPembelian=dp.id and DATE_FORMAT(tanggal,"%m")="'.$bulan.'"
		')->row_array();


	$beban = $this->db->query('select sum(jumlah) as jumlah from totalbeban where DATE_FORMAT(tanggal,"%m")="'.$bulan.'"')->row_array();
	
	$stok_keluar = $this->db->query('SELECT SUM(jumlah*hargaBeliSatuan) as stok_keluar FROM stokmasuk sm, detailbarang db, detailpembelian dp, pembelian p 
		WHERE sm.idDetalBarang=db.id AND dp.idBarang = db.id and sm.status="keluar" AND p.id=dp.idPembelian and DATE_FORMAT(sm.tanggal,"%m")="'.$bulan.'"')->row_array();


	$stok_masuk = $this->db->query('SELECT SUM(jumlah*hargaBeliSatuan) as stok_masuk FROM stokmasuk sm, detailbarang db, detailpembelian dp, pembelian p 
		WHERE sm.idDetalBarang=db.id AND dp.idBarang = db.id and sm.status="masuk" AND p.id=dp.idPembelian and DATE_FORMAT(sm.tanggal,"%m")="'.$bulan.'"')->row_array();

	
//LAPORAN HARI INI


	$penjualan_hari_ini = $this->db->query('SELECT SUM((dp.jumlahJual*db.hargaEcer)-(dp.potongan)) AS penjualan
		FROM detailpenjualan dp, detailbarang db, penjualan p 
		WHERE db.id=dp.idBarang AND p.id=dp.idPenjualan AND DATE_FORMAT(p.tanggal,"%d")="'.$tanggal.'" AND DATE_FORMAT(p.tanggal,"%m")="'.$bulan.'"')->row_array();;


	$retur_penjualan_hari_ini = $this->db->query('SELECT SUM(drp.jumlah*db.hargaEcer) as total_retur_penjualan 
		FROM detailreturpenjualan drp, detailbarang db, returpenjualan r 
		WHERE db.id=drp.idDetailBarang and r.idRetur=drp.idRetur and DATE_FORMAT(tangal,"%d")="'.date("d").'" AND DATE_FORMAT(tangal,"%m")="'.$bulan.'"')->row_array();

	$pembelian_hari_ini = $this->db->query('SELECT SUM(hargaBeliSatuan*jumlahJual) AS pembelian FROM penjualan p, detailpenjualan dpj, pembelian pe, detailpembelian dpb, detailbarang db 
		WHERE dpb.idBarang=db.id AND dpb.idPembelian=pe.id AND dpj.idBarang=db.id AND dpj.idPenjualan=p.id 			
		and DATE_FORMAT(p.tanggal,"%d")="'.$tanggal.'" AND DATE_FORMAT(p.tanggal,"%m")="'.$bulan.'"')->row_array();
	
	$tanggal_hari_ini='and DATE_FORMAT(tanggal,"%d")="'.date("d").'"';

	$retur_pembelian_hari_ini=$this->db->query('SELECT SUM(jumlah*hargaBeliSatuan) AS retur_pembelian
		FROM detailreturpembelian drp, returpembelian rp, detailpembelian dp, detailbarang db
		WHERE rp.idRetur=drp.idReturpembelian 
		AND rp.idPembelian=dp.idPembelian
		AND db.id=drp.idDetailBarang
		AND db.id=dp.idBarang  
		and DATE_FORMAT(tanggal,"%d")="'.$tanggal.'" AND DATE_FORMAT(tanggal,"%m")="'.$bulan.'"')->row_array();

	$barang_rusak_hari_ini=$this->db->query('SELECT SUM(jumlah*hargaBeliSatuan) as barang_rusak FROM barangrusak br, detailpembelian dp, detailbarang db WHERE br.idDetailBarang=db.id AND br.idDetailPembelian=dp.id '.$tanggal_hari_ini.'
		AND DATE_FORMAT(tanggal,"%m")="'.$bulan.'"')->row_array();


	$beban_hari_ini = $this->db->query('select sum(jumlah) as jumlah from totalbeban where DATE_FORMAT(tanggal,"%d")="'.date("d").'" AND DATE_FORMAT(tanggal,"%m")="'.$bulan.'" ')->row_array();
	
	$stok_keluar_hari_ini = $this->db->query('SELECT SUM(jumlah*hargaBeliSatuan) as stok_keluar FROM stokmasuk sm, detailbarang db, detailpembelian dp, pembelian p 
		WHERE sm.idDetalBarang=db.id AND dp.idBarang = db.id AND p.id=dp.idPembelian and sm.status="keluar" and DATE_FORMAT(sm.tanggal,"%d")="'.date("d").'" AND DATE_FORMAT(sm.tanggal,"%m")="'.$bulan.'"')->row_array();

	$stok_masuk_hari_ini = $this->db->query('SELECT SUM(jumlah*hargaBeliSatuan) as stok_masuk FROM stokmasuk sm, detailbarang db, detailpembelian dp, pembelian p 
		WHERE sm.idDetalBarang=db.id AND dp.idBarang = db.id AND p.id=dp.idPembelian and sm.status="masuk" and DATE_FORMAT(sm.tanggal,"%d")="'.date("d").'" AND DATE_FORMAT(sm.tanggal,"%m")="'.$bulan.'"')->row_array();

	$potongan_hari_ini = $this->db->query('SELECT * FROM detailpembelian dp, pembelian p WHERE p.id=dp.idPembelian and DATE_FORMAT(p.tanggal,"%d")="'.date("d").'" AND DATE_FORMAT(p.tanggal,"%m")="'.$bulan.'"')->row_array();

		//barang terjual

	$barang = $this->db->query('SELECT jb.barang, sum(dp.jumlahJual) as jumlahJual, w.warna, s.size, db.stokAwal, db.idCabang FROM warna w, size s, detailpenjualan DP, detailbarang DB, barang b, penjualan p, jenisbarang jb 
		WHERE jb.id=b.barang and db.id=dp.idBarang AND b.id=db.idBarang AND db.idUkuran=s.id AND db.idWarna=w.id AND p.id=dp.idPenjualan 
		AND DATE_FORMAT(p.tanggal,"%m")="'.date("m").'"
		GROUP BY db.id ORDER BY jumlahJual DESC limit 20')->result();



//Barang paling banyak terjua;

//LABA

	$debit=$penjualan_hari_ini['penjualan']+$retur_pembelian_hari_ini['retur_pembelian']+$potongan_hari_ini['potongan']+$stok_masuk_hari_ini['stok_masuk']; 
	$kredit = $retur_penjualan_hari_ini['total_retur_penjualan']+$pembelian_hari_ini['pembelian']+$barang_rusak_hari_ini['barang_rusak']+$beban_hari_ini['jumlah']+$stok_keluar_hari_ini['stok_keluar'];  
	$hasil=$debit-$kredit;


//bulan
	$bulan_pembelian=$this->db->query('SELECT MONTHNAME(tanggal) AS bulan, DATE_FORMAT(tanggal,"%m") AS b FROM penjualan GROUP BY DATE_FORMAT(tanggal,"%m") ORDER BY DATE_FORMAT(tanggal,"%m") DESC 
		');

	$tampil_bulan = $this->db->query('SELECT MONTHNAME(tanggal) AS bulan, DATE_FORMAT(tanggal,"%m") AS b FROM penjualan where DATE_FORMAT(tanggal,"%m")='.$bulan.'')->row_array();




	$data=array(
		'total_penjualan'=>$total_penjualan,
		'total_retur_penjualan'=>$total_retur_penjualan,
		'pembelian'=>$pembelian,
		'retur_pembelian'=>$retur_pembelian,
		'barang_rusak'=>$barang_rusak,
		'beban'=>$beban,
		'stok_keluar'=>$stok_keluar,
		'stok_masuk'=>$stok_masuk,
		'potongan'=>$potongan,

			//hari ini

		'penjualan_hari_ini'=>$penjualan_hari_ini,
		'retur_penjualan_hari_ini'=>$retur_penjualan_hari_ini,
		'pembelian_hari_ini'=>$pembelian_hari_ini,
		'retur_pembelian_hari_ini'=>$retur_pembelian_hari_ini,
		'barang_rusak_hari_ini'=>$barang_rusak_hari_ini,
		'beban_hari_ini'=>$beban_hari_ini,
		'stok_keluar_hari_ini'=>$stok_keluar_hari_ini,
		'stok_masuk_hari_ini'=>$stok_masuk_hari_ini,
		'potongan_hari_ini'=>$potongan_hari_ini,
		'tanggal_penjualan'=>$this->db->query('select * from penjualan p where '.$tanggal_pembelian.' group by tanggal')->result(),

			//tanggal
		'tanggal_pembelian'=>$this->db->query('SELECT DATE_FORMAT(tanggal,"%d") AS t FROM penjualan WHERE DATE_FORMAT(tanggal,"%m")='.$bulan.' group by tanggal'),

			// hutang piutang

		'hutang'=>$this->db->query('SELECT nama,kekuranganPembayaran AS hutang, SUM(bayar) AS yangsudahdibayar,  kekuranganPembayaran-SUM(bayar) AS kekuranganpembayaran, tanggalWajibBayar, h.status 
			FROM hutang h, detailhutang dh, pelanggan p WHERE h.id=dh.idHutang AND p.id=h.idSupplier and h.status="BELUM LUNAS" GRouP BY idHutang 
			')->result(),
		'piutang'=>$this->db->query('SELECT nama, SUM(jumlah) AS yangsudahdibayar, kekuraganPembayaran-SUM(jumlah) AS kurang, kekuraganPembayaran AS piutang, tanggalWajibBayar
			FROM detailpiutang dp, piutang p, pelanggan pe WHERE dp.idPiutang=p.id AND pe.id=p.idPelanggan AND p.status="BELUM LUNAS" group by idPiutang
			')->result(),

			//beban 
		'bebanpengeluaran'=>$this->db->query('SELECT b.beban, tb.jumlah, tb.tanggal, tb.noNota, a.username FROM totalbeban tb, beban b, admin a WHERE b.id=tb.idBeban AND a.id=tb.idAdmin and DATE_FORMAT(tb.tanggal,"%m")='.$bulan.'')->result(),		



			//laba


			// data grafik
		
			// 'penjualan_tanggal'=>$this->db->query('SELECT SUM(totalBayar) AS totalbayar,DATE_FORMAT(tanggal,"%d") AS tanggal, status FROM penjualan p 
			// 	WHERE '.$tanggal_pembelian.' GROUP BY tanggal')->result(),
			// 'pembelian_tanggal'=>$this->db->query('SELECT SUM(WajibMembayar) AS totalbayar,DATE_FORMAT(tanggal,"%d") AS tanggal FROM pembelian p 
			// 	WHERE '.$tanggal_pembelian.' GROUP BY tanggal')->result(),
			// 'penjualan_cabang1'=>$this->db->query('SELECT SUM(jumlahJual*hargaEcer-potongan) as jual FROM DETAILPENJUALAN DP, detailbarang DB, ADMIN A, PENJUALAN P 
			// 	WHERE '.$tanggal_pembelian.' and A.ID=DP.IDADMIN AND DP.IDBARANG=DB.ID AND P.ID=DP.IDPENJUALAN AND a.idcabang=1 GROUP by p.tanggal')->result(),
			// 'penjualan_cabang2'=>$this->db->query('SELECT SUM(jumlahJual*hargaEcer-potongan) as jual FROM DETAILPENJUALAN DP, detailbarang DB, ADMIN A, PENJUALAN P 
			// 	WHERE '.$tanggal_pembelian.' and A.ID=DP.IDADMIN AND DP.IDBARANG=DB.ID AND P.ID=DP.IDPENJUALAN AND a.idcabang=2 GROUP by p.tanggal')->result(),


			//select
		'bulan_pembelian'=>$bulan_pembelian,
		'tampil_bulan'=>$tampil_bulan,

			//barang terjual 
		'barang'=>$barang,
		'start'=>0,

		
		'stok_barang_1'=>$this->db->query('SELECT jb.barang, merek, SUM(stokAwal) AS stokAwal FROM jenisbarang jb, merek m, detailbarang db, barang b, warna w, size s 
			WHERE jb.id=b.barang AND b.idMerek=m.id AND b.id=db.idBarang AND db.idWarna=w.id AND db.idUkuran=s.id AND idCabang=1 
			GROUP BY jb.Barang, merek ORDER BY stokAwal DESC LIMIT 25
			')->result(),
		'stok_barang_1_sedikit'=>$this->db->query('SELECT jb.barang, merek, SUM(stokAwal) AS stokAwal FROM jenisbarang jb, merek m, detailbarang db, barang b, warna w, size s 
			WHERE jb.id=b.barang AND b.idMerek=m.id AND b.id=db.idBarang AND stokAwal is not null and stokAwal != 0 and db.idWarna=w.id AND db.idUkuran=s.id AND idCabang=1 
			GROUP BY jb.Barang, merek ORDER BY stokAwal ASC LIMIT 25
			')->result(),
		'stok_barang_2'=>$this->db->query('SELECT jb.barang, merek, SUM(stokAwal) AS stokAwal FROM jenisbarang jb, merek m, detailbarang db, barang b, warna w, size s 
			WHERE jb.id=b.barang AND b.idMerek=m.id AND b.id=db.idBarang AND db.idWarna=w.id AND db.idUkuran=s.id AND idCabang=2 
			GROUP BY jb.Barang, merek ORDER BY stokAwal DESC LIMIT 25')->result(),
		'stok_barang_2_sedikit'=>$this->db->query('SELECT jb.barang, merek, SUM(stokAwal) AS stokAwal FROM jenisbarang jb, merek m, detailbarang db, barang b, warna w, size s 
			WHERE jb.id=b.barang AND stokAwal is not null and stokAwal != 0 and b.idMerek=m.id AND b.id=db.idBarang AND db.idWarna=w.id AND db.idUkuran=s.id AND idCabang=2 
			GROUP BY jb.Barang, merek ORDER BY stokAwal ASC LIMIT 25')->result(),


		);



$this->load->view('laporan_word',$data);


	# code...
}

public function cetak_laporan_stok(){
	header("Content-type: application/vnd.ms-word");
	header("Content-Disposition: attachment;Filename=laporan_stok.doc");



	$this->mainlib->logged_in();

	

	$data=array(
		
		'start'=>0,

		
		'stok_barang_1'=>$this->db->query('SELECT jb.barang, merek, SUM(stokAwal) AS stokAwal FROM jenisbarang jb, merek m, detailbarang db, barang b, warna w, size s 
			WHERE jb.id=b.barang AND b.idMerek=m.id AND b.id=db.idBarang AND db.idWarna=w.id AND db.idUkuran=s.id AND idCabang=1 
			GROUP BY jb.Barang, merek ORDER BY stokAwal DESC LIMIT 25
			')->result(),
		'stok_barang_1_sedikit'=>$this->db->query('SELECT jb.barang, merek, SUM(stokAwal) AS stokAwal FROM jenisbarang jb, merek m, detailbarang db, barang b, warna w, size s 
			WHERE jb.id=b.barang AND b.idMerek=m.id AND b.id=db.idBarang AND stokAwal is not null and stokAwal != 0 and db.idWarna=w.id AND db.idUkuran=s.id AND idCabang=1 
			GROUP BY jb.Barang, merek ORDER BY stokAwal ASC LIMIT 25
			')->result(),
		'stok_barang_2'=>$this->db->query('SELECT jb.barang, merek, SUM(stokAwal) AS stokAwal FROM jenisbarang jb, merek m, detailbarang db, barang b, warna w, size s 
			WHERE jb.id=b.barang AND b.idMerek=m.id AND b.id=db.idBarang AND db.idWarna=w.id AND db.idUkuran=s.id AND idCabang=2 
			GROUP BY jb.Barang, merek ORDER BY stokAwal DESC LIMIT 25')->result(),
		'stok_barang_2_sedikit'=>$this->db->query('SELECT jb.barang, merek, SUM(stokAwal) AS stokAwal FROM jenisbarang jb, merek m, detailbarang db, barang b, warna w, size s 
			WHERE jb.id=b.barang AND stokAwal is not null and stokAwal != 0 and b.idMerek=m.id AND b.id=db.idBarang AND db.idWarna=w.id AND db.idUkuran=s.id AND idCabang=2 
			GROUP BY jb.Barang, merek ORDER BY stokAwal ASC LIMIT 25')->result(),


		);



$this->load->view('laporan_word_stok',$data);


	# code...
}




public function laporan_tiap_cabang()
{
	$this->load->library('pdf');

	$penjualan_hari_ini = $this->db->query('SELECT SUM((dp.jumlahJual*db.hargaEcer)-(dp.potongan)) AS penjualan
		FROM detailpenjualan dp, detailbarang db, penjualan p 
		WHERE db.id=dp.idBarang AND p.id=dp.idPenjualan AND p.idAdmin="'.$this->session->userdata('id').'" AND DATE_FORMAT(p.tanggal,"%d")="'.date("d").'" AND DATE_FORMAT(p.tanggal,"%m")="'.date("m").'"')->row_array();;


	$retur_penjualan_hari_ini = $this->db->query('SELECT SUM(drp.jumlah*db.hargaEcer) as retur_penjualan 
		FROM detailreturpenjualan drp, detailbarang db, returpenjualan r 
		WHERE db.id=drp.idDetailBarang and r.idRetur=drp.idRetur and DATE_FORMAT(tangal,"%d")="'.date("d").'" AND r.idAdmin="'.$this->session->userdata('id').'"')->row_array();

	$hutang = $this->db->query('SELECT SUM(BAYAR) AS BAYAR FROM DETAILHUTANG WHERE DATE_FORMAT(tanggal,"%d")="'.date("d").'" AND idAdmin="'.$this->session->userdata('id').'"')->row_array();

	$data=array(
		'penjualan'=>$penjualan_hari_ini,
		'retur_penjualan'=>$retur_penjualan_hari_ini,
		'hutang'=>$hutang,



		);

	$this->load->view('cetak_laporan_cabang',$data);


}

}

?>