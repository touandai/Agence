-- Table: agence.user

-- DROP TABLE IF EXISTS agence."user";

--CREATE TABLE IF NOT EXISTS agence."user"
--(
--    id bigint NOT NULL DEFAULT nextval('agence.user_id_seq'::regclass),
--    nom character varying COLLATE pg_catalog."default" NOT NULL,
--    email character varying COLLATE pg_catalog."default" NOT NULL,
--    mot_de_pass character varying COLLATE pg_catalog."default" NOT NULL,
--   date_creation timestamp with time zone NOT NULL,
--   id_role integer,
--   CONSTRAINT email UNIQUE (email)
--        INCLUDE(email)
--)

--TABLESPACE pg_default;

--ALTER TABLE IF EXISTS agence."user"
--    OWNER to postgres;


-- DROP TABLE IF EXISTS agence.contact;

--CREATE TABLE IF NOT EXISTS agence.contact
--(
--    id bigint NOT NULL,
--    type_demande character varying(15) COLLATE pg_catalog."default" NOT NULL,
--    nom character varying(30) COLLATE pg_catalog."default" NOT NULL,
--    email character varying(30) COLLATE pg_catalog."default" NOT NULL,
--    telephone character varying(15) COLLATE pg_catalog."default" NOT NULL,
--    message text COLLATE pg_catalog."default",
--    date_contact timestamp with time zone NOT NULL,
--    CONSTRAINT contact_pkey PRIMARY KEY (id)
--)

--TABLESPACE pg_default;

--ALTER TABLE IF EXISTS agence.contact
--    OWNER to postgres;


-- Table: agence.client

-- DROP TABLE IF EXISTS agence.client;

--CREATE TABLE IF NOT EXISTS agence.client
--(
--  id bigint NOT NULL DEFAULT nextval('agence.client_id_seq'::regclass),
--  civilite character varying COLLATE pg_catalog."default" NOT NULL,
--  nom character varying COLLATE pg_catalog."default" NOT NULL,
--  prenom character varying COLLATE pg_catalog."default" NOT NULL,
--  date_naissance timestamp with time zone NOT NULL,
--  nationalite character varying COLLATE pg_catalog."default" NOT NULL,
--  telephone character varying COLLATE pg_catalog."default" NOT NULL,
--  email character varying COLLATE pg_catalog."default" NOT NULL,
--  mot_de_pass character varying COLLATE pg_catalog."default" NOT NULL,
--  date_inscription timestamp with time zone NOT NULL,
--  statut_client integer,
--  CONSTRAINT client_pkey PRIMARY KEY (id)
)

--TABLESPACE pg_default;

--ALTER TABLE IF EXISTS agence.client
--    OWNER to postgres;


-- Table: agence.avis

-- DROP TABLE IF EXISTS agence.avis;

--CREATE TABLE IF NOT EXISTS agence.avis
--(
--    id bigint NOT NULL DEFAULT nextval('agence.avis_id_seq'::regclass),
--    nom character varying(20) COLLATE pg_catalog."default" NOT NULL,
--    note integer NOT NULL,
--    message text COLLATE pg_catalog."default" NOT NULL,
--    date_avis timestamp with time zone NOT NULL,
--    statut integer DEFAULT 0,
--    CONSTRAINT avis_pkey PRIMARY KEY (id)
--)

--TABLESPACE pg_default;

--ALTER TABLE IF EXISTS agence.avis
--    OWNER to postgres;


----------------------------INSERTION 
	
--INSERT INTO agence."user"(
--	nom, prenom, email, mot_de_pass, date_creation)
--	VALUES ('Touandai','Romaric','touandaibrice@yahoo.fr','Romaric10','2024-01-22 14:15:00');
