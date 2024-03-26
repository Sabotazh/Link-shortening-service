<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class LinkController extends Controller
{

    public function index(): View
    {
        return view('links.index');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $input = $request->validated();
        $input['short_link'] = Str::random(8);
        $input['lifetime'] = Carbon::now('Europe/Kyiv')->addHours(intval($input['lifetime']));

        $link = Link::query()->create($input);

        return to_route('links.show', $link);
    }

    public function show(Link $link): View
    {
        return view('links.show', compact('link'));
    }

    public function update(UpdateRequest $request, Link $link): RedirectResponse
    {
        $queryLink = Link::query()->where(['short_link' => $request->validated()['short_link']])->first();

        $queryLink->update([
            'clicked_link' => $queryLink->clicked_link + 1
        ]);

        return ($queryLink->clicked_link <= (0 === $queryLink->restrictions
                ? $queryLink->clicked_link + 2
                : $queryLink->restrictions))
                && ($queryLink->lifetime > Carbon::now('Europe/Kyiv'))
                    ? redirect()->away($queryLink->url)
                    : abort(404);
    }
}
