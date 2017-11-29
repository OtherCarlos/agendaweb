--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: agenda; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA agenda;


ALTER SCHEMA agenda OWNER TO postgres;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


--
-- Name: dblink; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS dblink WITH SCHEMA public;


--
-- Name: EXTENSION dblink; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION dblink IS 'connect to other PostgreSQL databases from within a database';


SET search_path = agenda, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: calendario; Type: TABLE; Schema: agenda; Owner: postgres; Tablespace: 
--

CREATE TABLE calendario (
    id_calendario integer NOT NULL,
    titulo character varying(50) NOT NULL,
    resumen character varying(1000) NOT NULL,
    fecha_calendario date NOT NULL,
    created_date timestamp without time zone DEFAULT now() NOT NULL,
    created_by integer NOT NULL,
    modified_date timestamp without time zone DEFAULT now() NOT NULL,
    modified_by integer,
    fk_estatus integer NOT NULL,
    es_activo boolean DEFAULT true NOT NULL
);


ALTER TABLE calendario OWNER TO postgres;

--
-- Name: calendario_id_calendario_seq; Type: SEQUENCE; Schema: agenda; Owner: postgres
--

CREATE SEQUENCE calendario_id_calendario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE calendario_id_calendario_seq OWNER TO postgres;

--
-- Name: calendario_id_calendario_seq; Type: SEQUENCE OWNED BY; Schema: agenda; Owner: postgres
--

ALTER SEQUENCE calendario_id_calendario_seq OWNED BY calendario.id_calendario;


--
-- Name: contenido; Type: TABLE; Schema: agenda; Owner: postgres; Tablespace: 
--

CREATE TABLE contenido (
    id_contenido integer NOT NULL,
    url character varying,
    nombre character varying(100),
    fk_tipo_contenido integer NOT NULL,
    fk_calendario integer NOT NULL,
    created_date timestamp without time zone DEFAULT now() NOT NULL,
    created_by integer NOT NULL,
    modified_date timestamp without time zone DEFAULT now(),
    modified_by integer,
    fk_estatus integer NOT NULL,
    es_activo boolean DEFAULT true NOT NULL,
    version integer NOT NULL
);


ALTER TABLE contenido OWNER TO postgres;

--
-- Name: contenido_id_contenido_seq; Type: SEQUENCE; Schema: agenda; Owner: postgres
--

CREATE SEQUENCE contenido_id_contenido_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE contenido_id_contenido_seq OWNER TO postgres;

--
-- Name: contenido_id_contenido_seq; Type: SEQUENCE OWNED BY; Schema: agenda; Owner: postgres
--

ALTER SEQUENCE contenido_id_contenido_seq OWNED BY contenido.id_contenido;


--
-- Name: maestro; Type: TABLE; Schema: agenda; Owner: postgres; Tablespace: 
--

CREATE TABLE maestro (
    id_maestro integer NOT NULL,
    descripcion character varying(100) NOT NULL,
    padre integer NOT NULL,
    hijo integer NOT NULL,
    created_by integer NOT NULL,
    modified_by integer,
    created_date timestamp without time zone DEFAULT now() NOT NULL,
    modified_date timestamp without time zone DEFAULT now() NOT NULL,
    es_activo boolean DEFAULT true NOT NULL
);


ALTER TABLE maestro OWNER TO postgres;

--
-- Name: maestro_id_maestro_seq; Type: SEQUENCE; Schema: agenda; Owner: postgres
--

CREATE SEQUENCE maestro_id_maestro_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE maestro_id_maestro_seq OWNER TO postgres;

--
-- Name: maestro_id_maestro_seq; Type: SEQUENCE OWNED BY; Schema: agenda; Owner: postgres
--

ALTER SEQUENCE maestro_id_maestro_seq OWNED BY maestro.id_maestro;


--
-- Name: notificaciones; Type: TABLE; Schema: agenda; Owner: postgres; Tablespace: 
--

CREATE TABLE notificaciones (
    id_notificacion integer NOT NULL,
    fk_usuario_destino integer NOT NULL,
    fk_calendario integer NOT NULL,
    visto boolean DEFAULT false NOT NULL,
    created_by integer NOT NULL,
    created_date timestamp without time zone DEFAULT now() NOT NULL,
    modified_by integer,
    modified_date timestamp without time zone DEFAULT now() NOT NULL,
    fk_estatus integer NOT NULL,
    es_activo boolean DEFAULT true NOT NULL
);


ALTER TABLE notificaciones OWNER TO postgres;

--
-- Name: TABLE notificaciones; Type: COMMENT; Schema: agenda; Owner: postgres
--

COMMENT ON TABLE notificaciones IS 'Tabla que almacena las notificaciones para cada usuario.';


--
-- Name: COLUMN notificaciones.id_notificacion; Type: COMMENT; Schema: agenda; Owner: postgres
--

COMMENT ON COLUMN notificaciones.id_notificacion IS 'Identificador de cada tupla de la tabla.';


--
-- Name: COLUMN notificaciones.fk_usuario_destino; Type: COMMENT; Schema: agenda; Owner: postgres
--

COMMENT ON COLUMN notificaciones.fk_usuario_destino IS 'IdUser del Usuario al que va asigando la notificacion.';


--
-- Name: COLUMN notificaciones.fk_calendario; Type: COMMENT; Schema: agenda; Owner: postgres
--

COMMENT ON COLUMN notificaciones.fk_calendario IS 'Relacion con la tabla de Calendario';


--
-- Name: COLUMN notificaciones.visto; Type: COMMENT; Schema: agenda; Owner: postgres
--

COMMENT ON COLUMN notificaciones.visto IS 'Define si la notificacion ha sido vista o no';


--
-- Name: COLUMN notificaciones.created_by; Type: COMMENT; Schema: agenda; Owner: postgres
--

COMMENT ON COLUMN notificaciones.created_by IS 'Tarea de creacion, creado por.';


--
-- Name: notificaciones_id_notificacion_seq; Type: SEQUENCE; Schema: agenda; Owner: postgres
--

CREATE SEQUENCE notificaciones_id_notificacion_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE notificaciones_id_notificacion_seq OWNER TO postgres;

--
-- Name: notificaciones_id_notificacion_seq; Type: SEQUENCE OWNED BY; Schema: agenda; Owner: postgres
--

ALTER SEQUENCE notificaciones_id_notificacion_seq OWNED BY notificaciones.id_notificacion;


--
-- Name: observacion; Type: TABLE; Schema: agenda; Owner: postgres; Tablespace: 
--

CREATE TABLE observacion (
    id_observacion integer NOT NULL,
    id_calendario integer NOT NULL,
    fk_tipo_calendario integer NOT NULL,
    observacion character varying(1000),
    created_by integer NOT NULL,
    created_date timestamp without time zone DEFAULT now() NOT NULL,
    modified_date timestamp without time zone DEFAULT now() NOT NULL,
    modified_by integer,
    fk_estatus integer NOT NULL,
    es_activo boolean DEFAULT true NOT NULL
);


ALTER TABLE observacion OWNER TO postgres;

--
-- Name: observacion_id_observacion_seq; Type: SEQUENCE; Schema: agenda; Owner: postgres
--

CREATE SEQUENCE observacion_id_observacion_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE observacion_id_observacion_seq OWNER TO postgres;

--
-- Name: observacion_id_observacion_seq; Type: SEQUENCE OWNED BY; Schema: agenda; Owner: postgres
--

ALTER SEQUENCE observacion_id_observacion_seq OWNED BY observacion.id_observacion;


--
-- Name: publicaciones; Type: TABLE; Schema: agenda; Owner: postgres; Tablespace: 
--

CREATE TABLE publicaciones (
    id_publicacion integer NOT NULL,
    publicacion character varying(140),
    fk_persona integer NOT NULL,
    created_date timestamp without time zone DEFAULT now() NOT NULL,
    created_by integer NOT NULL,
    modified_date timestamp without time zone DEFAULT now(),
    modified_by integer,
    fk_estatus integer NOT NULL,
    es_activo boolean DEFAULT true NOT NULL,
    fk_calendario integer NOT NULL,
    mencionados character varying
);


ALTER TABLE publicaciones OWNER TO postgres;

--
-- Name: publicaciones_id_publicacion_seq; Type: SEQUENCE; Schema: agenda; Owner: postgres
--

CREATE SEQUENCE publicaciones_id_publicacion_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE publicaciones_id_publicacion_seq OWNER TO postgres;

--
-- Name: publicaciones_id_publicacion_seq; Type: SEQUENCE OWNED BY; Schema: agenda; Owner: postgres
--

ALTER SEQUENCE publicaciones_id_publicacion_seq OWNED BY publicaciones.id_publicacion;


--
-- Name: vsw_calendario; Type: VIEW; Schema: agenda; Owner: postgres
--

CREATE VIEW vsw_calendario AS
 SELECT can.id_calendario,
    can.titulo,
    can.resumen,
    can.fecha_calendario,
    con.url,
    con.nombre,
    con.fk_tipo_contenido,
    maes.descripcion AS tipo_contenido,
    obs.observacion,
    con.version
   FROM (((calendario can
     LEFT JOIN contenido con ON (((con.fk_calendario = can.id_calendario) AND (con.version = ( SELECT max(con2.version) AS max
           FROM contenido con2
          WHERE (con2.fk_calendario = con.fk_calendario))))))
     LEFT JOIN maestro maes ON ((maes.id_maestro = con.fk_tipo_contenido)))
     LEFT JOIN observacion obs ON ((obs.id_calendario = can.id_calendario)))
  ORDER BY can.id_calendario;


ALTER TABLE vsw_calendario OWNER TO postgres;

SET search_path = public, pg_catalog;

--
-- Name: cruge_authassignment; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cruge_authassignment (
    userid integer NOT NULL,
    bizrule text,
    data text,
    itemname character varying(64) NOT NULL
);


ALTER TABLE cruge_authassignment OWNER TO postgres;

--
-- Name: cruge_authitem; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cruge_authitem (
    name character varying(64) NOT NULL,
    type integer NOT NULL,
    description text,
    bizrule text,
    data text,
    id_rol integer
);


ALTER TABLE cruge_authitem OWNER TO postgres;

--
-- Name: cruge_authitemchild; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cruge_authitemchild (
    parent character varying(64) NOT NULL,
    child character varying(64) NOT NULL
);


ALTER TABLE cruge_authitemchild OWNER TO postgres;

--
-- Name: cruge_field; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cruge_field (
    idfield integer NOT NULL,
    fieldname character varying(20) NOT NULL,
    longname character varying(50),
    "position" integer DEFAULT 0,
    required integer DEFAULT 0,
    fieldtype integer DEFAULT 0,
    fieldsize integer DEFAULT 20,
    maxlength integer DEFAULT 45,
    showinreports integer DEFAULT 0,
    useregexp character varying(512),
    useregexpmsg character varying(512),
    predetvalue character varying(4096)
);


ALTER TABLE cruge_field OWNER TO postgres;

--
-- Name: cruge_field_idfield_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cruge_field_idfield_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cruge_field_idfield_seq OWNER TO postgres;

--
-- Name: cruge_field_idfield_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cruge_field_idfield_seq OWNED BY cruge_field.idfield;


--
-- Name: cruge_fieldvalue; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cruge_fieldvalue (
    idfieldvalue integer NOT NULL,
    iduser integer NOT NULL,
    idfield integer NOT NULL,
    value character varying(4096)
);


ALTER TABLE cruge_fieldvalue OWNER TO postgres;

--
-- Name: cruge_fieldvalue_idfieldvalue_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cruge_fieldvalue_idfieldvalue_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cruge_fieldvalue_idfieldvalue_seq OWNER TO postgres;

--
-- Name: cruge_fieldvalue_idfieldvalue_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cruge_fieldvalue_idfieldvalue_seq OWNED BY cruge_fieldvalue.idfieldvalue;


--
-- Name: cruge_session; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cruge_session (
    idsession integer NOT NULL,
    iduser integer NOT NULL,
    created bigint,
    expire bigint,
    status integer DEFAULT 0,
    ipaddress character varying(45),
    usagecount integer DEFAULT 0,
    lastusage bigint,
    logoutdate bigint,
    ipaddressout character varying(45)
);


ALTER TABLE cruge_session OWNER TO postgres;

--
-- Name: cruge_session_idsession_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cruge_session_idsession_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cruge_session_idsession_seq OWNER TO postgres;

--
-- Name: cruge_session_idsession_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cruge_session_idsession_seq OWNED BY cruge_session.idsession;


--
-- Name: cruge_system; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cruge_system (
    idsystem integer NOT NULL,
    name character varying(45),
    largename character varying(45),
    sessionmaxdurationmins integer DEFAULT 30,
    sessionmaxsameipconnections integer DEFAULT 10,
    sessionreusesessions integer DEFAULT 1,
    sessionmaxsessionsperday integer DEFAULT (-1),
    sessionmaxsessionsperuser integer DEFAULT (-1),
    systemnonewsessions integer DEFAULT 0,
    systemdown integer DEFAULT 0,
    registerusingcaptcha integer DEFAULT 0,
    registerusingterms integer DEFAULT 0,
    terms character varying(4096),
    registerusingactivation integer DEFAULT 1,
    defaultroleforregistration character varying(64),
    registerusingtermslabel character varying(100),
    registrationonlogin integer DEFAULT 1
);


ALTER TABLE cruge_system OWNER TO postgres;

--
-- Name: cruge_system_idsystem_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cruge_system_idsystem_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cruge_system_idsystem_seq OWNER TO postgres;

--
-- Name: cruge_system_idsystem_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cruge_system_idsystem_seq OWNED BY cruge_system.idsystem;


--
-- Name: cruge_user; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cruge_user (
    iduser integer NOT NULL,
    regdate bigint,
    actdate bigint,
    logondate bigint,
    username character varying(64),
    email character varying(45),
    password character varying(64),
    authkey character varying(100),
    state integer DEFAULT 0,
    totalsessioncounter integer DEFAULT 0,
    currentsessioncounter integer DEFAULT 0
);


ALTER TABLE cruge_user OWNER TO postgres;

--
-- Name: cruge_user_iduser_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cruge_user_iduser_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cruge_user_iduser_seq OWNER TO postgres;

--
-- Name: cruge_user_iduser_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cruge_user_iduser_seq OWNED BY cruge_user.iduser;


--
-- Name: social_media; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE social_media (
    id_social integer NOT NULL,
    id_user integer NOT NULL,
    fk_social_media integer NOT NULL,
    cuenta character varying(100)
);


ALTER TABLE social_media OWNER TO postgres;

--
-- Name: social_media_id_social_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE social_media_id_social_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE social_media_id_social_seq OWNER TO postgres;

--
-- Name: social_media_id_social_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE social_media_id_social_seq OWNED BY social_media.id_social;


--
-- Name: user_profile; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE user_profile (
    id_user_profile integer NOT NULL,
    id_user integer NOT NULL,
    nombres character varying(50),
    apellidos character varying(50),
    sobre_mi character varying(1000),
    direccion character varying(500),
    ciudad character varying(50),
    pais character varying(50),
    foto_perfil character varying(100)
);


ALTER TABLE user_profile OWNER TO postgres;

--
-- Name: user_profile_id_user_profile_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE user_profile_id_user_profile_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE user_profile_id_user_profile_seq OWNER TO postgres;

--
-- Name: user_profile_id_user_profile_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE user_profile_id_user_profile_seq OWNED BY user_profile.id_user_profile;


SET search_path = agenda, pg_catalog;

--
-- Name: id_calendario; Type: DEFAULT; Schema: agenda; Owner: postgres
--

ALTER TABLE ONLY calendario ALTER COLUMN id_calendario SET DEFAULT nextval('calendario_id_calendario_seq'::regclass);


--
-- Name: id_contenido; Type: DEFAULT; Schema: agenda; Owner: postgres
--

ALTER TABLE ONLY contenido ALTER COLUMN id_contenido SET DEFAULT nextval('contenido_id_contenido_seq'::regclass);


--
-- Name: id_maestro; Type: DEFAULT; Schema: agenda; Owner: postgres
--

ALTER TABLE ONLY maestro ALTER COLUMN id_maestro SET DEFAULT nextval('maestro_id_maestro_seq'::regclass);


--
-- Name: id_notificacion; Type: DEFAULT; Schema: agenda; Owner: postgres
--

ALTER TABLE ONLY notificaciones ALTER COLUMN id_notificacion SET DEFAULT nextval('notificaciones_id_notificacion_seq'::regclass);


--
-- Name: id_observacion; Type: DEFAULT; Schema: agenda; Owner: postgres
--

ALTER TABLE ONLY observacion ALTER COLUMN id_observacion SET DEFAULT nextval('observacion_id_observacion_seq'::regclass);


--
-- Name: id_publicacion; Type: DEFAULT; Schema: agenda; Owner: postgres
--

ALTER TABLE ONLY publicaciones ALTER COLUMN id_publicacion SET DEFAULT nextval('publicaciones_id_publicacion_seq'::regclass);


SET search_path = public, pg_catalog;

--
-- Name: idfield; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cruge_field ALTER COLUMN idfield SET DEFAULT nextval('cruge_field_idfield_seq'::regclass);


--
-- Name: idfieldvalue; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cruge_fieldvalue ALTER COLUMN idfieldvalue SET DEFAULT nextval('cruge_fieldvalue_idfieldvalue_seq'::regclass);


--
-- Name: idsession; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cruge_session ALTER COLUMN idsession SET DEFAULT nextval('cruge_session_idsession_seq'::regclass);


--
-- Name: idsystem; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cruge_system ALTER COLUMN idsystem SET DEFAULT nextval('cruge_system_idsystem_seq'::regclass);


--
-- Name: iduser; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cruge_user ALTER COLUMN iduser SET DEFAULT nextval('cruge_user_iduser_seq'::regclass);


--
-- Name: id_social; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY social_media ALTER COLUMN id_social SET DEFAULT nextval('social_media_id_social_seq'::regclass);


--
-- Name: id_user_profile; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY user_profile ALTER COLUMN id_user_profile SET DEFAULT nextval('user_profile_id_user_profile_seq'::regclass);


SET search_path = agenda, pg_catalog;

--
-- Data for Name: calendario; Type: TABLE DATA; Schema: agenda; Owner: postgres
--

COPY calendario (id_calendario, titulo, resumen, fecha_calendario, created_date, created_by, modified_date, modified_by, fk_estatus, es_activo) FROM stdin;
13	Esto es una prueba desde el sistema	tfdrfxcbvbnjnkloiuytresdxcvbn gfdxsedrtfgyhjkl ygftdgnbmnbgfdrtyu hj	2017-11-07	2017-11-07 23:55:06.97	1	2017-11-07 23:55:06.97	1	2	t
14	Prueba	Descripcion	2017-11-27	2017-11-27 10:11:14.047	1	2017-11-27 10:11:14.047	1	2	t
15	Test	test	2017-11-29	2017-11-29 02:22:12.656	2	2017-11-29 02:22:12.656	2	2	t
16	Prueba de info calendario	Prueba	2017-11-13	2017-11-29 02:42:23.086	1	2017-11-29 02:42:23.086	1	2	t
17	Prueba de info calendario 2	Prueba 2	2017-11-13	2017-11-29 02:42:54.907	1	2017-11-29 02:42:54.907	1	2	t
1	Prueba del día de hoy	Esto es una prueba de como se crea una agenda en el sistema de agenda, esto es una prueba.	2017-10-10	2017-10-22 12:43:33.664	1	2017-10-22 12:43:33.664	1	2	t
4	Hola	Hola	2017-10-09	2017-10-31 07:21:48.009	1	2017-10-31 07:21:48.009	1	2	t
3	Esto es una prueba desde el sistema	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.	2017-10-10	2017-10-22 18:11:41.642	1	2017-10-22 18:11:41.642	1	2	t
5	Prueba	Prueba	2017-10-10	2017-11-02 23:43:35.044	1	2017-11-02 23:43:35.044	1	2	t
6	Esto es una prueba desde el sistema	lol	2017-11-01	2017-11-02 23:47:19.567	1	2017-11-02 23:47:19.567	1	2	t
7	Hola	ggg	2017-11-01	2017-11-02 23:50:47.159	1	2017-11-02 23:50:47.159	1	2	t
8	Prueba final con imagenes	Esto es una prueba final	2017-11-01	2017-11-03 07:23:07.611	1	2017-11-03 07:23:07.611	1	2	t
9	Prueba Final	Esto es una prueba.	2017-11-07	2017-11-07 18:03:58.031	1	2017-11-07 18:03:58.031	1	2	t
10	Prueba 7	Esto es una prueba con video	2017-11-07	2017-11-07 19:21:56.019	2	2017-11-07 19:21:56.019	2	2	t
11	Actividad de prueba	Esto es una prueba de la actividad con su contenido y multimedia versionada.	2017-11-07	2017-11-07 22:53:14.322	1	2017-11-07 22:53:14.322	1	2	t
12	Perritos y cantantes de música con malas voces.	Se tiene una publicación con un conunto de animalitos y personas que cantan muy mal canciones mal versionadas, prueba final.	2017-11-07	2017-11-07 23:42:03.196	2	2017-11-07 23:42:03.196	2	2	t
\.


--
-- Name: calendario_id_calendario_seq; Type: SEQUENCE SET; Schema: agenda; Owner: postgres
--

SELECT pg_catalog.setval('calendario_id_calendario_seq', 17, true);


--
-- Data for Name: contenido; Type: TABLE DATA; Schema: agenda; Owner: postgres
--

COPY contenido (id_contenido, url, nombre, fk_tipo_contenido, fk_calendario, created_date, created_by, modified_date, modified_by, fk_estatus, es_activo, version) FROM stdin;
51	/images/calendario/14	IMG_8102.JPG	8	14	2017-11-29 02:41:38.701	1	2017-11-29 02:41:38.701	\N	5	t	2
52	/images/calendario/14	IMG_8117.JPG	8	14	2017-11-29 02:41:38.745	1	2017-11-29 02:41:38.745	\N	5	t	2
3	/image/calendario/1	calendar_little.jpeg	8	1	2017-10-30 12:55:59.57	3	2017-10-30 12:55:59.57	\N	5	t	1
4	/image/calendario/1	calendar_little2.jpeg	8	1	2017-10-30 12:55:59.696	3	2017-10-30 12:55:59.696	\N	5	t	1
5	/image/calendario/1	calendar_little3.jpeg	8	1	2017-10-30 12:55:59.703	3	2017-10-30 12:55:59.703	\N	5	t	1
6	/image/calendario/4	camera2_little.jpg	8	4	2017-10-31 07:22:42.571	1	2017-10-31 07:22:42.571	\N	5	t	1
7	/image/calendario/4	calendar_little3.jpeg	8	4	2017-10-31 07:22:42.62	1	2017-10-31 07:22:42.62	\N	5	t	1
9	/videos/calendario/3	WIN_20171019_16_36_09_Pro.mp4	9	3	2017-11-01 19:07:48.406	4	2017-11-01 19:07:48.406	\N	5	t	1
10	/image/calendario/5	Captura de pantalla de 2016-01-08 18_26_14.png	8	5	2017-11-02 23:44:44.826	1	2017-11-02 23:44:44.826	\N	5	t	1
11	/image/calendario/6	Captura de pantalla de 2016-01-08 18_26_14.png	8	6	2017-11-02 23:47:31.814	1	2017-11-02 23:47:31.814	\N	5	t	1
12	/image/calendario/6	IMG_8095.JPG	8	6	2017-11-02 23:47:31.84	1	2017-11-02 23:47:31.84	\N	5	t	1
13	/images/calendario/7	1.png	8	7	2017-11-02 23:50:59.695	1	2017-11-02 23:50:59.695	\N	5	t	1
14	/images/calendario/7	2.JPG	8	7	2017-11-02 23:50:59.706	1	2017-11-02 23:50:59.706	\N	5	t	1
15	/images/calendario/8/	Captura de pantalla de 2016-01-08 18_26_14.png	8	8	2017-11-03 07:24:23.665	1	2017-11-03 07:24:23.665	\N	5	t	1
16	/images/calendario/8/	IMG_8095.JPG	8	8	2017-11-03 07:24:23.682	1	2017-11-03 07:24:23.682	\N	5	t	1
17	/images/calendario/9/	Captura de pantalla de 2016-01-08 18_26_14.png	8	9	2017-11-07 18:04:29.162	1	2017-11-07 18:04:29.162	\N	5	t	1
18	/images/calendario/9/	IMG_8095.JPG	8	9	2017-11-07 18:04:29.22	1	2017-11-07 18:04:29.22	\N	5	t	1
19	/videos/calendario/10/	WIN_20171019_16_36_09_Pro.mp4	9	10	2017-11-07 19:22:42.699	1	2017-11-07 19:22:42.699	\N	5	t	1
20	/videos/calendario/11/	WIN_20171019_16_36_09_Pro.mp4	9	11	2017-11-07 22:54:29.999	1	2017-11-07 22:54:29.999	\N	5	t	1
21	/images/calendario/11/	IMG_8028.JPG	8	11	2017-11-07 22:54:30.004	1	2017-11-07 22:54:30.004	\N	5	t	1
22	/images/calendario/11/	IMG_8034.JPG	8	11	2017-11-07 22:54:30.008	1	2017-11-07 22:54:30.008	\N	5	t	1
23	/videos/calendario/11	WIN_20171019_16_36_09_Pro.mp4	9	11	2017-11-07 23:31:41.462	2	2017-11-07 23:31:41.462	\N	5	t	2
24	/image/calendario/11	IMG_8051.JPG	8	11	2017-11-07 23:31:41.468	2	2017-11-07 23:31:41.468	\N	5	t	2
25	/image/calendario/11	IMG_8054.JPG	8	11	2017-11-07 23:31:41.474	2	2017-11-07 23:31:41.474	\N	5	t	2
26	/videos/calendario/12/	WIN_20171019_16_36_09_Pro.mp4	9	12	2017-11-07 23:42:38.824	1	2017-11-07 23:42:38.824	\N	5	t	1
27	/images/calendario/12/	IMG_8028.JPG	8	12	2017-11-07 23:42:38.829	1	2017-11-07 23:42:38.829	\N	5	t	1
28	/images/calendario/12/	IMG_8034.JPG	8	12	2017-11-07 23:42:38.833	1	2017-11-07 23:42:38.833	\N	5	t	1
29	/videos/calendario/12	WIN_20171019_16_36_53_Pro.mp4	9	12	2017-11-07 23:43:43.309	1	2017-11-07 23:43:43.309	\N	5	t	2
30	/image/calendario/12	IMG_8051.JPG	8	12	2017-11-07 23:43:43.314	1	2017-11-07 23:43:43.314	\N	5	t	2
31	/image/calendario/12	IMG_8040.JPG	8	12	2017-11-07 23:43:43.321	1	2017-11-07 23:43:43.321	\N	5	t	2
32	/videos/calendario/12	WIN_20171019_16_36_53_Pro.mp4	9	12	2017-11-07 23:45:58.95	1	2017-11-07 23:45:58.95	\N	5	t	2
33	/image/calendario/12	IMG_8051.JPG	8	12	2017-11-07 23:45:58.996	1	2017-11-07 23:45:58.996	\N	5	t	2
34	/image/calendario/12	IMG_8040.JPG	8	12	2017-11-07 23:45:59.002	1	2017-11-07 23:45:59.002	\N	5	t	2
35	/videos/calendario/12	WIN_20171019_16_36_53_Pro.mp4	9	12	2017-11-07 23:47:29.529	1	2017-11-07 23:47:29.529	\N	5	t	2
36	/image/calendario/12	IMG_8051.JPG	8	12	2017-11-07 23:47:29.536	1	2017-11-07 23:47:29.536	\N	5	t	2
37	/image/calendario/12	IMG_8040.JPG	8	12	2017-11-07 23:47:29.54	1	2017-11-07 23:47:29.54	\N	5	t	2
38	/videos/calendario/12	WIN_20171019_16_36_53_Pro.mp4	9	12	2017-11-07 23:48:48.464	1	2017-11-07 23:48:48.464	\N	5	t	2
39	/image/calendario/12	IMG_8051.JPG	8	12	2017-11-07 23:48:48.47	1	2017-11-07 23:48:48.47	\N	5	t	2
40	/image/calendario/12	IMG_8040.JPG	8	12	2017-11-07 23:48:48.476	1	2017-11-07 23:48:48.476	\N	5	t	2
41	/images/calendario/13/	IMG_8064.JPG	8	13	2017-11-07 23:55:57.709	1	2017-11-07 23:55:57.709	\N	5	t	1
42	/images/calendario/13/	IMG_8077.JPG	8	13	2017-11-07 23:55:57.715	1	2017-11-07 23:55:57.715	\N	5	t	1
43	/images/calendario/13/	IMG_8086.JPG	8	13	2017-11-07 23:55:57.72	1	2017-11-07 23:55:57.72	\N	5	t	1
44	/image/calendario/13	IMG_8028.JPG	8	13	2017-11-07 23:56:24.404	1	2017-11-07 23:56:24.404	\N	5	t	2
45	/image/calendario/13	IMG_8034.JPG	8	13	2017-11-07 23:56:24.413	1	2017-11-07 23:56:24.413	\N	5	t	2
46	/image/calendario/13	IMG_8051.JPG	8	13	2017-11-07 23:56:24.418	1	2017-11-07 23:56:24.418	\N	5	t	2
47	/images/calendario/14/	IMG_8208.JPG	8	14	2017-11-27 10:11:46.643	1	2017-11-27 10:11:46.643	\N	5	t	1
48	/images/calendario/14/	IMG_8213.JPG	8	14	2017-11-27 10:11:46.812	1	2017-11-27 10:11:46.812	\N	5	t	1
49	/images/calendario/14	IMG_8102.JPG	8	14	2017-11-29 02:36:11.337	1	2017-11-29 02:36:11.337	\N	5	t	2
50	/images/calendario/14	IMG_8117.JPG	8	14	2017-11-29 02:36:11.342	1	2017-11-29 02:36:11.342	\N	5	t	2
\.


--
-- Name: contenido_id_contenido_seq; Type: SEQUENCE SET; Schema: agenda; Owner: postgres
--

SELECT pg_catalog.setval('contenido_id_contenido_seq', 52, true);


--
-- Data for Name: maestro; Type: TABLE DATA; Schema: agenda; Owner: postgres
--

COPY maestro (id_maestro, descripcion, padre, hijo, created_by, modified_by, created_date, modified_date, es_activo) FROM stdin;
1	ESTATUS CALENDARIO	0	2	1	1	2017-10-22 12:40:55.27	2017-10-22 12:40:55.27	t
2	ACTIVO	1	0	1	1	2017-10-22 12:41:06.713	2017-10-22 12:41:06.713	t
3	INACTIVO	1	0	1	1	2017-10-22 12:41:20.144	2017-10-22 12:41:20.144	t
4	ESTATUS CONTENIDO	0	2	1	1	2017-10-30 05:50:36.139	2017-10-30 05:50:36.139	t
5	ACTIVO	4	0	1	1	2017-10-30 05:50:49.578	2017-10-30 05:50:49.578	t
6	INACTIVO	4	0	1	1	2017-10-30 05:51:04.101	2017-10-30 05:51:04.101	t
7	TIPO CONTENIDO	0	2	1	1	2017-10-30 00:00:00	2017-10-30 05:51:56.549	t
8	IMAGEN	7	0	1	1	2017-10-30 05:52:15.676	2017-10-30 05:52:15.676	t
9	VIDEO	7	0	1	1	2017-10-30 05:52:27.409	2017-10-30 05:52:27.409	t
10	ESTATUS PUBLICACIONES	0	2	1	1	2017-11-28 22:35:31.627	2017-11-28 22:35:31.627	t
11	ACTIVO	10	0	1	1	2017-11-28 22:35:42.692	2017-11-28 22:35:42.692	t
12	INACTIVO	10	0	1	1	2017-11-28 22:35:51.405	2017-11-28 22:35:51.405	t
\.


--
-- Name: maestro_id_maestro_seq; Type: SEQUENCE SET; Schema: agenda; Owner: postgres
--

SELECT pg_catalog.setval('maestro_id_maestro_seq', 5, true);


--
-- Data for Name: notificaciones; Type: TABLE DATA; Schema: agenda; Owner: postgres
--

COPY notificaciones (id_notificacion, fk_usuario_destino, fk_calendario, visto, created_by, created_date, modified_by, modified_date, fk_estatus, es_activo) FROM stdin;
\.


--
-- Name: notificaciones_id_notificacion_seq; Type: SEQUENCE SET; Schema: agenda; Owner: postgres
--

SELECT pg_catalog.setval('notificaciones_id_notificacion_seq', 1, false);


--
-- Data for Name: observacion; Type: TABLE DATA; Schema: agenda; Owner: postgres
--

COPY observacion (id_observacion, id_calendario, fk_tipo_calendario, observacion, created_by, created_date, modified_date, modified_by, fk_estatus, es_activo) FROM stdin;
\.


--
-- Name: observacion_id_observacion_seq; Type: SEQUENCE SET; Schema: agenda; Owner: postgres
--

SELECT pg_catalog.setval('observacion_id_observacion_seq', 1, false);


--
-- Data for Name: publicaciones; Type: TABLE DATA; Schema: agenda; Owner: postgres
--

COPY publicaciones (id_publicacion, publicacion, fk_persona, created_date, created_by, modified_date, modified_by, fk_estatus, es_activo, fk_calendario, mencionados) FROM stdin;
1	Esto es una publicacion con apenas 40 ca.	2	2017-11-28 23:02:30.294	2	2017-11-28 23:02:30.294	\N	11	t	14	JoelPalma
\.


--
-- Name: publicaciones_id_publicacion_seq; Type: SEQUENCE SET; Schema: agenda; Owner: postgres
--

SELECT pg_catalog.setval('publicaciones_id_publicacion_seq', 1, true);


SET search_path = public, pg_catalog;

--
-- Data for Name: cruge_authassignment; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cruge_authassignment (userid, bizrule, data, itemname) FROM stdin;
1	\N	N;	admin
2	\N	N;	agenda
3	\N	N;	contenido
4	\N	N;	multimedia
\.


--
-- Data for Name: cruge_authitem; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cruge_authitem (name, type, description, bizrule, data, id_rol) FROM stdin;
action_ui_rbaclistroles	0		\N	N;	\N
controller_calendario	0		\N	N;	\N
action_calendario_view	0		\N	N;	\N
action_calendario_create	0		\N	N;	\N
action_calendario_update	0		\N	N;	\N
action_calendario_delete	0		\N	N;	\N
action_calendario_index	0		\N	N;	\N
action_calendario_admin	0		\N	N;	\N
controller_site	0		\N	N;	\N
action_site_index	0		\N	N;	\N
action_site_error	0		\N	N;	\N
action_site_contact	0		\N	N;	\N
action_site_login	0		\N	N;	\N
action_site_logout	0		\N	N;	\N
controller_userprofile	0		\N	N;	\N
action_userprofile_view	0		\N	N;	\N
action_userprofile_create	0		\N	N;	\N
action_userprofile_update	0		\N	N;	\N
action_userprofile_delete	0		\N	N;	\N
action_userprofile_index	0		\N	N;	\N
action_userprofile_admin	0		\N	N;	\N
action_ui_usermanagementadmin	0		\N	N;	\N
admin	2	admin		N;	\N
action_ui_rbacauthitemcreate	0		\N	N;	\N
agenda	2	Tiene permitido agregar actividades al calendario		N;	\N
contenido	2	Tiene permitido subir imagenes y videos a las actividades ya creadas		N;	\N
multimedia	2	Tiene la opción de descargar el contenido y subirlo en una nueva version		N;	\N
publicador	2	Crea la publicación en base a la actividad agendada y el contenido versionado		N;	\N
action_ui_usermanagementcreate	0		\N	N;	\N
action_ui_usermanagementupdate	0		\N	N;	\N
edit-advanced-profile-features	0	C:\\xampp\\htdocs\\agendaweb\\protected\\modules\\cruge\\views\\ui\\usermanagementupdate.php linea 121	\N	N;	\N
action_ui_rbacajaxassignment	0		\N	N;	\N
\.


--
-- Data for Name: cruge_authitemchild; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cruge_authitemchild (parent, child) FROM stdin;
\.


--
-- Data for Name: cruge_field; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cruge_field (idfield, fieldname, longname, "position", required, fieldtype, fieldsize, maxlength, showinreports, useregexp, useregexpmsg, predetvalue) FROM stdin;
\.


--
-- Name: cruge_field_idfield_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cruge_field_idfield_seq', 1, false);


--
-- Data for Name: cruge_fieldvalue; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cruge_fieldvalue (idfieldvalue, iduser, idfield, value) FROM stdin;
\.


--
-- Name: cruge_fieldvalue_idfieldvalue_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cruge_fieldvalue_idfieldvalue_seq', 1, false);


--
-- Data for Name: cruge_session; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cruge_session (idsession, iduser, created, expire, status, ipaddress, usagecount, lastusage, logoutdate, ipaddressout) FROM stdin;
1	1	1507825270	1507827070	1	127.0.0.1	1	1507825270	\N	\N
2	1	1507837229	1507839029	1	127.0.0.1	1	1507837229	\N	\N
3	1	1507850770	1507852570	1	127.0.0.1	1	1507850770	\N	\N
4	1	1507855923	1507857723	0	127.0.0.1	1	1507855923	\N	\N
5	1	1507858228	1507860028	1	127.0.0.1	1	1507858228	\N	\N
6	1	1507902244	1507904044	1	127.0.0.1	3	1507903049	\N	\N
8	1	1508215502	1508217302	0	127.0.0.1	1	1508215502	\N	\N
9	1	1508255468	1508257268	0	127.0.0.1	1	1508255468	\N	\N
10	1	1508258554	1508260354	1	127.0.0.1	1	1508258554	\N	\N
11	1	1508269033	1508270833	1	127.0.0.1	1	1508269033	\N	\N
60	1	1509680584	1509682384	0	::1	1	1509680584	\N	\N
61	1	1509683629	1509685429	1	::1	1	1509683629	\N	\N
16	1	1508620456	1508622256	0	::1	1	1508620456	\N	\N
62	1	1509707161	1509708961	1	::1	1	1509707161	\N	\N
29	1	1509226857	1509228657	0	::1	1	1509226857	\N	\N
38	1	1509323367	1509325167	0	::1	1	1509323367	\N	\N
17	1	1508682885	1508684685	0	::1	1	1508682885	\N	\N
49	3	1509389561	1509391361	0	::1	1	1509389561	\N	\N
30	1	1509229503	1509231303	0	::1	1	1509229503	\N	\N
18	1	1508685017	1508686817	0	::1	1	1508685017	\N	\N
59	1	1509678077	1509679877	0	::1	1	1509678077	\N	\N
39	1	1509325266	1509327066	0	::1	2	1509326357	1509326408	::1
19	1	1508689689	1508691489	0	::1	1	1508689689	\N	\N
7	1	1508195138	1508196938	0	127.0.0.1	1	1508195138	\N	\N
31	1	1509231378	1509233178	0	::1	1	1509231378	\N	\N
32	1	1509233339	1509235139	0	::1	1	1509233339	\N	\N
20	1	1508692528	1508694328	0	::1	1	1508692528	\N	\N
50	3	1509397992	1509399792	0	::1	1	1509397992	\N	\N
40	2	1509326184	1509327984	1	::1	7	1509326661	\N	\N
21	1	1508695316	1508697116	0	::1	1	1508695316	\N	\N
41	1	1509326811	1509328611	0	::1	1	1509326811	1509326928	::1
51	1	1509448854	1509450654	1	::1	1	1509448854	\N	\N
33	1	1509305984	1509307784	0	::1	1	1509305984	\N	\N
22	1	1508698364	1508700164	0	::1	1	1508698364	\N	\N
12	1	1508402699	1508404499	0	::1	1	1508402699	\N	\N
13	1	1508405474	1508407274	1	::1	1	1508405474	\N	\N
52	4	1509576894	1509578694	0	::1	1	1509576894	\N	\N
53	3	1509578727	1509580527	0	::1	1	1509578727	1509579310	::1
14	1	1508614054	1508615854	0	::1	1	1508614054	\N	\N
23	1	1508700873	1508702673	0	::1	1	1508700873	\N	\N
24	1	1508709566	1508711366	1	::1	2	1508710436	\N	\N
15	1	1508616189	1508617989	0	::1	1	1508616189	\N	\N
34	1	1509307895	1509309695	0	::1	1	1509307895	\N	\N
54	3	1509579324	1509581124	0	::1	1	1509579324	1509579340	::1
43	3	1509358063	1509359863	0	::1	1	1509358063	\N	\N
25	1	1508940165	1508941965	0	::1	1	1508940165	\N	\N
55	4	1509579349	1509581149	1	::1	1	1509579349	\N	\N
56	1	1509589414	1509591214	1	::1	1	1509589414	\N	\N
35	1	1509310064	1509311864	0	::1	1	1509310064	\N	\N
26	1	1508946698	1508948498	0	::1	1	1508946698	\N	\N
47	3	1509379174	1509380974	0	::1	1	1509379174	\N	\N
42	3	1509326939	1509328739	0	::1	1	1509326939	\N	\N
27	1	1508948838	1508950638	0	::1	1	1508948838	\N	\N
28	1	1508950945	1508952745	1	::1	1	1508950945	\N	\N
36	1	1509315355	1509317155	0	::1	1	1509315355	\N	\N
57	1	1509663239	1509665039	0	::1	1	1509663239	\N	\N
44	3	1509367534	1509369334	0	::1	1	1509367534	\N	\N
37	1	1509320448	1509322248	0	::1	1	1509320448	\N	\N
46	3	1509373591	1509375391	0	::1	1	1509373591	\N	\N
45	3	1509371299	1509373099	0	::1	1	1509371299	\N	\N
63	1	1510092170	1510093970	0	::1	1	1510092170	\N	\N
72	1	1511894828	1511896628	1	::1	1	1511894828	\N	\N
76	1	1511937320	1511939120	0	::1	1	1511937320	\N	\N
65	1	1510096926	1510098726	0	::1	1	1510096926	\N	\N
73	1	1511920463	1511922263	0	::1	1	1511920463	\N	\N
66	1	1510107425	1510109225	0	::1	1	1510107425	\N	\N
58	1	1509670925	1509672725	0	::1	1	1509670925	\N	\N
48	3	1509382484	1509384284	0	::1	1	1509382484	\N	\N
70	1	1511835303	1511837103	0	::1	1	1511835303	\N	\N
67	1	1510109499	1510111299	0	::1	1	1510109499	\N	\N
68	1	1510112532	1510114332	1	::1	1	1510112532	\N	\N
69	1	1511791853	1511793653	1	::1	1	1511791853	\N	\N
64	1	1510095054	1510096854	0	::1	1	1510095054	\N	\N
74	1	1511922720	1511924520	0	::1	1	1511922720	\N	\N
75	1	1511931143	1511932943	0	::1	1	1511931143	\N	\N
71	1	1511841605	1511843405	0	::1	1	1511841605	\N	\N
\.


--
-- Name: cruge_session_idsession_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cruge_session_idsession_seq', 76, true);


--
-- Data for Name: cruge_system; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cruge_system (idsystem, name, largename, sessionmaxdurationmins, sessionmaxsameipconnections, sessionreusesessions, sessionmaxsessionsperday, sessionmaxsessionsperuser, systemnonewsessions, systemdown, registerusingcaptcha, registerusingterms, terms, registerusingactivation, defaultroleforregistration, registerusingtermslabel, registrationonlogin) FROM stdin;
1	default	\N	30	10	1	-1	-1	0	0	0	0		0			1
\.


--
-- Name: cruge_system_idsystem_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cruge_system_idsystem_seq', 1, true);


--
-- Data for Name: cruge_user; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cruge_user (iduser, regdate, actdate, logondate, username, email, password, authkey, state, totalsessioncounter, currentsessioncounter) FROM stdin;
3	1509326875	\N	1509579324	palma	joelpalma13@hotmail.com	e10adc3949ba59abbe56e057f20f883e	93900cc3c33b1cddf24af01ec898a21c	1	0	0
4	1509326907	\N	1509579349	alejandro	alejandro@gmail.com	e10adc3949ba59abbe56e057f20f883e	c70fcc0f12d27a6996d608d223b522ac	1	0	0
1	\N	\N	1511937320	admin	admin@tucorreo.com	e10adc3949ba59abbe56e057f20f883e	\N	1	0	0
2	1509320877	\N	1509326661	joel	joelpalma1994@gmail.com	e10adc3949ba59abbe56e057f20f883e	ad91b9afc2157ca0ac36c95d7c0610de	1	0	0
\.


--
-- Name: cruge_user_iduser_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cruge_user_iduser_seq', 4, true);


--
-- Data for Name: social_media; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY social_media (id_social, id_user, fk_social_media, cuenta) FROM stdin;
\.


--
-- Name: social_media_id_social_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('social_media_id_social_seq', 1, false);


--
-- Data for Name: user_profile; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY user_profile (id_user_profile, id_user, nombres, apellidos, sobre_mi, direccion, ciudad, pais, foto_perfil) FROM stdin;
1	2	Joel						2.JPG
2	1							1.png
\.


--
-- Name: user_profile_id_user_profile_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('user_profile_id_user_profile_seq', 2, true);


SET search_path = agenda, pg_catalog;

--
-- Name: id_calendario; Type: CONSTRAINT; Schema: agenda; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY calendario
    ADD CONSTRAINT id_calendario PRIMARY KEY (id_calendario);


--
-- Name: id_contenido; Type: CONSTRAINT; Schema: agenda; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY contenido
    ADD CONSTRAINT id_contenido PRIMARY KEY (id_contenido);


--
-- Name: id_maestro; Type: CONSTRAINT; Schema: agenda; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY maestro
    ADD CONSTRAINT id_maestro PRIMARY KEY (id_maestro);


--
-- Name: id_notificacion; Type: CONSTRAINT; Schema: agenda; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY notificaciones
    ADD CONSTRAINT id_notificacion PRIMARY KEY (id_notificacion);


--
-- Name: id_observacion; Type: CONSTRAINT; Schema: agenda; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY observacion
    ADD CONSTRAINT id_observacion PRIMARY KEY (id_observacion);


--
-- Name: id_publicacion; Type: CONSTRAINT; Schema: agenda; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY publicaciones
    ADD CONSTRAINT id_publicacion PRIMARY KEY (id_publicacion);


SET search_path = public, pg_catalog;

--
-- Name: cruge_authassignment_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cruge_authassignment
    ADD CONSTRAINT cruge_authassignment_pkey PRIMARY KEY (userid, itemname);


--
-- Name: cruge_authitem_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cruge_authitem
    ADD CONSTRAINT cruge_authitem_pkey PRIMARY KEY (name);


--
-- Name: cruge_authitemchild_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cruge_authitemchild
    ADD CONSTRAINT cruge_authitemchild_pkey PRIMARY KEY (parent, child);


--
-- Name: cruge_field_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cruge_field
    ADD CONSTRAINT cruge_field_pkey PRIMARY KEY (idfield);


--
-- Name: cruge_fieldvalue_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cruge_fieldvalue
    ADD CONSTRAINT cruge_fieldvalue_pkey PRIMARY KEY (idfieldvalue);


--
-- Name: cruge_session_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cruge_session
    ADD CONSTRAINT cruge_session_pkey PRIMARY KEY (idsession);


--
-- Name: cruge_system_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cruge_system
    ADD CONSTRAINT cruge_system_pkey PRIMARY KEY (idsystem);


--
-- Name: cruge_user_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cruge_user
    ADD CONSTRAINT cruge_user_pkey PRIMARY KEY (iduser);


--
-- Name: id_social; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY social_media
    ADD CONSTRAINT id_social PRIMARY KEY (id_social);


--
-- Name: id_user_profile; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY user_profile
    ADD CONSTRAINT id_user_profile PRIMARY KEY (id_user_profile);


SET search_path = agenda, pg_catalog;

--
-- Name: fk_calendario; Type: FK CONSTRAINT; Schema: agenda; Owner: postgres
--

ALTER TABLE ONLY contenido
    ADD CONSTRAINT fk_calendario FOREIGN KEY (fk_calendario) REFERENCES calendario(id_calendario);


--
-- Name: fk_calendario; Type: FK CONSTRAINT; Schema: agenda; Owner: postgres
--

ALTER TABLE ONLY publicaciones
    ADD CONSTRAINT fk_calendario FOREIGN KEY (fk_calendario) REFERENCES calendario(id_calendario);


--
-- Name: fk_calendario; Type: FK CONSTRAINT; Schema: agenda; Owner: postgres
--

ALTER TABLE ONLY notificaciones
    ADD CONSTRAINT fk_calendario FOREIGN KEY (fk_calendario) REFERENCES calendario(id_calendario);


--
-- Name: fk_tipo_contenido; Type: FK CONSTRAINT; Schema: agenda; Owner: postgres
--

ALTER TABLE ONLY contenido
    ADD CONSTRAINT fk_tipo_contenido FOREIGN KEY (fk_tipo_contenido) REFERENCES maestro(id_maestro);


--
-- Name: fk_usuario_destino; Type: FK CONSTRAINT; Schema: agenda; Owner: postgres
--

ALTER TABLE ONLY notificaciones
    ADD CONSTRAINT fk_usuario_destino FOREIGN KEY (fk_usuario_destino) REFERENCES public.cruge_user(iduser);


--
-- Name: fk_usuario_origen; Type: FK CONSTRAINT; Schema: agenda; Owner: postgres
--

ALTER TABLE ONLY notificaciones
    ADD CONSTRAINT fk_usuario_origen FOREIGN KEY (created_by) REFERENCES public.cruge_user(iduser);


SET search_path = public, pg_catalog;

--
-- Name: crugeauthitemchild_ibfk_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cruge_authitemchild
    ADD CONSTRAINT crugeauthitemchild_ibfk_1 FOREIGN KEY (parent) REFERENCES cruge_authitem(name) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: crugeauthitemchild_ibfk_2; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cruge_authitemchild
    ADD CONSTRAINT crugeauthitemchild_ibfk_2 FOREIGN KEY (child) REFERENCES cruge_authitem(name) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: fk_cruge_authassignment_cruge_authitem1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cruge_authassignment
    ADD CONSTRAINT fk_cruge_authassignment_cruge_authitem1 FOREIGN KEY (itemname) REFERENCES cruge_authitem(name);


--
-- Name: fk_cruge_authassignment_user; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cruge_authassignment
    ADD CONSTRAINT fk_cruge_authassignment_user FOREIGN KEY (userid) REFERENCES cruge_user(iduser) ON DELETE CASCADE;


--
-- Name: fk_cruge_fieldvalue_cruge_field1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cruge_fieldvalue
    ADD CONSTRAINT fk_cruge_fieldvalue_cruge_field1 FOREIGN KEY (idfield) REFERENCES cruge_field(idfield) ON DELETE CASCADE;


--
-- Name: fk_cruge_fieldvalue_cruge_user1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cruge_fieldvalue
    ADD CONSTRAINT fk_cruge_fieldvalue_cruge_user1 FOREIGN KEY (iduser) REFERENCES cruge_user(iduser) ON DELETE CASCADE;


--
-- Name: fk_social_media; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY social_media
    ADD CONSTRAINT fk_social_media FOREIGN KEY (fk_social_media) REFERENCES agenda.maestro(id_maestro);


--
-- Name: id_user; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY user_profile
    ADD CONSTRAINT id_user FOREIGN KEY (id_user) REFERENCES cruge_user(iduser);


--
-- Name: id_user; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY social_media
    ADD CONSTRAINT id_user FOREIGN KEY (id_user) REFERENCES cruge_user(iduser);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

