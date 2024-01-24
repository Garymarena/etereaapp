@extends('layouts.generic')

@section('page_description', getSetting('site.description'))
@section('share_url', route('home'))
@section('share_title', getSetting('site.name') . ' - ' . getSetting('site.slogan'))
@section('share_description', getSetting('site.description'))
@section('share_type', 'article')
@section('share_img', GenericHelper::getOGMetaImage())

@section('scripts')
    <script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "Organization",
    "name": "{{getSetting('site.name')}}",
    "url": "{{getSetting('site.app_url')}}",
    "address": ""
  }
</script>
@stop

@section('styles')
    {!!
        Minify::stylesheet([
            '/css/pages/home.css',
            '/css/pages/search.css',
         ])->withFullUrl()
    !!}
@stop

@section('content')
    <div class="home-header min-vh-75 relative pt-2" >
        <div class="container h-100">
            <div class="row d-flex flex-row align-items-center h-100">
                <div class="col-12 col-md-6 mt-4 mt-md-0">
                    <h1 class="font-weight-bold text-gradient bg-gradient-primary">{{__('Make more money')}},</h1>
                    <h1 class="font-weight-bold text-gradient bg-gradient-primary">{{__('with your content')}}.</h1>
                    <p class="font-weight-bold mt-3"> {{__("Start your own premium creators platform with our ready to go solution.")}}</p>
                    <div class="mt-4">
                        <a href="{{route('login')}}" class="btn btn-grow bg-gradient-primary  btn-round mb-0 me-1 mt-2 mt-md-0 ">{{__('Try for free')}}</a>
                        <a href="{{route('search.get')}}" class="btn btn-grow btn-link  btn-round mb-0 me-1 mt-2 mt-md-0 ">
                            @include('elements.icon',['icon'=>'search-outline','centered'=>false])
                            {{__('Explore')}}</a>
                    </div>
                </div>
                <div class="col-12 col-md-6 d-none d-md-block p-5">
                    <img src="{{asset('/img/home-header.png')}}" alt="{{__('Make more money')}}"/>
                </div>
            </div>
        </div>
    </div>



    <div class="my-5 py-2">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="font-weight-bold">{{__("We accept major payment methods")}}</h2>
                <p>{{__("Built on secure payment platform")}}</p>
            </div>
            <div class="d-flex align-items-center justify-content-center">
                <div class="d-flex justify-content-center align-items-center row col">
<img src="{{asset('/img/logos/oxxo.svg')}}" class="mx-3 mb-2 grayscale" title="{{ucfirst(__("oxxo"))}}" alt="{{__("oxxo")}}"/>
                    <img src="{{asset('/img/logos/stripe.svg')}}" class="mx-3 mb-2 grayscale" title="{{ucfirst(__("stripe"))}}" alt="{{__("stripe")}}"/>
                    <img src="{{asset('/img/logos/paypal.svg')}}" class="mx-3 mb-2 grayscale" title="{{ucfirst(__("paypal"))}}" alt="{{__("paypal")}}"/>
                    <img src="{{asset('/img/logos/coinbase.svg')}}" class="mx-3 mb-2 grayscale coinbasae-logo" title="{{ucfirst(__("coinbase"))}}" alt="{{__("coinbase")}}"/>
                    <img src="{{asset('/img/logos/mercadopago.svg')}}" class="mx-3 mb-2 grayscale" title="{{ucfirst(__("mercadopago"))}}" alt="{{__("mercadopago")}}"/>
                </div>
            </div>
        </div>
    </div>

    <div class="my-5 py-5 home-bg-section">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="font-weight-bold">{{__("Featured creators")}}</h2>
                <p>{{__("Here's list of currated content creators to start exploring now!")}}</p>
            </div>

            <div class="creators-wrapper">
                <div class="row px-3">
                    @if(count($featuredMembers))
                        @foreach($featuredMembers as $member)
                            <div class="col-12 col-md-4 p-1">
                                <div class="p-2">
                                    @include('elements.vertical-member-card',['profile' => $member])
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="py-4 my-4 white-section ">
        <div class="container">
            <div class="text-center">
                <h3 class="font-weight-bold">{{__("Got questions?")}}</h3>
                <p>{{__("Don't hesitate to send us a message at")}} - <a href="{{route('contact')}}">{{__("Contact")}}</a> </p>
            </div>
        </div>
    </div>
@stop