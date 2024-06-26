<?php

namespace App\Http\Controllers\Web\Microsite;

use App\Domain\Users\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\User\UpdateUserPostRequest;
use Inertia\Inertia;

class MicrositeController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Microsite/List');
    }

    public function create(): \Inertia\Response
    {
        return Inertia::render('Microsite/Create', new CreateViewModel);
    }

}
