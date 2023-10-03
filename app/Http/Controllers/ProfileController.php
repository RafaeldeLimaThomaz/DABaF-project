<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProfileRequest;
use App\Http\Requests\FindProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\DeleteProfileRequest;
use App\Models\Profile;



use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Routing\Controller as BaseController;

class ProfileController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function store(CreateProfileRequest $request) {

        $data = $request->validated();
        $profile = Profile::create($data);

        return response()->json(['message' => 'Profile creation was successful'], 200);
    }

    public function find(FindProfileRequest $request) {
        
    }

    public function update(UpdateProfileRequest $request) {
        
    }

    public function destroy(DeleteProfileRequest $request, int $profileId) {
        
    }
}
