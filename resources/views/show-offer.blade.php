{{-- getTitles($offer->locations) --}}
{{-- <img src="{{ asset($offer->image_url) }}" alt=""> --}}
{!! QrCode::size(100)->generate(Request::url()) !!}
