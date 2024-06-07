--
-- PostgreSQL database dump
--

-- Dumped from database version 16.3
-- Dumped by pg_dump version 16.3

-- Started on 2024-06-06 20:38:42

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
-- TOC entry 219 (class 1259 OID 16701)
-- Name: codigos_postales; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.codigos_postales (
    codigo_postal character varying(10) NOT NULL,
    localidad character varying(50),
    municipio character varying(50),
    estado character varying(50)
);


ALTER TABLE public.codigos_postales OWNER TO postgres;

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
-- TOC entry 4860 (class 0 OID 0)
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
-- TOC entry 4861 (class 0 OID 0)
-- Dependencies: 215
-- Name: profesion_pk_profesion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.profesion_pk_profesion_seq OWNED BY public.profesion.pk_profesion;


--
-- TOC entry 4699 (class 2604 OID 16691)
-- Name: persona id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.persona ALTER COLUMN id SET DEFAULT nextval('public.persona_id_seq'::regclass);


--
-- TOC entry 4697 (class 2604 OID 16683)
-- Name: profesion pk_profesion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.profesion ALTER COLUMN pk_profesion SET DEFAULT nextval('public.profesion_pk_profesion_seq'::regclass);


--
-- TOC entry 4854 (class 0 OID 16701)
-- Dependencies: 219
-- Data for Name: codigos_postales; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.codigos_postales (codigo_postal, localidad, municipio, estado) FROM stdin;
\.


--
-- TOC entry 4853 (class 0 OID 16688)
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
12	Carlos	Sánchez	Martínez	1978-03-30	46	hombre	3	Boulevard de los Héroes 789	63800	San Blas	Nayarit	San Blas	3116543210	uploads/carlos.jpg
\.


--
-- TOC entry 4851 (class 0 OID 16680)
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
-- TOC entry 4862 (class 0 OID 0)
-- Dependencies: 217
-- Name: persona_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.persona_id_seq', 12, true);


--
-- TOC entry 4863 (class 0 OID 0)
-- Dependencies: 215
-- Name: profesion_pk_profesion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.profesion_pk_profesion_seq', 18, true);


--
-- TOC entry 4705 (class 2606 OID 16705)
-- Name: codigos_postales codigos_postales_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.codigos_postales
    ADD CONSTRAINT codigos_postales_pkey PRIMARY KEY (codigo_postal);


--
-- TOC entry 4703 (class 2606 OID 16695)
-- Name: persona persona_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.persona
    ADD CONSTRAINT persona_pkey PRIMARY KEY (id);


--
-- TOC entry 4701 (class 2606 OID 16686)
-- Name: profesion profesion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.profesion
    ADD CONSTRAINT profesion_pkey PRIMARY KEY (pk_profesion);


--
-- TOC entry 4706 (class 2606 OID 16696)
-- Name: persona persona_fk_profesion_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.persona
    ADD CONSTRAINT persona_fk_profesion_fkey FOREIGN KEY (fk_profesion) REFERENCES public.profesion(pk_profesion);


-- Completed on 2024-06-06 20:38:42

--
-- PostgreSQL database dump complete
--

