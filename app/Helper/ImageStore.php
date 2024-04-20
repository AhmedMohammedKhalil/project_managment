<?php

namespace App\Helper;

use Illuminate\Support\Facades\File;


class ImageStore{



    public static function store($distination,$image,$image_name) {
        $dir = public_path($distination);
            if(file_exists($dir)){
                File::deleteDirectory($dir);
            }
            else
                mkdir($dir);
            $image->storeAs($distination,$image_name);

    }


}
