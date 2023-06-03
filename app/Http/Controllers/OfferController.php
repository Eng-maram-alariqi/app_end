<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\OfferProduct;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::all();
        return view('offers.show_offers', compact('offers'));
        // return view('offers.index', compact('offers'));
    }

    public function create()
    {
        return view('offers.Add_offers');
    }

    public function store(Request $request)
    {
        $offer = new Offer();
        $offer->offer_price = $request->input('offer_price');
        $offer->offer_type = $request->input('offer_type');
        $offer->start_date = $request->input('start_date');
        $offer->end_date = $request->input('end_date');
        $offer->save();

        // Assuming you have a form to also submit data for the Offers_Products table
        $offerProduct = new OfferProduct();
        $offerProduct->offer_id = $offer->id;
        $offerProduct->free_offer_price = $request->input('free_offer_price');
        $offerProduct->quantity_offer = $request->input('quantity_offer');
        $offerProduct->save();

        return redirect()->route('offers.index')->with('success', 'Offer created successfully.');
    }

    public function show($id)
    {
        $offer = Offer::findOrFail($id);
        return view('offers.show', compact('offer'));
    }

    public function edit($id)
    {
        $offer = Offer::findOrFail($id);
        return view('offers.edit', compact('offer'));
    }

    public function update(Request $request, $id)
    {
        $offer = Offer::findOrFail($id);
        $offer->offer_price = $request->input('offer_price');
        $offer->offer_type = $request->input('offer_type');
        $offer->start_date = $request->input('start_date');
        $offer->end_date = $request->input('end_date');
        $offer->save();

        // Update the Offers_Products table if needed

        return redirect()->route('offers.index')->with('success', 'Offer updated successfully.');
    }

    public function destroy($id)
    {
        $offer = Offer::findOrFail($id);
        $offer->delete();

        // Delete the related Offers_Products entry if needed

        return redirect()->route('offers.index')->with('success', 'Offer deleted successfully.');
    }
}
