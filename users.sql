PGDMP      *                |         	   migration    16.3    16.3     �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    16406 	   migration    DATABASE     �   CREATE DATABASE migration WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'English_Indonesia.1252';
    DROP DATABASE migration;
                postgres    false            �           0    0    DATABASE migration    ACL     )   GRANT ALL ON DATABASE migration TO root;
                   postgres    false    4788                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
                pg_database_owner    false            �           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                   pg_database_owner    false    4            �            1259    16407    users    TABLE       CREATE TABLE public.users (
    user_id character varying(155),
    kode_user character varying(155),
    hak bigint DEFAULT 0,
    password character varying(155),
    update_at timestamp with time zone,
    created_at timestamp with time zone,
    member_id integer NOT NULL
);
    DROP TABLE public.users;
       public         heap    postgres    false    4            �           0    0    TABLE users    ACL     A   GRANT SELECT,INSERT,DELETE,UPDATE ON TABLE public.users TO root;
          public          postgres    false    215            �            1259    16426    users_member_id_seq    SEQUENCE     �   CREATE SEQUENCE public.users_member_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.users_member_id_seq;
       public          postgres    false    4    215            �           0    0    users_member_id_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.users_member_id_seq OWNED BY public.users.member_id;
          public          postgres    false    216            �           0    0    SEQUENCE users_member_id_seq    ACL     <   GRANT USAGE ON SEQUENCE public.users_member_id_seq TO root;
          public          postgres    false    216                       2604    16427    users member_id    DEFAULT     r   ALTER TABLE ONLY public.users ALTER COLUMN member_id SET DEFAULT nextval('public.users_member_id_seq'::regclass);
 >   ALTER TABLE public.users ALTER COLUMN member_id DROP DEFAULT;
       public          postgres    false    216    215            �          0    16407    users 
   TABLE DATA           d   COPY public.users (user_id, kode_user, hak, password, update_at, created_at, member_id) FROM stdin;
    public          postgres    false    215          �           0    0    users_member_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.users_member_id_seq', 3, true);
          public          postgres    false    216                       2606    16432    users users_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (member_id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    215            �   s   x�3�442�utt�44�T1�T14P�,sr
�(w�J�4�3�M�̯(-*3�0I6�,��4r��63�7�1.	Ju�4+���4202�50�54Q00�21�2��60�4����� ��     