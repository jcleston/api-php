-- public.tabela1 definition

-- Drop table

-- DROP TABLE public.tabela1;

CREATE TABLE public.tabela1 (
	id int8 NOT NULL DEFAULT nextval('tabela_id_seq'::regclass),
	coluna1 varchar NULL,
	coluna2 varchar NULL,
	CONSTRAINT tabela1_pk PRIMARY KEY (id)
);

INSERT INTO public.tabela1
(id, coluna1, coluna2)
VALUES(1, 'registro1', 'registro1');
