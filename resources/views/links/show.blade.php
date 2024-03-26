@extends('links.layout')

@section('content')

    <div class="card mt-5">
        <h2 class="card-header">Show short link</h2>
        <div class="card-body">

            <form action="{{ route('links.update', $link) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="basic-url" class="form-label"><strong>Your short link:</strong></label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon3">https://example.com/</span>
                        <input
                            type="text"
                            class="form-control"
                            name="short_link"
                            id="basic-url"
                            aria-describedby="basic-addon3 basic-addon4"
                            value="{{ $link->short_link }}">
                    </div>
                    <div class="form-text" id="basic-addon4">You can paste a pre-generated link here.</div>
                    @error('short_link')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i>&nbsp;Check link</button>
            </form>


        </div>
    </div>
@endsection
