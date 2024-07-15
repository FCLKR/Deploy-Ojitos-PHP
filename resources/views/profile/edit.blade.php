@extends('layouts.newlayout')

@section('content')


    <div class="container">
        <div class="section">
            <h2 class="section-title">{{ __('Profile') }}</h2>
            <div class="form-container">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="section">
            <h2 class="section-title">{{ __('Update Password') }}</h2>
            <div class="form-container">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="section">
            <h2 class="section-title">{{ __('Delete Account') }}</h2>
            <div class="form-container">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
@endsection
