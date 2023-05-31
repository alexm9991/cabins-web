<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Booking_members;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class BookingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $bookings = Bookings::select('bookings.id', 'services.tittle', 'bookings.create_time', 'bookings.initial_date', 'payment_methods.title_payment', 'users.name')
            ->join('users', 'bookings.users_id', '=', 'users.id')
            ->join('payment_methods', 'bookings.payment_methods_id', '=', 'payment_methods.id')
            ->join('detail_booking', 'bookings.id', '=', 'detail_booking.booking_id')
            ->join('service_bills', 'detail_booking.service_bills_id', '=', 'service_bills.id')
            ->join('detail_services', 'service_bills.detail_services_id', '=', 'detail_services.id')
            ->join('services', 'detail_services.services_id', '=', 'services.id')
            ->distinct()->get();
        return view('modules.bookings.index', ['bookings' => $bookings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bookings $book)
    {

        $booking = Bookings::select(
            'bookings.id',
            'bookings.final_date',
            'bookings.initial_date',
            'bookings.total',
            'bookings.booking_code',
            'bookings.create_time',
            'bookings.update_time',
            'bookings.state_record',
            'payment_methods.title_payment',
            'services.tittle',
            'users.name',
            'users.last_name',
            'users.phone_number',
            'users.email',
            'users.identification_number',
            'service_bills.amount_adults',
            'service_bills.amount_child',
            'service_bills.total',
        )
            ->join('users', 'bookings.users_id', '=', 'users.id')
            ->join('payment_methods', 'bookings.payment_methods_id', '=', 'payment_methods.id')
            ->join('detail_booking', 'bookings.id', '=', 'detail_booking.booking_id')
            ->join('service_bills', 'detail_booking.service_bills_id', '=', 'service_bills.id')
            ->join('detail_services', 'service_bills.detail_services_id', '=', 'detail_services.id')
            ->join('services', 'detail_services.services_id', '=', 'services.id')
            ->where('bookings.id', '=', $book->id)
            ->first();

        $booking_members = Booking_members::select(
            'booking_members.first_name_member',
            'booking_members.last_name_member',
            'booking_members.age_member',
            'booking_members.document_member'
        )

            ->join('bookings', 'booking_members.booking_id', '=', 'bookings.id')
            ->where('booking_members.booking_id', '=', $book->id)
            ->get();

        $booking_product = Product::select(
            'products.name_product',
            'products.price',
            'product_bills.amount_products',
            'product_bills.total',
        )
            ->join('product_bills', 'products.id', '=', 'product_bills.products_id')
            ->join('detail_booking', 'product_bills.id', '=', 'detail_booking.product_bills_id')
            ->where('detail_booking.booking_id', '=', $book->id)
            ->get();

        $suma_product = DB::table('products')
            ->join('product_bills', 'products.id', '=', 'product_bills.products_id')
            ->join('detail_booking', 'product_bills.id', '=', 'detail_booking.product_bills_id')
            ->where('detail_booking.booking_id', '=', $book->id)
            ->sum('product_bills.total');

        $total_booking = Bookings::select('total')
            ->where('id', '=', $book->id)
            ->get();
        $total_booking = $total_booking[0]->total;

        return view('modules.bookings.detail', compact('booking', 'booking_product', 'booking_members', 'suma_product', 'total_booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Bookings::findOrFail($id);
        if ($booking->state_record == 'ACTIVAR') {
            $booking->state_record = 'DESACTIVAR';
        } else {
            $booking->state_record = 'ACTIVAR';
        }
        $booking->save();
        return redirect()->route('bookings.index')->with('destroy', 'ok');;
    }
}
