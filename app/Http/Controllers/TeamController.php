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
        $this->validate($request,
            [
                'name' => 'required',
            ]
        );

        $team = Team::create(
            [
                'name' => $request->get('name'),
            ]
        );

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
