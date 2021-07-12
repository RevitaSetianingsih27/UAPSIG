<?php namespace App\Models;

use CodeIgniter\Model;

class DataModel extends Model {
    protected $table = 'data';
    protected $primarykey = 'id';
    protected $allowFields = [
        'id', 'id_master_data', 'kode_wilayah', 'nilai'
    ];
    protected $returnType = 'App\Entities\Data';
    protected $useTimeStamp = false;
}