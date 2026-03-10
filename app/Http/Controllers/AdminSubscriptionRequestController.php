<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubscriptionRequest;
use App\Models\FarmOwner;

class AdminSubscriptionRequestController extends Controller
{
    public function index()
    {
        $requests = SubscriptionRequest::with(['farmOwner', 'subscription'])->latest()->paginate(10);
        return view('admin.subscription_requests.index', compact('requests'));
    }

    public function approve($id)
    {
        $subRequest = SubscriptionRequest::findOrFail($id);
        
        // Update Farm Owner's subscription
        $farmOwner = $subRequest->farmOwner;
        $farmOwner->update([
            'subscription_id' => $subRequest->subscription_id
        ]);

        // Update request status
        $subRequest->update(['status' => 'approved']);

        return back()->with('success', "Subscription upgrade approved for {$farmOwner->name}.");
    }

    public function reject($id)
    {
        $subRequest = SubscriptionRequest::findOrFail($id);
        $subRequest->update(['status' => 'rejected']);

        return back()->with('success', "Subscription request rejected.");
    }
}
