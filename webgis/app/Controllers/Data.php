<?php namespace App\Controllers;

class Data extends BaseController
{
    public function __construct()
    {
        helper('form');
    }

	public function index()
	{
        $dataModel = new \App\Models\DataModel();

        $data = $dataModel->select('*')
                ->join('master_data', 'data.id_master_data=master_data.id')
                ->join('kode_wilayah', 'data.kode_wilayah=kode_wilayah.kode_wilayah')
                ->orderBy('data.id','asc')
                ->get();
		return view('data/index',[
            'data'=> $data,
        ]);
	}

   public function import()
    {
        if($this->request->getPost()){
            $fileName = $_FILES["csv"]["tmp_name"];

            if($_FILES['csv']['size']>0)
            {
                $file = fopen($fileName, "r");

                $modelMasterData = new \App\Models\MasterDataModel();
                $dataMaster = [
                    'nama' => $this->request->getPost('nama')
                ];

                $modelMasterData->save($dataMaster);
                $id_masterData = $modelMasterData->insertID();
                
                $modelData = new \App\Models\DataModel();

                $builder = $modelData->builder();

                $data = array();

                while(! feof($file))
                {
                    $column = fgetcsv($file, 1000, ";");

                    $kode_wilayah = $column[0];
                    $nilai = $column[1];

                    $row = [
                        'id_master_data' => $id_masterData,
                        'kode_wilayah' => $kode_wilayah,
                        'nilai' => $nilai,
                    ];

                    array_push($data, $row);
                }

                $builder->insertBatch($data);
                fclose($file);
            }

            return redirect()->to(site_url('Data/index'));
        } 
        return view('data/import');
    } 
	//--------------------------------------------------------------------
    public function edit($id){
        $data = new \App\Models\DataModel();
        
        $hasil = $data->select('*')
                ->where('kode_wilayah',$id)
                ->first();
        $dataMaster = new \App\Models\MasterDataModel();
        $namaData = $dataMaster->select('*')->where('id',$hasil->id_master_data)->first()->nama;
        return view('data/edit',[
            'id' => $hasil->id,
            'namaData' =>$namaData,
            'kode_wilayahData' => $hasil->kode_wilayah,
            'nilaiData' => $hasil->nilai,
        ]);
    }
    public function update($id){
        if($this->request->getPost()){
            $data = new \App\Models\DataModel();
            $kode_wilayah=$this->request->getPost('kode_wilayah');
            $nilai=$this->request->getPost('nilai');
            $update=[
                'kode_wilayah' => $kode_wilayah,
                'nilai' => $nilai
            ];
            $data->update($id,$update);
            return redirect()->to(site_url('Data/index'));
        }
        return view('data/edit');
    }

    public function hapus($id){
        $data = new \App\Models\DataModel();
        $hasil = $data->where('kode_wilayah',$id)->first()->id;
        $data->delete($hasil);
        return redirect()->to(site_url('Data/index'));
    }
}