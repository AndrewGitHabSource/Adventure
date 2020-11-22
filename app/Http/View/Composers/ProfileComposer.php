<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

class ProfileComposer
{
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }

    public function compose(View $view)
    {
        $view->with('user', $this->user);
    }
}