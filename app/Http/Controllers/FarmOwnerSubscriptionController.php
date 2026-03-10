<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\SubscriptionRequest;

class FarmOwnerSubscriptionController extends Controller
{
    public function index()
    {
        $farmOwner = auth()->guard('farm_owner')->user()->load(['subscription', 'subscriptionRequests.subscription']);
        $subscriptions = Subscription::all();
        $pendingRequest = $farmOwner->subscriptionRequests()->where('status', 'pending')->first();
        
        return view('farm_owner.subscription.index', compact('farmOwner', 'subscriptions', 'pendingRequest'));
    }

    public function requestUpgrade(Request $request)
    {
        $request->validate([
            'subscription_id' => 'required|exists:subscriptions,id',
        ]);

        $farmOwner = auth()->guard('farm_owner')->user();
        
        // Check if there's already a pending request
        if ($farmOwner->subscriptionRequests()->where('status', 'pending')->exists()) {
            return back()->with('error', 'You already have a pending upgrade request.');
        }

        SubscriptionRequest::create([
            'farm_owner_id' => $farmOwner->id,
            'subscription_id' => $request->subscription_id,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Your upgrade request has been submitted to the admin for approval.');
    }
}
