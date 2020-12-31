<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Ramsey\Uuid\Uuid;


trait Uploadable
{

    public function uploadOne($file, $domain, $width = null, $height = null)
    {

        $directory = public_path('assets/uploads/' . $domain);
        if (!File::isDirectory($directory)) {
            File::makeDirectory($directory, 0777, true, true);
        }
        if ($width === null && $height == null) {
            $image = Image::make($file);
        } else {
            $image = Image::make($file)->resize($width, $height);
        }
        $path = Uuid::uuid4()->toString() . '.' . $file->getClientOriginalExtension();
        $image->save($directory . '/' . $path);

        return $path;

    }

}
