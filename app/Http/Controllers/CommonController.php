<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Room;
use App\Restaurant;
use App\Place;


class CommonController extends Controller
{
    public function sendRating(Request $request)
    {
        switch ($request->model){
            case 'hotel':
                $model = Hotel::bySlug($request->id_model);
                break;
            case 'room':
                $model = Room::bySlug($request->id_model);
                break;
            case 'restaurant':
                $model = Restaurant::bySlug($request->id_model);
                break;
            case 'place':
                $model = Place::bySlug($request->id_model);
                break;
        }

        $input = $request->except('id_model');
        $input['ip'] = $request->ip();

        $model->ratings()->create($input);

        $model->rating = round($model->ratings()->sum('rating_value') / $model->ratings()->count());
        $model->save();

        return redirect()->back()->with('success_message', 'Your rating has been sent!');
    }
}
