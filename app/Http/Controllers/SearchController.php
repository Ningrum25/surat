<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Letter;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->search;

        $letters = Letter::query()

            ->when($search, function ($query) use ($search) {
                $query->where('reference_number', 'like', "%{$search}%")
                    ->orWhere('from', 'like', "%{$search}%")
                    ->orWhere('to', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            })

            ->latest()
            ->paginate(10);

        return view('pages.search.index', [
            'letters' => $letters,
            'search' => $search
        ]);
    }
}
