<?php

namespace App\Services\Api\V1;

use App\Repositories\Api\V1\BrandRepository;

class BrandService {

    private $brandRepository;

    public function __construct(
        BrandRepository $brandRepository
    ) {
        $this->brandRepository = $brandRepository;
    }

    public function getBrands($request)
    {
        $columns = ['brands.id', 'brands.name', 'brands.description'];
        $subCategoryId = $request->get('sub_category_id');
        $brands = $this->brandRepository->scopeQuery(function($query) use ($subCategoryId) {
            return $query->join('sub_category_brands', 'sub_category_brands.brand_id', '=', 'brands.id')
                        ->where('sub_category_brands.sub_category_id', $subCategoryId);
        })->all($columns);
        return $brands;
    }
}
