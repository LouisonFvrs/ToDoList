CREATE TABLE Compte(
                       id_Compte  int(11) NOT NULL,
                       MotDePasse VARCHAR(50) NOT NULL,
                       Nom VARCHAR(50) NOT NULL,
                       PRIMARY KEY(id_Compte)
)
    ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Structure de la table `todos`
--

CREATE TABLE `todos` (
    `id` int(11) NOT NULL,
    `texte` varchar(200) NOT NULL,
    `termine` tinyint(1) NOT NULL DEFAULT 0,
    `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `todos`
--
ALTER TABLE `todos`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `todos`
--
ALTER TABLE `todos`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

ALTER TABLE todos
    ADD FOREIGN KEY (id) REFERENCES Compte(id_Compte);
