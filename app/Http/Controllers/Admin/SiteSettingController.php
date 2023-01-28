<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiteRequest;
use App\Models\SiteSetting;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return view('admin.site.index', [
            'sites' => SiteSetting::latest()->get()
        ]);
    }

    public function create()
    {
        return view('admin.site.create');
    }

    public function store(SiteRequest $request)
    {
        $site = SiteSetting::create($request->except('_token', 'image'));

        if ($request->hasFile('image')) {

            $this->fileUpload($site, 'image', 'site-image', false);
        }
        return redirect()->route('sites.index')->with('success', 'site Created Successfully!');
    }

    public function edit(SiteSetting $site)
    {
        return view('admin.site.edit', [
            'site' => $site,
        ]);
    }


    public function update(Request $request, SiteSetting $site)
    {

        $site->update($request->except('_token', 'image', 'tag_id'));

        if ($request->hasFile('image')) {
            if (!is_null($site->image)) {

                $this->fileUpload($site, 'image', 'site-image', true);
            }
            $this->fileUpload($site, 'image', 'site-image', false);
        }
        return redirect()->route('sites.index')->with('info', 'site Updated Successfully!');
    }

    public function destroy(SiteSetting $site)
    {

        if ($site->image) {
            Storage::delete('public/site-image/' . $site->image);
        }
        $site->delete();

        return redirect()->route('sites.index')->with('error', 'site Deleted Successfully!');
    }
}
