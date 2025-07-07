<?php

namespace App\Http\Modules;

use Illuminate\Support\Facades\DB;

class MData
{
    public $id, $pic, $perusahaan;

    public function getAllData()
    {
        $query = "SELECT 
                    id, pic, perusahaan,
                    DATE_FORMAT(created_at, '%d-%m-%Y %H:%i:%s') AS created_at,
                    DATE_FORMAT(updated_at, '%d-%m-%Y %H:%i:%s') AS updated_at
                FROM mdata";
        
        return DB::select($query);
    }

    public function generateUniqueId()
    {
        // Ambil data terakhir yang paling besar angka ID-nya
        $query = "SELECT id FROM mdata 
                WHERE id LIKE 'pkf-%' 
                ORDER BY CAST(SUBSTRING(id, 5) AS UNSIGNED) 
                DESC LIMIT 1";

        $lastData = DB::select($query);

        if (!empty($lastData)) {
            // Ambil object pertama dari array
            $lastId = $lastData[0]->id;
            $lastNumber = (int) str_replace('pkf-', '', $lastId);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }
    
        $newId = 'pkf-' . $newNumber;

        return $newId;
    }

    public function insertData()
    {
        $query = "INSERT INTO mdata 
                (id, pic, perusahaan, created_at, updated_at) 
                VALUES 
                (:id, :pic, :perusahaan, sysdate(), sysdate())";
        
        $exec = DB::insert($query, [
            'id' => $this->id,
            'pic' => $this->pic,
            'perusahaan' => $this->perusahaan,
        ]);

        return $exec;
    }

    public function getDataById($id)
    {
        $query = "SELECT * FROM mdata WHERE id = :id LIMIT 1";

        $results = DB::select($query, ['id' => $id]);

        return $results ? $results[0] : null;
    }

    public function updateData()
    {
        $query = "UPDATE mdata SET pic = :pic, perusahaan = :perusahaan, 
                updated_at = sysdate() WHERE id = :id";
                
        $exec = DB::update($query, [
            'id' => $this->id,
            'pic' => $this->pic,
            'perusahaan' => $this->perusahaan,
        ]);

        return $exec;
    }

    public function deleteData($id)
    {
        $query = "DELETE FROM mdata WHERE id = :id";

        $exec = DB::delete($query, [
            'id' => $id
        ]);

        return $exec;
    }
}
