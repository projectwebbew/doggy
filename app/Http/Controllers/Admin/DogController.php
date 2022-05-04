<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DogStoreRequests;
use App\Models\Dog;
use App\Services\UploadImage;
use App\Services\UploadImageGallery;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use PhpParser\JsonDecoder;

class DogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View|Response
     */
    public function index (Request $request)
    {

        $dogs = Dog::query ()
                ->paginate (10);


        return view ('admin.dogs.index', compact ('dogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create ()
    {
        $gender = config ('properties.gender');
        return view ('admin.dogs.create', compact ([
            'gender'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DogStoreRequests $request
     * @return RedirectResponse
     */
    public function store (DogStoreRequests $request): RedirectResponse
    {

         $dog = Dog::create ($request->validated ());

        return redirect ()->route ('dogs.edit', $dog)->with ([
            'status' => 'Dog is Created!',
            'alert' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Dog $dog
     * @return Response
     */
    public function show (Dog $dog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Dog $dog
     * @return Application|Factory|View|Response
     */
    public function edit (Dog $dog)
    {
        $gender = config ('properties.gender');
        return view ('admin.dogs.edit', compact (['dog', 'gender']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Dog $dog
     * @return RedirectResponse
     */
    public function update (Request $request, Dog $dog): RedirectResponse
    {

        $this->validate ($request, [
            'name' => ['string', 'max:191', 'required'],
            'gender' => ['string', 'max:191', 'required'],
            'months' => ['string', 'max:191', 'required'],
            'weight' => ['string', 'max:191', 'required'],
            'price' => ['string', 'max:191', 'required'],
            'image' => ['string', 'max:191', 'nullable'],
            'inputfile' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1000'],
            'gallery' => ['nullable']
        ]);

        if ($request->file ('gallery')) {
            $gallery = UploadImageGallery::create ($request->file ('gallery'));
            $getGallery = DB::table ('dogs')->where ('id', '=', $dog->id)->get ();
            $arraydog = json_decode ($getGallery[ 0 ]->gallery);
            $arraydog[] = $gallery;
        } else {
            $arraydog = $dog->gallery;
        };
        if ($request->file ('inputfile')) {
            $photoArray = json_decode ($dog->gallery);
            $fileName = UploadImage::create ($request->file ('inputfile'));
            $arraydog = $photoArray;
        } else {
            $fileName = $request->image;
        };
        $dog->update ([
            'name' => $request->name,
            'months' => $request->months,
            'price' => $request->price,
            'gender' => $request->gender,
            'weight' => $request->weight,
            'image' => $fileName,
            'gallery' => $arraydog
        ]);


        return redirect ()->route ('dogs.edit', [
            'dog' => $dog->id,
        ])->with ([
            'status' => 'Data was updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Dog $dog
     * @return RedirectResponse
     */
    public function destroy (Dog $dog): RedirectResponse
    {

        UploadImage::removeProductImage ($dog->image);
        $dog->delete ();
        return redirect ()->route ('dogs')
            ->with ([
                'status' => __ ('Dog deleted.')
            ]);
    }

    public function removeImg (Request $request, Dog $dog)
    {
        $removeImg = UploadImage::removeProductImage ($request->image);
        $dog->image = null;
        $dog->save ();
        return redirect ()->route ('dogs.edit', [
            'dog' => $dog->id
        ])->with ([
            'status' => __ ('Image has been removed successfully.')
        ]);
    }

    public function sliderRemove (Request $request, Dog $dog): RedirectResponse
    {

        $photoDelete = json_decode ($dog->gallery);
        $indexDog = intval ($request->photoId);
        $removeImg = UploadImageGallery::removeProductImage ($photoDelete[ $indexDog ]);
        unset($photoDelete[ $indexDog ]);
        $newGallary = [];
        foreach ($photoDelete as $key) {
            $newGallary[] = $key;
        }
        $dog->update ([
            'gallery' => $newGallary
        ]);
        return redirect ()->route ('dogs.edit', [
            'dog' => $dog->id
        ])->with ([
            'status' => __ ('Image has been removed successfully.')
        ]);
    }
}
