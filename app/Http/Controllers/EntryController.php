<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\JsonResponse;
use App\Services\CategoryService;


class EntryController extends Controller
{
    private CategoryService $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        return $this->service->index();
    }

    public function store(StoreCategoryRequest $request): JsonResponse
    {
        return $this->service->store($request->validated());
    }

    public function update(UpdateCategoryRequest $request, Category $category): JsonResponse
    {
        return $this->service->update($request->validated(), $category);
    }

    public function destroy(Category $category): JsonResponse
    {
        return $this->service->destroy($category);
    }
}