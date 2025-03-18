@extends('back.layouts.dash_owner')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <div class="dashboard-title fl-wrap">
        <div class="dashboard-title-item"><span>Modification d'un établissements</span></div>
        @livewire('admin-owner-client-header-profile-info')
    </div>

    <div class="container dasboard-container">
        <!-- dashboard-title -->

        <!-- dashboard-title end -->
        <div class="dasboard-wrapper fl-wrap no-pag">
            <div class="dasboard-opt sl-opt fl-wrap">
                <a href="{{ route('owner.etablishment.index') }}" class="gradient-bg dashboard-addnew_btn"> Retour <i
                        class="fal fa-arrow-left"></i></a>
            </div>

            <div style="display: none; width: 866.625px; height: 57px; float: left;"></div>
            <!-- dasboard-widget-title -->
            <div class="dasboard-widget-title fl-wrap" id="sec1">
                <h5><i class="fas fa-info"></i>Basic Informations</h5>
            </div>
            <!-- dasboard-widget-title end -->
            <!-- dasboard-widget-box  -->
            <div class="dasboard-widget-box fl-wrap">
                <form action="{{ route('owner.etablishment.update', $etablishment->id) }}" method="POST"
                    enctype="multipart/form-data" class="custom-form">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Nom de l'établissement<span class="dec-icon"><i
                                        class="far fa-briefcase"></i></span></label>
                            <input type="text" placeholder="" name="name"
                                value="{{ old('name', $etablishment->name) }}">
                            @error('name')
                                <span class="text-danger ml-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <label>Catégorie</label>
                            <div class="listsearch-input-item">
                                <select name="category_id" data-placeholder="Apartments"
                                    class="chosen-select no-search-select">
                                    <option value="" disabled selected></option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id', $etablishment->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Adresse <span class="dec-icon"><i class="far fa-map-marker"></i></span></label>
                            <input type="text" placeholder="" name="address"
                                value="{{ old('address', $etablishment->address) }}">
                            @error('address')
                                <span class="text-danger ml-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-12">
                            <label>Description</label>
                            <textarea name="description" rows="4">{{ old('description', $etablishment->description) }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <label>Statut</label>
                            <div class="listsearch-input-item">
                                <select name="status" data-placeholder="Apartments" class="chosen-select no-search-select">
                                    <option value="" disabled selected></option>
                                    <option value="ouvert"
                                        {{ old('status', $etablishment->status) == 'ouvert' ? 'selected' : '' }}>Ouvert
                                    </option>
                                    <option value="fermer"
                                        {{ old('status', $etablishment->status) == 'fermer' ? 'selected' : '' }}>Fermé
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label>Adresse E-mail <span class="dec-icon"><i class="far fa-envelope"></i></span> </label>
                            <input type="text" placeholder="" name="email"
                                value="{{ old('email', $etablishment->email) }}">
                            @error('email')
                                <span class="text-danger ml-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <label>Téléphone WhatsApp <span class="dec-icon"><i class="far fa-phone"></i> </span>
                            </label>
                            <input type="text" placeholder="" name="phone_whatsapp"
                                value="{{ old('phone_whatsapp', $etablishment->phone_whatsapp) }}">
                            @error('phone_whatsapp')
                                <span class="text-danger ml-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <label>Téléphone Service <span class="dec-icon"><i class="far fa-phone"></i> </span>
                            </label>
                            <input type="text" placeholder="" name="phone_service"
                                value="{{ old('phone_service', $etablishment->phone_service) }}">
                            @error('phone_service')
                                <span class="text-danger ml-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <label> Site Web <span class="dec-icon"><i class="far fa-globe"></i> </span> </label>
                            <input type="text" placeholder="" name="website"
                                value="{{ old('website', $etablishment->website) }}">
                            @error('website')
                                <span class="text-danger ml-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <label>Latitude <span class="dec-icon"><i class="far fa-long-arrow-alt-down"></i>
                                </span></label>
                            <input type="text" id="lat" placeholder="" name="latitude"
                                value="{{ old('latitude', $etablishment->lattitude) }}">
                            @error('latitude')
                                <span class="text-danger ml-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <label>Longitude <span class="dec-icon"><i
                                        class="far fa-long-arrow-alt-right"></i></span></label>
                            <input type="text" id="long" placeholder="" name="longitude"
                                value="{{ old('longitude', $etablishment->longitude) }}">
                            @error('longitude')
                                <span class="text-danger ml-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <label>Heures d'ouverture</label>
                            <textarea name="opening_hours" rows="2">{{ old('opening_hours', $etablishment->opening_hours) }}</textarea>
                            @error('opening_hours')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <label>Services</label>
                            <textarea name="services" rows="2">{{ old('services', $etablishment->services) }}</textarea>
                            @error('services')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Image de couverture -->
                        <div class="col-sm-12">
                            <label>Image de couverture</label>
                            @if ($etablishment->cover_image)
                                <div>
                                    <img src="{{ asset('storage/' . $etablishment->cover_image) }}" width="150"
                                        class="mb-2" alt="Image actuelle">
                                </div>
                            @endif
                            <input name="cover_image" type="file">
                            @error('cover_image')
                                <span class="text-danger ml-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Images supplémentaires -->
                        <div class="col-sm-12">
                            <label>Images supplémentaires</label>
                            <div class="d-flex flex-wrap">
                                @foreach ($etablishment->images as $image)
                                    <div class="mr-2 mb-2">
                                        <img src="{{ asset('storage/' . $image->image_path) }}" width="100"
                                            alt="Image">
                                    </div>
                                @endforeach
                            </div>
                            <input type="file" name="images[]" class="form-control" multiple>
                            @error('images')
                                <span class="text-danger ml-2">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <button type="submit" class="btn color-bg float-btn">Mettre à jour</button>
                </form>
            </div>
            <!-- dasboard-widget-box  end-->
        </div>
    </div>

@endsection
