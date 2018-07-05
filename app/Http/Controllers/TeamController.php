<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TeamController extends Controller
{
    public function create(Request $request)
    {
        try {
            $this->validate($request,
                [
                    'name' => 'required',
                ]
            );
        } catch (\Exception $e) {
            return new JsonResponse($e->getMessage(), Response::HTTP_BAD_REQUEST);

        }

        $team = Team::create($request->all());

        return new JsonResponse($team, Response::HTTP_CREATED);
    }

    public function show($teamId)
    {
        return response()->json(
            [
                Team::with('players')->find($teamId),
            ]
        );
    }
}
