@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Developers Portfolio') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Technology</th>
                                    <th>Availability</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($developers as $developer)
                                    <tr>
                                        <td>{{ $developer->name }}</td>
                                        <td>
                                            @php
                                                $developerTechnologies = array_map('trim', explode(',', str_replace(['[', ']', '"'], '', stripslashes($developer->technology))));
                                            @endphp
                                            @foreach ($developerTechnologies as $item)
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item py-0">{{ $item }}</li>
                                                </ul>
                                            @endforeach
                                        </td>
                                        <td>{{ $developer->availability }} Hour(s)</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
