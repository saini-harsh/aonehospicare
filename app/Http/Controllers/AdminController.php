<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\Inquiry;
use App\Models\User;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderStatusUpdatedMail;

class AdminController extends Controller
{
    public function dashboard()
    {
        $categoryCount = Category::count();
        $productCount = Product::count();
        $testimonialCount = Testimonial::count();
        $inquiryCount = Inquiry::count();
        $userCount = User::count();
        $orderCount = Order::count();
        $paymentCount = Payment::count();

        $recentOrders = Order::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'categoryCount',
            'productCount',
            'testimonialCount',
            'inquiryCount',
            'userCount',
            'orderCount',
            'paymentCount',
            'recentOrders'
        ));
    }

    public function orders()
    {
        $orders = Order::with('user')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function orderDetail($id)
    {
        $order = Order::with(['user', 'items', 'payment'])->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function deleteOrder($id)
    {
        $order = Order::findOrFail($id);
        // Delete related items and payments if they exist
        $order->items()->delete();
        $order->payment()->delete();
        $order->delete();
        return back()->with('success', 'Order deleted successfully!');
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'order_status' => $request->status,
            'awb_code' => $request->awb_code
        ]);

        try {
            Mail::to($order->customer_email)->send(new OrderStatusUpdatedMail($order));
        } catch (\Exception $e) {
            // Silently fail mail to prevent blocking admin flow
        }

        return redirect()->back()->with('success', 'Order status and AWB updated successfully');
    }

    public function payments()
    {
        $payments = Payment::with('order')->latest()->get();
        return view('admin.payments.index', compact('payments'));
    }

    public function users()
    {
        $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('success', 'User deleted successfully!');
    }

    public function inquiries()
    {
        $inquiries = Inquiry::latest()->get();
        return view('admin.inquiries.index', compact('inquiries'));
    }

    public function deleteInquiry($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->delete();
        return back()->with('success', 'Inquiry deleted successfully!');
    }

    public function settings()
    {
        // For our simple session auth, we'll just get the first admin or the one with session username
        $admin = Admin::where('username', session('admin_username'))->first() ?: Admin::first();
        return view('admin.settings', compact('admin'));
    }

    public function updateSettings(Request $request)
    {
        $admin = Admin::where('username', session('admin_username'))->first() ?: Admin::first();

        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:admins,username,' . $admin->id,
            'email' => 'required|email|unique:admins,email,' . $admin->id,
        ]);

        if ($request->filled('new_password')) {
            $request->validate([
                'current_password' => 'required',
                'new_password' => 'required|min:8|confirmed',
            ]);

            if (!Hash::check($request->current_password, $admin->password)) {
                return back()->with('error', 'Current password does not match.');
            }

            $admin->password = Hash::make($request->new_password);
        }

        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->save();

        session(['admin_username' => $admin->username]);

        return back()->with('success', 'Settings updated successfully!');
    }

    public function login()
    {
        if (session('admin_logged_in')) {
            return redirect('/admin/dashboard');
        }
        return view('admin.login');
    }

    public function doLogin(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            session(['admin_logged_in' => true, 'admin_username' => $admin->username]);
            return redirect('/admin/dashboard');
        }

        return back()->with('error', 'Invalid Credentials');
    }

    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_username']);
        return redirect('/admin');
    }
}
