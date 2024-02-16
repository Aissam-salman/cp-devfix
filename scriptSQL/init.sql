
-- Insertion de données factices dans la table type_panne
INSERT INTO type_panne (lib_panne, img_panne) VALUES 
('Écran cassé', 'ecran.png'),
('Dommages par l''eau', 'dommages_eau.png'),
('Batterie', 'batterie.png'),
('Problème de charge', 'chargement.png'),
('Déblocage / Logiciel', 'deblocage.png'),
('Caméra défectueuse', 'camera.png'),
('Dommages à l''arriere', 'arriere.png');


INSERT INTO role (code_role, libelle_role) VALUES
('admin', 'Administrateur'),
('technicien', 'Technicien'),
('client', 'Client');

-- Insertion de données factices dans la table type_appareil
INSERT INTO type_appareil (lib_type_appareil, img_type_appareil) VALUES 
('Smartphone', 'smartphone.png'),
('Tablette', 'tablette.png'),
('smartwatch', 'smartwatch.png'),
('Ordinateur', 'ordinateur.png'),
('Console', 'console.png');

-- Insertion de données factices dans la table marque
INSERT INTO marque (lib_marque, logo_marque) VALUES
('Samsung', 'samsung.png'),
('Apple', 'apple.png'),
('Sony', 'sony.png');

-- Insertion de données factices dans la table contenir
INSERT INTO contenir (id_type_appareil, id_marque) VALUES 
(1, 1),
(1, 2),
(1, 3);

-- Insertion de données factices dans la table modele
INSERT INTO modele (lib_modele, img_modele, id_marque) VALUES 
('Samsung Galaxy S10', 'galaxy-s10.png', 1),
('Samsung Galaxy S20 Ultra 5G', 'galaxy-s20-ultra-5g.png', 1),
('iPhone 11 Pro', 'iphone-11-pro.png', 2),
('iPhone XS', 'iphone-xs.png', 2);

-- Insertion de données factices dans la table pieces
INSERT INTO pieces (lib_pieces, ref_fabricant, stock, img_piece, delai_livraison_pieces, prix_pieces_ttc, date_creation_pieces, date_maj_pieces, id_modele) VALUES 
('Batterie', 'BAT123', 100, 'batterie.png', 7, 29.99, NOW(), NOW(), 1),
('Écran', 'SCR456', 50, 'ecran.png', 5, 99.99, NOW(), NOW(), 2),
('Caméra', 'CAM789', 30, 'camera.png', 3, 49.99, NOW(), NOW(), 3);

INSERT INTO notes (titre_notes, commentaires, date_creation_note, date_maj_note, id_modele) VALUES
('Remarques sur le Galaxy S20', 'Très bon état général', NOW(), NOW(), 1),
('Problème de charge sur l''iPhone 12', 'Nécessite un remplacement de la batterie', NOW(), NOW(), 2),
('Écran cassé sur le Xperia 5 II', 'Demande de devis pour réparation', NOW(), NOW(), 3);

-- Insertion de données factices dans la table ville
INSERT INTO ville (nom_ville, code_insee, code_postal) VALUES 
('Paris', '75000', '75000'),
('Lyon', '69000', '69000'),
('Marseille', '13000', '13000');

-- Insertion de données factices dans la table utilisateur
INSERT INTO utilisateur (nom, prenom, email, mdp, numero, adresse, complement_adresse, date_creation_utilisateur, date_maj_utilisateur, id_role, id_ville) VALUES 
('Dupont', 'Jean', 'jean.dupont@example.com', '$argon2i$v=19$m=65536,t=4,p=1$N1dDMTBQL2FVU3ZPeDV2RQ$LMv5sOAKcGesN5/feu29fSTYz2vJzSESHbAnczT49JU', '0123456789', '1 Rue de la Paix', NULL, NOW(), NOW(), 1, 1),
('Doe', 'Jane', 'jane.doe@example.com', '$argon2i$v=19$m=65536,t=4,p=1$N1dDMTBQL2FVU3ZPeDV2RQ$LMv5sOAKcGesN5/feu29fSTYz2vJzSESHbAnczT49JU', '0987654321', '15 Avenue des Lilas', 'Appartement 3B', NOW(), NOW(), 3, 2),
('Smith', 'John', 'john.smith@example.com', '$argon2i$v=19$m=65536,t=4,p=1$N1dDMTBQL2FVU3ZPeDV2RQ$LMv5sOAKcGesN5/feu29fSTYz2vJzSESHbAnczT49JU', '1234567890', '25 Boulevard Voltaire', NULL, NOW(), NOW(), 2, 3);

-- Insertion de données factices dans la table Appareil
INSERT INTO appareil (code_imei, num_serie, date_creation_appareil, id_utilisateur, id_modele, id_type_appareil) VALUES 
('123456789012345', 'ABCD1234', NOW(), 1, 1, 1),
('987654321098765', 'EFGH5678', NOW(), 2, 2, 1),
('456789012345678', 'IJKL9101', NOW(), 3, 3, 1);

-- Insertion de données factices dans la table reparation
INSERT INTO reparation (observation, date_demande, date_maj_demande, id_panne, id_appareil, id_utilisateur) VALUES 
('Écran cassé', NOW(), NOW(), 1, 3, 2),
('Dommages par l''eau', NOW(), NOW(), 2, 3, 2),
('Batterie', NOW(), NOW(), 3, 3, 3);

-- Insertion de données factices dans la table tarif
INSERT INTO tarif (montant, date_creation, date_maj_tarif, id_panne, id_modele) VALUES 
(100.00, NOW(), NOW(), 1, 3),
(150.00, NOW(), NOW(), 2, 3),
(75.00, NOW(), NOW(), 3, 3),
(80.00, NOW(), NOW(), 4, 3),
(100.00, NOW(), NOW(), 5, 3),
(100.00, NOW(), NOW(), 6, 3),
(50.00, NOW(), NOW(), 7, 3);

-- Insertion de données factices dans la table devis
INSERT INTO devis (num_devis, date_devis, prix_ttc, commentaire_devis, date_restitution, statut, date_maj_devis, id_reparation, id_utilisateur) VALUES 
('DEV001', NOW(), 150.00, 'Remplacement de l''écran nécessaire', '2024-02-15', 0, NOW(), 1, 2),
('DEV002', NOW(), 80.00, 'Remplacement de l''écran arriere', '2024-02-15', 0, NOW(), 1, 2),
('DEV003', NOW(), 75.00, 'Remplacement de la batterie', '2024-02-20', 0, NOW(), 2, 3),
('DEV004', NOW(), 100.00, 'Réparation de la caméra', '2024-02-25', 0, NOW(), 3, 1);

INSERT INTO alerte (titre_alerte, contenu_alerte, date_alerte, id_utilisateur, id_devis) VALUES
('Alerte batterie faible', 'La batterie doit être remplacée', NOW(), 2, 1),
('Alerte devis expiré', 'Le devis DEV002 doit être validé avant le 20 février', NOW(), 3, 2),
('Alerte réparation terminée', 'La réparation du Xperia 5 II est terminée', NOW(), 1, 3);

-- Insertion de données factices dans la table parametre
INSERT INTO parametre (nom_entreprise, siren, code_tva, adresse_entreprise, email_entreprise, telephone_entreprise, couleur_primaire_entreprise, logo_entreprise) VALUES 
('DevFix', '978789956', 'FR42978789956', '203 Rue Pierre de Roubaix, 59100 Roubaix', 'contact@devfix.com', '0979301018', '#336699', 'logo.png');

INSERT INTO composer (id_devis, id_pieces) VALUES
(1, 2),
(2, 1),
(3, 3);