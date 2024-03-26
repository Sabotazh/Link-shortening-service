@extends('links.layout')

@section('content')

    <div class="card mt-5">
        <h2 class="card-header">Add New Link</h2>
        <div class="card-body">

            <form action="{{ route('links.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="inputLink" class="form-label"><strong>Enter you link:</strong>
                        <sup>
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="red" class="bi bi-asterisk" viewBox="0 0 16 16">
                                <path d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1"></path>
                            </svg>
                        </sup>
                    </label>
                    <input
                        type="text"
                        name="url"
                        class="form-control @error('url') is-invalid @enderror"
                        id="inputLink"
                        placeholder="https://example.com"
                        required>
                    @error('url')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="RoT" class="form-label"><strong>Restrictions on transitions:</strong></label>
                    <input
                        type="text"
                        name="restrictions"
                        class="form-control @error('restrictions') is-invalid @enderror"
                        id="RoT"
                        value="0">
                    @error('restrictions')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="linkLifetime" class="form-label"><strong>Link lifetime <i>(in hours)</i>:</strong></label>
                    <input
                        type="text"
                        name="lifetime"
                        class="form-control @error('lifetime') is-invalid @enderror"
                        id="linkLifetime"
                        placeholder="12">
                    <div class="form-text">no more than 24 hours</div>
                    @error('lifetime')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i>&nbsp;&nbsp;Shorten link</button>
            </form>

        </div>
    </div>
@endsection
