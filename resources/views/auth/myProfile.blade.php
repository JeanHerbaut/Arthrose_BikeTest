<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bike Test - Gryon</title>
</head>
<body>
    <form action="">
        <label for="username">Nom d'utlisateur</label>
        <input type="text" id="username" name="username" disabled>
        <label for="firstname">Prénom</label>
        <input type="text" id="firstname" name="firstname" disabled>
        <label for="name">Nom</label>
        <input type="text" id="name" name="name" disabled>
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" disabled=true>
        <label for="password-confirm">Mot de passe</label>
        <input type="password-confirm" id="password-confirm" name="password_confirmation" required autocomplete="new-password" disabled>
        <input type="submit" value="Confirmer" hidden>
    </form>
    <button id="cancel" hidden>Annuler</button>
    <button id="modify">Modifier mes infos</button>
</body>
<script>
    const btn_modify = document.getElementById('modify')
    const btn_cancel = document.getElementById('cancel')   
    btn.addEventListener(
        "click", evt => {
            let inputs = document.getElementsByTagName("input")
            for (let index = 0; index < inputs.length; index++) {
                inputs[index].removeAttribute("disabled")
                btn_cancel.removeAttribute('hidden')
                btn.setAttribute('hidden', true)
            }
        }
    
    )
</script>
</html>