from configuraciones import *
import psycopg2

conn = psycopg2.connect("dbname=%s host=%s user=%s password=%s"%(database,host,user,passwd))
cur = conn.cursor()

#---------------------------------------------------------------------------------------
#-----------------------------Seed Usuarios---------------------------------------------
#---------------------------------------------------------------------------------------
sql = """
insert into usuarios (rut, nick, password, nombre, apellido, telefono, direccion) values (106545618,'luyinex', crypt('bestpassever4ever', gen_salt('bf', 8)), 'Luis', 'Bastias', 985645932, 'Avenida el descanso 760')
returning
rut, nick, password, nombre, apellido, telefono, direccion;
"""

cur.execute(sql)
conn.commit()
usuario = cur.fetchone()
print ("Insertamos en Usuarios :" )
print(usuario)

sql = """
insert into usuarios (rut, nick, password, nombre, apellido, telefono, direccion) values (123821923,'bribkn', '1234', 'Brian', 'Bastias', 84544520, 'Avenida Arturo Prat 33')
returning
rut, nick, password, nombre, apellido, telefono, direccion;
"""

cur.execute(sql)
conn.commit()
usuario = cur.fetchone()
print ("Insertamos en Usuarios :" )
print(usuario)

sql = """
insert into usuarios (rut, nick, password, nombre, apellido, telefono, direccion) values (121931232,'v1nland', 'sale4fus', 'Martin', 'Saavedra', 985642312, 'Avenida Alameda 1111')
returning
rut, nick, password, nombre, apellido, telefono, direccion;
"""

cur.execute(sql)
conn.commit()
usuario = cur.fetchone()
print ("Insertamos en Usuarios :" )
print(usuario)

sql = """
insert into usuarios (rut, nick, password, nombre, apellido, telefono, direccion) values (126545618,'ferrothorn', 'mainraynor', 'Alfonso', 'Mena', 923245932, 'Avenida Huasolandia 69')
returning
rut, nick, password, nombre, apellido, telefono, direccion;
"""

cur.execute(sql)
conn.commit()
usuario = cur.fetchone()
print ("Insertamos en Usuarios :" )
print(usuario)


sql = """
insert into usuarios (rut, nick, password, nombre, apellido, telefono, direccion) values (132425618,'GatoBladeBlade', 'soihomelochino', 'Felipe', 'Miranda', 982312212, 'Pasaje Mapocho 32')
returning
rut, nick, password, nombre, apellido, telefono, direccion;
"""

cur.execute(sql)
conn.commit()
usuario = cur.fetchone()
print ("Insertamos en Usuarios :" )
print(usuario)

sql = """
insert into usuarios (rut, nick, password, nombre, apellido, telefono, direccion) values (189232331,'matamatar', 'asdf1234', 'Matias', 'Munoz', 9856213123, 'Avenida Santa Lucia 22')
returning
rut, nick, password, nombre, apellido, telefono, direccion;
"""

cur.execute(sql)
conn.commit()
usuario = cur.fetchone()
print ("Insertamos en Usuarios :" )
print(usuario)

sql = """
insert into usuarios (rut, nick, password, nombre, apellido, telefono, direccion) values (198123721,'waldosky', 'cacaconchoclo123', 'Waldo', 'Campos', 985621321, 'Avenida Papa Emeritus IV 123')
returning
rut, nick, password, nombre, apellido, telefono, direccion;
"""

cur.execute(sql)
conn.commit()
usuario = cur.fetchone()
print ("Insertamos en Usuarios :" )
print(usuario)

sql = """
insert into usuarios (rut, nick, password, nombre, apellido, telefono, direccion) values (193812323,'masterjavixxxx', 'elmejordetodos123', 'Javier', 'Ruiz', 985641232, 'Avenida manco 141')
returning
rut, nick, password, nombre, apellido, telefono, direccion;
"""

cur.execute(sql)
conn.commit()
usuario = cur.fetchone()
print ("Insertamos en Usuarios :" )
print(usuario)
#---------------------------------------------------------------------------------------
#-----------------------------Seed Roles------------------------------------------------
#---------------------------------------------------------------------------------------
sql = """
insert into roles (usuario_rut,rol) values (106545618,'tio')
returning
usuario_rut,rol;
"""

cur.execute(sql)
conn.commit()
rol = cur.fetchone()
print ("Insertamos en Roles :" )
print(rol)

sql = """
insert into roles (usuario_rut,rol) values (123821923,'apoderado')
returning
usuario_rut,rol;
"""

cur.execute(sql)
conn.commit()
rol = cur.fetchone()
print ("Insertamos en Roles :" )
print(rol)

sql = """
insert into roles (usuario_rut,rol) values (121931232,'tio')
returning
usuario_rut,rol;
"""

cur.execute(sql)
conn.commit()
rol = cur.fetchone()
print ("Insertamos en Roles :" )
print(rol)

sql = """
insert into roles (usuario_rut,rol) values (126545618,'tio')
returning
usuario_rut,rol;
"""

cur.execute(sql)
conn.commit()
rol = cur.fetchone()
print ("Insertamos en Roles :" )
print(rol)

sql = """
insert into roles (usuario_rut,rol) values (132425618,'tio')
returning
usuario_rut,rol;
"""

cur.execute(sql)
conn.commit()
rol = cur.fetchone()
print ("Insertamos en Roles :" )
print(rol)

sql = """
insert into roles (usuario_rut,rol) values (189232331,'apoderado')
returning
usuario_rut,rol;
"""

cur.execute(sql)
conn.commit()
rol = cur.fetchone()
print ("Insertamos en Roles :" )
print(rol)

sql = """
insert into roles (usuario_rut,rol) values (198123721,'apoderado')
returning
usuario_rut,rol;
"""

cur.execute(sql)
conn.commit()
rol = cur.fetchone()
print ("Insertamos en Roles :" )
print(rol)

sql = """
insert into roles (usuario_rut,rol) values (193812323,'apoderado')
returning
usuario_rut,rol;
"""

cur.execute(sql)
conn.commit()
rol = cur.fetchone()
print ("Insertamos en Roles :" )
print(rol)


#------------------------------------------------------------------------------------------
#-----------------------------Seed Furgones------------------------------------------------
#------------------------------------------------------------------------------------------
sql = """
insert into furgones (patente,rut_tio, marca, modelo,capacidad,ano) values ('BJBV20',106545618, 'Mercedez Benz', 'Sprint',23,2015)
returning
patente,rut_tio, marca, modelo,capacidad,ano;
"""

cur.execute(sql)
conn.commit()
furgon = cur.fetchone()
print ("Insertamos en Furgones :" )
print(furgon)


sql = """
insert into furgones (patente,rut_tio, marca, modelo,capacidad,ano) values ('AA0000',121931232, 'Toyota', 'Yerix',22,2013)
returning
patente,rut_tio, marca, modelo,capacidad,ano;
"""

cur.execute(sql)
conn.commit()
furgon = cur.fetchone()
print ("Insertamos en Furgones :" )
print(furgon)


sql = """
insert into furgones (patente,rut_tio, marca, modelo,capacidad,ano) values ('ZZZZ99',126545618, 'Chery', 'Xino',19,2018)
returning
patente,rut_tio, marca, modelo,capacidad,ano;
"""

cur.execute(sql)
conn.commit()
furgon = cur.fetchone()
print ("Insertamos en Furgones :" )
print(furgon)


sql = """
insert into furgones (patente,rut_tio, marca, modelo,capacidad,ano) values ('AB1234',132425618, 'Ford', 'Wagon',25,2017)
returning
patente,rut_tio, marca, modelo,capacidad,ano;
"""

cur.execute(sql)
conn.commit()
furgon = cur.fetchone()
print ("Insertamos en Furgones :" )
print(furgon)

#------------------------------------------------------------------------------------------
#-----------------------------Seed Alumnos-------------------------------------------------
#------------------------------------------------------------------------------------------

sql = """
insert into alumnos (nombre, apellido, nivel, patente_furgon, curso) values ('Matias','Rivas','basica','AB1234','3J')
returning
nombre, apellido, nivel, patente_furgon, curso;
"""

cur.execute(sql)
conn.commit()
alumno = cur.fetchone()
print ("Insertamos en Alumnos :" )
print(alumno)

sql = """
insert into alumnos (nombre, apellido, nivel, patente_furgon, curso) values ('Gonzalo','Fernandez','media','AB1234','1A')
returning
nombre, apellido, nivel, patente_furgon, curso;
"""

cur.execute(sql)
conn.commit()
alumno = cur.fetchone()
print ("Insertamos en Alumnos :" )
print(alumno)

sql = """
insert into alumnos (nombre, apellido, nivel, patente_furgon, curso) values ('Carlo','Magno','basica','AB1234','3J')
returning
nombre, apellido, nivel, patente_furgon, curso;
"""

cur.execute(sql)
conn.commit()
alumno = cur.fetchone()
print ("Insertamos en Alumnos :" )
print(alumno)

sql = """
insert into alumnos (nombre, apellido, nivel, patente_furgon, curso) values ('Javier','Madariaga','media','ZZZZ99','2B')
returning
nombre, apellido, nivel, patente_furgon, curso;
"""

cur.execute(sql)
conn.commit()
alumno = cur.fetchone()
print ("Insertamos en Alumnos :" )
print(alumno)

sql = """
insert into alumnos (nombre, apellido, nivel, patente_furgon, curso) values ('Sebastian','Solanich','basica','ZZZZ99','8B')
returning
nombre, apellido, nivel, patente_furgon, curso;
"""

cur.execute(sql)
conn.commit()
alumno = cur.fetchone()
print ("Insertamos en Alumnos :" )
print(alumno)

sql = """
insert into alumnos (nombre, apellido, nivel, patente_furgon, curso) values ('Miley','Bastias','basica','AA0000','1M')
returning
nombre, apellido, nivel, patente_furgon, curso;
"""

cur.execute(sql)
conn.commit()
alumno = cur.fetchone()
print ("Insertamos en Alumnos :" )
print(alumno)

sql = """
insert into alumnos (nombre, apellido, nivel, patente_furgon, curso) values ('Estufa','Calentita','basica','AA0000','8B')
returning
nombre, apellido, nivel, patente_furgon, curso;
"""

cur.execute(sql)
conn.commit()
alumno = cur.fetchone()
print ("Insertamos en Alumnos :" )
print(alumno)

#------------------------------------------------------------------------------------------
#-----------------------------Seed Tiene---------------------------------------------------
#------------------------------------------------------------------------------------------

sql = """
insert into tiene(usuario_rut,alumno_id) values (123821923,1)
returning
usuario_rut,alumno_id;
"""

cur.execute(sql)
conn.commit()
tiene = cur.fetchone()
print ("Insertamos en Tiene :" )
print(tiene)

sql = """
insert into tiene(usuario_rut,alumno_id) values (123821923,2)
returning
usuario_rut,alumno_id;
"""

cur.execute(sql)
conn.commit()
tiene = cur.fetchone()
print ("Insertamos en Tiene :" )
print(tiene)

sql = """
insert into tiene(usuario_rut,alumno_id) values (189232331,3)
returning
usuario_rut,alumno_id;
"""

cur.execute(sql)
conn.commit()
tiene = cur.fetchone()
print ("Insertamos en Tiene :" )
print(tiene)

sql = """
insert into tiene(usuario_rut,alumno_id) values (193812323,4)
returning
usuario_rut,alumno_id;
"""

cur.execute(sql)
conn.commit()
tiene = cur.fetchone()
print ("Insertamos en Tiene :" )
print(tiene)

sql = """
insert into tiene(usuario_rut,alumno_id) values (189232331,5)
returning
usuario_rut,alumno_id;
"""

cur.execute(sql)
conn.commit()
tiene = cur.fetchone()
print ("Insertamos en Tiene :" )

print(tiene)
sql = """
insert into tiene(usuario_rut,alumno_id) values (198123721,6)
returning
usuario_rut,alumno_id;
"""

cur.execute(sql)
conn.commit()
tiene = cur.fetchone()
print ("Insertamos en Tiene :" )
print(tiene)

sql = """
insert into tiene(usuario_rut,alumno_id) values (106545618,7)
returning
usuario_rut,alumno_id;
"""

cur.execute(sql)
conn.commit()
tiene = cur.fetchone()
print ("Insertamos en Tiene :" )
print(tiene)
