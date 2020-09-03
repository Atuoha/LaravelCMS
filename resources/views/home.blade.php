@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Opps! Account Not Activated') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Welcome on board buddy. You can not view the tiny modules of the Admin Block because your account is not yet activated :) ') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
