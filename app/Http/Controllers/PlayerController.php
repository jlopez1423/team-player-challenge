<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;
use Illuminate\Database\Query\Builder;

class PlayerController extends Controller
{
    public function create(Request $request)
    {

        try {
            $this->validate($request,
                [
                    'first_name' => 'required',
                    'last_name'  => 'required',
                    'team_id'    => 'required|exists:teams,id',
                ]
            );
        } catch (\Exception $e) {
            return new JsonResponse($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        $player = Player::create($request->all());
        return new JsonResponse($player, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        try {
            $this->validate($request,
                [
                    'first_name' => 'required',
                    'last_name'  => 'required',
                    'team_id'    => 'required|exists:teams,id',
                ]
            );
        } catch (\Exception $e) {
            return new JsonResponse($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        $player = Player::findOrFail($id);
        $player->update($request->all());

        return new JsonResponse($player, Response::HTTP_CREATED);
    }
}
