<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->take(8)->get();
        $bestSellers = Product::where('is_bestseller', true)->latest()->take(8)->get();
        $testimonials = Testimonial::latest()->get();
        return view('home', compact('categories', 'bestSellers', 'testimonials'));
    }

    public function about()
    {
        return view('about');
    }

    public function services()
    {
        $services = Service::all();
        return view('services', compact('services'));
    }

    public function marketplace()
    {
        return view('marketplace');
    }

    public function promotionDetail($slug)
    {
        $locations = [
            'indore' => 'Indore',
            'bhopal' => 'Bhopal',
            'jabalpur' => 'Jabalpur',
            'gwalior' => 'Gwalior',
            'ujjain' => 'Ujjain',
            'mumbai' => 'Mumbai',
            'ahmedabad' => 'Ahmedabad',
            'nagpur' => 'Nagpur',
            'raipur' => 'Raipur',
            'pune' => 'Pune'
        ];

        $products = [
            'icu-patient-beds' => [
                'slug_prefix' => 'icu-patient-beds',
                'name' => 'ICU Patient Beds',
                'image' => 'assets/images/icu_bed_product.png',
                'description' => 'Advanced ICU patient beds designed for maximum comfort and critical care efficiency.'
            ],
            'ward-furniture' => [
                'slug_prefix' => 'ward-furniture',
                'name' => 'Ward Furniture',
                'image' => 'assets/images/cat_furniture.png',
                'description' => 'Durable and ergonomic ward furniture for enhanced patient recovery and staff convenience.'
            ],
            'examination-tables' => [
                'slug_prefix' => 'examination-tables',
                'name' => 'Examination Tables',
                'image' => 'assets/images/examination_table_product.png',
                'description' => 'Premium examination tables built for durability and professional medical assessment.'
            ],
            'hospital-trolleys' => [
                'slug_prefix' => 'hospital-trolleys',
                'name' => 'Hospital Trolleys',
                'image' => 'assets/images/cat_trolley.png',
                'description' => 'High-quality hospital trolleys for seamless transport and organization within healthcare facilities.'
            ]
        ];

        // Parse slug
        $match = null;
        foreach ($products as $p_key => $p_data) {
            foreach ($locations as $l_key => $l_name) {
                $expected_slug = "{$p_key}-manufacturer-in-{$l_key}";
                if ($slug === $expected_slug) {
                    $match = [
                        'product' => $p_data,
                        'location' => $l_name,
                        'slug' => $slug
                    ];
                    break 2;
                }
            }
        }

        if (!$match) {
            abort(404);
        }

        $promotion = $match;
        return view('promotion-detail', compact('promotion'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function certificates()
    {
        return view('certificates');
    }

    public function returnBed()
    {
        return view('return-bed');
    }

    public function products(Request $request)
    {
        $query = Product::with('category')->latest();
        
        if ($request->has('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('features', 'LIKE', "%{$search}%")
                  ->orWhere('code', 'LIKE', "%{$search}%");
            });
        }

        $products = $query->paginate(12)->withQueryString();
        $categories = Category::all();
        return view('products', compact('products', 'categories'));
    }

    public function productDetail($slug)
    {
        $product = Product::with(['category', 'reviews.user'])->where('slug', $slug)->firstOrFail();
        $relatedProducts = Product::where('category_id', $product->category_id)
                                  ->where('id', '!=', $product->id)
                                  ->take(4)
                                  ->get();
        return view('product-detail', compact('product', 'relatedProducts'));
    }

    public function cart()
    {
        return view('cart');
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function terms()
    {
        return view('terms');
    }

    public function privacy()
    {
        return view('privacy');
    }

    public function sitemap()
    {
        $categories = Category::all();
        $products = Product::all();
        
        $promo_products = ['icu-patient-beds', 'ward-furniture', 'examination-tables', 'hospital-trolleys'];
        $promo_locations = ['indore', 'bhopal', 'jabalpur', 'gwalior', 'ujjain', 'mumbai', 'ahmedabad', 'nagpur', 'raipur', 'pune'];
        
        $promotions = [];
        foreach ($promo_products as $p) {
            foreach ($promo_locations as $l) {
                $promotions[] = "{$p}-manufacturer-in-{$l}";
            }
        }

        return response()->view('sitemap', compact('categories', 'products', 'promotions'))->header('Content-Type', 'text/xml');
    }

    public function refund()
    {
        return view('refund');
    }
}
