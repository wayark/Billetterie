drop table if exists pricing;

drop table if exists ticket;

drop table if exists event;

drop table if exists artist;

drop table if exists event_type;

drop table if exists location;

drop table if exists ticket_type;

drop table if exists user;

drop table if exists payment_method;

drop table if exists role_type;

/*==============================================================*/
/* Table : ARTIST                                               */
/*==============================================================*/
create table ARTIST
(
    ID_ARTIST            int not null ,
    ARTIST_LAST_NAME     text not null,
    ARTIST_FIRST_NAME    text not null,
    STAGE_NAME           text not null,
    BIOGRAPHY            text,
    primary key (ID_ARTIST)
);

/*==============================================================*/
/* Table : EVENT                                                */
/*==============================================================*/
create table EVENT
(
    ID_EVENT             int not null ,
    ID_LOCATION          int not null,
    ID_EVENT_TYPE        int not null,
    ID_ORGANIZER         int not null,
    ID_ARTIST            int not null,
    EVENT_NAME           text not null,
    EVENT_DATE           datetime not null,
    EVENT_DESCRIPTION    text,
    PICTURE_PATH         text,
    PICTURE_DESCRIPTION  text,
    primary key (ID_EVENT)
);

/*==============================================================*/
/* Table : EVENT_TYPE                                           */
/*==============================================================*/
create table EVENT_TYPE
(
    ID_EVENT_TYPE        int not null,
    EVENT_TYPE_NAME      text,
    primary key (ID_EVENT_TYPE)
);

/*==============================================================*/
/* Table : LOCATION                                             */
/*==============================================================*/
create table LOCATION
(
    ID_LOCATION          int not null ,
    COUNTRY              text not null,
    CITY                 text not null,
    ADDRESS              text not null,
    PLACE_NAME           text not null,
    NB_PLACE_PIT         int not null,
    NB_PLACE_STAIRCASE   int not null,
    primary key (ID_LOCATION)
);

/*==============================================================*/
/* Table : PAYMENT_METHOD                                       */
/*==============================================================*/
create table PAYMENT_METHOD
(
    ID_PAYMENT_METHOD    int not null,
    PAYMENT_METHOD_NAME  text,
    primary key (ID_PAYMENT_METHOD)
);

/*==============================================================*/
/* Table : PRICING                                              */
/*==============================================================*/
create table PRICING
(
    ID_PRICING           int not null ,
    ID_EVENT             int not null,
    PRICE_AMOUNT         float not null,
    PRICING_NAME         text not null,
    primary key (ID_PRICING)
);

/*==============================================================*/
/* Table : ROLE_TYPE                                            */
/*==============================================================*/
create table ROLE_TYPE
(
    ID_ROLE_TYPE         int not null,
    ROLE_NAME            text,
    primary key (ID_ROLE_TYPE)
);

/*==============================================================*/
/* Table : TICKET                                               */
/*==============================================================*/
create table TICKET
(
    ID_TICKET            int not null ,
    ID_EVENT             int not null,
    ID_TICKET_TYPE       int not null,
    ID_OWNER             int not null,
    TICKET_PRICE         float,
    primary key (ID_TICKET)
);

/*==============================================================*/
/* Table : TICKET_TYPE                                          */
/*==============================================================*/
create table TICKET_TYPE
(
    ID_TICKET_TYPE       int not null,
    TICKET_TYPE_NAME     text,
    primary key (ID_TICKET_TYPE)
);

/*==============================================================*/
/* Table : USER                                                 */
/*==============================================================*/
create table USER
(
    ID_USER              int not null ,
    ID_FAVORITE_PAYMENT_METHOD int not null,
    ID_ROLE_TYPE         int not null,
    USER_LAST_NAME       text,
    USER_FIRST_NAME      text,
    DATE_OF_BIRTH        date,
    USER_ADDRESS         text,
    EMAIL                text,
    HASHED_PASSWORD      text,
    PICTURE_PATH         text default 'users/unnamed.jpg',
    primary key (ID_USER)
);

alter table EVENT add constraint FK_ARTIST_PERFORMING foreign key (ID_ARTIST)
    references ARTIST (ID_ARTIST) on delete restrict on update restrict;

alter table EVENT add constraint FK_EVENT_CATEGORY foreign key (ID_EVENT_TYPE)
    references EVENT_TYPE (ID_EVENT_TYPE) on delete restrict on update restrict;

alter table EVENT add constraint FK_EVENT_LOCATION foreign key (ID_LOCATION)
    references LOCATION (ID_LOCATION) on delete restrict on update restrict;

alter table EVENT add constraint FK_ORGANIZER foreign key (ID_ORGANIZER)
    references USER (ID_USER) on delete restrict on update restrict;

alter table PRICING add constraint FK_TICKET_PRICES foreign key (ID_EVENT)
    references EVENT (ID_EVENT) on delete restrict on update restrict;

alter table TICKET add constraint FK_TICKER_OWNER foreign key (ID_OWNER)
    references USER (ID_USER) on delete restrict on update restrict;

alter table TICKET add constraint FK_TICKET_OF_EVENT foreign key (ID_EVENT)
    references EVENT (ID_EVENT) on delete restrict on update restrict;

alter table TICKET add constraint FK_TYPE_OF_TICKET foreign key (ID_TICKET_TYPE)
    references TICKET_TYPE (ID_TICKET_TYPE) on delete restrict on update restrict;

alter table USER add constraint FK_FAVORITE_PAYMENT_METHOD foreign key (ID_FAVORITE_PAYMENT_METHOD)
    references PAYMENT_METHOD (ID_PAYMENT_METHOD) on delete restrict on update restrict;

alter table USER add constraint FK_USER_ROLE foreign key (ID_ROLE_TYPE)
    references ROLE_TYPE (ID_ROLE_TYPE) on delete restrict on update restrict;

alter table USER add constraint UK_USER_EMAIL unique (EMAIL);

DROP INDEX IF EXISTS IDX_EMAIL_USER ON USER;
CREATE INDEX IDX_EMAIL_USER ON USER (EMAIL);
