/*==============================================================*/
/* DBMS name:      dbcalculador                                 */
/* Created on:     24-07-2016 0:25:31                           */
/*==============================================================*/


drop table if exists art_pertenece_proy;

drop table if exists artefacto;

drop table if exists bateria;

drop table if exists cliente;

drop table if exists correccionconsumo;

drop table if exists cotizacion;

drop table if exists factork;

drop table if exists informe;

drop table if exists inversor;

drop table if exists mantenimiento;

drop table if exists panel;

drop table if exists producto;

drop table if exists proy_tiene_prod;

drop table if exists proyecto;

drop table if exists usuario;

drop table if exists valoresk;

drop table if exists valoresrad;

/*==============================================================*/
/* Table: art_pertenece_proy                                    */
/*==============================================================*/
create table art_pertenece_proy
(
   ART_ID               int(11) not null,
   PROY_ID              int(11) not null,
   CORR_ID              int(11) not null,
   APY_CANTIDAD         int(11) not null,
   APY_HORAS            int(11) not null,
   primary key (ART_ID, PROY_ID, CORR_ID)
);

/*==============================================================*/
/* Table: artefacto                                             */
/*==============================================================*/
create table artefacto
(
   ART_ID               int(11) not null auto_increment,
   ART_NOMBRE           national varchar(30) not null,
   ART_CONSUMO          float not null,
   primary key (ART_ID)
);

/*==============================================================*/
/* Table: bateria                                               */
/*==============================================================*/
create table bateria
(
   PROD_ID              int(11) not null,
   BAT_ID               int(11) not null,
   PROD_NOMBRE          national varchar(30) not null,
   PROD_MARCA           national varchar(30) not null,
   PROD_MODELO          national varchar(30),
   PROD_DESCRIPCION     national varchar(100),
   PROD_PRECIOCOSTO     int(11) not null,
   PROD_PRECIOVENTA     int(11) not null,
   BAT_VOLTAJE          int(11),
   primary key (PROD_ID, BAT_ID)
);

/*==============================================================*/
/* Table: cliente                                               */
/*==============================================================*/
create table cliente
(
   CL_RUT               national varchar(15) not null,
   CL_RAZONSOCIAL       national varchar(50) not null,
   CL_NOMBREFANTASIA    national varchar(40),
   CL_DIRECCION         national varchar(100) not null,
   CL_TELEFONO          int(11) not null,
   CL_CONTACTO          national varchar(50),
   CL_EMAIL             national varchar(50) not null,
   primary key (CL_RUT)
);

/*==============================================================*/
/* Table: correccionconsumo                                     */
/*==============================================================*/
create table correccionconsumo
(
   CORR_ID              int(11) not null auto_increment,
   CORR_MES             int(11) not null,
   CORR_VALOR           float not null,
   primary key (CORR_ID)
);

/*==============================================================*/
/* Table: cotizacion                                            */
/*==============================================================*/
create table cotizacion
(
   COT_ID               int(11) not null auto_increment,
   COT_FECHA            date not null,
   COT_NOMBRE           varchar(50) not null,
   COT_URL              varchar(100) not null,
   primary key (COT_ID)
);

/*==============================================================*/
/* Table: factork                                               */
/*==============================================================*/
create table factork
(
   FACK_ID              int(11) not null auto_increment,
   FACK_LATITUD         national varchar(15) not null,
   FACK_GRADO           int(11) not null,
   primary key (FACK_ID)
);

/*==============================================================*/
/* Table: informe                                               */
/*==============================================================*/
create table informe
(
   INF_ID               int(11) not null auto_increment,
   PROY_ID              int(11) not null,
   INF_NOMBRE           national varchar(50),
   INF_URL              national varchar(100),
   primary key (INF_ID)
);

/*==============================================================*/
/* Table: inversor                                              */
/*==============================================================*/
create table inversor
(
   PROD_ID              int(11) not null,
   INV_ID               int(11) not null,
   PROD_NOMBRE          national varchar(30) not null,
   PROD_MARCA           national varchar(30) not null,
   PROD_MODELO          national varchar(30),
   PROD_DESCRIPCION     national varchar(100),
   PROD_PRECIOCOSTO     int(11) not null,
   PROD_PRECIOVENTA     int(11) not null,
   INV_TIPO             national varchar(40) not null,
   INV_POTENCIACA       float not null,
   INV_VOLTAJEENTRADA   float,
   INV_CORRIENTEENTRADA float,
   INV_RENDIMIENTO      float,
   primary key (PROD_ID, INV_ID)
);

/*==============================================================*/
/* Table: mantenimiento                                         */
/*==============================================================*/
create table mantenimiento
(
   MANT_ID              int(11) not null auto_increment,
   MANT_NOMBRE          national varchar(15) not null,
   MANT_VALOR           float not null,
   primary key (MANT_ID)
);

/*==============================================================*/
/* Table: panel                                                 */
/*==============================================================*/
create table panel
(
   PROD_ID              int(11) not null,
   PAN_ID               int(11) not null,
   PROD_NOMBRE          national varchar(30) not null,
   PROD_MARCA           national varchar(30) not null,
   PROD_MODELO          national varchar(30),
   PROD_DESCRIPCION     national varchar(100),
   PROD_PRECIOCOSTO     int(11) not null,
   PROD_PRECIOVENTA     int(11) not null,
   PAN_POTENCIA         float not null,
   PAN_VCA              float,
   PAN_NOMINAL          float,
   PAN_RENDIMIENTO      float not null,
   PAN_ALTO             float not null,
   PAN_ANCHO            float not null,
   primary key (PROD_ID, PAN_ID)
);

/*==============================================================*/
/* Table: producto                                              */
/*==============================================================*/
create table producto
(
   PROD_ID              int(11) not null auto_increment,
   PROD_NOMBRE          national varchar(30) not null,
   PROD_MARCA           national varchar(30) not null,
   PROD_MODELO          national varchar(30),
   PROD_DESCRIPCION     national varchar(100),
   PROD_PRECIOCOSTO     int(11) not null,
   PROD_PRECIOVENTA     int(11) not null,
   primary key (PROD_ID)
);

/*==============================================================*/
/* Table: proy_tiene_prod                                       */
/*==============================================================*/
create table proy_tiene_prod
(
   PROY_ID              int(11) not null,
   PROD_ID              int(11) not null,
   PTP_CANTIDAD         int(11),
   PTP_COSTOVENTA       int(11),
   primary key (PROY_ID, PROD_ID)
);

/*==============================================================*/
/* Table: proyecto                                              */
/*==============================================================*/
create table proyecto
(
   PROY_ID              int(11) not null auto_increment,
   CL_RUT               national varchar(15) not null,
   MANT_ID              int(11),
   FACK_ID              int(11),
   COT_ID               int(11),
   PROY_FECHA           date not null,
   PROY_NOMBRE          national varchar(50) not null,
   PROY_UBICACION       varchar(100),
   PROY_LATITUD         int(11) not null,
   PROY_LONGITUD        int(11) not null,
   PROY_POTENCIADIARIA  float,
   PROY_VALORKW         float,
   PROY_ESTADO          int(11),
   PROY_TIPOCALCULO     int(11),
   primary key (PROY_ID)
);

/*==============================================================*/
/* Table: usuario                                               */
/*==============================================================*/
create table usuario
(
   USU_RUT              national varchar(12) not null,
   USU_NOMBRE           national varchar(40) not null,
   USU_APELLIDO         national varchar(40) not null,
   USU_USUARIO          national varchar(20) not null,
   USU_EMAIL            national varchar(40) not null,
   USU_CLAVE            national varchar(20) not null,
   USU_TIPO             national varchar(35) not null,
   USU_ESTADO           int(11),
   primary key (USU_RUT)
);

/*==============================================================*/
/* Table: valoresk                                              */
/*==============================================================*/
create table valoresk
(
   VALK_ID              int(11) not null auto_increment,
   FACK_ID              int(11) not null,
   VALK_MES             int(11),
   VALK_VALOR           float,
   primary key (VALK_ID)
);

/*==============================================================*/
/* Table: valoresrad                                            */
/*==============================================================*/
create table valoresrad
(
   VALR_ID              int(11) not null auto_increment,
   PROY_ID              int(11) not null,
   VALR_MES             int(11) not null,
   VALR_VALOR           float not null,
   primary key (VALR_ID)
);

alter table art_pertenece_proy add constraint FK_ART_PERTENECE_PROY foreign key (ART_ID)
      references artefacto (ART_ID);

alter table art_pertenece_proy add constraint FK_ART_PERTENECE_PROY2 foreign key (PROY_ID)
      references proyecto (PROY_ID);

alter table art_pertenece_proy add constraint FK_ART_PERTENECE_PROY3 foreign key (CORR_ID)
      references correccionconsumo (CORR_ID);

alter table bateria add constraint FK_PUEDE_SER2 foreign key (PROD_ID)
      references producto (PROD_ID);

alter table informe add constraint FK_PROY_TIENE_INF foreign key (PROY_ID)
      references proyecto (PROY_ID);

alter table inversor add constraint FK_PUEDE_SER3 foreign key (PROD_ID)
      references producto (PROD_ID);

alter table panel add constraint FK_PUEDE_SER foreign key (PROD_ID)
      references producto (PROD_ID);

alter table proy_tiene_prod add constraint FK_PROY_TIENE_PROD foreign key (PROY_ID)
      references proyecto (PROY_ID);

alter table proy_tiene_prod add constraint FK_PROY_TIENE_PROD2 foreign key (PROD_ID)
      references producto (PROD_ID);

alter table proyecto add constraint FK_PROY_TIENE_FACTORK foreign key (FACK_ID)
      references factork (FACK_ID);

alter table proyecto add constraint FK_PROY_TIENE_MANT foreign key (MANT_ID)
      references mantenimiento (MANT_ID);

alter table proyecto add constraint FK_RELATIONSHIP_1 foreign key (CL_RUT)
      references cliente (CL_RUT);

alter table proyecto add constraint FK_REFERENCE_15 foreign key (COT_ID)
      references cotizacion (COT_ID) on delete restrict on update restrict;

alter table valoresk add constraint FK_FACT_CONTIENE_VALK foreign key (FACK_ID)
      references factork (FACK_ID);

alter table valoresrad add constraint FK_PROY_CONTIENE_VALORES foreign key (PROY_ID)
      references proyecto (PROY_ID);

