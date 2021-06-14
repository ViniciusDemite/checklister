<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChecklistGroupRequest;
use App\Models\ChecklistGroup;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ChecklistGroupController extends Controller
{
    public function create(): View
    {
        return view('admin.checklist_group.create');
    }

    public function store(StoreChecklistGroupRequest $request): RedirectResponse
    {
        ChecklistGroup::create($request->validated());

        return redirect()->route('home');
    }

    public function edit(ChecklistGroup $checklistGroup): View
    {
        return view('admin.checklist_group.edit', compact('checklistGroup'));
    }

    public function update(StoreChecklistGroupRequest $request, ChecklistGroup $checklistGroup): RedirectResponse
    {
        $checklistGroup->update($request->validated());

        return redirect()->route('home');
    }

    public function destroy(ChecklistGroup $checklistGroup): RedirectResponse
    {
        $checklistGroup->delete();

        return redirect()->route('home');
    }
}
