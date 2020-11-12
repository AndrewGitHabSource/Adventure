<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Repository;


class AdminController extends Controller
{
    public function imageEditorUpload(Request $request)
    {
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();

        if ($fileName) {
            if ($request->file('file')->isValid()) {
                $name = md5(rand(100, 200));
                $extension = $request->file('file')->getClientOriginalExtension();
                $filename = $name . '.' . $extension;
                $destination = public_path("assets/upload");

                $request->file('file')->move($destination, $filename);

                echo asset('assets/upload/') . '/' . $filename;
            } else {
                echo $message = 'Ooops!  Your upload triggered the following error:  ' . $_FILES['file']['error'];
            }
        }
    }

    public function selectCountry(Request $request){
        $countryRepository = new Repository('App\Models\Country');
        $countryId = $countryRepository->where('name', '=', $request->value)[0]->id;

        $cityRepository = new Repository('App\Models\City');
        $cities = $cityRepository->where('country_id', '=', $countryId);

        return response()->json(array('result' => $cities), 200);
    }
}
