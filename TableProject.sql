--
-- Base de données: fluxrss
--

DROP TABLE IF EXISTS tadmin;
DROP TABLE IF EXISTS tnews;
DROP TABLE IF EXISTS tflux;
DROP TABLE IF EXISTS tParams;

-- --------------------------------------------------------

--
-- Structure de la table tflux
--

CREATE TABLE IF NOT EXISTS tflux (
    id              SERIAL              PRIMARY KEY NOT NULL,
    title           varchar(200)        NOT NULL,
    path            varchar(500),                   -- Non utilisé
    link            varchar(1000)       NOT NULL,
    description     varchar(2000)       NOT NULL

    );

-- --------------------------------------------------------

--
-- Structure de la table tnews
--

CREATE TABLE IF NOT EXISTS tnews (
    id              SERIAL              PRIMARY KEY NOT NULL,
    flux            INT                 NOT NULL REFERENCES tflux (id) ON DELETE CASCADE,
    title           varchar(255)        NOT NULL,
    url             varchar(1000)       NOT NULL,
    guid            varchar(1000),                                           -- Non utilisé
    description     varchar(5000)       NOT NULL,
    datePub         date                NOT NULL
    );


-- --------------------------------------------------------

--
-- Structure de la table `tAdmin`
--

CREATE TABLE IF NOT EXISTS tAdmin (
    login       varchar(50)             PRIMARY KEY NOT NULL,
    mdp         varchar(255)            NOT NULL
    );

-- --------------------------------------------------------

--
-- Structure de la table tParams
--

CREATE TABLE IF NOT EXISTS tParams (
    param       VARCHAR(255)            PRIMARY KEY NOT NULL,
    value       VARCHAR(255)            NOT NULL
    );

-- --------------------------------------------------------

INSERT INTO tParams VALUES('nbFluxParPage', 5);
INSERT INTO tParams VALUES('nbNewsParPage', 5);
INSERT INTO tparams VALUES('nbNewsTotal', 500);

INSERT INTO tadmin VALUES('admin0', '$argon2i$v=19$m=65536,t=4,p=1$R0U5U3RRdjdYd0JFYm1weQ$aNf7IdQIZXKlX7nfT9GZNcEievYhx3n6+OOoTgTcwOE'); -- vrai mot de passe = mdp

INSERT INTO tflux(title, path, link, description) VALUES('Fnac',
                                                         'https://leclaireur.fnac.com/feed/',
                                                         'https://leclaireur.fnac.com/feed/',
                                                         'Flux RSS de la Fanc : aucune rubrique spécifiée');
INSERT INTO tflux(title, path, link, description) VALUES('Le Monde',
                                                         'https://www.lemonde.fr/rss/une.xml',
                                                         'https://www.lemonde.fr/rss/une.xml',
                                                         'Flux RSS Le Monde : rubrique actualité & à la une');
INSERT INTO tflux(title, path, link, description) VALUES('France Info',
                                                         'https://www.francetvinfo.fr/france.rss',
                                                         'https://www.francetvinfo.fr/france.rss',
                                                         'Flux RSS France Info : rubrique France');
INSERT INTO tflux(title, path, link, description) VALUES('France Info',
                                                         'https://www.francetvinfo.fr/monde/afrique.rss',
                                                         'https://www.francetvinfo.fr/monde/afrique.rss',
                                                         'Flux RSS France Info : rubrique Afrique');
INSERT INTO tflux(title, path, link, description) VALUES('France Info',
                                                         'https://www.francetvinfo.fr/monde/ameriques.rss',
                                                         'https://www.francetvinfo.fr/monde/ameriques.rss',
                                                         'Flux RSS France Info : rubrique Amerique');
INSERT INTO tflux(title, path, link, description) VALUES('France Info',
                                                         'https://www.francetvinfo.fr/monde/asie.rss',
                                                         'https://www.francetvinfo.fr/monde/asie.rss',
                                                         'Flux RSS France Info : rubrique Asie-Pacifique');
INSERT INTO tflux(title, path, link, description) VALUES('France Info',
                                                         'https://www.francetvinfo.fr/monde/proche-orient.rss',
                                                         'https://www.francetvinfo.fr/monde/proche-orient.rss',
                                                         'Flux RSS France Info : rubrique Proche-Orient');



--INSERT INTO tnews VALUES(5,1,'monTitre','monURL','monGUID','maDescription','25-05-2022');