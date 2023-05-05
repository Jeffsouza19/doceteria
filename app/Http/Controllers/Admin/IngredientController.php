<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\IngredientRequest;
use App\Http\Resources\IngredientResource;
use App\Services\IngredientService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;



/**
 * @group Ingredient Managent
 *
 * APIs to manage the Ingredient resource
 */

class IngredientController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     *
     * Get a list of ingredients.
     *
     * @queryParam per_page int Size per page. Defaults to 15.
     * @queryParam page int Page to view.
     */
    public function index(IngredientService $srv_ingr, Request $request)
    {
        $per_page = $request->only('per_page') ?: '';
        $per_page = isset($per_page['per_page'])? $per_page['per_page'] :'';
        $ingredients = $srv_ingr->getAll($per_page);

        return IngredientResource::collection($ingredients);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IngredientService $srv_ingr, IngredientRequest $request)
    {
        $ingredient = $srv_ingr->store($request->only('ing_name', 'amount', 'cost'));
        return new IngredientResource($ingredient);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, IngredientService $srv_ingr)
    {
        $ingredient = $srv_ingr->getOne($id);
        if(!$ingredient){
            return new JsonResponse(['error' => 'Produto não cadastrado'], 200);
        }
        return new IngredientResource($ingredient);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IngredientRequest $request, string $id, IngredientService $srv_ingr)
    {
        $ingredient = $srv_ingr->update($id ,$request->all());

        return new IngredientResource($ingredient);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, IngredientService $srv_ingr)
    {
        $srv_ingr->destroy($id);

        return new JsonResponse(['success' => 'Ação realizada com sucesso']);
    }
}
