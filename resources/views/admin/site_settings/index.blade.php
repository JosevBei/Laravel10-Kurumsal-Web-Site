@extends('admin.layouts.master')

@section('title', 'Site Ayarları')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-sm-10">
                    <h6 class="mb-0 text-uppercase text-center" style="color: {{$siteSettings->theme_color}};">
                        <ion-icon name="settings-outline" style="font-size: 24px;"></ion-icon> <strong>Site Ayarları</strong>
                    </h6>
                    <hr>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('site-settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="site_title" class="form-label">
                                <ion-icon name="clipboard-outline" style="font-size: 18px;"></ion-icon> Site Başlığı
                            </label>
                            <input type="text" class="form-control" id="site_title" name="site_title"
                                value="{{ $siteSettings->site_title ?? old('site_title') }}">
                        </div>

                        <div class="mb-3">
                            <label for="site_description" class="form-label">
                                <ion-icon name="document-text-outline" style="font-size: 18px;"></ion-icon> Site Açıklaması
                            </label>
                            <textarea class="form-control" id="site_description" name="site_description" rows="3">{{ $siteSettings->site_description ?? old('site_description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="site_phone" class="form-label">
                                <ion-icon name="call-outline" style="font-size: 18px;"></ion-icon> Telefon Numarası
                            </label>
                            <input type="text" class="form-control" id="site_phone" name="phone_number"
                                value="{{ $siteSettings->phone_number ?? old('phone_number') }}">
                        </div>

                        <div class="mb-3">
                            <label for="logo" class="form-label">
                                <ion-icon name="image-outline" style="font-size: 18px;"></ion-icon> Logo
                            </label>
                            <input type="file" class="form-control" id="logo" name="logo">
                        </div>

                        <div class="mb-3">
                            <label for="favicon" class="form-label">
                                <ion-icon name="images-outline" style="font-size: 18px;"></ion-icon> Favicon
                            </label>
                            <input type="file" class="form-control" id="favicon" name="favicon">
                        </div>

                        <div class="mb-3">
                            <label for="instagram_url" class="form-label">
                                <ion-icon name="logo-instagram" style="font-size: 18px;"></ion-icon> Instagram URL
                            </label>
                            <input type="text" class="form-control" id="instagram_url" name="instagram"
                                value="{{ $siteSettings->instagram ?? old('instagram') }}">
                        </div>

                        <div class="mb-3">
                            <label for="facebook_url" class="form-label">
                                <ion-icon name="logo-facebook" style="font-size: 18px;"></ion-icon> Facebook URL
                            </label>
                            <input type="text" class="form-control" id="facebook_url" name="facebook"
                                value="{{ $siteSettings->facebook ?? old('facebook') }}">
                        </div>

                        <div class="mb-3">
                            <label for="twitter_url" class="form-label">
                                <ion-icon name="logo-twitter" style="font-size: 18px;"></ion-icon> Twitter URL
                            </label>
                            <input type="text" class="form-control" id="twitter_url" name="twitter"
                                value="{{ $siteSettings->twitter ?? old('twitter') }}">
                        </div>

                        <div class="mb-3">
                            <label for="pinterest_url" class="form-label">
                                <ion-icon name="logo-pinterest" style="font-size: 18px;"></ion-icon> Pinterest URL
                            </label>
                            <input type="text" class="form-control" id="pinterest_url" name="pinterest"
                                value="{{ $siteSettings->pinterest ?? old('pinterest') }}">
                        </div>

                        <div class="mb-3">
                            <label for="whatsapp_number" class="form-label">
                                <ion-icon name="logo-whatsapp" style="font-size: 18px;"></ion-icon> Whatsapp Numarası
                            </label>
                            <input type="text" class="form-control" id="whatsapp_number" name="whatsapp_number"
                                value="{{ $siteSettings->whatsapp_number ?? old('whatsapp_number') }}">
                        </div>

                        <div class="mb-3">
                            <label for="site_email" class="form-label">
                                <ion-icon name="mail-outline" style="font-size: 18px;"></ion-icon> Mail Adresi
                            </label>
                            <input type="email" class="form-control" id="site_email" name="email_address"
                                value="{{ $siteSettings->email_address ?? old('email_address') }}">
                        </div>

                        <div class="mb-3">
                            <label for="site_address" class="form-label">
                                <ion-icon name="locate-outline" style="font-size: 18px;"></ion-icon> Adres
                            </label>
                            <textarea class="form-control" id="site_address" name="address" rows="3">{{ $siteSettings->address ?? old('address') }}</textarea>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="maintenance_mode" name="maintenance_mode" value="1" {{ $siteSettings->maintenance_mode ? 'checked' : '' }}>
                            <label class="form-check-label" for="maintenance_mode">
                                <ion-icon name="construct-outline" style="font-size: 18px;"></ion-icon> Bakım Modu
                            </label>
                        </div>
                        

                        <div class="mb-3">
                            <label for="theme_color" class="form-label">
                                <ion-icon name="color-palette-outline" style="font-size: 18px;"></ion-icon> Tema Rengi
                            </label>
                            <input type="color" class="form-control" id="theme_color" name="theme_color"
                                value="{{ $siteSettings->theme_color ?? old('theme_color') }}">
                        </div>

                        <button type="submit" class="btn btn-primary" style="width: 100%; margin-bottom:20px;">
                            <ion-icon name="save-outline" style="font-size: 18px;"></ion-icon> Kaydet
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        form {
            @if ($siteSettings->theme_color)
                color: {{ $siteSettings->theme_color }};
            @else
                /* Varsayılan renk değeri ekleyebilirsin */
                color: black;
            @endif
        }

        .btn-primary{
            @if ($siteSettings->theme_color)
                background: {{ $siteSettings->theme_color }};
                border: none !important;
            @else
                /* Varsayılan renk değeri ekleyebilirsin */
                background: black;
            @endif
        }
        input:focus{
            box-shadow: none !important;
            outline: none !important;
            border: none !important;

        }

        textarea:focus{
            box-shadow: none !important;
            outline: none !important;
            border: none !important;

        }
        
    </style>
    
    
@endsection

