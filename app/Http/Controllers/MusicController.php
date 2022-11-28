<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Virtual\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/musics",
     *      operationId="getMusicsList",
     *      tags={"Musics"},
     *      summary="Get list of Musics",
     *      description="Returns list of Musics",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       )
     *     )
     */
    public function index()
    {
        $musics = Music::all();
        return response()->json($musics);
    }

    /**
     * @OA\Post(
     *      path="/api/musics",
     *      operationId="storeMusic",
     *      tags={"Musics"},
     *      summary="Store new music",
     *      description="Returns music data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreMusicRequest")
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
            'nome' => 'required|max:255',
            'artista' => 'required|max:255',
            'descricao' => 'max:255',
            'category_id' => 'required|exists:categories,id'
        ]);

        $newMusic = new Music([
            'nome' => $request->get('nome'),
            'artista' => $request->get('artista'),
            'descricao' => $request->get('descricao'),
            'category_id' => $request->get('category_id')
        ]);

        $newMusic->save();
        return response()->json($newMusic);
    }

    /**
     * @OA\Get(
     *      path="/api/musics/{id}",
     *      operationId="getMusic",
     *      tags={"Musics"},
     *      summary="Get music information",
     *      description="Returns music data",
     *      @OA\Parameter(
     *          name="id",
     *          description="music id",
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
        $music = Music::findOrFail($id);
        return response()->json($music);
    }

    /**
     * @OA\Put(
     *      path="/api/musics/{id}",
     *      operationId="updateMusic",
     *      tags={"Musics"},
     *      summary="Update existing music",
     *      description="Returns updated music data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Music id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreMusicRequest")
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
        $music = Music::findOrFail($id);

        $request->validate([
            'nome' => 'required|max:255',
            'artista' => 'required|max:255',
            'descricao' => 'max:255',
            'category_id' => 'required|exists:categories,id'
        ]);

        $music->nome = $request->get('nome');
        $music->artista = $request->get('artista');
        $music->descricao = $request->get('descricao');
        $music->category_id = $request->get('category_id');
        $music->save();

        return response()->json($music);
    }

    /**
     * @OA\Delete(
     *      path="/api/musics/{id}",
     *      operationId="deleteMusic",
     *      tags={"Musics"},
     *      summary="Delete existing music",
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
        $music = Music::findOrFail($id);
        $music->delete();

        return response()->json($music::all());
    }
}
