<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class AgentAgencyController extends Controller
{
    public function agentList()
    {

        $data['informations'] = User::with('profile')
            ->has('profile')
            ->where('role', 'agent')
            ->paginate(20);

        return view('front-new.agent-list', $data);
    }

    public function agentDetail($id)
    {
        $data['information'] =$information= User::with('profile')
        ->has('profile')
        ->where('role', 'agent')
        ->where('email',$id)
        ->firstOrfail();

        $data['properties'] = Property::where('user_id',$information->id)
                                ->where('status',1)
                                ->orderBy('id','DESC')
                                ->paginate(20);

    return view('front-new.agent-detail', $data);
    }

    public function agencyList(Request $request)
    {

        $keyword = $request->keyword;

        $informations = User::with('profile')
            ->has('profile');

            if ($keyword) {
                $informations->where(function ($query) use ($keyword) {
                    $query->where('name', 'like', '%' . $keyword . '%')
                        ->orWhere('email', 'like', '%' . $keyword . '%');


                });
            }

        $data['informations'] =$informations    ->where('role', 'agency')
            ->paginate(20);

        return view('front-new.agency-list', $data);
    }

    public function agencyDetail($id)
    {
        $data['information'] = User::with('profile')
        ->has('profile')
        ->where('role', 'agency')
        ->where('email',$id)
        ->firstOrfail();

    return view('front-new.agency-detail', $data);
    }
}
