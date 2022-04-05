<?php


namespace App\Http\Requests;
use App\Services\UploadImage;
use Illuminate\Foundation\Http\FormRequest;

class DogStoreRequests extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:191'],
            'gender' => ['string', 'max:191', 'required'],
            'months' => ['string', 'max:191', 'required'],
            'weight' => ['string', 'max:191', 'required'],
            'price' => ['string', 'max:191', 'required'],
            'image' => ['nullable', 'string', 'max:191'],
            'inputfile' => ['nullable', 'mimes:jpg,png,jpeg', 'max:1000'],
            'gallery' => ['nullable']

        ];
    }

    public function validated(): array
    {

        $data = parent::validated();

        if (!empty($data['inputfile'])) {
            $data['image'] = UploadImage::create($data['inputfile']);
        }
        return $data;
    }


}
