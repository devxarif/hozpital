<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LanguageCreateRequest;
use App\Http\Requests\Admin\LanguageUpdateRequest;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Stichoza\GoogleTranslate\GoogleTranslate;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        $path = base_path('resources/json/languages.json');
        $langs = json_decode(file_get_contents($path), true);
        $langInfos = collect($langs)->map(function ($lang) {
            return [
                'name' => $lang['name'],
                'code' => $lang['code'],
            ];
        })->sortBy('name')->values()->all();
        $defaultLanguage = Language::where('language_code', config('kodebazar.default_language'))->value('id');
        $countries = json_decode(file_get_contents(base_path('resources/json/country.json')), true);

        return inertia('Admin/Setting/Language/Index', [
            'languages' => $languages,
            'countries' => $countries,
            'langInfos' => $langInfos,
            'defaultLanguage' => $defaultLanguage,
        ]);
    }

    public function store(LanguageCreateRequest $request)
    {
        $language = Language::create([
            'name' => $request->name,
            'language_code' => $request->language_code,
            'country_code' => $request->country_code,
            'status' => $request->status ? 1 : 0,
            'force_rtl' => $request->force_rtl ? 1 : 0,
        ]);

        $baseFile = base_path('resources/lang/en.json');
        $fileName = base_path('resources/lang/'.strSlug($request->language_code).'.json');
        copy($baseFile, $fileName);

        session()->flash('success', 'Language added successfully.');

        return back();
        // return redirect()->route('languages.translation.edit', $language->id);
    }

    public function update(LanguageUpdateRequest $request, Language $language)
    {
        $oldFile = $language->language_code.'.json';
        $oldName = base_path('resources/lang/'.$oldFile);
        $newFile = strSlug($request->language_code).'.json';
        $newName = base_path('resources/lang/'.$newFile);

        rename($oldName, $newName);

        $language->update([
            'name' => $request->name,
            'language_code' => $request->language_code,
            'country_code' => $request->country_code,
            'status' => $request->status ? 1 : 0,
            'force_rtl' => $request->force_rtl ? 1 : 0,
        ]);

        session()->flash('success', 'Language updated successfully.');

        return back();
    }

    public function destroy(Language $language)
    {
        if (File::exists(base_path('resources/lang/'.$language->language_code.'.json'))) {
            File::delete(base_path('resources/lang/'.$language->language_code.'.json'));
        }

        $language->delete();

        session()->flash('success', 'Language deleted successfully.');
        return back();
    }

    public function translationEdit(Language $language)
    {
        // return $language;
        $path = base_path('resources/lang/'.$language->language_code.'.json');
        $translations = json_decode(file_get_contents($path), true);

    //    $translations = include lang_path($language->language_code . "/messages.php");

        return inertia('Admin/Setting/Language/Translation', [
            'lang' => $language,
            'translations' => $translations,
        ]);
    }

    public function translationUpdate(Request $request)
    {
        return $request->all();

        $filePath = base_path('resources/lang/'.$language->language_code.'.json');

        $data = file_get_contents($filePath);
        $translations = json_decode($data, true);
        $requestTranslations = $request->translations;

        foreach ($translations as $key => $value) {
            if ($requestTranslations[$key]) {
                $translations[$key] = $requestTranslations[$key];
            } else {
                $translations[$key] = '';
            }
        }
        file_put_contents($filePath, json_encode($translations, JSON_UNESCAPED_UNICODE));

        session()->flash('success', 'Language translation updated successfully.');

        return back();
    }

    public function statusUpdate(Request $request)
    {
        $language = Language::findOrFail($request->id);

        if ($language->status) {
            $language->update(['status' => 0]);
        } else {
            $language->update(['status' => 1]);
        }

        session()->flash('success', 'Language status updated successfully.');
        return back();
    }

    public function singleTranslate(Request $request)
    {
        try {
            $code = $request->code;
            $key = $request->key;

            $translatedText = translateIt($key, $code);

            return response()->json($translatedText);
        } catch (\Exception $e) {
            return response()->json($key);
        }
    }

    public function allTranslate()
    {
        $language = Language::findOrFail(request('id'));
        $data = file_get_contents(base_path('resources/lang/'.$language->language_code.'.json'));
        $translations = json_decode($data, true);

        $afterTrans = [];
        $tr = new GoogleTranslate($language->code);
        foreach ($translations as $key => $value) {

            $autoTransValue = $tr->translate($value);
            $afterTrans[$key] = $autoTransValue;
        }

        return response()->json($afterTrans);
    }

    public function defaultLanguage(Language $language)
    {
        checkSetEnv('APP_DEFAULT_LANGUAGE', $language->language_code);

        session()->flash('success', 'Language default set successfully.');

        return back();
    }
}
