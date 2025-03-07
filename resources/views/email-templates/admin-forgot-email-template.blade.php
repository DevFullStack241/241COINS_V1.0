<p>Cher {{ $admin->name }}</p>
<p>
    Nous recevons une demande de reinitialisation du mot de passe du compte 241Coins associer a {{ $admin->email }}.
    Vous pouvez reinitialiser votre mot de passe en cliquant sur le bouton ci-dessous:
    <br>
    <a href="{{ $actionLink }}" target="_blank"
        style="color:#fff;border-color:#22bc66;border-style:solid;border-width:5px 10px;background-color:#22bc66;display:inline-block;text-decoration:none;border-radius:3px;box-shadow:0 2px 3px rgba(0,0,0,0.16);-webkit-text-size-adjust:none;box-sizing:border-box;">Reset
        password</a>
    <br>
    <b>NB:</b> Ce lien de reinitialisation de mot de passe n'est valable que pour les 30 prochaines secondes.
    <br>
    Si vous n'avez pas demander de reinitialisation de mot de passe, veuillez ignorer cet e-mail.
</p>
