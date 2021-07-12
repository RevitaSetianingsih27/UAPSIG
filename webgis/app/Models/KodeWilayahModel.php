<?php namespace App\Models;

use CodeIgniter\Model;

class KodeWilayahModel extends Model {
    protected $table = 'kode_wilayah';
    protected $primarykey = 'id';
    protected $allowFields = [
        'id', 'kode_wilayah', 'nama_wilayah'
    ];
    protected $returnType = 'App\Entities\KodeWilayah';
    protected $useTimeStamp = false;
}