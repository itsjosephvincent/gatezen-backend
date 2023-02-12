<?php

namespace App\Services;

use App\Events\ZohoItemEvent;
use App\Exceptions\Product\InvalidProductSlugException;
use App\Exceptions\Store\InvalidStoreException;
use App\Traits\SortingTraits;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ProductResource;
use App\Interfaces\Repositories\CategoryProductRepositoryInterface;
use App\Interfaces\Repositories\ExternalDataRepositoryInterface;
use App\Interfaces\Services\ProductServiceInterface;
use App\Interfaces\Repositories\ProductRepositoryInterface;
use App\Interfaces\Repositories\StoreRepositoryInterface;
use App\Models\CategoryProduct;
use App\Models\ProductCategory;
use Throwable;

class ProductService implements ProductServiceInterface
{
    use SortingTraits;

    private $externalDataRepository;
    private $productRepository;
    private $zohoAddItem;
    private $categoryProductRepository;
    private $storeRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        ExternalDataRepositoryInterface $externalDataRepository,
        CategoryProductRepositoryInterface $categoryProductRepository,
        StoreRepositoryInterface $storeRepository
    ) {
        $this->productRepository = $productRepository;
        $this->externalDataRepository = $externalDataRepository;
        $this->categoryProductRepository = $categoryProductRepository;
        $this->storeRepository = $storeRepository;
    }

    public function findProducts(object $payload)
    {
        $sortField = $this->sortField($payload, 'name');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $productList = $this->productRepository->findMany($payload, $sortField, $sortOrder);
        return ProductResource::collection($productList);
    }

    public function findStoreProducts($payload, $store)
    {
        $sortField = $this->sortField($payload, 'name');
        $sortOrder = $this->sortOrder($payload, 'asc');

        $store = $this->storeRepository->findOneByStoreUrl($store->url);
        if ($store) {
            $productCategoriesPayload = $payload->product_categories;
            $productCategories = array();
            $categoryProducts = array();
            if ($productCategoriesPayload) {
                $productCategories = ProductCategory::whereIn('name', $payload->product_categories)->pluck('id');
                if (count($productCategories) > 0) {
                    $categoryProducts = CategoryProduct::whereIn('product_category_id', $productCategories)->pluck('product_id');
                }
            }

            $productList = $this->productRepository->findManyByStore($payload, $categoryProducts, $store->store_category_id, $sortField, $sortOrder);
            return ProductResource::collection($productList);
        } else {
            throw new InvalidStoreException();
        }
    }

    public function findProduct($productId)
    {
        $product = $this->productRepository->findOneById($productId);
        return new ProductResource($product);
    }

    public function findProductSlug($slug)
    {
        $product = $this->productRepository->findOneBySlug($slug);

        if ($product) {
            return new ProductResource($product);
        } else {
            throw new InvalidProductSlugException();
        }
    }

    public function createProduct($payload)
    {
        DB::beginTransaction();

        try {
            $saveProduct = $this->productRepository->create($payload);

            $productCategoriesCount = count($payload->product_categories);

            for ($i = 0; $i < $productCategoriesCount; $i++) {
                $this->categoryProductRepository->create($saveProduct->id, $payload->product_categories[$i]);
            }

            ZohoItemEvent::dispatch($saveProduct);

            DB::commit();
            return new ProductResource($saveProduct);
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function updateProduct($payload, $id)
    {
        DB::beginTransaction();

        try {
            $this->productRepository->update($payload, $id);
            $updateProduct = $this->categoryProductRepository->update($id, $payload);
            DB::commit();

            return new ProductResource($updateProduct);
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }
}
