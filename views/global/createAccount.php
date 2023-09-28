<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h3>Création de compte</h3>
        </div>
        <div class="card-body">
            <form action="./traitement" method="POST">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom :</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom :</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Adresse e-mail :</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="motDePasse" class="form-label">Mot de passe :</label>
                    <input type="password" class="form-control" id="motDePasse" name="motDePasse" required>
                </div>
                <div class="mb-3">
                    <label for="confirmerMotDePasse" class="form-label">Confirmer le mot de passe :</label>
                    <input type="password" class="form-control" id="confirmerMotDePasse" name="confirmerMotDePasse" required>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="accepterConditions" required>
                        <label class="form-check-label" for="accepterConditions">J'accepte les conditions d'utilisation</label>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Créer un compte</button>
                </div>
            </form>
        </div>
    </div>
</div>
