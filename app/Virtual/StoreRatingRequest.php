<?php

namespace App\Virtual;

/**
 * @OA\Schema(
 *      title="Store Rating request",
 *      description="Store rating request body data",
 *      type="object",
 *      required={"comment"}
 * )
 */
class StoreRatingRequest
{
    /**
     * @OA\Property(
     *      title="coment",
     *      description="Coment of the rating",
     *      example="Muito Bom!"
     * )
     *
     * @var string
     */
    private $comentario;

    /**
     * @OA\Property(
     *      title="stars",
     *      description="amount of stars for the music",
     *      example="5"
     * )
     *
     * @var string
     */
    private $estrelas;

    /**
     * @OA\Property(
     *      title="music_id",
     *      description="Id of the related music",
     *      example="1"
     * )
     *
     * @var string
     */
    private $music_id;
}
