drop table if exists ARTIST;

drop table if exists CART;

drop table if exists EVENT;

drop table if exists EVENT_TYPE;

drop table if exists LOCATION;

drop table if exists PAYMENT_METHOD;

drop table if exists ROLE_TYPE;

drop table if exists TICKET;

drop table if exists TICKET_PRICING;

drop table if exists USER;

/*==============================================================*/
/* Table : ARTIST                                               */
/*==============================================================*/
create table ARTIST
(
    ID_ARTIST         int  not null AUTO_INCREMENT,
    ARTIST_LAST_NAME  text not null,
    ARTIST_FIRST_NAME text not null,
    STAGE_NAME        text not null,
    BIOGRAPHY         text,
    primary key (ID_ARTIST)
);

/*==============================================================*/
/* Table : CART                                                 */
/*==============================================================*/
create table CART
(
    ID_USER           int not null,
    ID_TICKET_PRICING int not null,
    QUANTITY          int not null,
    primary key (ID_USER, ID_TICKET_PRICING)
);

/*==============================================================*/
/* Table : EVENT                                                */
/*==============================================================*/
create table EVENT
(
    ID_EVENT            int      not null AUTO_INCREMENT,
    ID_LOCATION         int      not null,
    ID_EVENT_TYPE       int      not null,
    ID_ORGANIZER        int      not null,
    ID_ARTIST           int      not null,
    EVENT_NAME          text     not null,
    EVENT_DATE          datetime not null,
    EVENT_DESCRIPTION   text,
    PICTURE_PATH        varchar(100) default 'users/unnamed.png',
    PICTURE_DESCRIPTION text,
    primary key (ID_EVENT)
);

/*==============================================================*/
/* Table : EVENT_TYPE                                           */
/*==============================================================*/
create table EVENT_TYPE
(
    ID_EVENT_TYPE   int not null AUTO_INCREMENT,
    EVENT_TYPE_NAME text,
    primary key (ID_EVENT_TYPE)
);

/*==============================================================*/
/* Table : LOCATION                                             */
/*==============================================================*/
create table LOCATION
(
    ID_LOCATION int  not null AUTO_INCREMENT,
    COUNTRY     text not null,
    CITY        text not null,
    ADDRESS     text not null,
    PLACE_NAME  text not null,
    primary key (ID_LOCATION)
);

/*==============================================================*/
/* Table : PAYMENT_METHOD                                       */
/*==============================================================*/
create table PAYMENT_METHOD
(
    ID_PAYMENT_METHOD   int not null AUTO_INCREMENT,
    PAYMENT_METHOD_NAME text,
    primary key (ID_PAYMENT_METHOD)
);

/*==============================================================*/
/* Table : ROLE_TYPE                                            */
/*==============================================================*/
create table ROLE_TYPE
(
    ID_ROLE_TYPE int not null AUTO_INCREMENT,
    ROLE_NAME    text,
    primary key (ID_ROLE_TYPE)
);

/*==============================================================*/
/* Table : TICKET                                               */
/*==============================================================*/
create table TICKET
(
    ID_TICKET         int not null AUTO_INCREMENT,
    ID_EVENT          int not null,
    ID_PAYMENT_METHOD int not null,
    ID_TICKET_PRICING int not null,
    ID_USER           int not null,
    TICKET_NUMBER     text,
    primary key (ID_TICKET)
);

/*==============================================================*/
/* Table : TICKET_PRICING                                       */
/*==============================================================*/
create table TICKET_PRICING
(
    ID_TICKET_PRICING   int   not null AUTO_INCREMENT,
    ID_EVENT            int   not null,
    NAME_TICKET_PRICING text  not null,
    PRICE               float not null,
    MAX_TICKET_NUMBER   int   not null,
    primary key (ID_TICKET_PRICING)
);

/*==============================================================*/
/* Table : USER                                                 */
/*==============================================================*/
create table USER
(
    ID_USER                    int not null AUTO_INCREMENT,
    ID_FAVORITE_PAYMENT_METHOD int not null,
    ID_ROLE_TYPE               int not null,
    USER_LAST_NAME             text,
    USER_FIRST_NAME            text,
    DATE_OF_BIRTH              date,
    USER_ADDRESS               text,
    EMAIL                      varchar(50),
    HASHED_PASSWORD            text,
    PICTURE_PATH               varchar(200),
    primary key (ID_USER)
);

alter table CART
    add constraint FK_HAS_TICKETS_IN_CART foreign key (ID_TICKET_PRICING)
        references TICKET_PRICING (ID_TICKET_PRICING) on delete restrict on update restrict;

alter table CART
    add constraint FK_IS_IN_THE_CART_OF foreign key (ID_USER)
        references USER (ID_USER) on delete restrict on update restrict;

alter table EVENT
    add constraint FK_ARTIST_PERFORMING foreign key (ID_ARTIST)
        references ARTIST (ID_ARTIST) on delete restrict on update restrict;

alter table EVENT
    add constraint FK_EVENT_CATEGORY foreign key (ID_EVENT_TYPE)
        references EVENT_TYPE (ID_EVENT_TYPE) on delete restrict on update restrict;

alter table EVENT
    add constraint FK_EVENT_LOCATION foreign key (ID_LOCATION)
        references LOCATION (ID_LOCATION) on delete restrict on update restrict;

alter table EVENT
    add constraint FK_ORGANIZER foreign key (ID_ORGANIZER)
        references USER (ID_USER) on delete restrict on update restrict;

alter table TICKET
    add constraint FK_PAYMENT_METHOD_USED foreign key (ID_PAYMENT_METHOD)
        references PAYMENT_METHOD (ID_PAYMENT_METHOD) on delete restrict on update restrict;

alter table TICKET
    add constraint FK_TICKER_OWNER foreign key (ID_USER)
        references USER (ID_USER) on delete restrict on update restrict;

alter table TICKET
    add constraint FK_TICKET_IS_FOR foreign key (ID_TICKET_PRICING)
        references TICKET_PRICING (ID_TICKET_PRICING) on delete restrict on update restrict;

alter table TICKET
    add constraint FK_TICKET_OF_EVENT foreign key (ID_EVENT)
        references EVENT (ID_EVENT) on delete restrict on update restrict;

alter table TICKET_PRICING
    add constraint FK_IS_PRICING_OF foreign key (ID_EVENT)
        references EVENT (ID_EVENT) on delete restrict on update restrict;

alter table USER
    add constraint FK_FAVORITE_PAYMENT_METHOD foreign key (ID_FAVORITE_PAYMENT_METHOD)
        references PAYMENT_METHOD (ID_PAYMENT_METHOD) on delete restrict on update restrict;

alter table USER
    add constraint FK_USER_ROLE foreign key (ID_ROLE_TYPE)
        references ROLE_TYPE (ID_ROLE_TYPE) on delete restrict on update restrict;

alter table USER
    alter column PICTURE_PATH set default 'users/unnamed.jpg';
