<?php

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
function create_image($file, $type, $filename){
    $image = Image::make($file);
    $imageConfig = config('image');
    $imageType = $imageConfig[$type];

    if(is_null($imageType)) throw new \Exception('Image path not found');

    $imagePath = $imageType['path'];
    File::Exists($imagePath) or File::makeDirectory($imagePath);
    $file = $image->orientate()->resize($imageConfig['max_width'], null, function($constraint){
        $constraint->aspectRatio();
    })->save($imagePath.$filename, 100);
    

    return $imagePath;
}

function delete_img($type,$filename){
    $imageConfig = config('image');
    $imageType = $imageConfig[$type];

    if(is_null($imageType)) throw new \Exception('Image path not found');

    $imagePath = $imageType['path'];

    @unlink($imagePath.$filename);
    return true;
}
