--Buscar todos los alumnos transportados por un tío.
SELECT u.rut, u.nombre, u.apellido, u.telefono, a.nombre, a.apellido, a.nivel,a.patente_furgon, a.curso
FROM alumnos as a, furgones as f, usuarios as u, roles as r
WHERE a.patente_furgon = f.patente
AND f.rut_tio = u.rut
AND u.rut = r.usuario_rut
AND r.rol = 'tio'
AND u.nombre LIKE '%$nombre_tio%'
AND u.apellido LIKE '%$apellido_tio%'
AND CAST(u.rut AS TEXT) LIKE '%$rut_tio%';

--Buscar todos los alumnos de un apoderado.
SELECT u.rut, u.nombre, u.apellido, u.telefono, a.nombre, a.apellido, a.nivel,a.patente_furgon, a.curso
FROM alumnos as a, tiene as t, usuarios as u, roles as r
WHERE a.id = t.alumno_id
AND t.usuario_rut = u.rut
AND u.rut = r.usuario_rut
AND r.rol = 'apoderado'
AND u.nombre LIKE '%$nombre_apoderado%'
AND u.apellido LIKE '%$apellido_apoderado%'
AND CAST(u.rut AS TEXT) LIKE '%$rut_apoderado%';

--Buscar un tío por su nombre y/o apellido.
SELECT u.rut, u.nombre, u.apellido, u.telefono, u.direccion, f.patente, f.marca, f.modelo, f.capacidad, f.ano
FROM roles as r, usuarios as u, furgones as f
WHERE r.usuario_rut=u.rut
AND u.rut=f.rut_tio
AND r.rol='tio'
AND u.nombre LIKE '%$nombre_tio%'
AND u.apellido LIKE '%$apellido_tio%'
AND CAST(u.rut AS TEXT) LIKE '%$rut_tio%';

--Buscar a un tío por alguno de sus alumnos transportados.
SELECT u.rut, u.nombre, u.apellido, u.telefono, u.direccion, f.patente, f.marca, f.modelo, f.capacidad, f.ano
FROM roles as r, usuarios as u, furgones as f, alumnos as a
WHERE a.patente_furgon = f.patente
AND f.rut_tio = u.rut
AND u.rut = r.usuario_rut
AND r.rol = 'tio'
AND a.nombre LIKE '%$nombre_alumno%'
AND a.apellido LIKE '%$apellido_alumno%'
GROUP BY(u.rut,f.patente);

-- Modificar el número de teléfono de un tío.
UPDATE usuarios
SET telefono = '%$telefono_tio%'
WHERE CAST(rut AS TEXT) = '$rut_tio';

--Modificar el número de teléfono de un apoderado.
UPDATE usuarios
SET telefono = '%$telefono_apoderado%'
WHERE CAST(rut AS TEXT) = '$rut_apoderado';

--Modificar el número de teléfono de un alumno.
UPDATE alumnos
SET telefono = '%$telefono_alumno%'
WHERE CAST(id AS TEXT) = '$id_alumno';

--Modificar el furgón de un alumno.
UPDATE alumnos
SET patente_furgon = '%$patente_furgon_alumno%'
WHERE CAST(id AS TEXT) = '$id_alumno';

--Modificar el furgón de un tío.
UPDATE furgones
SET patente = '%$patente_furgon%', marca =  '%$marca_furgon%', modelo = '%$modelo_furgon%', capacidad = '%$capacidad_furgon%', ano = '%$ano_furgon%'
WHERE CAST(rut_tio AS TEXT) = '$rut_tio';

--Registrar un tío.
--Registrar un apoderado.
--Registrar un alumno.
