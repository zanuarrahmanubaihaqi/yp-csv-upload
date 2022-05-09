<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class FileManage extends Model
{
    protected $table = 'file_manage';
    protected $fillable = ['file_name', 'status', 'created_at', 'updated_at'];

    public static function getData()
    {
        $data = DB::table('file_manage')
                ->select('*')
                ->orderByDesc('updated_at')->get();

        return $data; 
    }

    public static function saveData($data)
    {
        $result = false;
        DB::beginTransaction();
        try {
            if (FileManage::create($data)) {
                $result = true;
            }
            DB::commit();
            return $result;
        } catch (QueryException $e) {
            DB::rollback();
            $get_last_id = FileManage::select('id')
                            ->orderByDesc('id')
                            ->first();
            if ($get_last_id != null) {
                $id = $get_last_id->id;
            } else {
                $id = 0;
            }
            $data['id'] = $id + 1;
            self::saveData($data);
            $result = false;
        }
    }
}
