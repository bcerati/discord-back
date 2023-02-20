--
-- PostgreSQL database dump
--

-- Dumped from database version 15.2 (Debian 15.2-1.pgdg110+1)
-- Dumped by pg_dump version 15.2 (Debian 15.2-1.pgdg110+1)

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
-- Name: doctrine_migration_versions; Type: TABLE; Schema: public; Owner: app
--

CREATE TABLE public.doctrine_migration_versions (
    version character varying(191) NOT NULL,
    executed_at timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    execution_time integer
);


ALTER TABLE public.doctrine_migration_versions OWNER TO app;

--
-- Name: documents; Type: TABLE; Schema: public; Owner: app
--

CREATE TABLE public.documents (
    id uuid NOT NULL,
    name character varying(30) NOT NULL,
    extension character varying(10) NOT NULL,
    created_at timestamp(0) without time zone NOT NULL
);


ALTER TABLE public.documents OWNER TO app;

--
-- Name: COLUMN documents.id; Type: COMMENT; Schema: public; Owner: app
--

COMMENT ON COLUMN public.documents.id IS '(DC2Type:uuid)';


--
-- Name: COLUMN documents.created_at; Type: COMMENT; Schema: public; Owner: app
--

COMMENT ON COLUMN public.documents.created_at IS '(DC2Type:datetime_immutable)';


--
-- Name: server_categories; Type: TABLE; Schema: public; Owner: app
--

CREATE TABLE public.server_categories (
    id uuid NOT NULL,
    name character varying(30) NOT NULL,
    created_at timestamp(0) without time zone NOT NULL,
    server_id uuid
);


ALTER TABLE public.server_categories OWNER TO app;

--
-- Name: COLUMN server_categories.id; Type: COMMENT; Schema: public; Owner: app
--

COMMENT ON COLUMN public.server_categories.id IS '(DC2Type:uuid)';


--
-- Name: COLUMN server_categories.created_at; Type: COMMENT; Schema: public; Owner: app
--

COMMENT ON COLUMN public.server_categories.created_at IS '(DC2Type:datetime_immutable)';


--
-- Name: COLUMN server_categories.server_id; Type: COMMENT; Schema: public; Owner: app
--

COMMENT ON COLUMN public.server_categories.server_id IS '(DC2Type:uuid)';


--
-- Name: server_channels; Type: TABLE; Schema: public; Owner: app
--

CREATE TABLE public.server_channels (
    id uuid NOT NULL,
    server_id uuid,
    category_id uuid,
    name character varying(30) NOT NULL,
    created_at timestamp(0) without time zone NOT NULL
);


ALTER TABLE public.server_channels OWNER TO app;

--
-- Name: COLUMN server_channels.id; Type: COMMENT; Schema: public; Owner: app
--

COMMENT ON COLUMN public.server_channels.id IS '(DC2Type:uuid)';


--
-- Name: COLUMN server_channels.server_id; Type: COMMENT; Schema: public; Owner: app
--

COMMENT ON COLUMN public.server_channels.server_id IS '(DC2Type:uuid)';


--
-- Name: COLUMN server_channels.category_id; Type: COMMENT; Schema: public; Owner: app
--

COMMENT ON COLUMN public.server_channels.category_id IS '(DC2Type:uuid)';


--
-- Name: COLUMN server_channels.created_at; Type: COMMENT; Schema: public; Owner: app
--

COMMENT ON COLUMN public.server_channels.created_at IS '(DC2Type:datetime_immutable)';


--
-- Name: servers; Type: TABLE; Schema: public; Owner: app
--

CREATE TABLE public.servers (
    id uuid NOT NULL,
    name character varying(30) NOT NULL,
    created_at timestamp(0) without time zone NOT NULL,
    image_id uuid
);


ALTER TABLE public.servers OWNER TO app;

--
-- Name: COLUMN servers.id; Type: COMMENT; Schema: public; Owner: app
--

COMMENT ON COLUMN public.servers.id IS '(DC2Type:uuid)';


--
-- Name: COLUMN servers.created_at; Type: COMMENT; Schema: public; Owner: app
--

COMMENT ON COLUMN public.servers.created_at IS '(DC2Type:datetime_immutable)';


--
-- Name: COLUMN servers.image_id; Type: COMMENT; Schema: public; Owner: app
--

COMMENT ON COLUMN public.servers.image_id IS '(DC2Type:uuid)';


--
-- Data for Name: doctrine_migration_versions; Type: TABLE DATA; Schema: public; Owner: app
--

COPY public.doctrine_migration_versions (version, executed_at, execution_time) FROM stdin;
DoctrineMigrations\\Version20230220091057	\N	\N
\.


--
-- Data for Name: documents; Type: TABLE DATA; Schema: public; Owner: app
--

COPY public.documents (id, name, extension, created_at) FROM stdin;
72056a36-3d11-49ba-88f6-a65357d9ac21	theprimeagen	jpg	2023-02-16 19:06:41
1806dd50-17dc-449a-9b8b-57ebb48ef9a9	linux	jpg	2023-02-16 19:10:19
1806dd50-17dc-449a-9b8b-57ebb48ef9a8	php	jpg	2023-02-19 09:57:09
\.


--
-- Data for Name: server_categories; Type: TABLE DATA; Schema: public; Owner: app
--

COPY public.server_categories (id, name, created_at, server_id) FROM stdin;
c655aee8-262b-4180-be15-09009ea9c5aa	Prime second one	2023-02-18 09:26:01	1edae2d0-c02f-6db0-ada8-71212079cd8b
2af904b8-c49d-493b-90ab-c1d98849cc6b	Prime first one	2023-02-18 09:25:58	1edae2d0-c02f-6db0-ada8-71212079cd8b
\.


--
-- Data for Name: server_channels; Type: TABLE DATA; Schema: public; Owner: app
--

COPY public.server_channels (id, server_id, category_id, name, created_at) FROM stdin;
\.


--
-- Data for Name: servers; Type: TABLE DATA; Schema: public; Owner: app
--

COPY public.servers (id, name, created_at, image_id) FROM stdin;
1edae2d8-da96-603e-88c8-39dba8b491f3	Linux	2023-02-16 19:10:19	1806dd50-17dc-449a-9b8b-57ebb48ef9a9
1edae2d8-da96-603e-88c8-39dba8b491f4	PHP	2023-02-19 09:56:40	1806dd50-17dc-449a-9b8b-57ebb48ef9a8
1edae2d0-c02f-6db0-ada8-71212079cd8b	ThePrimeagen	2023-02-16 19:06:41	72056a36-3d11-49ba-88f6-a65357d9ac21
\.


--
-- Name: doctrine_migration_versions doctrine_migration_versions_pkey; Type: CONSTRAINT; Schema: public; Owner: app
--

ALTER TABLE ONLY public.doctrine_migration_versions
    ADD CONSTRAINT doctrine_migration_versions_pkey PRIMARY KEY (version);


--
-- Name: documents documents_pkey; Type: CONSTRAINT; Schema: public; Owner: app
--

ALTER TABLE ONLY public.documents
    ADD CONSTRAINT documents_pkey PRIMARY KEY (id);


--
-- Name: server_categories server_categories_pkey; Type: CONSTRAINT; Schema: public; Owner: app
--

ALTER TABLE ONLY public.server_categories
    ADD CONSTRAINT server_categories_pkey PRIMARY KEY (id);


--
-- Name: server_channels server_channels_pkey; Type: CONSTRAINT; Schema: public; Owner: app
--

ALTER TABLE ONLY public.server_channels
    ADD CONSTRAINT server_channels_pkey PRIMARY KEY (id);


--
-- Name: servers servers_pkey; Type: CONSTRAINT; Schema: public; Owner: app
--

ALTER TABLE ONLY public.servers
    ADD CONSTRAINT servers_pkey PRIMARY KEY (id);


--
-- Name: idx_31b1630a12469de2; Type: INDEX; Schema: public; Owner: app
--

CREATE INDEX idx_31b1630a12469de2 ON public.server_channels USING btree (category_id);


--
-- Name: idx_31b1630a1844e6b7; Type: INDEX; Schema: public; Owner: app
--

CREATE INDEX idx_31b1630a1844e6b7 ON public.server_channels USING btree (server_id);


--
-- Name: idx_e83cd6cf1844e6b7; Type: INDEX; Schema: public; Owner: app
--

CREATE INDEX idx_e83cd6cf1844e6b7 ON public.server_categories USING btree (server_id);


--
-- Name: uniq_4f8af5f73da5256d; Type: INDEX; Schema: public; Owner: app
--

CREATE UNIQUE INDEX uniq_4f8af5f73da5256d ON public.servers USING btree (image_id);


--
-- Name: server_channels fk_31b1630a12469de2; Type: FK CONSTRAINT; Schema: public; Owner: app
--

ALTER TABLE ONLY public.server_channels
    ADD CONSTRAINT fk_31b1630a12469de2 FOREIGN KEY (category_id) REFERENCES public.server_categories(id);


--
-- Name: server_channels fk_31b1630a1844e6b7; Type: FK CONSTRAINT; Schema: public; Owner: app
--

ALTER TABLE ONLY public.server_channels
    ADD CONSTRAINT fk_31b1630a1844e6b7 FOREIGN KEY (server_id) REFERENCES public.servers(id);


--
-- Name: servers fk_4f8af5f73da5256d; Type: FK CONSTRAINT; Schema: public; Owner: app
--

ALTER TABLE ONLY public.servers
    ADD CONSTRAINT fk_4f8af5f73da5256d FOREIGN KEY (image_id) REFERENCES public.documents(id);


--
-- Name: server_categories fk_e83cd6cf1844e6b7; Type: FK CONSTRAINT; Schema: public; Owner: app
--

ALTER TABLE ONLY public.server_categories
    ADD CONSTRAINT fk_e83cd6cf1844e6b7 FOREIGN KEY (server_id) REFERENCES public.servers(id);


--
-- PostgreSQL database dump complete
--

