<?php

namespace Board\Http\Controllers\Adverts;

use Board\Entity\Adverts\Advert\Advert;
use Board\Http\Controllers\Controller;
use Board\Http\Requests\Adverts\AttributesRequest;
use Board\Http\Requests\Adverts\EditRequest;
use Board\Http\Requests\Adverts\PhotosRequest;
use Board\UseCases\Adverts\AdvertService;
use Board\UseCases\Adverts\FavoriteService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class FavoriteController extends Controller
{
    private $service;

    public function __construct(FavoriteService $service)
    {
        $this->service = $service;
        $this->middleware('auth');
    }

    public function add(Advert $advert)
    {
        try {
            $this->service->add(Auth::id(), $advert->id);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('adverts.show', $advert)->with('success', 'Advert is added to your favorites.');
    }

    public function remove(Advert $advert)
    {
        try {
            $this->service->remove(Auth::id(), $advert->id);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('adverts.show', $advert);
    }
}
