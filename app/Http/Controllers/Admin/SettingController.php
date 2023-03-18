<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\SMTPUpdateRequest;
use App\Mail\Admin\SmtpTestMail;
use App\Models\Cms;
use App\Models\Currency;
use App\Models\Seo;
use App\Models\Setting;
use App\Services\Admin\Setting\SocialLogin\FetchSocialProviderDataService;
use App\Services\Admin\Setting\SendTestMailService;
use App\Services\Admin\Setting\SMTPService;
use App\Services\Admin\Setting\SocialLogin\UpdateSocialProviderDataService;
use App\Traits\SettingAble;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class SettingController extends Controller
{
    use SettingAble;

    public function general()
    {
        $setting = Setting::first();
        $sms_settings = $this->getSmsSetting();

        return inertia('Admin/Setting/General', compact('setting', 'sms_settings'));
    }

    public function generalSettingUpdate(Request $request)
    {
        switch ($request->type) {
            case 'brand_info':
                $this->updateBrandInfo($request);
                break;
            case 'social_media':
                $this->updateSocialMedia($request);
                break;
            case 'sms':
                $this->updateSmsSetting($request);
                break;

            default:
                session()->flash('error', 'Something went wrong!');

                return back();
                break;
        }

        session()->flash('success', 'Setting updated successfully!');

        return back();
    }

    public function system()
    {
        $setting = Setting::first();

        return inertia('Admin/Setting/System', compact('setting'));
    }

    public function cms()
    {
        $cms = Cms::first();

        return inertia('Admin/Setting/Cms', compact('cms'));
    }

    public function cmsUpdate(Request $request)
    {
        $update = $this->updateCmsData($request);

        if ($update) {
            session()->flash('success', 'CMS content updated successfully');

            return back();
        } else {
            session()->flash('error', 'Something went wrong');

            return back();
        }
    }

    public function currency()
    {
        $data = $this->getCurrencyData();

        return inertia('Admin/Setting/Currency', $data);
    }

    public function storeCurrency(Request $request)
    {
        $this->storeCurrencyData($request);

        session()->flash('success', 'Currency added successfully');

        return back();
    }

    public function updateCurrency(Request $request, Currency $currency)
    {
        $this->updateCurrencyData($request, $currency);

        session()->flash('success', 'Currency updated successfully');

        return back();
    }

    public function deleteCurrency(Currency $currency)
    {
        $this->deleteCurrencyData($currency);

        session()->flash('success', 'Currency deleted successfully');

        return back();
    }

    public function statusUpdateCurrency(Currency $currency)
    {
        $this->statusUpdateCurrencyData($currency);

        session()->flash('success', 'Currency status updated successfully.');

        return back();
    }

    public function defaultCurrency(Currency $currency)
    {
        $this->setDefaultCurrency($currency);

        session()->flash('success', 'Currency default set successfully.');

        return back();
    }

    public function payment()
    {
        return inertia('Admin/Setting/Payment');
    }

    public function paymentData(Request $request)
    {
        return $this->getPaymentData($request->provider);
    }

    public function paymentDataUpdate(Request $request)
    {
        $update = $this->updatePaymentData($request);

        if ($update) {
            session()->flash('success', 'Payment data updated successfully');

            return back();
        } else {
            session()->flash('error', 'Something went wrong');

            return back();
        }
    }

    public function seo()
    {
        $seo_data = $this->getSeo();

        return inertia('Admin/Setting/Seo', [
            'seo_data' => $seo_data,
        ]);
    }

    public function seoUpdate(Request $request, Seo $seo)
    {
        $seo_data = $this->updateSeoContent($request, $seo);

        if ($seo_data) {
            session()->flash('success', 'Seo content updated successfully');

            return back();
        } else {
            session()->flash('error', 'Something went wrong');

            return back();
        }
    }

    public function recaptcha()
    {
        $recaptcha_setting = setting(['recaptcha_active', 'recaptcha_site_key']);

        return inertia('Admin/Setting/Recaptcha', [
            'recaptcha_site_key' => $recaptcha_setting->recaptcha_site_key,
            'recaptcha_active' => $recaptcha_setting->recaptcha_active,
        ]);
    }

    public function recaptchaUpdate(Request $request)
    {
        Setting::first()->update([
            'recaptcha_site_key' => $request->recaptcha_site_key,
            'recaptcha_active' => $request->recaptcha_active,
        ]);

        return back()->with('success', 'Recaptcha setting updated successfully');
    }

    public function socialLogin()
    {
        return inertia('Admin/Setting/SocialLogin');
    }

    public function socialLoginData(Request $request)
    {
        return (new FetchSocialProviderDataService)->execute($request->provider);
    }

    public function socialLoginUpdate(Request $request)
    {
        (new UpdateSocialProviderDataService)->execute($request);

        return back()->with('success', 'Social login configuration updated successfully');
    }

    public function smtp()
    {
        $data = [
            'host' => config('mail.mailers.smtp.host'),
            'port' => config('mail.mailers.smtp.port'),
            'encryption' => config('mail.mailers.smtp.encryption'),
            'from_name' => config('mail.from.name'),
            'from_address' => config('mail.from.address'),
            'username' => config('mail.mailers.smtp.username'),
            'password' => config('mail.mailers.smtp.password'),
        ];

        return inertia('Admin/Setting/Smtp', [
            'data' => $data,
        ]);
    }

    public function smtpUpdate(SMTPUpdateRequest $request)
    {
        try {
            (new SMTPService())->execute($request);

            session()->flash('success', 'SMTP updated successfully');
            return back();
        } catch (\Throwable $th) {
            return back()->with('error', "Something went wrong. {$th->getMessage()}");
        }
    }

    public function testEmailSend(Request $request)
    {
        try {
            (new SendTestMailService())->execute($request);

            return back()->with('success', 'Test email sent successfully');
        } catch (\Throwable $th) {
            return back()->with('error', "Mail send failed: {$th->getMessage()}");
        }
    }

    public function upgrade()
    {
        return inertia('Admin/Setting/Upgrade');
    }

    public function upgradeSystem(Request $request)
    {
        $request->validate([
            'upgrade_zip' => 'required|mimes:zip',
        ]);

        if ($request->hasFile('upgrade_zip')) {
            $time_start = microtime(true);

            if (class_exists('ZipArchive')) {

                // Create update directory.
                $dir = 'updates';
                if (! is_dir($dir))
                    mkdir($dir, 0777, true);

                $path = Storage::disk('local')->put('updates', $request->upgrade_zip);
                uploadFileToPublic('system', $request->upgrade_zip);

                //Unzip uploaded update file and remove zip file.
                $zip = new ZipArchive;
                $res = $zip->open(storage_path('app/'.$path));

                if ($res === true) {
                    $res = $zip->extractTo(base_path());
                    // $res = $zip->extractTo(base_path() . "/unzip");
                    $zip->close();

                    // Delete zip file.
                    if (file_exists(storage_path('app/'.$path))) {
                        unlink(storage_path('app/'.$path));
                    }

                    $time_end = microtime(true);
                    $execution_time = ($time_end - $time_start);
                    info('Execution time: '.$execution_time.' seconds');

                    if ($res) {
                        session()->flash('success', 'Update successfully installed.');

                        return back();
                    } else {
                        session()->flash('error', 'Something went wrong.');

                        return back();
                    }
                } else {
                    session()->flash('error', 'Could not open the updates zip file');

                    return back();
                }

                session()->flash('error', 'Something went wrong.');

                return back();
            } else {
                session()->flash('error', 'Please enable ZipArchive extension from server');

                return back();
            }
        }

        session()->flash('error', 'no file selected');

        return back();
    }
}
