from configuraciones import *
import psycopg2
conn = psycopg2.connect("dbname=%s user=%s password=%s"%(database,user,passwd))

cur = conn.cursor()
sql ="""DROP SCHEMA public CASCADE;
CREATE SCHEMA public;"""

cur.execute(sql)

sql ="""

CREATE EXTENSION pgcrypto;

CREATE TABLE usuarios
    (rut integer , nick varchar(20), password varchar(255), nombre varchar(20), apellido varchar(20), telefono varchar(20), direccion varchar(255), PRIMARY KEY(rut));
CREATE TABLE furgones
    (patente varchar(6) , rut_tio integer REFERENCES usuarios(rut), marca varchar(20), modelo varchar(20), capacidad integer, ano integer, PRIMARY KEY(patente) );
CREATE TABLE alumnos
    (id serial , nombre varchar(20), apellido varchar(20), nivel varchar(20), patente_furgon varchar(6) REFERENCES furgones(patente), curso varchar(3), PRIMARY KEY(id));
CREATE TABLE tiene
    (usuario_rut integer  REFERENCES usuarios(rut),  alumno_id integer  REFERENCES alumnos(id), PRIMARY KEY(usuario_rut,alumno_id));
CREATE TABLE roles
    (usuario_rut integer  REFERENCES usuarios(rut), rol varchar(20), PRIMARY KEY(usuario_rut));

"""

cur.execute(sql)

conn.commit()
cur.close()
conn.close()
