<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Virtual\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/ratings",
     *      operationId="getRatingsList",
     *      tags={"Ratings"},
     *      summary="Get list of Ratings",
     *      description="Returns list of Ratings",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       )
     *     )
     */
    public function index()
    {
        $ratings = Rating::all();
        return response()->json($ratings);
    }

    /**
     * @OA\Post(
     *      path="/api/ratings",
     *      operationId="storeRating",
     *      tags={"Ratings"},
     *      summary="Store new rating",
     *      description="Returns rating data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreRatingRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      )
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'comentario' => 'required|max:255',
            'estrelas' => 'required',
            'music_id' => 'required'
        ]);

        $newRating = new Rating([
            'comentario' => $request->get('comentario'),
            'estrelas' => $request->get('estrelas'),
            'music_id' => $request->get('music_id')
        ]);

        $newRating->save();
        return response()->json($newRating);
    }

    /**
     * @OA\Get(
     *      path="/api/ratings/{id}",
     *      operationId="getRating",
     *      tags={"Ratings"},
     *      summary="Get rating information",
     *      description="Returns rating data",
     *      @OA\Parameter(
     *          name="id",
     *          description="rating id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     * )
     */
    public function show($id)
    {
        $rating = Rating::findOrFail($id);
        return response()->json($rating);
    }

    /**
     * @OA\Put(
     *      path="/api/ratings/{id}",
     *      operationId="updateRating",
     *      tags={"Ratings"},
     *      summary="Update existing rating",
     *      description="Returns updated rating data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Rating id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreRatingRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function update(Request $request, $id)
    {
        $rating = Rating::findOrFail($id);

        $request->validate([
            'comentario' => 'required|max:255',
            'estrelas' => 'required',
            'music_id' => 'required'
        ]);

        $rating->comentario = $request->get('comentario');
        $rating->estrelas = $request->get('estrelas');
        $rating->music_id = $request->get('music_id');
        $rating->save();

        return response()->json($rating);
    }

    /**
     * @OA\Delete(
     *      path="/api/ratings/{id}",
     *      operationId="deleteRating",
     *      tags={"Ratings"},
     *      summary="Delete existing rating",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Music id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function destroy($id)
    {
        $rating = Rating::findOrFail($id);
        $rating->delete();

        return response()->json($rating::all());
    }
}
