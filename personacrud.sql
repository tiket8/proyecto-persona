--
-- PostgreSQL database dump
--

-- Dumped from database version 16.3
-- Dumped by pg_dump version 16.3

-- Started on 2024-06-06 22:59:33

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 226 (class 1259 OID 16740)
-- Name: codigos_postales; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.codigos_postales (
    id integer NOT NULL,
    codigo_postal character varying(10) NOT NULL,
    localidad_id integer NOT NULL
);


ALTER TABLE public.codigos_postales OWNER TO postgres;

--
-- TOC entry 225 (class 1259 OID 16739)
-- Name: codigos_postales_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.codigos_postales_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.codigos_postales_id_seq OWNER TO postgres;

--
-- TOC entry 4896 (class 0 OID 0)
-- Dependencies: 225
-- Name: codigos_postales_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.codigos_postales_id_seq OWNED BY public.codigos_postales.id;


--
-- TOC entry 220 (class 1259 OID 16709)
-- Name: estados; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.estados (
    id integer NOT NULL,
    nombre character varying(100) NOT NULL
);


ALTER TABLE public.estados OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 16708)
-- Name: estados_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.estados_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.estados_id_seq OWNER TO postgres;

--
-- TOC entry 4897 (class 0 OID 0)
-- Dependencies: 219
-- Name: estados_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.estados_id_seq OWNED BY public.estados.id;


--
-- TOC entry 224 (class 1259 OID 16728)
-- Name: localidades; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.localidades (
    id integer NOT NULL,
    nombre character varying(100) NOT NULL,
    municipio_id integer NOT NULL
);


ALTER TABLE public.localidades OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 16727)
-- Name: localidades_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.localidades_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.localidades_id_seq OWNER TO postgres;

--
-- TOC entry 4898 (class 0 OID 0)
-- Dependencies: 223
-- Name: localidades_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.localidades_id_seq OWNED BY public.localidades.id;


--
-- TOC entry 222 (class 1259 OID 16716)
-- Name: municipios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.municipios (
    id integer NOT NULL,
    nombre character varying(100) NOT NULL,
    estado_id integer NOT NULL
);


ALTER TABLE public.municipios OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 16715)
-- Name: municipios_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.municipios_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.municipios_id_seq OWNER TO postgres;

--
-- TOC entry 4899 (class 0 OID 0)
-- Dependencies: 221
-- Name: municipios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.municipios_id_seq OWNED BY public.municipios.id;


--
-- TOC entry 218 (class 1259 OID 16688)
-- Name: persona; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.persona (
    id integer NOT NULL,
    nombres character varying(50) NOT NULL,
    primer_apellido character varying(50) NOT NULL,
    segundo_apellido character varying(50) NOT NULL,
    fecha_nacimiento date NOT NULL,
    edad integer NOT NULL,
    sexo character varying(10) NOT NULL,
    fk_profesion integer,
    direccion character varying(100),
    codigo_postal character varying(10),
    municipio character varying(50),
    estado character varying(50),
    localidad character varying(50),
    telefono character varying(15),
    foto_perfil character varying(255)
);


ALTER TABLE public.persona OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 16687)
-- Name: persona_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.persona_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.persona_id_seq OWNER TO postgres;

--
-- TOC entry 4900 (class 0 OID 0)
-- Dependencies: 217
-- Name: persona_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.persona_id_seq OWNED BY public.persona.id;


--
-- TOC entry 216 (class 1259 OID 16680)
-- Name: profesion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.profesion (
    pk_profesion integer NOT NULL,
    profesion character varying(50) NOT NULL,
    hora time without time zone NOT NULL,
    fecha date NOT NULL,
    estado integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.profesion OWNER TO postgres;

--
-- TOC entry 215 (class 1259 OID 16679)
-- Name: profesion_pk_profesion_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.profesion_pk_profesion_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.profesion_pk_profesion_seq OWNER TO postgres;

--
-- TOC entry 4901 (class 0 OID 0)
-- Dependencies: 215
-- Name: profesion_pk_profesion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.profesion_pk_profesion_seq OWNED BY public.profesion.pk_profesion;


--
-- TOC entry 4719 (class 2604 OID 16743)
-- Name: codigos_postales id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.codigos_postales ALTER COLUMN id SET DEFAULT nextval('public.codigos_postales_id_seq'::regclass);


--
-- TOC entry 4716 (class 2604 OID 16712)
-- Name: estados id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estados ALTER COLUMN id SET DEFAULT nextval('public.estados_id_seq'::regclass);


--
-- TOC entry 4718 (class 2604 OID 16731)
-- Name: localidades id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.localidades ALTER COLUMN id SET DEFAULT nextval('public.localidades_id_seq'::regclass);


--
-- TOC entry 4717 (class 2604 OID 16719)
-- Name: municipios id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.municipios ALTER COLUMN id SET DEFAULT nextval('public.municipios_id_seq'::regclass);


--
-- TOC entry 4715 (class 2604 OID 16691)
-- Name: persona id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.persona ALTER COLUMN id SET DEFAULT nextval('public.persona_id_seq'::regclass);


--
-- TOC entry 4713 (class 2604 OID 16683)
-- Name: profesion pk_profesion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.profesion ALTER COLUMN pk_profesion SET DEFAULT nextval('public.profesion_pk_profesion_seq'::regclass);


--
-- TOC entry 4890 (class 0 OID 16740)
-- Dependencies: 226
-- Data for Name: codigos_postales; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.codigos_postales (id, codigo_postal, localidad_id) FROM stdin;
1	63000	1
2	63190	2
3	63157	3
4	63170	4
5	63830	5
6	63834	6
7	63835	7
8	63836	8
9	63800	9
10	63840	10
11	63400	11
12	63550	12
\.


--
-- TOC entry 4884 (class 0 OID 16709)
-- Dependencies: 220
-- Data for Name: estados; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.estados (id, nombre) FROM stdin;
1	Nayarit
\.


--
-- TOC entry 4888 (class 0 OID 16728)
-- Dependencies: 224
-- Data for Name: localidades; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.localidades (id, nombre, municipio_id) FROM stdin;
1	Tepic Centro	1
2	San Cayetano	1
3	Mololoa	1
4	La Cantera	1
5	Centro	2
6	Las Lomas	2
7	El Barrio	2
8	La Playa	2
9	San Blas	3
10	Presa Santiago	2
11	Acaponeta Centro	4
12	El Mil	5
\.


--
-- TOC entry 4886 (class 0 OID 16716)
-- Dependencies: 222
-- Data for Name: municipios; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.municipios (id, nombre, estado_id) FROM stdin;
1	Tepic	1
2	Santiago Ixcuintla	1
3	San Blas	1
4	Acaponeta	1
5	Rosamorada	1
\.


--
-- TOC entry 4882 (class 0 OID 16688)
-- Dependencies: 218
-- Data for Name: persona; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.persona (id, nombres, primer_apellido, segundo_apellido, fecha_nacimiento, edad, sexo, fk_profesion, direccion, codigo_postal, municipio, estado, localidad, telefono, foto_perfil) FROM stdin;
6	Miguel	Valenzuela	Lopez	1988-12-30	35	hombre	1	Calle1	63000	Tepic	Nayarit	Tepic Centro	311254879	uploads/perfil.jpg
7	Manuel	Pérez	Gómez	1990-05-15	33	hombre	1	Calle Falsa 123	63000	Tepic	Nayarit	Tepic Centro	3111234567	uploads/juan.jpg
8	María	López	Hernández	1985-10-22	38	mujer	2	Avenida Siempre Viva 456	63190	Tepic	Nayarit	San Cayetano	3119876543	uploads/maria.jpg
9	Carlos	Sánchez	Martínez	1978-03-30	46	hombre	3	Boulevard de los Héroes 789	63800	San Blas	Nayarit	San Blas	3116543210	uploads/carlos.jpg
10	Juan	Norte	Gómez	1990-05-15	33	hombre	1	Calle Falsa 546	63000	Tepic	Nayarit	Tepic Centro	3111234567	uploads/juan.jpg
11	Luisa	Pedro	Hernández	1985-10-22	38	mujer	2	Avenida Siempre Viva 487	63190	Tepic	Nayarit	San Cayetano	3119876543	uploads/maria.jpg
13	vcxz	czczx	zczx	1988-12-30	35	hombre	1	bkjsdbjads	63000	\N	\N	\N	32153465	uploads/perfil.jpg
\.


--
-- TOC entry 4880 (class 0 OID 16680)
-- Dependencies: 216
-- Data for Name: profesion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.profesion (pk_profesion, profesion, hora, fecha, estado) FROM stdin;
1	Ingeniero	09:00:00	2023-01-01	1
2	Doctor	10:00:00	2023-01-02	1
3	Profesor	11:00:00	2023-01-03	1
4	Ingeniero	09:00:00	2023-01-01	1
5	Doctor	10:00:00	2023-01-02	1
6	Profesor	11:00:00	2023-01-03	1
7	Abogado	12:00:00	2023-01-04	1
8	Arquitecto	13:00:00	2023-01-05	1
9	Enfermero	14:00:00	2023-01-06	1
10	Contador	15:00:00	2023-01-07	1
11	Desarrollador de Software	16:00:00	2023-01-08	1
12	Electricista	17:00:00	2023-01-09	1
13	Mecánico	18:00:00	2023-01-10	1
14	Chef	19:00:00	2023-01-11	1
15	Psicólogo	20:00:00	2023-01-12	1
16	Periodista	21:00:00	2023-01-13	1
17	Diseñador Gráfico	22:00:00	2023-01-14	1
18	Farmacéutico	23:00:00	2023-01-15	1
\.


--
-- TOC entry 4902 (class 0 OID 0)
-- Dependencies: 225
-- Name: codigos_postales_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.codigos_postales_id_seq', 12, true);


--
-- TOC entry 4903 (class 0 OID 0)
-- Dependencies: 219
-- Name: estados_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.estados_id_seq', 1, true);


--
-- TOC entry 4904 (class 0 OID 0)
-- Dependencies: 223
-- Name: localidades_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.localidades_id_seq', 12, true);


--
-- TOC entry 4905 (class 0 OID 0)
-- Dependencies: 221
-- Name: municipios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.municipios_id_seq', 5, true);


--
-- TOC entry 4906 (class 0 OID 0)
-- Dependencies: 217
-- Name: persona_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.persona_id_seq', 13, true);


--
-- TOC entry 4907 (class 0 OID 0)
-- Dependencies: 215
-- Name: profesion_pk_profesion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.profesion_pk_profesion_seq', 18, true);


--
-- TOC entry 4731 (class 2606 OID 16745)
-- Name: codigos_postales codigos_postales_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.codigos_postales
    ADD CONSTRAINT codigos_postales_pkey PRIMARY KEY (id);


--
-- TOC entry 4725 (class 2606 OID 16714)
-- Name: estados estados_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estados
    ADD CONSTRAINT estados_pkey PRIMARY KEY (id);


--
-- TOC entry 4729 (class 2606 OID 16733)
-- Name: localidades localidades_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.localidades
    ADD CONSTRAINT localidades_pkey PRIMARY KEY (id);


--
-- TOC entry 4727 (class 2606 OID 16721)
-- Name: municipios municipios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.municipios
    ADD CONSTRAINT municipios_pkey PRIMARY KEY (id);


--
-- TOC entry 4723 (class 2606 OID 16695)
-- Name: persona persona_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.persona
    ADD CONSTRAINT persona_pkey PRIMARY KEY (id);


--
-- TOC entry 4721 (class 2606 OID 16686)
-- Name: profesion profesion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.profesion
    ADD CONSTRAINT profesion_pkey PRIMARY KEY (pk_profesion);


--
-- TOC entry 4735 (class 2606 OID 16746)
-- Name: codigos_postales codigos_postales_localidad_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.codigos_postales
    ADD CONSTRAINT codigos_postales_localidad_id_fkey FOREIGN KEY (localidad_id) REFERENCES public.localidades(id);


--
-- TOC entry 4734 (class 2606 OID 16734)
-- Name: localidades localidades_municipio_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.localidades
    ADD CONSTRAINT localidades_municipio_id_fkey FOREIGN KEY (municipio_id) REFERENCES public.municipios(id);


--
-- TOC entry 4733 (class 2606 OID 16722)
-- Name: municipios municipios_estado_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.municipios
    ADD CONSTRAINT municipios_estado_id_fkey FOREIGN KEY (estado_id) REFERENCES public.estados(id);


--
-- TOC entry 4732 (class 2606 OID 16696)
-- Name: persona persona_fk_profesion_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.persona
    ADD CONSTRAINT persona_fk_profesion_fkey FOREIGN KEY (fk_profesion) REFERENCES public.profesion(pk_profesion);


-- Completed on 2024-06-06 22:59:33

--
-- PostgreSQL database dump complete
--

