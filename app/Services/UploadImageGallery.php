<?php


namespace App\Services;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class UploadImageGallery
{
    /**
     * @param $file
     * Принимаем файл из формы или url файла
     * Присваифаем имя сохраняем в хранилище и возвращаем название файла
     * @return String fileName
     */

    public static function create ($file): string
    {

        $galleryName = time () . '-' . Str::random (4) . '.jpg';
        $image = Image::make ($file);

        $imageMedium = $image->fit (720, 660, function ($constraint) {
            $constraint->upsize ();
        })->encode ('jpg');
        Storage::put ("images/dogs/slider/$galleryName", $imageMedium, 'public');

        return $galleryName;
    }

    public static function removeProductImage ($imageName)
    {
        Storage::delete ([

            "/images/dogs/slider/$imageName",

        ]);
        return true;
    }
}
