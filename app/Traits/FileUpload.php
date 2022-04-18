<?php

namespace App\Traits;

use App\Services\File\FileService;
use Illuminate\Support\Facades\Storage;
use Nette\FileNotFoundException;

trait FileUpload
{

    protected FileService $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function fileUpload($data, $path)
    {
        $file = request('file');
        if (request()->hasFile('file')) {
            $fileName = time() . '.' . $file->extension();
            Storage::putFileAs($path, $data['file'], $fileName);
            $data['full_size_path'] = $fileName;
            $data['orginal_name'] = $file->getClientOriginalName();
            unset($data['file']);
            $this->fileService->store($data);

        }

        return $data;
    }

    public function filesUpload($data, $path, $object_id, $object_type)
    {
//        $files = request('files');
//dd($files);
//        if (request()->hasFile('files')) {
//            $data['object_id'] = $object_id;
//            $data['object_type'] = $object_type;
//            foreach ($files as $key => $item) {
//                $fileName = time() . '_' . $key . '.' . $item->extension();
//                Storage::putFileAs($path, $data['files'], $fileName);
//                $data['full_size_path'] = $fileName;
//                $data['original_name'] = $item->getClientOriginalName();
//                $this->fileService->store($data);
//            }
//
//        }

        return $data;
    }



}
