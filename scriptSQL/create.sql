DROP DATABASE IF EXISTS `devfix`;
CREATE DATABASE `devfix`;


CREATE TABLE type_panne(
        id_panne  Int  Auto_increment  NOT NULL ,
        lib_panne Varchar (150) NOT NULL,
        img_panne   Varchar (40)
	,CONSTRAINT type_panne_PK PRIMARY KEY (id_panne)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: type_appareil
#------------------------------------------------------------

CREATE TABLE type_appareil(
        id_type_appareil  Int  Auto_increment  NOT NULL ,
        lib_type_appareil Varchar (50) NOT NULL ,
        img_type_appareil Varchar (100)
	,CONSTRAINT type_appareil_PK PRIMARY KEY (id_type_appareil)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: marque
#------------------------------------------------------------

CREATE TABLE marque(
        id_marque   Int  Auto_increment  NOT NULL ,
        lib_marque  Varchar (150) NOT NULL ,
        logo_marque Varchar (150)
	,CONSTRAINT marque_PK PRIMARY KEY (id_marque)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: contenir
#------------------------------------------------------------

CREATE TABLE contenir(
        id_type_appareil  Int NOT NULL ,
        id_marque Int NOT NULL
	,CONSTRAINT contenir_PK PRIMARY KEY (id_type_appareil,id_marque)
	,CONSTRAINT contenir_type_appareil_FK FOREIGN KEY (id_type_appareil) REFERENCES type_appareil(id_type_appareil)
	,CONSTRAINT contenir_marque0_FK FOREIGN KEY (id_marque) REFERENCES marque(id_marque)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: modele
#------------------------------------------------------------

CREATE TABLE modele(
        id_modele  Int  Auto_increment  NOT NULL ,
        lib_modele Varchar (150) NOT NULL ,
        img_modele Varchar (40) ,
        id_marque  Int NOT NULL
	,CONSTRAINT modele_PK PRIMARY KEY (id_modele)
	,CONSTRAINT modele_marque_FK FOREIGN KEY (id_marque) REFERENCES marque(id_marque)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: pieces
#------------------------------------------------------------

CREATE TABLE pieces(
        id_pieces              Int  Auto_increment  NOT NULL ,
        lib_pieces             Varchar (150) NOT NULL ,
        ref_fabricant          Varchar (150) NOT NULL ,
        stock                  Int NOT NULL ,
        img_piece              Varchar (50) NOT NULL ,
        delai_livraison_pieces Int NOT NULL ,
        prix_pieces_ttc        DECIMAL (15,3)  NOT NULL ,
        date_creation_pieces   Datetime NOT NULL ,
        date_maj_pieces        Datetime NOT NULL ,
        id_modele              Int NOT NULL
	,CONSTRAINT pieces_PK PRIMARY KEY (id_pieces)
	,CONSTRAINT pieces_modele_FK FOREIGN KEY (id_modele) REFERENCES modele(id_modele)
)ENGINE=InnoDB;



#------------------------------------------------------------
# Table: role
#------------------------------------------------------------

CREATE TABLE role(
        id_role      Int  Auto_increment  NOT NULL ,
        code_role    Varchar (50) NOT NULL ,
        libelle_role Varchar (50) NOT NULL
	,CONSTRAINT role_PK PRIMARY KEY (id_role)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: notes
#------------------------------------------------------------

CREATE TABLE notes(
        id_notes           Int  Auto_increment  NOT NULL ,
        titre_notes        Varchar (100) NOT NULL ,
        commentaires       Text NOT NULL ,
        date_creation_note Datetime NOT NULL ,
        date_maj_note      Datetime NOT NULL ,
        id_modele          Int NOT NULL
	,CONSTRAINT notes_PK PRIMARY KEY (id_notes)
	,CONSTRAINT notes_modele_FK FOREIGN KEY (id_modele) REFERENCES modele(id_modele)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ville
#------------------------------------------------------------

CREATE TABLE ville(
        id_ville    Int  Auto_increment  NOT NULL ,
        nom_ville   Varchar (50) NOT NULL ,
        code_insee  Char (5) NOT NULL ,
        code_postal Char (5) NOT NULL
	,CONSTRAINT ville_PK PRIMARY KEY (id_ville)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: utilisateur
#------------------------------------------------------------

CREATE TABLE utilisateur(
        id_utilisateur            Int  Auto_increment  NOT NULL ,
        nom                       Varchar (100) NOT NULL ,
        prenom                    Varchar (100) NOT NULL ,
        email                     Varchar (150) NOT NULL ,
        mdp                       Varchar (150) NOT NULL ,
        numero                    Varchar (20) NOT NULL ,
        adresse                   Varchar (255) ,
        complement_adresse        Varchar (50) ,
        date_creation_utilisateur Datetime NOT NULL ,
        date_maj_utilisateur      Datetime NOT NULL ,
        id_role                   Int NOT NULL ,
        id_ville                  Int NOT NULL
	,CONSTRAINT utilisateur_PK PRIMARY KEY (id_utilisateur)
	,CONSTRAINT utilisateur_role_FK FOREIGN KEY (id_role) REFERENCES role(id_role)
	,CONSTRAINT utilisateur_ville0_FK FOREIGN KEY (id_ville) REFERENCES ville(id_ville)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Appareil
#------------------------------------------------------------

CREATE TABLE appareil(
        id_appareil            Int  Auto_increment  NOT NULL ,
        code_imei              Varchar (100) ,
        num_serie              Varchar (100) NOT NULL ,
        date_creation_appareil Datetime NOT NULL ,
        id_utilisateur         Int NOT NULL ,
        id_modele              Int NOT NULL ,
        id_type_appareil       Int NOT NULL
	,CONSTRAINT appareil_PK PRIMARY KEY (id_appareil)
	,CONSTRAINT appareil_utilisateur_FK FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur)
	,CONSTRAINT appareil_modele0_FK FOREIGN KEY (id_modele) REFERENCES modele(id_modele)
	,CONSTRAINT appareil_type_appareil1_FK FOREIGN KEY (id_type_appareil) REFERENCES type_appareil(id_type_appareil)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: reparation
#------------------------------------------------------------

CREATE TABLE reparation(
        id_reparation    Int  Auto_increment  NOT NULL ,
        observation      Text NOT NULL ,
        date_demande     Datetime NOT NULL ,
        date_maj_demande Datetime NOT NULL ,
        id_panne         Int NOT NULL ,
        id_appareil      Int NOT NULL ,
        id_utilisateur   Int NOT NULL
	,CONSTRAINT reparation_PK PRIMARY KEY (id_reparation)
	,CONSTRAINT reparation_type_panne_FK FOREIGN KEY (id_panne) REFERENCES type_panne(id_panne)
	,CONSTRAINT reparation_Appareil0_FK FOREIGN KEY (id_appareil) REFERENCES Appareil(id_appareil)
	,CONSTRAINT reparation_utilisateur2_FK FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: tarif
#------------------------------------------------------------

CREATE TABLE tarif(
        id_tarif       Int  Auto_increment  NOT NULL ,
        montant        DECIMAL (15,3)  NOT NULL ,
        date_creation  Datetime NOT NULL ,
        date_maj_tarif Datetime NOT NULL ,
        id_panne       Int NOT NULL ,
        id_modele      Int NOT NULL
	,CONSTRAINT tarif_PK PRIMARY KEY (id_tarif)
	,CONSTRAINT tarif_type_panne_FK FOREIGN KEY (id_panne) REFERENCES type_panne(id_panne)
	,CONSTRAINT tarif_modele0_FK FOREIGN KEY (id_modele) REFERENCES modele(id_modele)
)ENGINE=InnoDB;



#------------------------------------------------------------
# Table: devis
#------------------------------------------------------------

CREATE TABLE devis(
        id_devis          Int  Auto_increment  NOT NULL ,
        num_devis         Varchar (50) NOT NULL ,
        date_devis        Datetime NOT NULL ,
        prix_ttc          DECIMAL (15,3)  NOT NULL ,
        commentaire_devis Text ,
        date_restitution  Date NOT NULL ,
        statut        Bool NOT NULL ,
        date_maj_devis    Datetime NOT NULL ,
        id_reparation     Int NOT NULL ,
        id_utilisateur    Int NOT NULL
	,CONSTRAINT devis_PK PRIMARY KEY (id_devis)
	,CONSTRAINT devis_reparation_FK FOREIGN KEY (id_reparation) REFERENCES reparation(id_reparation)
	,CONSTRAINT devis_utilisateur0_FK FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: alerte
#------------------------------------------------------------

CREATE TABLE alerte(
        id_alerte      Int  Auto_increment  NOT NULL ,
        titre_alerte   Varchar (100) NOT NULL ,
        contenu_alerte Text NOT NULL ,
        date_alerte    Datetime NOT NULL ,
        id_utilisateur Int NOT NULL ,
        id_devis       Int NOT NULL
	,CONSTRAINT alerte_PK PRIMARY KEY (id_alerte)
	,CONSTRAINT alerte_utilisateur_FK FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur)
	,CONSTRAINT alerte_devis0_FK FOREIGN KEY (id_devis) REFERENCES devis(id_devis)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: parametre
#------------------------------------------------------------

CREATE TABLE parametre(
    id_parametre            INT AUTO_INCREMENT PRIMARY KEY,
    nom_entreprise          VARCHAR(50) NOT NULL,
    siren                   VARCHAR(50) NOT NULL,
    code_tva                VARCHAR(50) NOT NULL,
    adresse_entreprise      VARCHAR(50) NOT NULL,
    email_entreprise        VARCHAR(50) NOT NULL,
    telephone_entreprise    VARCHAR(50) NOT NULL,
    couleur_primaire_entreprise VARCHAR(30) NOT NULL,
    logo_entreprise         VARCHAR(30) NOT NULL
) ENGINE=InnoDB;

#------------------------------------------------------------
# Table: composer
#------------------------------------------------------------

CREATE TABLE composer(
        id_devis  Int NOT NULL ,
        id_pieces Int NOT NULL
	,CONSTRAINT composer_PK PRIMARY KEY (id_devis,id_pieces)
	,CONSTRAINT composer_devis_FK FOREIGN KEY (id_devis) REFERENCES devis(id_devis)
	,CONSTRAINT composer_pieces0_FK FOREIGN KEY (id_pieces) REFERENCES pieces(id_pieces)
)ENGINE=InnoDB;
