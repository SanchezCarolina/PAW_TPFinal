CREATE DATABASE libreria CHARACTER SET 'UTF8' COLLATE 'utf8_spanish2_ci';
USE libreria;

CREATE TABLE usuario(
id_usuario      int(255) auto_increment not null,
nombre          varchar(100) not null,
apellido        varchar(255),
email           varchar(255) not null,
password        varchar(255) not null,
rol             varchar(20),
    
CONSTRAINT pk_usuario PRIMARY KEY(id_usuario),
CONSTRAINT uq_email UNIQUE(email)  
)ENGINE=InnoDb;


CREATE TABLE libro(
isbn            varchar(255) not null,
genero          varchar(255) not null,
titulo          varchar(100) not null,
autor           varchar(100),
portada         varchar(255),
fecha_carga     date not null,
precio          float (100,2) not null,
stock           int(255) not null,
resenia         varchar(3000) not null,

CONSTRAINT pk_libro PRIMARY KEY(isbn)
)ENGINE=InnoDb;


CREATE TABLE oferta(
id_oferta       int(255) auto_increment not null,
isbn            varchar(255) not null,
descuento       int(2) not null,
new_precio      float(100,2) not null,
    
CONSTRAINT pk_oferta PRIMARY KEY(id_oferta),
CONSTRAINT fk_oferta_libro FOREIGN KEY(isbn) REFERENCES libro(isbn)
)ENGINE=InnoDb;


CREATE TABLE pedido(
nro_pedido      int(255) auto_increment not null,
id_usuario      int(255),
monto           float(100,2) not null,
fecha           date,
hora            time,
estado          varchar(255) not null,
provincia       varchar(255) not null,
localidad       varchar(255) not null,
direccion       varchar(255) not null,
cod_postal      varchar(20) not null,

    
CONSTRAINT pk_pedido PRIMARY KEY (nro_pedido),
CONSTRAINT fk_pedido_usuario FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
)ENGINE=InnoDb;


CREATE TABLE pedidos_libros (
id_pedido_libro  int(255) auto_increment not null,
nro_pedido       int(255),
isbn             varchar(255) not null,
unidades         int(255) not null,
    
CONSTRAINT pk_pedidos_libros PRIMARY KEY (id_pedido_libro),
CONSTRAINT fk_pedidosLibros_pedido FOREIGN KEY (nro_pedido) REFERENCES pedido(nro_pedido),
CONSTRAINT fk_pedidosLibros_libro FOREIGN KEY (isbn) REFERENCES libro(isbn)
)ENGINE=InnoDb;
