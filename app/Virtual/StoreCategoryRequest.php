<?php

namespace App\Virtual;

/**
 * @OA\Schema(
 *      title="Store Category request",
 *      description="Store Category request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class StoreCategoryRequest
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the category",
     *      example="Rock"
     * )
     *
     * @var string
     */
    private $nome;
}
