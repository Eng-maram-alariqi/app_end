<!-- offers.index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Offers</h1>

    <a href="{{ route('offers.create') }}" class="btn btn-primary mb-3">Create Offer</a>

    <table class="table">
        <thead>
            <tr>
                <th>Offer ID</th>
                <th>Offer Price</th>
                <th>Offer Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($offers as $offer)
                <tr>
                    <td>{{ $offer->id }}</td>
                    <td>{{ $offer->offer_price }}</td>
                    <td>{{ $offer->offer_type }}</td>
                    <td>{{ $offer->start_date }}</td>
                    <td>{{ $offer->end_date }}</td>
                    <td>
                        <a href="{{ route('offers.show', $offer->id) }}" class="btn btn-primary">View</a>
                        <a href="{{ route('offers.edit', $offer->id) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('offers.destroy', $offer->id) }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
