CREATE DATABASE ChatZ;

USE ChatZ;


CREATE TABLE Usuario(
cd_usuario int not null auto_increment primary key,
nm_usuario varchar(40) not null,
ds_email varchar(25) not null,
ds_senha varchar(120) not null,
ds_foto varchar(80) not null,
st_online int not null
);

CREATE TABLE Contatos(
cd_contato int not null auto_increment primary key,
id_contato1 int not null,
id_contato2 int not null
);

CREATE TABLE Mensagens(
cd_mensagem int not null auto_increment primary key,
ds_mensagem text not null,
id_remetente int not null,
id_destinatario int not null,
dt_envio datetime not null,
st_visualizada int not null
);