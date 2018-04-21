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

CREATE TABLE EXPERT_REVIEWS(
   ID INT PRIMARY KEY NOT NULL,
   TRUSTEDVIEWS_RATING INT,
   TRUSTEDVIEWS_SUMM TEXT,
   TECHRADAR_RATING INT,
   TECHRADAR_SUMM TEXT,
   CNET_RATING INT,
   CNET_SUMM TEXT,
   THEVERGE_RATING INT,
   THEVERGE_SUMM TEXT,
   ANDROIDAUTHORITY_RATING INT,
   ANDROIDAUTHORITY_SUMM TEXT,
   ENGADGET_RATING INT,
   ENGADGET_SUMM TEXT,
   DIGITALTRENDS_RATING INT,
   DIGITALTRENDS_SUMM TEXT,
   ALPHA_RATING INT,
   ALPHA_SUMM TEXT,
   POCKETLINT_RATING INT,
   POCKETLINT_SUMM TEXT,
   EXPERTREVIEWS_RATING INT,
   EXPERTREVIEWS_SUMM TEXT
);

INSERT INTO EXPERT_REVIEWS VALUES (1, 90, "The best iPhone I’ve ever used and one of the most exciting phones of 2017. People will baulk at the price and make silly jokes about the notch, but if you’re happy to spend then you won’t be disappointed.", 90, "The iPhone X was a huge gamble from Apple, but one that really paid off. Losing the home button and altering the design was a dangerous move, but one that was sorely needed after years of similarity and the premium design, extra power, all-screen front mix together to create - by far - the best iPhone Apple's ever made. It's impossible to give a perfect score to something that costs this much - but this is the closest to smartphone perfection Apple has ever got.", 90,"CNET",90,"THE VERGE",0,"Android Authority",90,"Engadget",90,"Digital Trends",80,"Alpha",100,"Pocket-Lint",4,"Expert Reviews");

CREATE TABLE USER_REVIEWS(
   ID INT PRIMARY KEY NOT NULL,
   AMAZON_5_STAR INT,
   AMAZON_4_STAR INT,
   AMAZON_3_STAR INT,
   AMAZON_2_STAR INT,
   AMAZON_1_STAR INT,
   EBAY_5_STAR INT,
   EBAY_4_STAR INT,
   EBAY_3_STAR INT,
   EBAY_2_STAR INT,
   EBAY_1_STAR INT,
   BESTBUY_5_STAR INT,
   BESTBUY_4_STAR INT,
   BESTBUY_3_STAR INT,
   BESTBUY_2_STAR INT,
   BESTBUY_1_STAR INT
);

