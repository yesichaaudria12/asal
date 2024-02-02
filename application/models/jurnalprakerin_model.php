<?php defined('BASEPATH') or exit('No direct Scrip access allowed');

class jurnalprakerin_model extends CI_Model
{
    private $_table = "jurnal_prakerin";

    public $id_jurnal_prakerin;
    public $id_peserta;
    public $id_kompetensi_dasar;
    public $tanggal;
    public $topik_pekerjaan;
    public $dokumentasi = "default.jpg";
    public $status;

    public function rules()
    {
        return [
            [
                'field' => 'id_kompetensi_dasar',
                'label' => 'Kompetensi Dasar',
                'rules' => 'required'
            ],
            [
                'field' => 'topik_pekerjaan',
                'label' => 'Topik Pekerjaan',
                'rules' => 'required'
            ],

            [
                'field' => 'tanggal',
                'label' => 'Tanggal',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->join('data_peserta', 'data_peserta.id_peserta = jurnal_prakerin.id_peserta');
        $this->db->join('kompetensi_dasar', 'kompetensi_dasar.id = jurnal_prakerin.id_kompetensi_dasar');
        $this->db->where('jurnal_prakerin.id_peserta', $this->session->userdata('id'));
        $this->db->order_by('id_jurnal_prakerin', 'desc');
        return $this->db->get($this->_table)->result();
    }

    public function getData()
    {
        $this->db->select('*');
        $this->db->join('data_peserta', 'data_peserta.id_peserta = jurnal_prakerin.id_peserta');
        $this->db->join('kompetensi_dasar', 'kompetensi_dasar.id = jurnal_prakerin.id_kompetensi_dasar');
        $this->db->where('jurnal_prakerin.id_peserta', $this->session->userdata('id'));
        $this->db->order_by('tanggal', 'asc');
        return $this->db->get($this->_table)->result_array();
    }

    public function getById($id_peserta)
    {
        $this->db->join('data_peserta', 'data_peserta.id_peserta = jurnal_prakerin.id_peserta');
        $this->db->join('jurusan', 'jurusan.id_jurusan = data_peserta.id_jurusan');
        $this->db->join('kompetensi_dasar', 'kompetensi_dasar.id = jurnal_prakerin.id_kompetensi_dasar');
        $this->db->join('pengajuanprakerin', 'pengajuanprakerin.id_peserta = jurnal_prakerin.id_peserta');
        $this->db->join('data_mentor', 'data_mentor.id_mentor = pengajuanprakerin.id_mentor');
        return $this->db->get_where($this->_table, ["jurnal_prakerin.id_peserta" => $id_peserta])->row();
    }

    public function getId($id_jurnal_prakerin)
    {
        return $this->db->get_where($this->_table, ["id_jurnal_prakerin" => $id_jurnal_prakerin])->row();
    }

    public function getMapel()
    {
        $this->db->select('*');
        $this->db->from('mapel');
        $query = $this->db->get();
        return $query->result();
    }

    public function getKompetensidasar($id)
    {
        $kompetensi_dasar = $this->db->query("SELECT * FROM kompetensi_dasar WHERE id_mapel = '$id'");
        return $kompetensi_dasar->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_peserta = $post["id_peserta"];
        $this->id_kompetensi_dasar = $post["id_kompetensi_dasar"];
        $this->tanggal = $post["tanggal"];
        $this->topik_pekerjaan = $post["topik_pekerjaan"];
        $this->dokumentasi = $this->_uploadImage();
        $this->status = $post['status'];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_jurnal_prakerin = $post["id_jurnal_prakerin"];
        $this->id_peserta = $post["id_peserta"];
        $this->id_kompetensi_dasar = $post["id_kompetensi_dasar"];
        $this->tanggal = $post["tanggal"];
        $this->topik_pekerjaan = $post["topik_pekerjaan"];

        if (!empty($_FILES["dokumentasi"]["name"])) {
            $this->dokumentasi = $this->_uploadImage();
        } else {
            $this->dokumentasi = $post["old_image"];
        }

        $this->status = $post['status'];
        return $this->db->update($this->_table, $this, array("id_jurnal_prakerin" => $post["id_jurnal_prakerin"]));
    }

    public function delete($id_jurnal_prakerin)
    {
        $this->_deleteImage($id_jurnal_prakerin);
        return $this->db->delete($this->_table, array("id_jurnal_prakerin" => $id_jurnal_prakerin));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './dokumentasi';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|bmp';
        $config['file_name']            = $_FILES['dokumentasi']['name'];
        $config['overwrite']            = true;
        $config['max_size']             = 1024;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('dokumentasi')) {
            return $this->upload->data("file_name");
        }
        return "default.jpg";
    }

    private function _deleteImage($id_jurnal_prakerin)
    {
        $jurnal_prakerin = $this->getId($id_jurnal_prakerin);
        if ($jurnal_prakerin->dokumentasi != "default.jpg") {
            $filename = explode(".", $jurnal_prakerin->dokumentasi)[0];
            return array_map('unlink', glob(FCPATH . "dokumentasi/$filename.*"));
        }
    }
}