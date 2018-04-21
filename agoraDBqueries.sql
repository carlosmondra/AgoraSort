CREATE TABLE PHONES(
   ID INT PRIMARY KEY NOT NULL,
   PHONE_NAME TEXT NOT NULL,
   IMG_URL TEXT NOT NULL,
   HEADLINE TEXT,
   EXPERT_RATING INT,
   USER_RATING INT
);

INSERT INTO PHONES (ID,PHONE_NAME,IMG_URL,HEADLINE,EXPERT_RATING,USER_RATING) 
VALUES (1, 'iPhone X', 'img/indexImg/iphonexfinal.png', 'Best Camera', 95, 100);

INSERT INTO PHONES (ID,PHONE_NAME,IMG_URL,HEADLINE,EXPERT_RATING,USER_RATING) 
VALUES (2, 'Samsung S9', 'img/indexImg/samsung600.png', 'Best Blah', 94, 85);

INSERT INTO PHONES (ID,PHONE_NAME,IMG_URL,HEADLINE,EXPERT_RATING,USER_RATING) 
VALUES (3, 'Google Pixel 2', 'img/indexImg/googlepixel2.png', 'Best Blah', 70, 90);

INSERT INTO PHONES (ID,PHONE_NAME,IMG_URL,HEADLINE,EXPERT_RATING,USER_RATING) 
VALUES (4, 'iPhone 8', 'img/indexImg/iphone81.png', 'Best Blah', 45, 100);

INSERT INTO PHONES (ID,PHONE_NAME,IMG_URL,HEADLINE,EXPERT_RATING,USER_RATING) 
VALUES (5, 'HTC U11', 'img/indexImg/htcu11.png', 'Best Camera', 95, 100);

INSERT INTO PHONES (ID,PHONE_NAME,IMG_URL,HEADLINE,EXPERT_RATING,USER_RATING) 
VALUES (6, 'Samsung Galaxy Note 8', 'img/indexImg/note8.png', 'Best Blah', 94, 85);

INSERT INTO PHONES (ID,PHONE_NAME,IMG_URL,HEADLINE,EXPERT_RATING,USER_RATING) 
VALUES (7, 'Huawei Mate 10 Pro', 'img/indexImg/huawei.png', 'Best Blah', 70, 90);

INSERT INTO PHONES (ID,PHONE_NAME,IMG_URL,HEADLINE,EXPERT_RATING,USER_RATING) 
VALUES (8, 'OnePlus 5T', 'img/indexImg/oneplus1.png', 'Best Blah', 45, 100);

INSERT INTO PHONES (ID,PHONE_NAME,IMG_URL,HEADLINE,EXPERT_RATING,USER_RATING) 
VALUES (9, 'Moto Z2 Force', 'img/indexImg/moto.png', 'Best Blah', 60, 80);

INSERT INTO PHONES (ID,PHONE_NAME,IMG_URL,HEADLINE,EXPERT_RATING,USER_RATING) 
VALUES (10, 'LG v30', 'img/indexImg/lg.png', 'Best Blah', 69, 98);

ALTER TABLE PHONES ADD COLUMN IMG_DIR TEXT;

UPDATE PHONES SET IMG_DIR = 'img/prodImg/1' WHERE ID = 1;
UPDATE PHONES SET IMG_DIR = 'img/prodImg/2' WHERE ID = 2;
UPDATE PHONES SET IMG_DIR = 'img/prodImg/3' WHERE ID = 3;
UPDATE PHONES SET IMG_DIR = 'img/prodImg/4' WHERE ID = 4;
UPDATE PHONES SET IMG_DIR = 'img/prodImg/5' WHERE ID = 5;
UPDATE PHONES SET IMG_DIR = 'img/prodImg/6' WHERE ID = 6;
UPDATE PHONES SET IMG_DIR = 'img/prodImg/7' WHERE ID = 7;
UPDATE PHONES SET IMG_DIR = 'img/prodImg/8' WHERE ID = 8;
UPDATE PHONES SET IMG_DIR = 'img/prodImg/9' WHERE ID = 9;
UPDATE PHONES SET IMG_DIR = 'img/prodImg/10' WHERE ID = 10;