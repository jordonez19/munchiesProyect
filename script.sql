/*
    SCRIPT SQL PROYECTO SCC
    DB POSTGRESQL 9.6
    FECHA INICIO 12/01/2018
    DESARROLLADOR: CARLOS ANDRES ACUÑA
    CONTACTO: c.andres.a30@gmail.com
*/


 
DROP TABLE tblactualizacionruta CASCADE;
DROP TABLE tblsaldopendienteruta CASCADE;
DROP TABLE tblmovimientoimg CASCADE;

-- tabla PARAMETROS GENERALES
CREATE TABLE tblparametros (
	documentovence BIGINT NULL, -- MESES MINIMOS PARA NOTIFICAR DOCUMENTOS POR VENCER
	tipocomisioncon VARCHAR(50) NULL -- ESTADO PARA ESTABLECER COMISION DE VIAJE PARA CONDUCTOR
	
);

INSERT INTO tblparametros VALUES(1,'Activo');


 CREATE TABLE tbllicencia(
 	idlicencia VARCHAR(150) NOT NULL,
 	nombreemp VARCHAR(150) NULL,
 	nitemp VARCHAR(150) NULL,
 	emaemp VARCHAR(150) NULL,
 	diremp VARCHAR(150) NULL,
 	telemp VARCHAR(150) NULL,
 	img VARCHAR(150) NULL,
 	dbemp VARCHAR(150) NULL, --NOMBRE DE LA DB
  	cardir VARCHAR(150) NULL, -- CARPETA DE EL SITIO
 	dominio VARCHAR(150) NULL, -- DOMINIO ASIGNADO
 	vehiculos BIGINT NULL, -- numero de vehiculos admitidos a registrar
    fechavence DATE NULL, -- FECHA DE VENCIMIENTO DE LICENCIA
 	feccre TIMESTAMP NOT NULL, -- FECHA DE CREACION DEL REGISTRO
 	fecact TIMESTAMP NULL, -- FECHA ACTUALIZACION DEL REGISTRO DEL SISTEMA
    PRIMARY KEY(idlicencia)
 );

 INSERT INTO tbllicencia(idlicencia,nombreemp,nitemp,emaemp,diremp,telemp,dbemp,cardir,dominio,vehiculos,fechavence,feccre)
 VALUES(1,'CARLOS LTDA','100025220','carlosltda@gmail.com','CRA 19','6486643','DBSCC','SICOVE','SICOVE.COM',3,'2018-04-18',CURRENT_DATE ); 

 -- tabla grupos de usuarios

 CREATE TABLE tblgrupo (
     idgrupo SERIAL NOT NULL,
     nomgru VARCHAR(150) NOT NULL, -- NOMBRE DEL GRUPO
     estado BIGINT NOT NULL,
     usrcre VARCHAR(150) NULL, -- USUARIO QUIEN CREO EL GRUPO
     feccre TIMESTAMP NOT NULL, -- FECHA DE CREACION DEL REGISTRO
     fecact TIMESTAMP NULL, -- FECHA ACTUALIZACION DEL REGISTRO DEL SISTEMA
     PRIMARY KEY(idgrupo)
 );

-- -- INSERTAMOS GRUPO SUPER ADMINISTRADOR
 insert into tblgrupo(nomgru,estado,feccre) VALUES('Super Admin',1,current_timestamp);
 insert into tblgrupo(nomgru,estado,feccre) VALUES('Priopietario',1,current_timestamp);
 insert into tblgrupo(nomgru,estado,feccre) VALUES('Administrador',1,current_timestamp);
 insert into tblgrupo(nomgru,estado,feccre) VALUES('Conductor',1,current_timestamp);



-- -- tabla para usuarios del sistema
 CREATE TABLE tbluser (
     iduser VARCHAR (150) NOT NULL, 
     nameuser VARCHAR(150) NOT NULL,  -- NOMBRE DE USUARIO PARA ACCESO AL SISTEMA
     password VARCHAR(150) NOT NULL, -- CONTRASEÑA EN SHA256
     grupo BIGINT NOT NULL, -- GRUPO DE USUARIO AL QUE PERTENECE PARA CUESTION DE PERMISOS
     estado  VARCHAR(150)  NULL, -- ESTADO ACTIVO INACTIVO PARA ACCESO AL SISTEMA
     enlinea BIGINT NULL, --VALIDAMOS SI EL USUARIO ESTA ONLINE
     sessionid TEXT NULL, -- session del navegador donde inicio session
     ultvis TIMESTAMP NULL, -- ULTIVA VISITA
     feccre TIMESTAMP NOT NULL, -- FECHA DE CREACION DEL REGISTRO
     fecact TIMESTAMP NULL, -- FECHA ACTUALIZACION DEL REGISTRO DEL SISTEMA
     PRIMARY KEY (iduser),
     FOREIGN KEY (grupo) REFERENCES tblgrupo(idgrupo)
 );

-- -- INSERTAMOS USUARIO POR DEFECTO
 INSERT INTO tbluser VALUES('xssss','carlos','85d593ea8aed54434a3315552728e272ac90e7064afddb212900573578554048',1,1,0,0,null,current_timestamp,null);
 INSERT INTO tbluser VALUES('xssssx','osnav','802b2722255817f2ebb25dd6c435bb1f25ba2992d4ad869ddb143bea19340ee1',1,1,0,0,null,current_timestamp,null);
 INSERT INTO tbluser VALUES('xssssx1','prueba','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92',1,1,0,0,null,current_timestamp,null);

-- tabla para empleados 

 CREATE TABLE tblempleado (
    iduser VARCHAR(150) NOT NULL,
    tipdni VARCHAR(150)  NULL, -- TIPO DOCUMENTO IDENTIDAD EMPLEADO
    dniemp VARCHAR(150) NULL, -- DOCUMENTO IDENTIDAD EMPLEADO
    nomemp VARCHAR(150) NULL, -- NOMBRES EMPLEADO
    apeemp VARCHAR(150) NULL, -- APELLIDOS EMPLEADO
    emaemp VARCHAR(150) NULL, -- CORREO ELECTRONICO EMPLEADO
    telemp VARCHAR(150) NULL, -- TELEFONO EMPLEADO
    celemp VARCHAR(150) NULL, -- CELULAR EMPLEADO
    codciu VARCHAR(150) NULL, -- CUIDAD DEL EMPLEADO
    diremp VARCHAR(150) NULL, -- DIRECCION RESIDENCIA EMPLEADO
    nomcon VARCHAR(150) NULL, -- NOMBRE DE LA PERSONA DE CONTACTO
    numcon VARCHAR(150) NULL, --  NUMERO DE LA PERSONA DE CONTACTO
    salario VARCHAR(150) NULL, -- SALARIO BASE DEL EMPLEADO
    porcom VARCHAR(150) NULL, -- PORCENTAJE COMISIONES 
    sbneto BIGINT NULL, -- INDICADOR PORCENTAJE SOBRE EL NETO
    sbbruto BIGINT NULL, -- INDICADOR PORCENTAJE SOBRE EL BRUTO
    img     VARCHAR(150) NULL,  -- IMAGEN DEL PERFIL
    estado VARCHAR(150) NULL, -- ESTADO DEL EMPLEADO
    feccre TIMESTAMP NOT NULL, -- FECHA DE CREACION DEL REGISTRO
    fecact TIMESTAMP NULL, -- FECHA ACTUALIZACION DEL REGISTRO DEL SISTEMA
    PRIMARY KEY(iduser),
    FOREIGN KEY(iduser) REFERENCES tbluser(iduser)
 );  


-- -- tabla licencia empleados 

 CREATE TABLE tbllicenempleado (
    idlicencia SERIAL NOT NULL,
    iduser VARCHAR(150) NOT NULL, -- USUARIO AL QUE PERTENECE LA LICENCIA
    numero VARCHAR(150) NULL, -- NUMERO DE LICENCIA 
    categoria VARCHAR(150) NULL, -- CATEGORIA DE LA LICENCIA
    vence DATE NULL, -- FECHA DE VENCIMIENTO DE LA LICENCIA
    estado VARCHAR(150) NULL, -- ESTADO DE LA LICENCIA
    feccre TIMESTAMP NOT NULL, -- FECHA DE CREACION DEL REGISTRO
    fecact TIMESTAMP NULL, -- FECHA ACTUALIZACION DEL REGISTRO DEL SISTEMA
    PRIMARY KEY (idlicencia),
    FOREIGN KEY(iduser) REFERENCES tbluser(iduser)
);

-- tabla token usuario 

CREATE TABLE tbltokenuser(
    idtoken SERIAL NOT NULL,
    iduser VARCHAR(150) NOT NULL, -- USUARIO AL QUE PERTENECE EL TOKEN
    token VARCHAR(150) NULL, -- TOKEN ASIGNADO
    estado VARCHAR(150) NULL,
    feccre TIMESTAMP NOT NULL,
    fecact TIMESTAMP NULL,
    PRIMARY KEY (idtoken),
    FOREIGN KEY(iduser) REFERENCES tbluser(iduser)
);

-- tabala tipo carroseria

CREATE TABLE tbltipomedicion(
    idmedicion SERIAL  NOT NULL,
    nombre VARCHAR(150)  NULL, -- NOMBRE  
    descripcion TEXT  NULL, -- DESCRIPCION 
    estado BIGINT NULL,
    feccre TIMESTAMP  NULL,
    fecact TIMESTAMP NULL,
    PRIMARY KEY(idmedicion)
);

INSERT INTO tbltipomedicion(nombre,estado,feccre) VALUES('TONELADA',1,current_timestamp);
INSERT INTO tbltipomedicion(nombre,estado,feccre) VALUES('KILO',1,current_timestamp);
INSERT INTO tbltipomedicion(nombre,estado,feccre) VALUES('LIBRA',1,current_timestamp);

-- tabala tipo carroseria

CREATE TABLE tblgastoaceite(
    idgastoaceite SERIAL  NOT NULL,
    nombre VARCHAR(150)  NULL, -- NOMBRE  
    descripcion TEXT  NULL, -- DESCRIPCION 
    adicional BIGINT NULL,
    estado BIGINT NULL,
    feccre TIMESTAMP  NULL,
    fecact TIMESTAMP NULL,
    PRIMARY KEY(idgastoaceite)
);

INSERT INTO tblgastoaceite(nombre,adicional,estado,feccre) VALUES('Lubricante Caje',1,1,current_timestamp);
INSERT INTO tblgastoaceite(nombre,adicional,estado,feccre) VALUES('Lubricante Motor',1,1,current_timestamp);
INSERT INTO tblgastoaceite(nombre,adicional,estado,feccre) VALUES('Lubricante Transmision',1,1,current_timestamp);
INSERT INTO tblgastoaceite(nombre,adicional,estado,feccre) VALUES('Filtros',1,0,current_timestamp);

-- tabla tipo vehiculo

 CREATE TABLE tblmarca(
     idmarca SERIAL NOT NULL,
     nombre VARCHAR(150)  NULL, -- NOMBRE DE LA MARCA
     descripcion TEXT  NULL, -- DESCRIPCION DE LA MARCA
     estado BIGINT NULL,
     feccre TIMESTAMP  NULL,
     fecact TIMESTAMP NULL,
     PRIMARY KEY(idmarca)
 );

 INSERT INTO tblmarca (nombre,estado,feccre) VALUES('ISUZU',1,current_timestamp);
 INSERT INTO tblmarca (nombre,estado,feccre) VALUES('MITSUBISHI',1,current_timestamp);
 INSERT INTO tblmarca (nombre,estado,feccre) VALUES('SCANIA',1,current_timestamp);
 INSERT INTO tblmarca (nombre,estado,feccre) VALUES('DAIHATSU',1,current_timestamp);
 INSERT INTO tblmarca (nombre,estado,feccre) VALUES('MAZDA',1,current_timestamp);
 INSERT INTO tblmarca (nombre,estado,feccre) VALUES('NISSAN',1,current_timestamp);
 INSERT INTO tblmarca (nombre,estado,feccre) VALUES('VOLVO',1,current_timestamp);
 INSERT INTO tblmarca (nombre,estado,feccre) VALUES('FREIGHTLINER',1,current_timestamp);
 INSERT INTO tblmarca (nombre,estado,feccre) VALUES('HYUNDAI',1,current_timestamp);
 INSERT INTO tblmarca (nombre,estado,feccre) VALUES('MACK',1,current_timestamp);
 INSERT INTO tblmarca (nombre,estado,feccre) VALUES('CHEVROLET',1,current_timestamp);
 INSERT INTO tblmarca (nombre,estado,feccre) VALUES('KIA',1,current_timestamp);
 INSERT INTO tblmarca (nombre,estado,feccre) VALUES('MERCEDES BENZ',1,current_timestamp);
 INSERT INTO tblmarca (nombre,estado,feccre) VALUES('KENWORTH',1,current_timestamp);
 INSERT INTO tblmarca (nombre,estado,feccre) VALUES('OTRO',1,current_timestamp);


-- -- tabla tipo vehiculo

 CREATE TABLE tbltipovehiculo(
     idtipovehiculo SERIAL NOT NULL,
     nombre VARCHAR(150)  NULL, -- NOMBRE DEL TIPO DE VEHICULO
     descripcion TEXT  NULL, -- DESCRIPCION DEL TIPO E VEHICULO
     tipo VARCHAR(150) NULL, 
     estado BIGINT NULL,
     feccre TIMESTAMP  NULL,
     fecact TIMESTAMP NULL,
     PRIMARY KEY(idtipovehiculo)
 );

 INSERT INTO tbltipovehiculo (nombre,tipo,estado,feccre) VALUES('TRACTOMULA','Trailer',1,current_timestamp);
 INSERT INTO tbltipovehiculo (nombre,tipo,estado,feccre) VALUES('MINI MULA','Trailer',1,current_timestamp);
 INSERT INTO tbltipovehiculo (nombre,tipo,estado,feccre) VALUES('DOBLE TROQUE','Carroceria',1,current_timestamp);
 INSERT INTO tbltipovehiculo (nombre,tipo,estado,feccre) VALUES('CAMION SENCILLO','Carroceria',1,current_timestamp);
 INSERT INTO tbltipovehiculo (nombre,tipo,estado,feccre) VALUES('TURBO','Carroceria',1,current_timestamp);
 INSERT INTO tbltipovehiculo (nombre,tipo,estado,feccre) VALUES('OTROS','Carroceria',1,current_timestamp);



-- tabala tipo carroseria

 CREATE TABLE tbltipocarroseria(
     idtipocarroseria SERIAL  NOT NULL,
     nombre VARCHAR(150)  NULL, -- NOMBRE DEL TIPO TRAILER
     descripcion TEXT  NULL, -- DESCRIPCION DEL TIPO TRAILER
     estado BIGINT NULL,
     feccre TIMESTAMP  NULL,
     fecact TIMESTAMP NULL,
     PRIMARY KEY(idtipocarroseria)
 );

 INSERT INTO tbltipocarroseria(nombre,estado,feccre) VALUES('PLANCHA / PLATAFORMA DE 2 O 3 EJES',1,current_timestamp);
 INSERT INTO tbltipocarroseria(nombre,estado,feccre) VALUES('ESTACA',1,current_timestamp);
 INSERT INTO tbltipocarroseria(nombre,estado,feccre) VALUES('FURGON',1,current_timestamp);
 INSERT INTO tbltipocarroseria(nombre,estado,feccre) VALUES('CARBONERO',1,current_timestamp);
 INSERT INTO tbltipocarroseria(nombre,estado,feccre) VALUES('VOLCO',1,current_timestamp);
 INSERT INTO tbltipocarroseria(nombre,estado,feccre) VALUES('REFRIGERADO',1,current_timestamp);
 INSERT INTO tbltipocarroseria(nombre,estado,feccre) VALUES('GRUA',1,current_timestamp);
 INSERT INTO tbltipocarroseria(nombre,estado,feccre) VALUES('PLANCHON',1,current_timestamp);
 INSERT INTO tbltipocarroseria(nombre,estado,feccre) VALUES('GASERAS',1,current_timestamp);
 INSERT INTO tbltipocarroseria(nombre,estado,feccre) VALUES('BOTELLERO',1,current_timestamp);
 INSERT INTO tbltipocarroseria(nombre,estado,feccre) VALUES('DISEÑO ESPECIAL',1,current_timestamp);
 INSERT INTO tbltipocarroseria(nombre,estado,feccre) VALUES('TANQUE',1,current_timestamp);
 INSERT INTO tbltipocarroseria(nombre,estado,feccre) VALUES('CAMA BAJA / CAMA CUNA',1,current_timestamp);
 INSERT INTO tbltipocarroseria(nombre,estado,feccre) VALUES('NIÑERA',1,current_timestamp);
 INSERT INTO tbltipocarroseria(nombre,estado,feccre) VALUES('REMOLQUE',1,current_timestamp);
 INSERT INTO tbltipocarroseria(nombre,estado,feccre) VALUES('CARROTANQUE',1,current_timestamp);
 INSERT INTO tbltipocarroseria(nombre,estado,feccre) VALUES('PORTA CONTENEDOR',1,current_timestamp);
 INSERT INTO tbltipocarroseria(nombre,estado,feccre) VALUES('MIXERS',1,current_timestamp);
 INSERT INTO tbltipocarroseria(nombre,estado,feccre) VALUES('COMPACTADOR',1,current_timestamp);



