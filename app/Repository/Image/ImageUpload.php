<?php

namespace App\Repository\Image;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait ImageUpload
{
    public function ImagesUpload(Request $request, $images)
    {
        $urls = array();

        if ($images) {
            foreach ($images as $image) {
                if ($image->isValid()) {

                    $request->validate([
                        'image' => 'mimes:jpeg,png|max:1014',
                    ]);

                    $fileName = md5(rand(100, 200));

                    $extension = $image->extension();
                    $image->storeAs('/public', $fileName . "." . $extension);
                    $url = Storage::url($fileName . "." . $extension);

                    $urls[] = ['image' => $url];
                }
            }

            return $urls;
        }

        abort(500, 'Could not upload image :(');
    }
}