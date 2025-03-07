<div>

    <!-- dashboard-title end -->
    <!-- dasboard-wrapper-->
    <div class="dasboard-wrapper fl-wrap no-pag">
        <div class="row">
            <div class="col-md-7">
                <div class="dasboard-widget-title fl-wrap">
                    <h5><i class="fas fa-user-circle"></i>Changer votre photo de profil</h5>
                </div>
                <div class="dasboard-widget-box nopad-dash-widget-box fl-wrap">
                    <div class="edit-profile-photo">
                        <a href="javascript:;"
                            onclick="event.preventDefault();document.getElementById('clientProfilePictureFile').click();"
                            class="edit-avatar"><i class="fa fa-pencil"></i></a>
                        <img src="{{ $client->picture }}" alt="" class="avatar-photo" id="clientProfilePicture">
                        <input type="file" name="clientProfilePictureFile" id="clientProfilePictureFile"
                            class="d-none" style="opacity:0">
                    </div>
                </div>
                <div class="dasboard-widget-title fl-wrap">
                    <h5><i class="fas fa-key"></i>Informations
                        Personnels</h5>
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="dasboard-widget-box fl-wrap">
                    <form class="custom-form" wire:submit.prevent='updateClientPersonalDetails()'>
                        <label>Nom <span class="dec-icon"><i class="far fa-user"></i></span></label>
                        <input type="text" placeholder="" wire:model.live='name'>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <label>Nom Utilisateur <span class="dec-icon"><i class="fas fa-user"></i></span></label>
                        <input type="text" placeholder="" wire:model.live='username'>
                        @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <label>Adresse E-mail <span class="dec-icon"><i class="far fa-envelope"></i></span></label>
                        <input type="text" placeholder="" wire:model.live='email'>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <label>Téléphone <span class="dec-icon"><i class="far fa-phone"></i></span></label>
                        <input type="text" placeholder="" wire:model.live='phone'>
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <label>Profession <span class="dec-icon"><i class="fas fa-briefcase"></i></span></label>
                        <input type="text" placeholder="" wire:model.live='profession'>
                        @error('profession')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <label>Domicile <span class="dec-icon"><i class="fas fa-map-marker"></i></span></label>
                        <input type="text" placeholder="" wire:model.live='address'>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <label>Date de naissance <span class="dec-icon"><i class="fas fa-calendar"></i></span></label>
                        <input type="text" placeholder="" wire:model.live='date_naissance'>
                        @error('date_naissance')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <button type="submit" class="btn color-bg float-btn">Sauvegarder</button>
                    </form>
                </div>
            </div>
            <div class="col-md-5">
                <div class="dasboard-widget-title dbt-mm fl-wrap">
                    <h5><i class="fas fa-key"></i>Changer votre mot de passe</h5>
                </div>
                <div class="dasboard-widget-box fl-wrap">
                    <form class="custom-form" wire:submit='updatePassword()'>
                        <div class="pass-input-wrap fl-wrap">
                            <label>Ancien mot de passe<span class="dec-icon"><i
                                        class="far fa-lock-open-alt"></i></span></label>
                            <input type="password" class="pass-input" placeholder="" wire:model='current_password'>
                            <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
                        </div>
                        @error('current_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <br>
                        <div class="pass-input-wrap fl-wrap">
                            <label>Nouveau mot de passe<span class="dec-icon"><i
                                        class="far fa-lock-alt"></i></span></label>
                            <input type="password" class="pass-input" placeholder="" wire:model='new_password'>
                            <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
                        </div>
                        @error('new_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <br>
                        <div class="pass-input-wrap fl-wrap">
                            <label>Confirmer votre mot de passe<span class="dec-icon"><i
                                        class="far fa-shield-check"></i>
                                </span></label>
                            <input type="password" class="pass-input" placeholder=""
                                wire:model='new_password_confirmation'>
                            <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
                        </div>
                        @error('new_password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <br>
                        <button class="btn    color-bg  float-btn">Sauvegarder</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- dasboard-wrapper end -->

</div>
