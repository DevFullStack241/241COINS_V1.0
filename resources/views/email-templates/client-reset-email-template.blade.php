<p>Cher {{ $client->name }}</p><br>
<p>
    Votre mot de passe sur la plate-forme 241Coins a ete modifier avec succes.
    Voici vos nouveaux identifiants de connexion:
    <br>
    <b>Identifiant de connexion: </b>{{ isset($client->username) ? $client->username . ' ou ' : '' }}
    {{ $client->email }}
    <br>
    <b>Mot de passe: </b>{{ $new_password }}
</p>
<br>
Veuillez garder vos informations d'identification confidentielles.
Votre nom d'utilisateur et votre mot de passe sont vos propres informations d'identification et vous ne devez jamais les
partager avec quelqu'un d'autre.

<p>
    241Coins ne sera pas responsable de toute utilisation abusive de votre nom d'utilisateur ou de votre mot de passe.
</p>
<br>
---------------------------------------
<p>
    Cet email a ete envoyer automatiquement par la plate-forme 241Coins. Ne repondez pas.
</p>
