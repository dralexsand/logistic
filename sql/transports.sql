-- Adminer 4.8.1 PostgreSQL 14.5 (Debian 14.5-2.pgdg110+2) dump

DROP TABLE IF EXISTS "transports";
DROP SEQUENCE IF EXISTS transports_id_seq;
CREATE SEQUENCE transports_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 CACHE 1;

CREATE TABLE "public"."transports" (
    "id" bigint DEFAULT nextval('transports_id_seq') NOT NULL,
    "company" character varying(128) NOT NULL,
    "price" double precision NOT NULL,
    "coefficient" double precision NOT NULL,
    CONSTRAINT "transports_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "transports" ("id", "company", "price", "coefficient") VALUES
(1,	'Champlin-Spencer',	609.4,	1.4),
(2,	'Ryan PLC',	656.5,	7.3),
(3,	'Ward, Carter and Hansen',	586.9,	9.7),
(4,	'Mertz, Hansen and Mills',	900.6,	7.8),
(5,	'Stroman-Kuhlman',	620.3,	9.4),
(6,	'DuBuque, Sauer and Schinner',	982.4,	1.3),
(7,	'Wuckert Group',	861.7,	5.1),
(8,	'Rosenbaum, Frami and Spencer',	980.4,	6.5),
(9,	'Reinger, Kris and Herman',	681.7,	8.2),
(10,	'Runolfsdottir-Fadel',	827.9,	5.1),
(11,	'Pouros, Wisoky and Cummings',	980.8,	5.4),
(12,	'Gottlieb LLC',	715.1,	5.8),
(13,	'Ortiz, McGlynn and Rutherford',	934.6,	7.1),
(14,	'Johnson-Jacobson',	958.3,	6.7),
(15,	'Kulas-Flatley',	834.4,	7.2),
(16,	'Pouros, O''Conner and Rosenbaum',	841.1,	1.2),
(17,	'Brakus-Gislason',	511,	1.5),
(18,	'Lesch PLC',	777,	4.8),
(19,	'Quigley-Prohaska',	941.8,	7.2);

-- 2023-03-21 05:06:20.555403+00
