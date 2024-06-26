<?php

namespace App\Domain\Microsites\ViewModels;

use App\Domain\Microsites\Models\Category;
use App\Domain\Microsites\Models\Microsite;

class CreateViewModel extends \App\Support\ViewModels\ViewModel
{
    public function __construct()
    {
        parent::__construct(new Microsite());
    }

    public function toArray(): array
    {
        return [

            'categories' => Category::where('status', '1')->get(),
        ];
    }
}
