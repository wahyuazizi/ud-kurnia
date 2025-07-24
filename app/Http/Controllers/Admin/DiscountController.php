<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DiscountController extends Controller
{
    public function edit()
    {
        $shop = Auth::user()->shop;
        if (!$shop) {
            return redirect()->route('shopDetail')->with('error', 'Toko belum dibuat. Silakan lengkapi detail toko terlebih dahulu.');
        }
        
        $data = [
            'title' => 'Edit Discount',
            'shop' => $shop
        ];

        return view('admin.discount.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'discount_text' => 'nullable|string|max:255',
            'discount_item' => 'nullable|string|max:255',
            'discount_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=180,height=180',
            'discount2_text' => 'nullable|string|max:255',
            'discount2_item' => 'nullable|string|max:255',
            'discount2_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=180,height=180',
        ]);

        $shop = Auth::user()->shop;
        if (!$shop) {
            return redirect()->route('shopDetail')->with('error', 'Toko tidak ditemukan.');
        }

        $data = $request->only([
            'discount_text', 'discount_item',
            'discount2_text', 'discount2_item'
        ]);

        // Handle first discount image
        if ($request->hasFile('discount_image')) {
            if ($shop->discount_image && Storage::disk('public')->exists($shop->discount_image)) {
                Storage::disk('public')->delete($shop->discount_image);
            }
            $path1 = $request->file('discount_image')->store('images/discount', 'public');
            $data['discount_image'] = $path1;
        }

        // Handle second discount image
        if ($request->hasFile('discount2_image')) {
            if ($shop->discount2_image && Storage::disk('public')->exists($shop->discount2_image)) {
                Storage::disk('public')->delete($shop->discount2_image);
            }
            $path2 = $request->file('discount2_image')->store('images/discount', 'public');
            $data['discount2_image'] = $path2;
        }

        $shop->update($data);

        return redirect()->route('discountEdit')->with('success', 'Informasi diskon berhasil diperbarui.');
    }
}
