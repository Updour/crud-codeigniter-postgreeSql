<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\UsersModelMigration;
use CodeIgniter\Controller;

class Users extends Controller
{

    public function index()
    {
        $model2 = new UsersModelMigration(); // Misalkan model ini dari MySQL
        $this->process_inserts();
        // Mulai waktu eksekusi sebelum proses query dimulai
        $startTime = microtime(true);
    
        $perPage = $this->request->getVar('perPage') ? $this->request->getVar('perPage') : 10;
        $keyword = $this->request->getVar('keyword');
    
        if ($keyword) {
            $users = $model2->like('full_name', $keyword)->limit(10)->paginate(10);
            $totalRows = $model2->like('full_name', $keyword)->countAllResults();
        } else {
            $totalRows = $model2->countAll();
            $users = $model2->limit(10)->paginate(10);
        }
        
    
        // Akhiri waktu eksekusi setelah proses query selesai
        $endTime = microtime(true);
        $executionTime = $endTime - $startTime;
        $executionTimeFormatted = number_format($executionTime, 2);
    
        // Ambil pager untuk pagination
        $pager = $model2->pager;
        
        // Data untuk dikirim ke view
        $data = [
            'users' => $users,
            'pager' => $pager,
            'keyword' => $keyword,
            'totalRows' => $totalRows,
            'executionTime' => $executionTimeFormatted,
        ];
    
        return view('users/index', $data);
    }
    
    public function processed() {
        echo "asdasd";
    }
        public function process_inserts()
        {
            $model = new UsersModel(); // Model untuk PostgreSQL
            $model2 = new UsersModelMigration(); // Model untuk MySQL
    
            $data['users2'] = $model2->getUsersByIsMove(0, 1);
    
            foreach ($data['users2'] as $items) {
                // Persiapkan data yang akan dimasukkan ke PostgreSQL
                $added = [
                    'username' => $items['username'],
                    'password' => $items['password'],
                    'full_name' => $items['full_name'],
                    'email' => $items['email'],
                    'phone_number' => $items['phone_number'],
                    'date_of_birth' => $items['date_of_birth'],
                    'account_type' => $items['account_type'],
                    'account_balance' => $items['account_balance'],
                    'date_created' => $items['date_created'],
                    'date_modified' => $items['date_modified'],
                    'status' => $items['status'],
                    'is_move' => $items['is_move']
                ];
    
                // Lakukan insert ke PostgreSQL
                $insertedId = $model->insertUser($added);
    
                if ($insertedId) {
                    echo "Data berhasil dimasukkan dengan ID: " . $items['user_id'] . "<br>";
                    
                    // Setelah berhasil dimasukkan, update nilai is_move
                    $model2->updateIsMove($items['user_id'], 1);
                } else {
                    echo "Gagal memasukkan data.<br>";
                }
            }
        }
    
    

    public function create()
    {
        return view('users/create');
    }

    // Contoh penggunaan dalam controller

    public function store()
    {
        $model = new UsersModel();
        $data = [
            'user_id' => $this->request->getPost('user_id'),
            'kode_user' => $this->request->getPost('kode_user'),
            'hak' => $this->request->getPost('hak'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'created_at' => date('Y-m-d H:i:s'), // Diisi dengan waktu saat ini
        ];
        // Lakukan penyisipan data
        if ($model->insert($data)) {
            // Jika penyisipan berhasil, tampilkan pesan sukses atau lakukan tindakan lain
            return redirect()->to('/users')->with('success', 'Data pengguna berhasil disimpan.');
        } else {
            // Jika penyisipan gagal, tampilkan pesan error atau lakukan tindakan lain
            return redirect()->to('/users')->with('error', 'Gagal menyimpan data pengguna.');
        }
    }

    public function edit($id)
    {
        $model = new UsersModel();
        $user = $model->find($id);
        if (!$user) {
            return "Data not found";
        }
        return view('users/edit', ['user' => $user]);
    }

public function update()
{
    $model = new UsersModel();
    $id = $this->request->getPost('member_id');
    $data = [
        'user_id' => $this->request->getPost('user_id'),
        'kode_user' => $this->request->getPost('kode_user'),
        'hak' => $this->request->getPost('hak'),
        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'created_at' => date('Y-m-d H:i:s'), // Diisi dengan waktu saat ini
    ];
    $model->update($id, $data);
    return redirect()->to('/users');
}


public function delete($id = null)
{
    // Pastikan ID tidak kosong
    if ($id === null) {
        return redirect()->to('/users'); // Atau arahkan ke halaman lain jika tidak ada ID
    }

    $model = new UsersModel();

    // Lakukan penghapusan data
    if ($model->delete($id)) {
        // Jika penghapusan berhasil, arahkan kembali ke halaman daftar pengguna
        return redirect()->to('/users')->with('success', 'Data pengguna berhasil dihapus.');
    } else {
        // Jika terjadi kesalahan penghapusan, arahkan kembali dengan pesan error
        return redirect()->to('/users')->with('error', 'Gagal menghapus data pengguna.');
    }
}

}
