<?php

namespace App\Services\File;

use App\Repositories\File\FileRepository;
use App\Services\Service;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class FileService extends Service
{
    public function __construct(FileRepository $fileRepository)
    {
        $this->repository = $fileRepository;
    }

    public function storeFile($data, $path, $object_id, $object_type)
    {
        $files = request('files');
        $file = request('file');
        if (request()->hasFile('files')) {
            $data['object_id'] = $object_id;
            $data['object_type'] = $object_type;
            foreach ($files as $key => $item) {
                $name = time() . '_' . $key;
                $file = $name . '.' . $item->extension();
                $data['thumbnail_path'] = $name . '_thumbnail.' . $item->extension();
                $item->move(storage_path() . $path, $file);
                Image::make(storage_path($path . $file))->resize(300, 200)->save(storage_path($path . $data['thumbnail_path']));
                $data['full_size_path'] = $file;
                $data['original_name'] = $item->getClientOriginalName();
                $this->store($data);
            }

        }

        if (request()->hasFile('file')){
            $data['object_id'] = $object_id;
            $data['object_type'] = $object_type;
            $name = time();
            $file_name = $name . '.' . $file->extension();
            $data['thumbnail_path'] = $name . '_thumbnail.' . $file->extension();
            $file->move(storage_path() . $path, $file_name);
            Image::make(storage_path($path . $file_name))->resize(300, 200)->save(storage_path($path . $data['thumbnail_path']));
            $data['full_size_path'] = $file_name;
            $data['original_name'] = $file->getClientOriginalName();
            $this->store($data);
        }

    }


}
