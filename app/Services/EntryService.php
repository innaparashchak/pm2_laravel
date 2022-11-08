<?php

namespace App\Services;

use App\Http\Resources\EntryResource;
use App\Models\Entry;
use Illuminate\Http\JsonResponse;

class EntryService
{
    public function index()
    {
        return response()->json(EntryResource::collection(Entry::all()));
    }

    public function store(array $entryData): JsonResponse
    {
        $entry = Entry::create([
            'category_id' => $entryData['category_id'],
            'name' => $entryData['name'],
            'comment' => $entryData['comment'],
            'amount' => $entryData['amount'],
        ]);

        return response()->json(['id' => $entry->id]);
    }

    public function update(array $entryData, Entry $entry): JsonResponse
    {
        $entry->category_id = $entryData['category_id'];
        $entry->name = $entryData['name'];
        $entry->comment = $entryData['comment'];
        $entry->amount = $entryData['amount'];

        $entry->save();

        return response()->json($entry);
    }

    public function destroy(Entry $entry): JsonResponse
    {
        return response()->json($entry->delete());
    }
}