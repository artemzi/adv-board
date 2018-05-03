@extends('layouts.app')

@section('breadcrumbs', '')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Hello</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                Board project!
            </div>
        </div>
    </div>
</div>
@endsection
