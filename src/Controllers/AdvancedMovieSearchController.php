<?php

namespace Mediapiar\MovieAPI\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;

use Mediapiar\MovieAPI\MovieAPIService;
use Mediapiar\MovieAPI\Resources\AdvancedMovieSearchResource;


class AdvancedMovieSearchController extends Controller
{
    protected MovieAPIService $api;

    public function __construct()
    {
        $this->api = new MovieAPIService(
            config('movieapi.ams.base_uri'),
            config('movieapi.ams.headers')
        );
    }

    public function search(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => ['required', 'string'],
                'page' => ['nullable', 'integer', 'min:1'],
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong, try again later.',
                'errors' => $validator->errors()
            ], 400);
        }


        $request = $this->api->request('GET', 'search/movie', [
            'query' => [
                'query' => $request->name,
                'page' => $request->page
            ]
        ]);

        if($request['code'] == 200) {
            return response()->json([
                'status' => true,
                'data' => AdvancedMovieSearchResource::collection($request['content']['results'])
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => $request['message']
        ], 400); 

    }
}