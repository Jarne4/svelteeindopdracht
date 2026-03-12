<?php

namespace App\Http\Controllers;

use App\Models\Afspraak;
use Illuminate\Http\Request;

class AfspraakController extends Controller
{

    public function index(Request $request)
    {
        $query = Afspraak::query();

        if ($request->naam) {
            $query->where('naam', 'like', "%{$request->naam}%");
        }

        if ($request->datum) {
            $query->where('datum', $request->datum);
        }

        if ($request->dienst) {
            $query->where('dienst', $request->dienst);
        }

        return response()->json($query->get());
    }

    public function store(Request $request)
    {
        $afspraak = Afspraak::create($request->all());
        return response()->json($afspraak);
    }

    public function show($id)
    {
        return Afspraak::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $afspraak = Afspraak::findOrFail($id);
        $afspraak->update($request->all());

        return response()->json($afspraak);
    }

    public function destroy($id)
    {
        Afspraak::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }
}