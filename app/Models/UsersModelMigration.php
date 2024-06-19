<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModelMigration extends Model
{
    
    protected $DBGroup = 'maysql'; 
    protected $table          = 'users';
    protected $primaryKey       = 'user_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['user_id', 'kode_user', 'hak', 'password', 'old_password'];
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


    public function getUsersByIsMove($isMove = 0, $limit = 10)
    {
        return $this->where('is_move', $isMove)
                    ->findAll($limit);
    }
    
    public function updateIsMove($userId, $isMoveValue)
    {
        $builder = $this->db->table($this->table);
        $builder->where('user_id', $userId); // Filter berdasarkan user_id
        $builder->update(['is_move' => $isMoveValue]); // Update nilai is_move
    }
    public function insertUser($data)
    {
        return $this->insert($data);
    }
}
