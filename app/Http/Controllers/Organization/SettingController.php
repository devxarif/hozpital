<?php

namespace App\Http\Controllers\Organization;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Traits\HasSubscription;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    use HasSubscription;

    public function general()
    {
        // $data['organization'] = currentOrganization();
        // $data['user'] = auth()->user();
        // $data['workingdays'] = $data['organization']->workingDays;
        // $data['theme'] = $data['organization']->theme;
        // $data['countries'] = Country::all(['id', 'name']);

        return inertia('Organization/Setting/Index');
    }

    public function theme()
    {
        $theme = currentOrganization()->theme;

        return inertia('Organization/Setting/Theme', [
            'theme' => $theme,
        ]);
    }

    public function generalSetting(Request $request)
    {
        $organization = currentOrganization();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => "required|string|email|max:255|unique:companies,organization_email, $organization->id",
        ]);

        $data['organization_name'] = $request->name;
        $data['organization_email'] = $request->email;

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $request->validate([
                'avatar' => ['image', 'mimes:jpeg,png,jpg'],
            ]);
            $url = uploadFileToPublic('avatars', $request->avatar);
            $data['organization_logo'] = $url;
        }

        $organization->update($data);


        session()->flash('success', 'Organization updated successfully!');
        return back();
        return $request;
    }

    public function themeUpdate(Request $request)
    {
        // Check if the user has permission to update theme
        if ($this->checkCustomThemeAccess()) {
            session()->flash('error', __("Upgrade your plan to use this feature"));
            return back();
        }

        $theme = currentOrganization()->theme;

        $theme->update([
            "primary_color" => $request->primary_color ?? $theme->primary_color,
            "hover_color" => $request->hover_color ?? $theme->hover_color,
            "secondary_color" => $request->secondary_color ?? $theme->secondary_color,
            "success_color" => $request->success_color ?? $theme->success_color,
            "info_color" => $request->info_color ?? $theme->info_color,
            "warning_color" => $request->warning_color ?? $theme->warning_color,
            "danger_color" => $request->danger_color ?? $theme->danger_color,
        ]);

        session(['organization_theme' => $theme]);
        session()->flash('success', 'Theme updated successfully.');
        return redirect()->back();
    }

    public function workingdaysUpdate(Request $request)
    {
        $organization = currentOrganization();
        $organization->workingDays()->update([
            "monday" => $request->monday ? true : false,
            "tuesday" => $request->tuesday ? true : false,
            "wednesday" => $request->wednesday ? true : false,
            "thursday" => $request->thursday ? true : false,
            "friday" => $request->friday ? true : false,
            "saturday" => $request->saturday ? true : false,
            "sunday" => $request->sunday ? true : false,
        ]);

        session()->flash('success', 'Working days updated successfully.');
        return back();
    }
}
