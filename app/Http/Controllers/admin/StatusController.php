<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StatusRequest;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index() {
        return view('admins.statuses.index', [
            'statuses' => Status::all(),
        ]);
    }

    public function create() {
        return view('admins.statuses.create');
    }

    public function store(StatusRequest $request)
    {
        Status::create($request->only(
            ['name']
        ));
        
        return to_route('admin.statuses.index');
    }

    public function destroy(Status $status) {
        if($status->delete()) {
            return back()->with(['message'=>'Товар успешно удален']);
        }

        return back()->withErrors(['error' => 'Возникли ошибки удаления']);
    }

    public function edit(Status $status) {
        return view('admins.statuses.update', [
            'status' => $status,
        ]);
    }

    public function update(StatusRequest $request, Status $status) {
        if($status->update($request->except(['_token']))) {
            return to_route('admin.statuses.index');
        }
        return back();
    }
}