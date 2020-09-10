<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Http\Requests\Subscribe;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\Restaurant;
use App\Models\Place;


class CommonController extends Controller
{
    public function sendRating(Request $request)
    {
        $model = $request->model::bySlug($request->id_model);

        $input = $request->except('id_model');
        $input['ip'] = $request->ip();

        $model->ratings()->create($input);

        $model->rating = round($model->ratings()->sum('rating_value') / $model->ratings()->count());
        $model->save();

        return redirect()->back()->with('success_message', 'Your rating has been sent!');
    }

    public function subscribe(Subscribe $request){
        $input = $request->except('_token');

        $subscriber = Subscriber::create($input);

        return redirect()->back()->with('success_message', 'Your rating has been sent!');
    }
}
