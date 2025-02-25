CREATE TABLE Role (
    ID_Role SERIAL PRIMARY KEY,
    nom_role VARCHAR(50) NOT NULL
);

CREATE TABLE "User" (
    ID_User SERIAL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    tel VARCHAR(20) NOT NULL,
    mail VARCHAR(100) UNIQUE NOT NULL,
    mdp VARCHAR(255) NOT NULL,
    ID_Role INT NOT NULL,
    FOREIGN KEY (ID_Role) REFERENCES Role(ID_Role) ON DELETE CASCADE
);

CREATE TABLE Annonce (
    ID_Annonce SERIAL PRIMARY KEY,
    description TEXT NOT NULL,
    localisation VARCHAR(255) NOT NULL,
    ID_User INT NOT NULL,
    FOREIGN KEY (ID_User) REFERENCES "User"(ID_User) ON DELETE CASCADE
);

CREATE TABLE Annonce_Image (
    ID_Annonce INT NOT NULL,
    image BYTEA NOT NULL,  -- Stocke l’image en binaire
    PRIMARY KEY (ID_Annonce, image),
    FOREIGN KEY (ID_Annonce) REFERENCES Annonce(ID_Annonce) ON DELETE CASCADE
);

