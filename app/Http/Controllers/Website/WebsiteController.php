<?php

namespace App\Http\Controllers\Website;

use App\Models\Faq;
use App\Models\Seo;
use App\Models\Plan;
use App\Models\Post;
use App\Models\Feature;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Service;
use App\Models\Department;
use App\Models\Testimonial;
use App\Traits\PaymentAble;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
use App\Services\Midtrans\CreateSnapTokenService;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class WebsiteController extends Controller
{
    use SEOToolsTrait, PaymentAble;

    public function home()
    {
        $data['services'] = Service::take(6)->get();
        $data['testimonials'] = Testimonial::latest()->get();
        $data['partners'] = Partner::latest()->get();


        return view('website.pages.home', $data);


        $data['departments'] = Department::withCount('doctors')->latest('doctors_count')->take(6)->get();

        return view('website.pages.home', $data);

        $content = metaContent('home');
        $this->seo()->setTitle($content->title);
        $this->seo()->setDescription($content->description);
        SEOMeta::setKeywords($content->keywords);
        $this->seo()->opengraph()->setUrl(url()->current());
        $this->seo()->opengraph()->addProperty('type', 'website');
        $this->seo()->twitter()->setSite(url()->current());
        $this->seo()->jsonLd()->setType('Website');
    }

    public function about()
    {
        $data['testimonials'] = Testimonial::latest()->get();

        return view('website.pages.about', $data);
    }

    public function services()
    {
        return view('website.pages.services');
    }

    public function serviceDetails()
    {
        return view('website.pages.service-details');
    }

    public function news()
    {
        return view('website.pages.news');
    }

    public function newsDetails()
    {
        return view('website.pages.news-details');
    }

    public function contact()
    {
        return view('website.pages.contact');
    }

    public function department()
    {
        return view('website.pages.department');
    }

    public function departmentDetails()
    {
        return view('website.pages.department-details');
    }

    public function doctor()
    {
        return view('website.pages.doctor');
    }

    public function doctorDetails()
    {
        return view('website.pages.doctor-details');
    }

    public function products()
    {
        $data['products'] = Product::with('productCategory:id,name')->paginate(15);
        $data['categorises'] = ProductCategory::select('id','name')->get();

        return view('website.pages.products', $data);
    }

    public function productDetails(Product $product)
    {
        $product->load('galleries:id,product_id,image');
        $related_products = Product::with('productCategory:id,name')->where('product_category_id', $product->product_category_id)
                ->latest()
                ->take(4)
                ->get();

        return view('website.pages.product_details', compact('product','related_products'));
    }

    public function bags()
    {
        return view('website.pages.bag');
    }

    public function checkout()
    {
        return view('website.pages.checkout');
    }

    public function shipping()
    {
        return view('website.pages.shipping');
    }

    public function payment()
    {
        return view('website.pages.payment');
    }

    // public function pricing()
    // {
    //     $content = metaContent('pricing');
    //     $this->seo()->setTitle($content->title);
    //     $this->seo()->setDescription($content->description);
    //     SEOMeta::setKeywords($content->keywords);
    //     $this->seo()->opengraph()->setUrl(url()->current());
    //     $this->seo()->opengraph()->addProperty('type', 'website');
    //     $this->seo()->twitter()->setSite(url()->current());
    //     $this->seo()->jsonLd()->setType('Website');

    //     $faqs = Faq::all();
    //     $plans = Plan::with('planFeatures')->whereStatus(1)->get();

    //     return view('website.pricing', compact('faqs', 'plans'));
    // }

    // public function blog()
    // {
    //     $content = metaContent('blog');
    //     $this->seo()->setTitle($content->title);
    //     $this->seo()->setDescription($content->description);
    //     SEOMeta::setKeywords($content->keywords);
    //     $this->seo()->opengraph()->setUrl(url()->current());
    //     $this->seo()->opengraph()->addProperty('type', 'website');
    //     $this->seo()->twitter()->setSite(url()->current());
    //     $this->seo()->jsonLd()->setType('Website');

    //     $posts = Post::select('id', 'title', 'slug', 'thumbnail', 'short_description')
    //         ->latest()
    //         ->paginate(config('kodebazar.rows_per_page'))->withQueryString();

    //     return view('website.blog', compact('posts'));
    // }

    // public function blogDetails(Post $post)
    // {
    //     $this->seo()->setTitle($post->title);
    //     $this->seo()->setDescription($post->short_description);
    //     $this->seo()->opengraph()->setUrl(url()->current());
    //     $this->seo()->opengraph()->addProperty('type', 'website');
    //     $this->seo()->twitter()->setSite(url()->current());
    //     $this->seo()->jsonLd()->setType('Website');

    //     $post->increment('total_views');
    //     $post->load('user');
    //     $popular_posts = Post::select('id', 'title', 'slug', 'thumbnail')
    //         ->latest('total_views')
    //         ->limit(4)
    //         ->get();
    //     $latest_posts = Post::select('id', 'title', 'slug', 'thumbnail')
    //         ->where('id', '!=', $post->id)
    //         ->latest()
    //         ->limit(3)
    //         ->get();

    //     return view('website.blog-details', compact(
    //         'post',
    //         'popular_posts',
    //         'latest_posts'
    //     ));
    // }

    // public function planDetails(Plan $plan)
    // {
    //     if ($plan->type == 'free') {
    //         return $this->switchToFreePlan($plan);
    //     }

    //     $content = metaContent('pricing');
    //     $this->seo()->setTitle($content->title);
    //     $this->seo()->setDescription($content->description);
    //     SEOMeta::setKeywords($content->keywords);
    //     $this->seo()->opengraph()->setUrl(url()->current());
    //     $this->seo()->opengraph()->addProperty('type', 'website');
    //     $this->seo()->twitter()->setSite(url()->current());
    //     $this->seo()->jsonLd()->setType('Website');

    //     // session data storing
    //     session(['plan' => $plan]);
    //     session(['stripe_amount' => currencyConversion($plan->price) * 100]);
    //     session(['razor_amount' => currencyConversion(50, null, 'INR', 1) * 100]);

    //     // midtrans snap token
    //     if (config('kodebazar.midtrans_active') && config('kodebazar.midtrans_id') && config('kodebazar.midtrans_key') && config('kodebazar.midtrans_secret')) {
    //         $midtrans_amount = round(currencyConversion($plan->price, null, 'IDR', 1));
    //         $order_id = uniqid();

    //         session(['midtrans_amount' => $midtrans_amount]);
    //         session(['midtrans_order_id' => $order_id]);

    //         $order['order_no'] = $order_id;
    //         $order['total_price'] = $midtrans_amount;

    //         $midtrans = new CreateSnapTokenService($order);
    //         $snapToken = $midtrans->getSnapToken();
    //     }

    //     return view('website.plan_details', [
    //         'plan' => $plan,
    //         'mid_token' => $snapToken ?? null,
    //     ]);
    // }

    public function privacyPolicy()
    {
        return view('website.pages.privacy-policy');
    }

    public function termsCondition()
    {
        return view('website.pages.terms-condition');
    }

    public function appointment()
    {
        return view('website.pages.appointment');
    }

    public function appointmentConfirm()
    {
        return view('website.pages.appointment-confirmation');
    }
}
