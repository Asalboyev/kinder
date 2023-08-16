<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::query()->get();
        return view('admin.groups.index',compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_uz' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
            'age' => 'required',
            'students' => 'required',
        ]);
        $requestData = $request->all();

        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $image_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move('site/images/groups', $image_name);
            $requestData['images'] = $image_name;
        }

        Group::create($requestData);
        return redirect()->route('admin.groups.index')->with('success', 'Group created succuessfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        return view('admin.groups.show',compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        return view('admin.groups.edit',compact('group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        $request->validate([

            'title_uz' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
            'age' => 'required',
            'students' => 'required',
        ]);
        $requestData = $request->all();
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $image_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move('site/images/posts', $image_name);
            // Eski rasimni o'chirib yuborish
            $old_image_name = $group->images;
            if ($old_image_name) {
                $old_image_path = 'site/images/groups/' . $old_image_name;
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            }
            // Yangi rasimni qo'shish
            $requestData['images'] = $image_name;
        } else {
            // Agar yangi rasim qo'shilmagan bo'lsa, eski rasimni qaytarib olamiz
            $requestData['images'] = $group->images;
        }

        $group->update($requestData);
        return redirect()->route('admin.groups.index')->with('success', 'Group updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $group = Group::findOrFail($id);
        $status = @unlink(public_path('site/images/groups/' . $group->images));
        if (!$status) {
            return redirect()->route('admin.groups.index')->with($group->images);
        }


        // Delete the Advantag item
        $group->delete();

        return redirect()->route('admin.groups.index')->with('success', 'Group deleted successfully');
    }
}
