<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\CandyResource;
use App\Services\CandyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CandyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CandyService $srv_candy, Request $request)
    {
        $per_page = $request->only('per_page') ?: '';
        $per_page = isset($per_page['per_page'])? $per_page['per_page'] :'';
        $candies = $srv_candy->getAll($per_page);

        if(!$candies){
            return new JsonResponse(['data' => 'Não existe doces cadastrados'], 200);
        }

        return CandyResource::collection($candies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, CandyService $srv_candy)
    {
        $candy = $srv_candy->store($request->only('candy_name', 'amount'));

        return new CandyResource($candy);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, CandyService $srv_candy)
    {
        $candy = $srv_candy->getOne($id);
        return new CandyResource($candy);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, CandyService $srv_candy)
    {
        $srv_candy->update($id, $request->all());

        $candy = $srv_candy->getOne($id);

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
