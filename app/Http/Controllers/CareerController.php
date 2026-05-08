<?php

namespace App\Http\Controllers;

use App\Models\CareerGuide;
use App\Models\CareerCategory;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index(Request $request)
    {
        $categories = CareerCategory::all();

        $query = CareerGuide::with(['category','tags']);

        if ($request->keyword) {
            // 👉 SEARCH TOÀN BỘ
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->keyword . '%')
                ->orWhere('summary', 'like', '%' . $request->keyword . '%');
            });

            // 👉 KHÔNG GIỚI HẠN
            $posts = $query->latest()->get();

        } else {
            // 👉 KHÔNG SEARCH → CHỈ LẤY FEATURED
            $posts = $query->where('is_featured', 1)
                        ->latest()
                        ->take(5)
                        ->get();
        }


        $featured = CareerGuide::with(['category','tags'])
            ->where('is_featured', 1)
            ->take(3)
            ->get();

        $guides = CareerGuide::with(['category','tags'])
            ->get();

        // 🔥 BÍ KÍP (category_id = 2 theo seed của bạn)
        $tips = CareerGuide::with(['category','tags'])
            ->where('category_id', 2)
            ->take(4)
            ->get();
            // 🔥 THỊ TRƯỜNG & XU HƯỚNG (category_id = 4)
    $trends = CareerGuide::with(['category'])
        ->where('category_id', 4)
        ->take(3)
        ->get();

    // 🔥 KỸ NĂNG (category_id = 3)
    $skills = CareerGuide::with(['category'])
        ->where('category_id', 3)
        ->take(3)
        ->get();

        return view('candidate/career.index', compact('categories','featured','guides','tips','trends','skills','posts'));
    }
    public function show($id)
{
    $post = CareerGuide::with(['category','tags','sections'])
        ->where('guide_id', $id)
        ->firstOrFail();

    // tăng view
    $post->increment('views');

    // bài liên quan
    $related = CareerGuide::where('category_id', $post->category_id)
        ->where('guide_id', '!=', $post->guide_id)
        ->take(5)
        ->get();

    return view('candidate/career.show', compact('post','related'));
}
}
