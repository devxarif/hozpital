<?php

namespace App\Http\Controllers\Admin;

use ZipArchive;
use App\Models\Cms;
use App\Models\Seo;
use App\Models\Setting;
use App\Models\Currency;
use App\Traits\SettingAble;
use Illuminate\Http\Request;
use App\Mail\Admin\SmtpTestMail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Services\Admin\Setting\SMTPService;
use App\Services\Admin\Setting\SystemInfoService;
use App\Services\Admin\Setting\SendTestMailService;
use App\Http\Requests\Admin\Setting\SMTPUpdateRequest;
use App\Services\Admin\Setting\GeneralSettingUpdateService;
use App\Services\Admin\Setting\System\FetchSystemSettingDataService;
use App\Services\Admin\Setting\Payment\FetchPaymentProviderDataService;
use App\Services\Admin\Setting\Payment\UpdatePaymentProviderDataService;
use App\Services\Admin\Setting\SocialLogin\FetchSocialProviderDataService;
use App\Services\Admin\Setting\SocialLogin\UpdateSocialProviderDataService;

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
        (new GeneralSettingUpdateService())->execute($request);

        session()->flash('success', 'General Setting updated successfully!');
        return back();
    }

    public function system()
    {
        $data = (new FetchSystemSettingDataService)->execute();

        return inertia('Admin/Setting/System', compact('data'));
    }

    public function systemInfo()
    {
        $data['data'] = (new SystemInfoService)->execute();

        return inertia('Admin/Setting/SystemInfo', $data);
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

    public function customCssJs()
    {
        $data = setting(['custom_css', 'custom_header_script','custom_footer_script']);

        return inertia('Admin/Setting/CustomCssJs', [
            'custom_css' => $data->custom_css,
            'custom_header_script' => $data->custom_header_script,
            'custom_footer_script' => $data->custom_footer_script,
        ]);
    }

    public function customCssJsUpdate(Request $request)
    {
        Setting::first()->update([
            'custom_css' => $request->custom_css,
            'custom_header_script' => $request->custom_header_script,
            'custom_footer_script' => $request->custom_footer_script,
        ]);

        return back()->with('success', 'Custom css/js updated successfully');
    }

    public function cookiesAlert()
    {
        return inertia('Admin/Setting/CookiesAlert');
    }

    public function cookiesAlertUpdate(Request $request)
    {
        Setting::first()->update([
            'cookies_alert_active' => $request->cookies_alert_active ?? false,
            'cookies_alert_message' => $request->cookies_alert_message,
            'cookies_alert_button_text' => $request->cookies_alert_button_text,
        ]);

        return back()->with('success', 'Cookies updated successfully');
    }

    public function payment()
    {
        return inertia('Admin/Setting/Payment');
    }

    public function paymentData(Request $request)
    {
        return (new FetchPaymentProviderDataService)->execute($request->provider);
    }

    public function paymentDataUpdate(Request $request)
    {
        (new UpdatePaymentProviderDataService)->execute($request);

        return back()->with('success', 'Payment data updated successfully');
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
        return inertia('Admin/Setting/Recaptcha', [
            'recaptcha_site_key' => config('kodebazar.recaptcha_site_key'),
            'recaptcha_secret_key' => config('kodebazar.recaptcha_secret_key'),
            'recaptcha_active' => config('kodebazar.recaptcha_active'),
        ]);
    }

    public function recaptchaUpdate(Request $request)
    {
        checkSetConfig('kodebazar.recaptcha_site_key', $request->recaptcha_site_key);
        checkSetConfig('kodebazar.recaptcha_secret_key', $request->recaptcha_secret_key);
        setConfig('kodebazar.recaptcha_active', $request->recaptcha_active ? true : false);

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

    public function logs()
    {
        return redirect('/log-viewer');
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
