<?php

namespace App\Services\Api\V1;

use App\Repositories\Api\V1\SubCategoryRepository;

class SubCategoryService {

    private $subCategoryRepository;

    public function __construct(
        SubCategoryRepository $subCategoryRepository
    ) {
        $this->subCategoryRepository = $subCategoryRepository;
    }

    public function getSubCategories($request)
    {
        $columns = ['sub_categories.id', 'sub_categories.name', 'sub_categories.picture'];
        $categoryId = $request->get('category_id');
        $items = $this->subCategoryRepository->scopeQuery(function($query) use ($categoryId) {
            return $query->join('sub_category_relations', 'sub_category_relations.subcategory_id', '=', 'sub_categories.id')
                        ->where('sub_category_relations.category_id', $categoryId);
        })->all($columns);
        return $items;
    }
}
