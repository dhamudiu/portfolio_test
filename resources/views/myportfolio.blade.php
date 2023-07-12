@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('portfolio.update', $developer->id) }}" method="POST" class="card">
                    @csrf
                    @method('PUT')
                    <div class="card-header">{{ __('Portfolio') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-7">
                                <div class="card">
                                    <div class="card-header">{{ __('Portfolio Name') }} <span class="btn p-0"><i
                                                class="fa-regular fa-pen-to-square"></i></span>
                                    </div>
                                    <div class="card-body">
                                        <input class="form-control" type="text" name="name"
                                            value="{{ $developer->name }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-5">
                                <div class="card">
                                    <div class="card-header">{{ __('Availabily (in hours)') }}</div>
                                    <div class="card-body">

                                        <input class="form-control" type="number" name="availability"
                                            value="{{ $developer->availability }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <div class="card">
                                    <div class="card-header">{{ __('Technologies') }}</div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="technology">Technology</label><br>
                                            @php
                                                $developerTechnologies = array_map('trim', explode(',', str_replace(['[', ']', '"'], '', stripslashes($developer->technology))));
                                            @endphp
                                            @foreach ($technologies as $technology)
                                                <div class="form-check">
                                                    <input type="checkbox" name="technology[]" value="{{ $technology }}"
                                                        id="{{ $technology }}" class="form-check-input"
                                                        {{ in_array($technology, $developerTechnologies) ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="{{ $technology }}">{{ $technology }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-secondary">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
