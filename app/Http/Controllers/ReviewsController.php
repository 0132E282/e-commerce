<?php

namespace App\Http\Controllers;

use App\Events\CreateReviews;
use App\Events\CreateReviewsEvent;
use App\Models\Reviews;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    protected $modalReviews;
    function __construct()
    {
        $this->modalReviews = new Reviews();
    }
    function index(Request $request)
    {
        $reviews = $this->modalReviews->filter(['created' => $request->created ?? null])->search($request->search)->whereNull('parent_id')->paginate(25);
        return view('pages.reviews.manager-all', ['reviews' => $reviews]);
    }
    function create(Request $request, $id)
    {
        try {
            $review = $this->modalReviews->create([
                'name' => $request->name ?? Auth::user()->name,
                'content' => $request->content,
                'rating' => $request->rating,
                'product_id' => $id,
                'email' => $request->email ?? Auth::user()->email,
                'id_user' => Auth::id()
            ]);
            $review['avatar'] = $review->user->avatar_url ?? null;
            CreateReviewsEvent::dispatch($review);
            return response()->json(['data' => $review, 'message' => 'đã bình luận sản phẩm']);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'status' => 'error']);
        }
    }
    function reply(Request $request, $id)
    {
        try {
            $review =  $this->modalReviews->find($id);
            if ($review->user_id == Auth::id()) new Exception('Bạn không thẻ trả lời nội dùng của chín bình của bạn');
            $review = $this->modalReviews->create([
                'name' => $request->name ?? Auth::user()->name,
                'content' => $request->content,
                'email' => $request->email ?? Auth::user()->email,
                'id_user' => Auth::id(),
                'parent_id' => $id
            ]);
            $review['avatar'] = $review->user->avatar_url;
            return back()->with('message', ['content' => 'bạn đã trả lời bình luận nầy', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => $e->getMessage(), 'type' => 'error']);
        }
    }
    function delete($id)
    {
        try {
            $review = $this->modalReviews->findOrFail($id);
            $review->delete();
            return back()->with('message', ['content' => 'Bạn đã xóa bài đánh giá', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => $e->getMessage(), 'type' => 'error']);
        }
    }
    function detail(Request $request, $id)
    {
        try {
            $review = $this->modalReviews->findOrFail($id);
            return view('pages.reviews.details', ['review' => $review]);
        } catch (Exception $e) {
            return redirect(route('admin.reviews.index'))->with('message', ['content' => 'không tìm thấy bình luận nây', 'type' => 'error']);
        }
    }
}
