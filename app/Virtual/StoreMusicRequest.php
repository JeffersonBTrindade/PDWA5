<?php

namespace App\Virtual;

/**
 * @OA\Schema(
 *      title="Store Music request",
 *      description="Store Music request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class StoreMusicRequest
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the Music",
     *      example="Continha"
     * )
     *
     * @var string
     */
    private $nome;

    /**
     * @OA\Property(
     *      title="artist",
     *      description="Creator of the music",
     *      example="Salma e Mac"
     * )
     *
     * @var string
     */
    private $artista;

    /**
     * @OA\Property(
     *      title="description",
     *      description="Description of the music",
     *      example="Single mais recente da dupla"
     * )
     *
     * @var string
     */
    private $descricao;

    /**
     * @OA\Property(
     *      title="category_id",
     *      description="Id of the category of the music",
     *      example="1"
     * )
     *
     * @var string
     */
    private $category_id;
}
