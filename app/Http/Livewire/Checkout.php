<?php

namespace App\Http\Livewire;

use App\Mail\OrderReceived;
use App\Models\Order;
use App\Models\OrderItem;
use App\Services\InvoiceService;
use Livewire\Component;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Checkout extends Component
{
    public function makeOrder(Request $request)
    {
        $validatedRequest = $request->validate([
            'country' => 'required',
            'billing_address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'phone' => 'required',
            'zipcode' => 'required|numeric',
            'order_notes' => '',
        ]);

        $user = Auth::user();

        // Save or update billing details
        if ($user->billingDetails === null) {
            $user->billingDetails()->create($validatedRequest);
        } else {
            $user->billingDetails()->update($validatedRequest);
        }

        // Create the order
        $total = str_replace(',', '', Cart::total());
        $order = new Order([
            'user_id' => $user->id,
            'status' => 'processing',
            'total' => $total,
            'session_id' => null,
        ]);
        $order->save();

        // Create order items
        foreach (Cart::content() as $item) {
            $price = str_replace(',', '', $item->price);
            $orderItem = new OrderItem([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
                'price' => $price
            ]);
            $orderItem->save();
        }

        // Optional: send confirmation email with invoice
        // Mail::to($order->user->email)->send(new OrderReceived($order, (new InvoiceService)->createInvoice($order)));

        // Clear the cart
        Cart::destroy();

        // Redirect to success page
        return redirect()->route('checkout.success')->with('success', 'Your order has been placed successfully.');
    }

    public function success(Request $request, InvoiceService $invoiceService)
    {
        // If using Stripe later, you can leave this as is or simplify
        return view('livewire.success');
    }

    public function cancel()
    {
        return redirect()->route('home')->with('success', 'Your order has been canceled.');
    }

    public function render()
    {
        if (Cart::count() <= 0) {
            session()->flash('error', 'Your cart is empty.');
            return redirect()->route('home');
        }

        $user = Auth::user();
        $billingDetails = $user->billingDetails;

        return view('livewire.checkout', compact('billingDetails'));
    }
}
