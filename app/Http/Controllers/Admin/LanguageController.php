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
        $langInfos = json_decode(file_get_contents($path), true);
        $defaultLanguage = Language::where('language_code', config('kodebazar.default_language'))->value('id');

        return inertia('Admin/Setting/Language/Index', [
            'languages' => $languages,
            'langInfos' => $langInfos,
            'defaultLanguage' => $defaultLanguage,
        ]);
    }

    public function store(LanguageCreateRequest $request)
    {
        $language = Language::create([
            'name' => $request->name,
            'language_code' => $request->language_code,
            'status' => $request->status ? 1 : 0,
        ]);

        $baseFile = base_path('resources/lang/en.json');
        $fileName = base_path('resources/lang/'.strSlug($request->language_code).'.json');
        copy($baseFile, $fileName);

        session()->flash('success', 'Language added successfully.');

        return redirect()->route('languages.translation.edit', $language->id);
    }

    public function update(LanguageUpdateRequest $request, Language $lang)
    {
        $oldFile = $lang->code.'.json';
        $oldName = base_path('resources/lang/'.$oldFile);
        $newFile = strSlug($request->code).'.json';
        $newName = base_path('resources/lang/'.$newFile);

        rename($oldName, $newName);

        $lang->update([
            'name' => $request->name,
            'code' => $request->code,
            'status' => $request->status ? 1 : 0,
        ]);

        session()->flash('success', 'Language updated successfully.');

        return back();
    }

    public function destroy(Language $language)
    {
        if (File::exists(base_path('resources/lang/'.$language->code.'.json'))) {
            File::delete(base_path('resources/lang/'.$language->code.'.json'));
        }

        $language->delete();

        session()->flash('success', 'Language deleted successfully.');
        return back();
    }

    public function translationEdit(Language $language)
    {
        $path = base_path('resources/lang/'.$language->code.'.json');
        $translations = json_decode(file_get_contents($path), true);

        return inertia('Admin/Setting/Language/Translation', [
            'lang' => $language,
            'translations' => $translations,
        ]);
    }

    public function translationUpdate(Request $request, Language $language)
    {
        $filePath = base_path('resources/lang/'.$language->code.'.json');

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
        $data = file_get_contents(base_path('resources/lang/'.$language->code.'.json'));
        $translations = json_decode($data, true);

        $afterTrans = [];
        $tr = new GoogleTranslate($language->code);
        foreach ($translations as $key => $value) {

            $autoTransValue = $tr->translate($value);
            $afterTrans[$key] = $autoTransValue;
        }

        return response()->json($afterTrans);
    }

    public function defaultLanguage(Language $lang)
    {
        checkSetEnv('APP_DEFAULT_LANGUAGE', $lang->code);

        session()->flash('success', 'Language default set successfully.');

        return back();
    }
}
