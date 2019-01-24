<?php
function createDateRange($startDate, $endDate, $format = "Y-m-d")
{
    $begin = new DateTime($startDate);
    $end = new DateTime($endDate);

    $interval = new DateInterval('P1D'); // 1 Day
    $dateRange = new DatePeriod($begin, $interval, $end);

    $range = [];
    foreach ($dateRange as $date) {
        $range[] = $date->format($format);
    }
    $range[]=$endDate;
    return $range;
}
function getMinutes($start_time,$end_time)
{
	if($end_time!=null && $end_time!='')
	{

		$d1 = strtotime($start_time);
		$d2 = strtotime($end_time);
		$diff = ($d2-$d1)/60;
	}
	else
		$diff='-';	
	return $diff;
}

function gabungtgl($date1,$date2,$sep='-')
{
	$n1=date('n',strtotime($date1));
	$n2=date('n',strtotime($date2));
	if($n1==$n2)
	{
		$tgl=date('d',strtotime($date1)).' '.$sep.' '.date('d',strtotime($date2));
		$tgl.=' '.getBulan(date('n',strtotime($date1))).' '.date('Y',strtotime($date2));
	}
	else
	{
		$tgl=date('d',strtotime($date1)).' '.getBulan(date('n',strtotime($date1)));
		$tgl.=' '.$sep.' '.date('d',strtotime($date2)).' '.getBulan(date('n',strtotime($date2))).' '.date('Y',strtotime($date2));
	}
	return $tgl;
}

function hari($day)
{
    switch($day)
    {
        case 'Mon' : return 'Senin';
        case 'Tue' : return 'Selasa';
        case 'Wed' : return 'Rabu';
        case 'Thu' : return 'Kamis';
        case 'Fri' : return 'Jumat';
        case 'Sat' : return 'Sabtu';
        case 'Sun' : return 'Minggu';
    }
}
function tgl_indo($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun;
	}
	function tgl_indo2($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulanSingkat(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun;
	}
	
	function tbt($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = substr($tgl,5,2);
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.getBulan($bulan).' '.$tahun;
	}
	
	function tgl_indo_time($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			$jam = substr($tgl,11,2);
			$menit = substr($tgl,14,2);
			$detik = substr($tgl,17,2);
			return $tanggal.' '.$bulan.' '.$tahun.' '.$jam.':'.$menit.':'.$detik.' WIB';
	}	function tgl_indo_time2($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulanSingkat(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			$jam = substr($tgl,11,2);
			$menit = substr($tgl,14,2);
			$detik = substr($tgl,17,2);
			return $tanggal.' '.$bulan.' '.$tahun.' '.$jam.':'.$menit.':'.$detik.' WIB';
	}
	function tgl_bulan($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulanSingkat(substr($tgl,5,2));
			return $tanggal.' '.$bulan;
	}

	function tanggal($date)
	{
		list($tgl,$bln,$thn)=explode(' ', trim($date));
		$bln=strtolower($bln);
		
		if($bln=='januari' || $bln=='jan')
			$b='01';
		else if($bln=='februari' || $bln=='feb')
			$b='02';
		else if($bln=='maret' || $bln=='mar')
			$b='03';
		else if($bln=='april' || $bln=='apr')
			$b='04';
		else if($bln=='mei' || $bln=='may')
			$b='05';
		else if($bln=='juni' || $bln=='jun')
			$b='06';
		else if($bln=='juli' || $bln=='jul')
			$b='07';
		else if($bln=='agustus' || $bln=='ags' || $bln=='agust')
			$b='08';
		else if($bln=='september' || $bln=='sept')
			$b='09';
		else if($bln=='oktober' || $bln=='okt')
			$b='10';
		else if($bln=='november' || $bln=='nov')
			$b='11';		
		else if($bln=='desember' || $bln=='des')
			$b='12';
		else
			$b='00';

		return $thn.'-'.$b.'-'.$tgl;
	}
	function getBulanSingkat($bln)
	{
				switch ($bln){
					case 1:
						return "Jan";
						break;
					case 2:
						return "Feb";
						break;
					case 3:
						return "Mar";
						break;
					case 4:
						return "Apr";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Jun";
						break;
					case 7:
						return "Jul";
						break;
					case 8:
						return "Ags";
						break;
					case 9:
						return "Sep";
						break;
					case 10:
						return "Okt";
						break;
					case 11:
						return "Nov";
						break;
					case 12:
						return "Des";
						break;
				}
		
	}
	function getBulanEn($bln)
	{
				switch ($bln){
					case 1:
						return "Jan";
						break;
					case 2:
						return "Feb";
						break;
					case 3:
						return "Mar";
						break;
					case 4:
						return "Apr";
						break;
					case 5:
						return "May";
						break;
					case 6:
						return "Jun";
						break;
					case 7:
						return "Jul";
						break;
					case 8:
						return "Aug";
						break;
					case 9:
						return "Sep";
						break;
					case 10:
						return "Oct";
						break;
					case 11:
						return "Nov";
						break;
					case 12:
						return "Dec";
						break;
				}
		
	}
	function getBulanReverseFull($bln)
	{
		$arr=['januari'=>1,'februari'=>2,'maret'=>3,'april'=>4,'mei'=>5,'juni'=>6,'juli'=>7,'agustus'=>8,'september'=>9,'oktober'=>10,'november'=>11,'desember'=>12];
		if(isset($arr[strtolower($bln)]))
			return $arr[strtolower($bln)];
		else
			return 'n/a';
	}
	function getBulanReverse($bln)
	{
				switch ($bln){
					case "Jan":
						return 1;
						break;
					case "Feb":
						return 2;
						break;
					case "Mar":
						return 3;
						break;
					case "Maret":
						return 3;
						break;
					case "Apr":
						return 4;
						break;
					case "May":
						return 5;
						break;
					case "Apr":
						return 6;
						break;
					case "Jul":
						return 7;
						break;
					case "Aug":
						return 8;
						break;
					case "Agu":
						return 8;
						break;
					case "Agt":
						return 8;
						break;
					case "Sep":
						return 9;
						break;
					case "Sept":
						return 9;
						break;
					case "Oct":
						return 10;
						break;
					case "Okt":
						return 10;
						break;
					case "Nov":
						return 11;
						break;
					case "Dec":
						return 12;
						break;					
					case "Des":
						return 12;
						break;
				}
		
	}
	function getBulan($bln){
				switch ($bln){
					case 1:
						return "Januari";
						break;
					case 2:
						return "Februari";
						break;
					case 3:
						return "Maret";
						break;
					case 4:
						return "April";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Juni";
						break;
					case 7:
						return "Juli";
						break;
					case 8:
						return "Agustus";
						break;
					case 9:
						return "September";
						break;
					case 10:
						return "Oktober";
						break;
					case 11:
						return "November";
						break;
					case 12:
						return "Desember";
						break;
				}
			}
function jumlah_hari($bulan = 0, $tahun = '')
{
    if ($bulan < 1 OR $bulan > 12)
    {
  return 0;
    }
    if ( ! is_numeric($tahun) OR strlen($tahun) != 4)
    {
  $tahun = date('Y');
    }
    if ($bulan == 2)
    {
  if ($tahun % 400 == 0 OR ($tahun % 4 == 0 AND $tahun % 100 != 0))
  {
  return 29;
  }
    }
    $jumlah_hari    = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
    return $jumlah_hari[$bulan - 1];
}
function akses()
{
	$akses=array('Semua Menu','Manajemen Pelatihan','Manajemen Jadwal','Manajemen Peserta','Manajemen User','Master Data','Pengaturan Sistem');
	return $akses;
}

function gelar($nama,$s1='',$s2='',$s3='',$lain='')
{
	$n='';
	if($s1!='')
	{
		if(strpos(strtolower($s1),'ir')!==false)
		{
			$n=$s1.'. '.$nama;
		}
		else if(strpos(strtolower($s1),'drs')!==false)
		{
			$n=$s1.'. '.$nama;
		}
		else if(strtolower($s1)=='dr')
		{
			$n=$s1.'. '.$nama;
		}
		else
			$n=$nama.', '.$s1;
	}

	if($s3!='')
    {
		if(strpos(strtolower($s3),'ir')!==false)
		{
			$n=$s3.'. '.$n;
		}
		else if(strpos(strtolower($s3),'drs')!==false)
		{
			$n=$s3.'. '.$n;
		}
		else if(strtolower($s3)=='dr')
			$n=$s3.'. '.$n;
		else
			$n.=', '.$s3.'.';
    }
    if($s2!='')
    {
		if(strpos(strtolower($s2),'ir')!==false)
		{
			$n=$s2.'. '.$n;
		}
		else if(strpos(strtolower($s2),'drs')!==false)
		{
			$n=$s2.'. '.$n;
		}
		else if(strtolower($s2)=='dr')
			$n=$s2.'. '.$n;
		else
        	$n.=', '.$s2.'.';
    }
    if($lain!='')
    {
        $n.=', '.$lain;
    }

	return $n;
}
?>