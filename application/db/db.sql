drop table if exists propietarios cascade;

create table propietarios(
  id        bigserial     constraint pk_usuarios primary key,
  dni       numeric(8)    not null,
  nombre    varchar(15)   not null constraint uq_usuarios_nick unique,
  telefono  numeric(9)    not null
);

drop table if exists inmuebles cascade;

create table inmuebles(
  numero           bigserial   constraint pk_inmuebles primary key,
  propietarios_id  bigint      not null constraint fk_propietarios_dni
                                  references propietarios(id) 
                                    on delete no action
                                    on update cascade,
  precio           numeric     not null,
  habitaciones     numeric     not null,
  baños            numeric     not null,
  lavavajillas     boolean     not null,
  garaje           boolean     not null,
  trastero         boolean     not null
);

drop table if exists ci_sessions cascade;

create table ci_sessions (
  session_id    varchar(40)  not null default '0',
  ip_address    varchar(45)  not null default '0',
  user_agent    varchar(120) not null,
  last_activity numeric(10)  not null default 0,
  user_data     text         not null,
  constraint pk_ci_sessions primary key (session_id)
);

create index last_activity_idx on ci_sessions (last_activity);