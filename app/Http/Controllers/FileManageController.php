<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FileManage;

use DB;

class FileManageController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $datas = FileManage::getData();

        return view('upload.index', compact('datas'));
    }

    public function uploadContent(Request $request)
    {
        $result = false;
        $file = $request->file('csv_file');

        if ($file) {
            $result = $this->fileProcess($file);
        }

        $datas = FileManage::getData();

        // if ($result) {}
        return redirect()->route('file-manage.index');
    }

    public function clearString($file)
    {
        $delimiter = ",";
        $header = null;
        $data = array();
        if (($open = fopen($file, 'r')) !== false)
        {
            while (($row = fgetcsv($open, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    // $data[] = array_combine($header, $row);
                    preg_replace('/[^(\x20-\x7F)]*/','', $row);
            }
            fclose($open);
        }
    }

    public function fileProcess($file)
    {
        /*
        yang harus dilakukan :
            - buat jobs untuk proses pembersihan string
            - gunakan redis untuk antrian jobs nya

        referensi :
            - https://laravel.com/docs/7.x/queues
            - https://proxify.io/articles/laravel-redis#handling-message-queues-in-laravel
            - https://www.php.net/manual/en/function.fgetcsv.php
            - https://docs.laravel-excel.com/3.1/getting-started/ (untuk export atau import file)
        */
        $file_name = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $temp_path = $file->getRealPath();
        $file_size = $file->getSize();
        $location = "uploads";
        $result = false;
        
        /* jadikan jobs */
        $this->clearString($temp_path);
        /* eof jadikan jobs */

        $file_name_condition = ['file_name' => $file_name];
        $check_file_name = FileManage::where($file_name_condition)->get();
        if (!isset($check_file_name[0]->id)) {
            $file->move($location, $file_name);
            $data = [];
            $data['file_name'] = $file_name;
            $data['status'] = "success";
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            
            /* jadikan jobs */
            $result = FileManage::saveData($data);
            /* eof jadikan jobs */
        } else {

            $file_path = public_path($location) . "\\" . $file_name;

            // $row = 1;
            // if (($open = fopen($file_path, "r")) !== FALSE) {
            //     while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
            //         $num = count($data);
            //         $row++;
            //         for ($i = 0; $i < $num; $i++) {
            //             $this->clearString($data[$i]);
            //         }
            //     }
            //     fclose($open);
            // }

            /* jadikan jobs */
            $this->mergeFile($temp_path, $file_path);
            /* eof jadikan jobs */
        }
        
        // return $result;
        return redirect()->route('file-manage.index');
    }

    public function mergeFile($file_upload, $file_uploaded)
    {
        /*
        referensi :
            - https://stackoverflow.com/questions/46723093/merge-multiple-csv-files
        */

        $csvcontent = '';
        $csvcontent .= file_get_contents($file_upload);
        $csvcontent .= file_get_contents($file_uploaded);
        $result = fopen($file_uploaded, 'w');
        fwrite($result, $csvcontent);
        fclose($result);
    }
}
