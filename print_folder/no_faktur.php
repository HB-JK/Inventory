<?php 
	date_default_timezone_set('Asia/Bangkok');

	function pisah($val){
		$pattern = '/[-\/\s:]/';
		$components = preg_split($pattern, $val);
		return $components;
	}

	function faktur($faktur){
		$tanggal = date('d');
		$bulan = date('m');
		$tahun = substr(date('Y'), -2);
		$no_faktur = '';
		if($faktur != ''){
			$arr = pisah($faktur);
			$faktur_bulan = intval($arr[1]);
			$faktur_tahun = intval($arr[2]);
			$faktur_no = intval($arr[3]);
			if($faktur_tahun == $tahun){
				if($faktur_bulan == $bulan){
					if($faktur_no >= 1){
						$nomor = sprintf('%04d', $faktur_no + 1);
						$no_faktur = 'SR/'.$faktur_bulan.'/'.$faktur_tahun.'/'.$nomor;
					}else{
						$nomor = sprintf('%04d', 1);
						$no_faktur = 'SR/'.$bulan.'/'.$tahun.'/'.$nomor;
					}
				}else{
					$nomor = sprintf('%04d', 1);
					$no_faktur = 'SR/'.$bulan.'/'.$tahun.'/'.$nomor;
				}
			}else{
				$nomor = sprintf('%04d', 1);
				$no_faktur = 'SR/'.$bulan.'/'.$tahun.'/'.$nomor;
			}
		}else{
			$nomor = sprintf('%04d', 1);
			$no_faktur = 'SR/'.$bulan.'/'.$tahun.'/'.$nomor;
		}

		return $no_faktur;
	}
 ?>