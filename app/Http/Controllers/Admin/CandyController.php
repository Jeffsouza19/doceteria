<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CandyRequest;
use App\Http\Resources\CandyResource;
use App\Services\CandyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


/**
 * @group Candy Managent
 *
 * APIs to manage the candy resource
 */

class CandyController extends Controller
{
    /**
     * Display a listing of candies.
     *
     * Get a list of candies.
     *
     * @queryParam per_page int Size per page. Defaults to 15.
     * @queryParam page int Page to view.
     *
     */
    public function index(CandyService $srv_candy, Request $request)
    {
        $per_page = $request->only('per_page') ?: '';
        $per_page = isset($per_page['per_page'])? $per_page['per_page'] :'';
        $candies = $srv_candy->getAll($per_page);


        return CandyResource::collection($candies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * Só um teste qualquer
     *
     * @bodyParam candy_name string required
     * @bodyParam amount int required
     */
    public function store(CandyRequest $request, CandyService $srv_candy)
    {
        $candy = $srv_candy->store($request->only('candy_name', 'amount'));

        return new CandyResource($candy);
    }

    /**
     * Display the specified Candy.
     *
     * @urlParam id int required Candy ID
     * @apiResource App\Http\Resources\CandyResource
     * @apiResourceModel App\Models\Candy
     *
     * @return CandyResource
     */
    public function show(string $id, CandyService $srv_candy)
    {
        $candy = $srv_candy->getOne($id);

        if(!$candy){
            return new JsonResponse(['error' => 'Produto não cadastrado'], 200);
        }

        return new CandyResource($candy);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CandyRequest $request, string $id, CandyService $srv_candy)
    {
        $candy = $srv_candy->update($id, $request->all());

        return new CandyResource($candy);
    }

    /**
     * Remove the specified resource from storage.
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(string $id, CandyService $srv_candy)
    {
        $srv_candy->destroy($id);

        return new JsonResponse(['success' => 'sucessssso'], 200);
    }
}
