<?php

namespace App\Controllers;

use App\Models\UsersModelMigration;
use App\Models\UsersModel;
use CodeIgniter\Controller;

class Users extends Controller
{
    public function index()
    {
        $model2 = new UsersModelMigration(); // Model untuk MySQL
        $data['users'] = $model2->getUsersByIsMove(0, 10); // Ambil data dari MySQL
        $this->processed();
        return view('users/index', $data);
    }

    public function processed() {
        echo "asd";
    }
    
    public function process_inserts()
    {
        if ($this->request->getMethod() === 'post') {
            $model = new UsersModel(); // Model untuk PostgreSQL
            $model2 = new UsersModelMigration(); // Model untuk MySQL

            $data['users2'] = $model2->getUsersByIsMove(0, 1);

            foreach ($data['users2'] as $items) {
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

                $insertedId = $model->insertUser($added);

                if ($insertedId) {
                    echo "Data berhasil dimasukkan dengan ID: " . $insertedId . "<br>";
                    $model2->updateIsMove($items['user_id'], 1);
                } else {
                    echo "Gagal memasukkan data.<br>";
                }
            }

            // Ambil data lagi setelah proses insert selesai
            $data['users'] = $model2->getUsersByIsMove(0, 10);

            // Tampilkan kembali halaman index dengan data terbaru
            return view('users/index', $data);
        } else {
            // Jika bukan POST request, redirect ke halaman index tanpa melakukan proses insert
            return redirect()->to(site_url('users/index'));
        }
    }
}
