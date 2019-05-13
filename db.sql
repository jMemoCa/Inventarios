/*
Script generado por Aqua Data Studio 16.0.5-9 en may-13-2019 04:27:58 PM
Base de datos: inventario
Esquema: <Todos los esquemas>
Objetos: TABLE
*/
ALTER TABLE "users"
	DROP FOREIGN KEY "users_rolid_foreign"
GO
ALTER TABLE "bitacoras"
	DROP FOREIGN KEY "bitacoras_userid_foreign"
GO
ALTER TABLE "bitacoras"
	DROP FOREIGN KEY "bitacoras_accionid_foreign"
GO
ALTER TABLE "articulos"
	DROP FOREIGN KEY "articulos_categoriaid_foreign"
GO
ALTER TABLE "users"
	DROP INDEX "users_email_unique"
GO
DROP TABLE "users"
GO
DROP TABLE "rols"
GO
DROP TABLE "rol_user"
GO
DROP TABLE "rol_accion"
GO
DROP TABLE "password_resets"
GO
DROP TABLE "modulos"
GO
DROP TABLE "migrations"
GO
DROP TABLE "categorias"
GO
DROP TABLE "bitacoras"
GO
DROP TABLE "articulos"
GO
DROP TABLE "accions"
GO

CREATE TABLE "accions"  ( 
	"id"        	bigint(20) UNSIGNED AUTO_INCREMENT NOT NULL,
	"accion"    	varchar(191) NOT NULL,
	"created_at"	timestamp NULL,
	"updated_at"	timestamp NULL,
	PRIMARY KEY("id")
)
GO
CREATE TABLE "articulos"  ( 
	"id"         	bigint(20) UNSIGNED AUTO_INCREMENT NOT NULL,
	"articulo"   	varchar(191) NOT NULL,
	"descripcion"	varchar(191) NOT NULL,
	"cantidad"   	int(11) NOT NULL,
	"categoriaId"	bigint(20) UNSIGNED NOT NULL,
	"created_at" 	timestamp NULL,
	"updated_at" 	timestamp NULL,
	PRIMARY KEY("id")
)
GO
CREATE TABLE "bitacoras"  ( 
	"id"        	bigint(20) UNSIGNED AUTO_INCREMENT NOT NULL,
	"userId"    	bigint(20) UNSIGNED NOT NULL,
	"accionId"  	bigint(20) UNSIGNED NOT NULL,
	"created_at"	timestamp NULL,
	"updated_at"	timestamp NULL,
	PRIMARY KEY("id")
)
GO
CREATE TABLE "categorias"  ( 
	"id"         	bigint(20) UNSIGNED AUTO_INCREMENT NOT NULL,
	"categoria"  	varchar(191) NOT NULL,
	"descripcion"	varchar(191) NOT NULL,
	"created_at" 	timestamp NULL,
	"updated_at" 	timestamp NULL,
	PRIMARY KEY("id")
)
GO
CREATE TABLE "migrations"  ( 
	"id"       	int(10) UNSIGNED AUTO_INCREMENT NOT NULL,
	"migration"	varchar(191) NOT NULL,
	"batch"    	int(11) NOT NULL,
	PRIMARY KEY("id")
)
GO
CREATE TABLE "modulos"  ( 
	"id"        	bigint(20) UNSIGNED AUTO_INCREMENT NOT NULL,
	"modulo"    	varchar(191) NOT NULL,
	"created_at"	timestamp NULL,
	"updated_at"	timestamp NULL,
	PRIMARY KEY("id")
)
GO
CREATE TABLE "password_resets"  ( 
	"email"     	varchar(191) NOT NULL,
	"token"     	varchar(191) NOT NULL,
	"created_at"	timestamp NULL 
	)
GO
CREATE TABLE "rol_accion"  ( 
	"id"        	bigint(20) UNSIGNED AUTO_INCREMENT NOT NULL,
	"rol_id"    	int(10) UNSIGNED NOT NULL,
	"accion_id" 	int(10) UNSIGNED NOT NULL,
	"created_at"	timestamp NULL,
	"updated_at"	timestamp NULL,
	PRIMARY KEY("id")
)
GO
CREATE TABLE "rol_user"  ( 
	"id"        	int(10) UNSIGNED AUTO_INCREMENT NOT NULL,
	"rol_id"    	int(10) UNSIGNED NOT NULL,
	"user_id"   	int(10) UNSIGNED NOT NULL,
	"created_at"	timestamp NULL,
	"updated_at"	timestamp NULL,
	PRIMARY KEY("id")
)
GO
CREATE TABLE "rols"  ( 
	"id"        	bigint(20) UNSIGNED AUTO_INCREMENT NOT NULL,
	"rol"       	varchar(191) NOT NULL,
	"created_at"	timestamp NULL,
	"updated_at"	timestamp NULL,
	PRIMARY KEY("id")
)
GO
CREATE TABLE "users"  ( 
	"id"               	bigint(20) UNSIGNED AUTO_INCREMENT NOT NULL,
	"name"             	varchar(191) NOT NULL,
	"email"            	varchar(191) NOT NULL,
	"email_verified_at"	timestamp NULL,
	"password"         	varchar(191) NOT NULL,
	"rolId"            	bigint(20) UNSIGNED NULL,
	"remember_token"   	varchar(100) NULL,
	"created_at"       	timestamp NULL,
	"updated_at"       	timestamp NULL,
	PRIMARY KEY("id")
)
GO

ALTER TABLE "users"
	ADD CONSTRAINT "users_email_unique"
	UNIQUE ("email")
GO
ALTER TABLE "articulos"
	ADD CONSTRAINT "articulos_categoriaid_foreign"
	FOREIGN KEY("categoriaId")
	REFERENCES "categorias"("id")
	ON DELETE RESTRICT 
	ON UPDATE RESTRICT 
GO
ALTER TABLE "bitacoras"
	ADD CONSTRAINT "bitacoras_userid_foreign"
	FOREIGN KEY("userId")
	REFERENCES "users"("id")
	ON DELETE RESTRICT 
	ON UPDATE RESTRICT 
GO
ALTER TABLE "bitacoras"
	ADD CONSTRAINT "bitacoras_accionid_foreign"
	FOREIGN KEY("accionId")
	REFERENCES "accions"("id")
	ON DELETE RESTRICT 
	ON UPDATE RESTRICT 
GO
ALTER TABLE "users"
	ADD CONSTRAINT "users_rolid_foreign"
	FOREIGN KEY("rolId")
	REFERENCES "rols"("id")
	ON DELETE RESTRICT 
	ON UPDATE RESTRICT 
GO
