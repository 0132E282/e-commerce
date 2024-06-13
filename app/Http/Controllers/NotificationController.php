<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    function index(Request $request)
    {
        $notifications = Auth::user()->notifications->where('type', 'LIKE', 'App\Notifications\\' . $request->type);
        return view('pages.notifications.notification-admin', ['notifications' => $notifications]);
    }
    function delete($id)
    {
        try {
            User::find(Auth::id())->notifications()->where('id', $id)->delete();
            return back()->with('message', ['content' => 'đã xóa thông báo', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => $e->getMessage(), 'type' => 'error']);
        }
    }
    function deleteAll()
    {
        try {
            User::find(Auth::id())->notifications()->delete();
            return back()->with('message', ['content' => 'đã xóa thông báo', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => $e->getMessage(), 'type' => 'error']);
        }
    }
    function realAll()
    {
        try {
            User::find(Auth::id())->unreadNotifications()->update(['read_at' => now()]);;
            return back()->with('message', ['content' => 'đã xóa thông báo', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => $e->getMessage(), 'type' => 'error']);
        }
    }
}
