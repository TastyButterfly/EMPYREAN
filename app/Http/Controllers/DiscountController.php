<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discount;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::paginate(15);
        return view('discountDashboard', compact('discounts'));
    }

    public function create()
    {
        return view('createDiscount');
    }

    public function store(Request $request)
    {
        $request->validate([
            'plan' => 'required|in:Basic Pass,PC Game Pass,Ultimate Pass',
            'discount_price' => 'required',
            'daysLeft' => 'required',
            'subscription_id' => 'required|exists:subscriptions,id|unique:discounts'
        ]);

        Discount::create($request->all());

        return redirect()->route('discounts.index')->with('success', 'Discount created successfully!');
    }

    public function edit(Discount $discount)
    {
        return view('editDiscount', compact('discount'));
    }

    public function update(Request $request, Discount $discount)
    {
        $request->validate([
            'plan' => 'required|in:Basic Pass,PC Game Pass,Ultimate Pass',
            'discount_price' => 'required',
            'daysLeft' => 'required',
            'subscription_id' => 'required|exists:subscriptions,id|unique:discounts,subscription_id,' . $discount->id
        ]);

        $discount->update($request->all());

        return redirect()->route('discounts.index')->with('success', 'Discount updated successfully!');
    }
    public function show(Discount $discount)
    {
        return view('showDiscount', compact('discount'));
    }
    public function destroy(Discount $discount)
    {
        $discount->delete();

        return redirect()->route('discounts.index')->with('success', 'Discount deleted successfully.');
    }
    public function cancel()
    {
        return redirect()->route('discounts.index')->with('error', 'Operation cancelled by user. No changes made.');
    }
}
