@extends('layout.app')
@section('metaFields')
    @livewire('meta-fields',
    [
    'metaTitle' => $model->meta_title,
    'metaDescription' => $model->meta_description,
    'metaKeywords' => $model->meta_keywords,
    'curso/'.$model->slug,
    'socialImage' => $model->images["Imagen destacada"][0] ?? null
    ]
    )
@endsection
@section('content')
    @isset($response)
        @if($response['status'] == 'success')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $response['message'] }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if($response['status'] == 'error')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $response['message'] }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    @endisset
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach($errors->all() as $error)
                {{$error}}<br>
            @endforeach
        </div>
    @endif
    <div class="form-block-wrapper">
        <form action="{{route('course-inscription.store', ['id' => $model->id])}}" method="post" class="form-validate">
            @csrf
            <div class="form-block mb-5">
                <input type="text" class="form-control" required name="name" id="name" value="{{old('name')}}" placeholder="{{__("Name")}}*">
            </div>
            <div class="form-block mb-5">
                <input type="text" class="form-control" name="phone" id="phone" value="{{old('phone')}}" placeholder="{{__("Phone")}}">
            </div>
            <div class="form-block mb-5">
                <input type="text" class="form-control" required name="email" id="email" value="{{old('email')}}" placeholder="{{__("Email")}}*">
            </div>
            <div class="form-block mb-5">
                <textarea class="form-control" name="message" id="message" placeholder="{{__("Message")}}" rows="6">{{old('message')}}</textarea>
            </div>
            <div class="column one">
                <div class="mb-4 form-check form-switch">
                    <div>
                        <input class="form-check-input @error('policies') is-invalid @enderror" type="checkbox" role="switch" name="policies" id="policies" aria-describedby="validationPoliciesFeedback" required>
                        <label class="form-check-label" for="policies">
                            <span class="text-danger">*</span> {{ __('I have read and accept the following legal policies') }}:&nbsp;
                        </label>
                        <div>
                            <a class="link-secondary-custom form-check-label" href="{{route('legal-text.public',$lopd->slug)}}" title="{{ __('Privacy policy') }}" target="_blank" rel="noopener noreferrer">{{ __('Privacy policy') }}</a>&nbsp;
                            <a href="#" class="link-secondary-custom form-check-label" data-fancybox data-src="#data_protect" title="{{__('Basic information about data protection') }}">
                                {{__("Basic information about data protection")}}
                            </a>
                        </div>
                    </div>
                    @error('policies')
                    <div id="validationPoliciesFeedback" class="invalid-feedback">
                        <i class="fa fa-exclamation-circle text-danger me-1"></i> {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="my-1">
                    <em>(<span class="text-danger">*</span>) {{ __('Required fields') }}</em>
                </div>
            </div>
            <div class="column one">
                <div class="my-1 text-center">
                    <div class="my-2 captcha d-flex justify-content-center align-items-center">
                        <span>{!! captcha_img('default', ['alt' => 'Captcha']) !!}</span>
                        <button type="button" class="button-recaptcha bg-danger border-0 reload ms-3" id="reload">
                            &#x21bb;
                        </button>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="mb-4 row text-center">
                                <small class="text-center">(<strong class="text-danger">*</strong>) {{__("This code is obligatory")}}</small>
                                <div class="form-block mt-3">
                                    <input type="text" class="form-control @error('captcha') is-invalid @enderror" name="captcha" id="captcha" placeholder="{{__("enter the code from the image")}}" required>
                                </div>
                                @error('captcha')
                                <div id="validationFeedback_captcha" class="invalid-feedback">
                                    <i class="fa fa-exclamation-circle text-danger-m1 me-2"></i> {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn-custom-secondary text-white border-0 d-block m-auto" id="submit" type="submit">
                {{__("Submit")}}
            </button>
        </form>
    </div>
@endsection
