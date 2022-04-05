<?php


namespace App\Services;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class UploadImage
{
    /**
     * @param $file
     * Принимаем файл из формы или url файла
     * Присваифаем имя сохраняем в хранилище и возвращаем название файла
     * @return String fileName
     */

    public static function create ($file): string
    {

        $fileName = time () . '-' . Str::random (4) . '.jpg';
        $image = Image::make ($file);
        $imageFull = $image->resize (1000, null, function ($constraint) {
            //Сохраняем пропорции при сжатии
            $constraint->aspectRatio ();
            //Предотвратить увеличение
            $constraint->upsize ();
        })->encode ('jpg');
        Storage::put ("images/dogs/$fileName", $imageFull, 'public');

        $imageMedium = $image->fit (720, 660, function ($constraint) {
            $constraint->upsize ();
        })->encode ('jpg');
        Storage::put ("images/dogs/medium/$fileName", $imageMedium, 'public');

        $imageThumbnail = $image->fit(330, 186, function ($constraint) {
            $constraint->upsize();
        })->encode('jpg');
        Storage::put("images/dogs/thumbnail/$fileName", $imageThumbnail, 'public');

        return $fileName;
    }

    public static function removeProductImage($imageName)
    {

        Storage::delete([
            "/images/dogs/$imageName",
            "/images/dogs/medium/$imageName",
            "/images/dogs/thumbnails/$imageName",
        ]);
        return true;
    }
}
