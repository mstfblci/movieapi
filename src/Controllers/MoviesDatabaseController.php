<?php

namespace Mediapiar\MovieAPI\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;

use Mediapiar\MovieAPI\MovieAPIService;
use Mediapiar\MovieAPI\Resources\MoviesDatabaseResource;


class MoviesDatabaseController extends Controller
{

    protected MovieAPIService $api;

    public function __construct()
    {
        $this->api = new MovieAPIService(
            config('movieapi.md.base_uri'),
            config('movieapi.md.headers')
        );
    }

    public function search(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => ['required', 'string'],
                'info' => ['nullable', 'string', 'in:base_info,mini_info,image'],
                'year' => ['nullable', 'integer'],
                'page' => ['nullable', 'integer', 'min:1'],
                'startYear' => ['nullable', 'integer'],
                'sort' => ['nullable', 'string'],
                'titleType' => ['nullable', 'string'],
                'limit' => ['nullable', 'integer', 'max:10']
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong, try again later.',
                'errors' => $validator->errors()
            ], 400);
        }


        $request = $this->api->request('GET', Str::replace('{keyword}', $request->name, 'titles/search/keyword/{keyword}'), [
            'query' => Arr::except($validator->validated(), 'name')
        ]);

        if($request['code'] == 200) {
            return response()->json([
                'status' => true,
                'data' => MoviesDatabaseResource::collection($request['content']['results'])
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => $request['message']
        ], 400); 
    }
}