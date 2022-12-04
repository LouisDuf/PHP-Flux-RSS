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
    id SERIAL PRIMARY KEY NOT NULL,
    title varchar(200) NOT NULL,
    path varchar(500) NOT NULL,
    link varchar(1000) NOT NULL,
    description varchar(2000) NOT NULL,
    image_url varchar(1000),
    image_titre varchar(1000),
    image_link varchar(1000)
    );

-- --------------------------------------------------------

--
-- Structure de la table tnews
--

CREATE TABLE IF NOT EXISTS tnews (
    id SERIAL PRIMARY KEY NOT NULL,
    flux INT NOT NULL REFERENCES tflux (id),
    title varchar(255) NOT NULL,
    url varchar(1000) NOT NULL,
    guid varchar(1000) NOT NULL,
    description varchar(5000) NOT NULL,
    datePub date NOT NULL
    );

-- --------------------------------------------------------

--
-- Structure de la table tParams
--

CREATE TABLE IF NOT EXISTS tParams (
    param VARCHAR(255) PRIMARY KEY NOT NULL,
    value VARCHAR(255)
    );

INSERT INTO tParams VALUES("nbNewsPage","50");
INSERT INTO tParams VALUES("nbFluxPage","20");

-- --------------------------------------------------------

--
-- Pseudo donné
--

INSERT INTO tflux VALUES(1,'monTitre','monPath','myLink','maDescription');
INSERT INTO tnews VALUES(5,1,'monTitre','monURL','monGUID','maDescription','25-05-2022');