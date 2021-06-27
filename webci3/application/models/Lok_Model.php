<?php

class Lok_Model extends CI_Model
{
    public function getloc()
    {
        return $this->db->get('data')->result_array();
    }

    public function tambahDatalokasi()
    {
        $data = [

            "nama" => $this->input->post('nama', true),
            "cord" => $this->input->post('cord', true),
        ];

        $this->db->insert('data', $data);
    }

    public function hapusDatalokasi($id)
    {
        $this->db->where('id_lok', $id);
        $this->db->delete('data');
    }

    public function getlokasiById($id)
    {
        return $this->db->get_where('data', ['id_lok' => $id])->row_array();
    }


    public function ubahlokasi()
    {
        $data = [
            "id_lok" => $this->input->post('id_lok', true),
            "nama" => $this->input->post('nama', true),
            "cord" => $this->input->post('cord', true),

        ];
        $this->db->where('id_lok', $this->input->post('id_lok'));
        $this->db->update('data', $data);
    }

    public function cariDatalokasi()
    {
        $keyword = $this->input->post('cari', true);
        $this->db->like('nama', $keyword);
        return $this->db->get('data')->result_array();
    }
}