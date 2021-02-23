/* db Web Sergio Magana */
create database sm_db_1; 
use sm_db_1;

create table cursos(
id_curso        int(255) auto_increment NOT NULL,
nombre_cur      varchar(50),
descripcion_cur text,
precio_cur      float(100,2),
oferta_cur      varchar(2),
status_cur      smallint,
fecha_alta_cur  date,
hora_alta_cur   time,
constraint pk_curso primary key(id_curso)
)ENGINE=INNODB;

create table membresias (
id_membresia        int(255) auto_increment not null,
nombre_mem          varchar(30),
descripcion_mem     text,
precio_mem          float(100,2),
oferta_mem          float(100,2),
status_mem          smallint,
fecha_alta_cur      date,
hora_alta_cur       time,
constraint pk_membresias primary key(id_membresia)
)ENGINE=INNODB;

create table categoria_productos(
id_cat_productos         int(255) auto_increment not null,
nombre_cat_productos     varchar(50),
fecha_alta_cat           date,
fecha_baja_cat           date,
status_cat_prod          smallint,
constraint pk_categoria_productos primary key(id_cat_productos)
)ENGINE=INNODB;

create table usuarios(
id_usuario      int(255) auto_increment not null,
nombre_us       varchar(50),
apelidos_us     varchar(50),
email_us        varchar(100),
password_us     varchar(255),
rol             varchar(20),
status_us       smallint,
imagen_us       varchar(255),
fecha_alta_us   date,
hora_alta_us    time,
constraint pk_usuarios primary key(id_usuario)
)ENGINE=INNODB;

create table productos(
id_producto     int(255) auto_increment not null,
nombre_pro      varchar(100),
descripcion_pro text,
precio_pro      float(100,2),
stock_pro       varchar(255),
oferta_pro      float(100,2),
alta_pro        datetime,
baja_pro        datetime,
imagen_pro      varchar(255),
status_pro      smallint,
constraint pk_productos primary key(id_producto)
)ENGINE=INNODB;

create table categoria_eventos(
id_cat_eventos     int(255) auto_increment not null,
nombre_eve         varchar(50),
fecha_alta_eve     date,
fecha_baja_eve     date,
status_cat_eve     smallint,
constraint pk_categoria_eventos primary key(id_cat_eventos)
)ENGINE=INNODB;

create table eventos(
id_evento           int(255) auto_increment not null,
id_membresia        int(255),
id_cat_eventos      int(255),
nombre_eve          varchar(100),
descripcion_eve     text,
fecha_alta_eve      date,
fecha_baja_eve      date,
status_eve          smallint,
constraint pk_eventos PRIMARY KEY(id_evento),
constraint pk_eventos_membresias foreign key (id_membresia) references membresias(id_membresia),
constraint pk_eventos_categoria_eventos foreign key(id_cat_eventos) references categoria_eventos(id_cat_eventos)
)ENGINE=INNODB;

create table idiomas(
id_idioma           int(255) auto_increment not null,
id_evento           int(255),
idioma              varchar(30),
status_idioma       smallint,
constraint pk_idiomas primary key(id_idioma)
)ENGINE=INNODB;

create table direcciones(
id_direccion   int(255) auto_increment not null,
id_evento      int(255),
id_usuario     int(255),
pais          varchar(30),
calle          varchar(100),
codigo_postal  varchar(20),
estado         varchar(50),
ciudad         varchar(50),
colonia        varchar(50),
telefono       varchar(20),
instrucciones  varchar(100),
status_dir     smallint,
constraint pk_direcciones primary key(id_direccion),
constraint fk_direcciones_eventos foreign key(id_evento) references eventos(id_evento),
constraint fk_direcciones_usuarios foreign key(id_usuario) references usuarios(id_usuario)                    
)ENGINE=INNODB;

create table pedidos(
id_pedido         int(255) auto_increment,    
id_usuario         int(255),
costo              float(100,2),
status_ped         smallint,
fecha_alta_ped     date,
hora_alta_ped      date,
fecha_salida       date,
hora_salida        time, 
constraint pk_pedidos primary key(id_pedido),
constraint fk_pedidos_usuarios foreign key(id_usuario) references usuarios(id_usuario)
)ENGINE=INNODB;

create table blog(
id_blog            int(255) auto_increment,    
titulo_blog        varchar(100),
descripcion_blog   text,
constraint pk_blog primary key(id_blog)
)ENGINE=INNODB;

create table comentarios_blog(
id_comentario      int(255) auto_increment,    
id_blog            int(255),
id_usuario         int(255),
titulo_blog        varchar(100),
descripcion_com    text,
fecha_alta_com     date,
constraint pk_comentarios_blog primary key(id_comentario),
constraint fk_comentarios_blog_blog foreign key(id_blog) references blog(id_blog),
constraint fk_comentarios_blog_usuarios foreign key(id_usuario) references usuarios(id_usuario)
)ENGINE=INNODB;

create table videos(
id_video            int(255) auto_increment not null,
id_curso            int(255),
nombre_vid          varchar(100),
descripcion_vid     text,
imagen_vid          varchar(255),
fecha_alta_vid      date,
link_vid            varchar(100),
status_vid          smallint,
constraint pk_videos primary key (id_video),
constraint fk_videos_cursos foreign key (id_curso) references cursos(id_curso)
)ENGINE=InnoDB;

create table ventas(
id_venta            int(255) auto_increment,
id_usuario          int(255),
fecha_ventas        date,
hora_venta          time,
impuesto            float(100,2),
subtotal            float(100,2),
total               float(100,2),
constraint pk_ventas primary key (id_venta),
constraint fk_ventas_usuarios foreign key (id_usuario) references usuarios(id_usuario)
)ENGINE=INNODB;

create table lineas_pedidos(
id_linea_pedido    int(255) auto_increment,    
id_venta           int(255),
id_pedido          int(255),
id_producto        int(255),
unidades_lin       int(255),
constraint pk_lineas_pedido primary key(id_linea_pedido),
constraint fk_lineas_pedidos_ventas foreign key(id_venta) references ventas(id_venta),
constraint fk_lineas_pedidos_pedidos foreign key(id_pedido) references pedidos(id_pedido),
constraint fk_lineas_pedidos_productos  foreign key(id_producto) references productos(id_producto)
)ENGINE=INNODB;

create table detalle_ventas(
id_detalle_venta int(255) auto_increment not null,
id_venta         int(255),
id_curso         int(255),
id_membresia     int(255),
id_evento        int(255),
id_linea_pedido  int(255),
id_producto      int(255),
unidades_car     int(255),
constraint pk_detalle_ventas primary key(id_detalle_venta),
constraint fk_detalle_ventas_ventas foreign key(id_venta) references ventas(id_venta),
constraint fk_detalle_ventas_cursos foreign key(id_curso) references cursos(id_curso),
constraint fk_detalle_ventas_membresias foreign key(id_membresia) references membresias(id_membresia),
constraint fk_detalle_ventas_eventos foreign key(id_evento) references eventos(id_evento), 
constraint fk_detalle_ventas_lineas_pedido foreign key(id_linea_pedido) references lineas_pedidos(id_linea_pedido),
constraint fk_detalle_ventas_productos foreign key(id_producto) references productos(id_producto)   
)ENGINE=InnoDB;



