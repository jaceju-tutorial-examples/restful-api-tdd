<?php

namespace App\Http\Controllers;

use App\Fruit;
use App\Transformers\FruitsTransformer;
use Dingo\Api\Routing\Helpers;

class FruitsController extends Controller
{
    use Helpers;

    public function index()
    {
        $fruits = Fruit::all();

        return $this->collection($fruits, new FruitsTransformer);
    }

    public function show($id)
    {
        $fruit = Fruit::find($id);

        if ($fruit) {
            return $this->item($fruit, new FruitsTransformer);
        }

        return $this->response->errorNotFound();
    }
}
