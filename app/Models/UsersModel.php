<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table            = 'clients';
    protected $primaryKey       = 'user_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['user_id', 'username', 'password', 'full_name', 'email', 'phone_number', 'address', 'date_of_birth', 'account_type', 'account_balance', 'date_created', 'date_modified', 'status', 'is_move'];
    // protected $useTimestamps = true;

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    
    public function getUserById($userId)
    {
        return $this->where('user_id', $userId)->first();
    }
    public function updateUserData($userId, $data)
    {
        return $this->where('user_id', $userId)->update($data);
    }

    public function insertUser($data)
    {
        $startTime = microtime(true);
        $insertedId = $this->insert($data);
        $endTime = microtime(true); 
        $executionTime = $endTime - $startTime; 
        echo "Waktu eksekusi insert: " . number_format($executionTime, 4) . " detik<br>";

        return $insertedId;
    }
}
