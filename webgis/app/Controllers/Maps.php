<?php

namespace App\Controllers;

class Maps extends BaseController
{
	public function index()
	{
		$model = new \App\Models\DataModel();
		$fileName = base_url("maps/kecamatan_balam.geojson");
		$file = file_get_contents($fileName);
		$file = json_decode($file);

		$features = $file->features;

		foreach($features as $index=>$feature)
		{
			$kode_wilayah = $feature->properties->kode;
			$data = $model->where('id_master_data',4)
						->where('kode_wilayah', $kode_wilayah)
						->first();
			if($data)
			{
				$features[$index]->properties->nilai = $data->nilai;
			}
		}
		$nilaiMax = $model->select('MAX(nilai) AS nilai')->where('id_master_data', 4)->first()->nilai;

		$masterDataModel = new \App\Models\MasterDataModel();
		$masterData = $masterDataModel->find(4);

		// $coord = [array(-5.445836,105.233558,'Teluk Betung Barat'),
		// 			array(-5.468824,105.238569,'Teluk Betung Timur'),
		// 			array(-5.447045,105.258889,'Teluk Betung Selatan'),
		// 			array(-5.440871,105.278331,'Bumi Waras'),
		// 			array(-5.475252,105.320577,'Panjang'),
		// 			array(-5.415741,105.266244,'Tanjung Karang Timur'),
		// 			array(-5.423327,105.286905,'Kedamaian'),
		// 			array(-5.435732,105.260026,'Teluk Betung Utara'),
		// 			array(-5.415582,105.249979,'Tanjung Karang Pusat'),
		// 			array(-5.420109,105.260786,'Enggal'),
		// 			array(-5.409104,105.232206,'Tanjung Karang Barat'),
		// 			array(-5.395601,105.207186,'Kemiling'),
		// 			array(-5.391680,105.227785,'Langkapura'),
		// 			array(-5.382554,105.261841,'Kedaton'),
		// 			array(-5.361307,105.238217,'Rajabasa'),
		// 			array(-5.359983,105.272351,'Tanjung Senang'),
		// 			array(-5.371947,105.254533,'Labuhan Ratu'),
		// 			array(-5.380866,105.298468,'Sukarame'),
		// 			array(-5.397311,105.301009,'Sukabumi'),
		// 			array(-5.385344,105.275761, 'WayHalim')];


		return view('maps/index', [
			'data' => $features,
			'nilaiMax' => $nilaiMax,
			'masterData' => $masterData,
			// 'coord' => $coord,
			// 'dataWilayah' => $dataWilayah,
			// 'nilaiData' => $nilaiData
		]);
	}
}
