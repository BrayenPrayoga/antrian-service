/*
 Navicat Premium Data Transfer

 Source Server         : localhost pgsql
 Source Server Type    : PostgreSQL
 Source Server Version : 110010
 Source Host           : localhost:5432
 Source Catalog        : antrian-service
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 110010
 File Encoding         : 65001

 Date: 26/02/2023 21:04:06
*/


-- ----------------------------
-- Sequence structure for master_dealer_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."master_dealer_id_seq";
CREATE SEQUENCE "public"."master_dealer_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for master_menu_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."master_menu_id_seq";
CREATE SEQUENCE "public"."master_menu_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for master_ukuran_layar_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."master_ukuran_layar_id_seq";
CREATE SEQUENCE "public"."master_ukuran_layar_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for migrations_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."migrations_id_seq";
CREATE SEQUENCE "public"."migrations_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for oauth_clients_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."oauth_clients_id_seq";
CREATE SEQUENCE "public"."oauth_clients_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for oauth_personal_access_clients_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."oauth_personal_access_clients_id_seq";
CREATE SEQUENCE "public"."oauth_personal_access_clients_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for profil_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."profil_id_seq";
CREATE SEQUENCE "public"."profil_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for transaksi_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."transaksi_id_seq";
CREATE SEQUENCE "public"."transaksi_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for users_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."users_id_seq";
CREATE SEQUENCE "public"."users_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Table structure for master_dealer
-- ----------------------------
DROP TABLE IF EXISTS "public"."master_dealer";
CREATE TABLE "public"."master_dealer" (
  "id" int8 NOT NULL DEFAULT nextval('master_dealer_id_seq'::regclass),
  "kode_dealer" varchar(255) COLLATE "pg_catalog"."default",
  "nama" varchar(255) COLLATE "pg_catalog"."default",
  "kode_menu" text COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "updated_at" timestamp(6),
  "deleted_at" timestamp(6)
)
;

-- ----------------------------
-- Records of master_dealer
-- ----------------------------
INSERT INTO "public"."master_dealer" VALUES (1, 'A0001', 'Dealer Brayen Zoe', '[''C'',''B'']', '2023-02-26 13:38:27', '2023-02-26 13:57:20', NULL);

-- ----------------------------
-- Table structure for master_menu
-- ----------------------------
DROP TABLE IF EXISTS "public"."master_menu";
CREATE TABLE "public"."master_menu" (
  "id" int8 NOT NULL DEFAULT nextval('master_menu_id_seq'::regclass),
  "kode_menu" varchar(255) COLLATE "pg_catalog"."default",
  "nama" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "updated_at" timestamp(6),
  "deleted_at" timestamp(6)
)
;

-- ----------------------------
-- Records of master_menu
-- ----------------------------
INSERT INTO "public"."master_menu" VALUES (1, 'Q0001', 'Menu Brayen Zoe', '2023-02-26 16:00:41', '2023-02-26 16:03:03', NULL);

-- ----------------------------
-- Table structure for master_ukuran_layar
-- ----------------------------
DROP TABLE IF EXISTS "public"."master_ukuran_layar";
CREATE TABLE "public"."master_ukuran_layar" (
  "id" int8 NOT NULL DEFAULT nextval('master_ukuran_layar_id_seq'::regclass),
  "width" int4,
  "height" int4,
  "kode_dealer" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "updated_at" timestamp(6),
  "deleted_at" timestamp(6)
)
;

-- ----------------------------
-- Records of master_ukuran_layar
-- ----------------------------
INSERT INTO "public"."master_ukuran_layar" VALUES (1, 72, 100, 'A0001', NULL, NULL, NULL);
INSERT INTO "public"."master_ukuran_layar" VALUES (2, 120, 120, 'A0002', '2023-02-26 16:54:43', '2023-02-26 16:58:14', '2023-02-26 16:58:14');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS "public"."migrations";
CREATE TABLE "public"."migrations" (
  "id" int4 NOT NULL DEFAULT nextval('migrations_id_seq'::regclass),
  "migration" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "batch" int4 NOT NULL
)
;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO "public"."migrations" VALUES (1, '2022_12_01_032520_create_admin', 1);
INSERT INTO "public"."migrations" VALUES (2, '2022_12_01_032520_create_users', 1);
INSERT INTO "public"."migrations" VALUES (3, '2016_06_01_000001_create_oauth_auth_codes_table', 2);
INSERT INTO "public"."migrations" VALUES (4, '2016_06_01_000002_create_oauth_access_tokens_table', 2);
INSERT INTO "public"."migrations" VALUES (5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2);
INSERT INTO "public"."migrations" VALUES (6, '2016_06_01_000004_create_oauth_clients_table', 2);
INSERT INTO "public"."migrations" VALUES (7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);

-- ----------------------------
-- Table structure for oauth_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS "public"."oauth_access_tokens";
CREATE TABLE "public"."oauth_access_tokens" (
  "id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "user_id" int8,
  "client_id" int8 NOT NULL,
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "scopes" text COLLATE "pg_catalog"."default",
  "revoked" bool NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "expires_at" timestamp(0)
)
;

-- ----------------------------
-- Records of oauth_access_tokens
-- ----------------------------
INSERT INTO "public"."oauth_access_tokens" VALUES ('2ce6560be8d7f1fcbdca0d8da9f1f47c99ac222f04941be26b626277245604bf8b9f370e531a7487', 1, 6, 'AuthToken', '[]', 'f', '2023-02-24 06:34:20', '2023-02-24 06:34:20', '2024-02-24 06:34:20');
INSERT INTO "public"."oauth_access_tokens" VALUES ('1e2293ae9f21502ef07a2b6040c2d66c0e905000844cbd5448b1a125c4a5be502c609f7eeea01b01', 1, 6, 'AuthToken', '[]', 'f', '2023-02-24 06:52:41', '2023-02-24 06:52:41', '2024-02-24 06:52:41');
INSERT INTO "public"."oauth_access_tokens" VALUES ('1260ce1c44d9760acbf748e490ac65e9c5077f28c8ff2a77af9ecae37a9f314b3dd8d13e157a17c0', 1, 6, 'AuthToken', '[]', 'f', '2023-02-24 07:14:18', '2023-02-24 07:14:18', '2024-02-24 07:14:18');
INSERT INTO "public"."oauth_access_tokens" VALUES ('b170b664f78a18142ae5ad1dd2451f5e1d7a7ea4181f667489da469e671d6aa0029307745bced714', 1, 6, 'AuthToken', '[]', 'f', '2023-02-24 07:15:13', '2023-02-24 07:15:13', '2024-02-24 07:15:13');
INSERT INTO "public"."oauth_access_tokens" VALUES ('d43bbbd2934fe5f6ff6131ebd9342ff311cc9a50c0c175cb7bbcc29a8ac449c60696760b15053dc1', 1, 6, 'AuthToken', '[]', 'f', '2023-02-24 07:15:57', '2023-02-24 07:15:57', '2024-02-24 07:15:57');
INSERT INTO "public"."oauth_access_tokens" VALUES ('100412fd42be588e737d7d96be06ece8083ff2b4889046303266cbda9d77c46b2aeb1a7d768cec5d', 1, 6, 'AuthToken', '[]', 'f', '2023-02-24 07:20:04', '2023-02-24 07:20:04', '2024-02-24 07:20:04');
INSERT INTO "public"."oauth_access_tokens" VALUES ('3f974ab1c9441a2fb20af31f0b5e64ce5c0442c4b10f5bd04e171a9b266c47ab8a3c64211b9551d6', 1, 6, 'AuthToken', '[]', 'f', '2023-02-24 07:20:13', '2023-02-24 07:20:13', '2024-02-24 07:20:13');
INSERT INTO "public"."oauth_access_tokens" VALUES ('e2c4b6113b40275fa5fd74a3be0cac153076a5f083b42160213a2c902db6400d8cf6c12995c68945', 1, 6, 'AuthToken', '[]', 'f', '2023-02-24 07:25:41', '2023-02-24 07:25:41', '2024-02-24 07:25:41');
INSERT INTO "public"."oauth_access_tokens" VALUES ('618bb5af825d830944ae665eb4921b88707337b7fbc69a33a244eb89b51e23dabf49ef17f3ccfba3', 1, 6, 'AuthToken', '[]', 'f', '2023-02-24 07:26:11', '2023-02-24 07:26:11', '2024-02-24 07:26:11');
INSERT INTO "public"."oauth_access_tokens" VALUES ('9f98d9a1bee0365f2413c5739f58298841a430010858ca08ebb61c6e531176db41b1cef06f07b586', 1, 6, 'AuthToken', '[]', 'f', '2023-02-24 07:45:26', '2023-02-24 07:45:26', '2024-02-24 07:45:26');
INSERT INTO "public"."oauth_access_tokens" VALUES ('4ae36861e3cc327552dcedded7f4ad82e385c29fbf2308835eb894b463cfbf1f6597a0f8fc794349', 1, 6, 'AuthToken', '[]', 'f', '2023-02-24 07:47:20', '2023-02-24 07:47:20', '2024-02-24 07:47:20');
INSERT INTO "public"."oauth_access_tokens" VALUES ('b4bf71a9e1f3f1cc1cf388aac5f7cb56eae07ee5e1a57e8390f3be1ddbc57ff0359526584f4d91eb', 1, 6, 'AuthToken', '[]', 'f', '2023-02-24 07:50:43', '2023-02-24 07:50:43', '2024-02-24 07:50:43');
INSERT INTO "public"."oauth_access_tokens" VALUES ('7e559583ee9b07dfe62806e85afddffdaf805936b79575d8c89353aee05288d65f8151db46f9c259', 1, 6, 'AuthToken', '[]', 'f', '2023-02-24 08:03:19', '2023-02-24 08:03:19', '2024-02-24 08:03:19');
INSERT INTO "public"."oauth_access_tokens" VALUES ('dd7e4a58edc13d0c903cad26d97e9da566e4572d9a5fb9f4d85fa2d8a5a73ee1183d171ed916deec', 1, 6, 'AuthToken', '[]', 'f', '2023-02-24 08:48:36', '2023-02-24 08:48:36', '2024-02-24 08:48:36');
INSERT INTO "public"."oauth_access_tokens" VALUES ('18b211b9d2e9be75250881a762c964d8de3ab6a99f798db7b4421377e4d46515ac152311990277bb', 1, 6, 'AuthToken', '[]', 'f', '2023-02-24 08:49:07', '2023-02-24 08:49:07', '2024-02-24 08:49:07');
INSERT INTO "public"."oauth_access_tokens" VALUES ('9c49b0f44142cfcb2670896d9d48a50869373ba1d7603349e1118160ce432d261ff12cf075210c66', 1, 6, 'AuthToken', '[]', 'f', '2023-02-24 08:55:02', '2023-02-24 08:55:02', '2024-02-24 08:55:02');
INSERT INTO "public"."oauth_access_tokens" VALUES ('ed494e5c310677cdac06eafb888ad20ff2c7e57a8740218d313d17228671abff99ea18053c0a5cd2', 1, 6, 'AuthToken', '[]', 'f', '2023-02-24 09:00:22', '2023-02-24 09:00:22', '2024-02-24 09:00:22');
INSERT INTO "public"."oauth_access_tokens" VALUES ('7cf7e7ab534da00a6a1d0078ada608e90eba5f20f8e78740e6125a14698aeeede44aaa669f4efb5a', 1, 6, 'AuthToken', '[]', 'f', '2023-02-24 09:02:02', '2023-02-24 09:02:02', '2024-02-24 09:02:02');
INSERT INTO "public"."oauth_access_tokens" VALUES ('2207f55338cf5402cb9cadd069371bf87e800790bf92a06a3ef97d86a811d34b86a740f1b0931191', 1, 6, 'AuthToken', '[]', 'f', '2023-02-24 09:04:01', '2023-02-24 09:04:01', '2024-02-24 09:04:01');
INSERT INTO "public"."oauth_access_tokens" VALUES ('d8cc145757ed1d94b481948c3c6491900a2b98387c2762e844f3bd1663d7501ad85fca9d32622768', 1, 6, 'AuthToken', '[]', 'f', '2023-02-24 09:15:22', '2023-02-24 09:15:22', '2024-02-24 09:15:22');
INSERT INTO "public"."oauth_access_tokens" VALUES ('37a73a1080d6fcd8bbda79196d90eff8ff96f3499f693c049eca8dc03510890c04dba2365c5f4ba8', 1, 6, 'AuthToken', '[]', 'f', '2023-02-24 09:17:23', '2023-02-24 09:17:23', '2024-02-24 09:17:23');
INSERT INTO "public"."oauth_access_tokens" VALUES ('6e7554a99b6e233a6a0966aa83fa3bd1cf20fdb1d5d269087be8d2569fa37254c5ebcf6d533e110e', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 04:57:42', '2023-02-26 04:57:42', '2024-02-26 04:57:42');
INSERT INTO "public"."oauth_access_tokens" VALUES ('e2bcf3f688d0a6d9a4b3c110412f1efaeed1c5d2adfc84a6219e10c54044a9fcde3e275f7ae7e1f8', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 05:34:12', '2023-02-26 05:34:12', '2024-02-26 05:34:12');
INSERT INTO "public"."oauth_access_tokens" VALUES ('e3b917aee99bca1665c2653ee5f832ad47c01eee6e4838e55a6de113e221d3342e9c8473f95c2073', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 05:48:20', '2023-02-26 05:48:20', '2024-02-26 05:48:20');
INSERT INTO "public"."oauth_access_tokens" VALUES ('ecd3e7989123312dfc1d468a93295a0ace037fcdf7c4f920398de46e982112206a20c27b031ae7f3', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 05:59:14', '2023-02-26 05:59:14', '2024-02-26 05:59:14');
INSERT INTO "public"."oauth_access_tokens" VALUES ('49a4be58df63f27907a5f06a68f544683f29b88d2e03d9705ca35ec2d55e578d51163b5cb10982cd', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 06:54:23', '2023-02-26 06:54:23', '2024-02-26 06:54:23');
INSERT INTO "public"."oauth_access_tokens" VALUES ('ca004722a48bac5260d5c629dfd3c350f4bc6e031bb7c5f9c3e8f0c2dbd7373d2dddea7bec61fdc6', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 06:54:43', '2023-02-26 06:54:43', '2024-02-26 06:54:43');
INSERT INTO "public"."oauth_access_tokens" VALUES ('20e5fdbfb1a155ef9394fe3fdd9ec98410daa116bed19491c7ebb6b04493adaeb137d6e8e26036d5', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 07:04:56', '2023-02-26 07:04:56', '2024-02-26 07:04:56');
INSERT INTO "public"."oauth_access_tokens" VALUES ('46540ea491cfec6aa0d4ceca4bb94225273b945caa653290715c44f86bdef2e4becf95d964e93d3b', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 07:05:28', '2023-02-26 07:05:28', '2024-02-26 07:05:28');
INSERT INTO "public"."oauth_access_tokens" VALUES ('32f8e357fdb60e9caf4915a3d7976356b3165bb9080aecbb857415ae680d3d956af324f3ccc62c80', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 07:05:51', '2023-02-26 07:05:51', '2024-02-26 07:05:51');
INSERT INTO "public"."oauth_access_tokens" VALUES ('763544b1446bab611745b620b50a570680bf2d19ed68509942f553c4131023bb78cf416816285c57', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 07:05:53', '2023-02-26 07:05:53', '2024-02-26 07:05:53');
INSERT INTO "public"."oauth_access_tokens" VALUES ('5c84e4bf14eb4a8091028692241ca99e3e43fe843a846d049a9f8a8fe569f00cf54a207b9ed07b7d', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 07:06:03', '2023-02-26 07:06:03', '2024-02-26 07:06:03');
INSERT INTO "public"."oauth_access_tokens" VALUES ('920ee9c75ed363e85225fbf9fae4fa9000e522f93831b909eaa684bfe17827279a7a943764200460', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 07:07:23', '2023-02-26 07:07:23', '2024-02-26 07:07:23');
INSERT INTO "public"."oauth_access_tokens" VALUES ('9f68817d0b8a12c90c3b5754bcfd8fcb2f3dc1403c40262f0e7fc4b2479ff4f639feb66e276d61c3', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 07:07:55', '2023-02-26 07:07:55', '2024-02-26 07:07:55');
INSERT INTO "public"."oauth_access_tokens" VALUES ('ad39024cef3f80328bc0514b8b3477ee6e4724dabd00ad88ec16bce1366296b82eb1f8771bf7653f', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 07:08:15', '2023-02-26 07:08:15', '2024-02-26 07:08:15');
INSERT INTO "public"."oauth_access_tokens" VALUES ('fa0edf08fc9e37629a202bf4b79679a302acc564e08ab4bd6cf903da6e3b7a4bba1723681d067915', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 07:09:03', '2023-02-26 07:09:03', '2024-02-26 07:09:03');
INSERT INTO "public"."oauth_access_tokens" VALUES ('261a1f07e46e94b701d3885b08227ba51c3378d4dd5af8d3fd79ea1658e2c50cf063c81d3492edbb', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 07:09:38', '2023-02-26 07:09:38', '2024-02-26 07:09:38');
INSERT INTO "public"."oauth_access_tokens" VALUES ('88e18ac83975d711034d47ff877f35b3d6e1dd770990cf3af8edf39f000a701fc664daaed0190123', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 07:10:33', '2023-02-26 07:10:33', '2024-02-26 07:10:33');
INSERT INTO "public"."oauth_access_tokens" VALUES ('dae65bcd6823b34999553888cabc4399d918e4e55f201fef0d0eddaf1789e4d472d0c389c786d7ef', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 07:10:35', '2023-02-26 07:10:35', '2024-02-26 07:10:35');
INSERT INTO "public"."oauth_access_tokens" VALUES ('fccbeda6c482a0f39ba765b00eb90a7bc1e6c0c758d7d6fd8a5810d10dbecfa0cd1e068962c886a5', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 07:10:36', '2023-02-26 07:10:36', '2024-02-26 07:10:36');
INSERT INTO "public"."oauth_access_tokens" VALUES ('d996febb15fbdd8ad208a645631aac78951e8e4d0f4698b166b4b15256e8b2591e58a5b6e91b4a0a', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 07:10:37', '2023-02-26 07:10:37', '2024-02-26 07:10:37');
INSERT INTO "public"."oauth_access_tokens" VALUES ('002e67f15cf7104165771763e445c2af703a0ae3064a2f7bbd5815ab2bbcf50848292a71faa4148d', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 07:11:09', '2023-02-26 07:11:09', '2024-02-26 07:11:09');
INSERT INTO "public"."oauth_access_tokens" VALUES ('e1e836f9f87d0410a7554140496d145d4f3433235ff05d2e32511d1c9b20e7d98d3f7a9883002566', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 07:11:32', '2023-02-26 07:11:32', '2024-02-26 07:11:32');
INSERT INTO "public"."oauth_access_tokens" VALUES ('9e15cacbf3141ee0f235d45db1d407900594de6c13570da966fff7bbd711039b220b3084411e8274', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 07:11:56', '2023-02-26 07:11:56', '2024-02-26 07:11:56');
INSERT INTO "public"."oauth_access_tokens" VALUES ('584f32fc60bed5a61dc6122c3059bca8eee6f0030e57e86c671c30fa1008c7ace348e84769e29256', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 07:12:00', '2023-02-26 07:12:00', '2024-02-26 07:12:00');
INSERT INTO "public"."oauth_access_tokens" VALUES ('0691a10db122227ced66b32dbe68dc07885fb5ab586737cd69f5975683d1d09e3a3bfa66aa755ed4', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 07:17:48', '2023-02-26 07:17:48', '2024-02-26 07:17:48');
INSERT INTO "public"."oauth_access_tokens" VALUES ('280b95c79003a31305f4a1c943b574955c2a6b6503806532682928286442de9963d3e96e2614ce36', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 07:18:58', '2023-02-26 07:18:58', '2024-02-26 07:18:58');
INSERT INTO "public"."oauth_access_tokens" VALUES ('fc419b72a62d774820dcf11fac93e75364533a2e5d7d8614f32158aebcbee281dccb0ee94cddf3a7', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 07:19:50', '2023-02-26 07:19:50', '2024-02-26 07:19:50');
INSERT INTO "public"."oauth_access_tokens" VALUES ('52745b3f56d8984354ea2fc8154939165338d940095e5f115635ee856f6c77309760573e679c0b13', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 07:21:08', '2023-02-26 07:21:08', '2024-02-26 07:21:08');
INSERT INTO "public"."oauth_access_tokens" VALUES ('e96b10b96ebdfd87c5610a93158a22a27438a1e49b78444e82eab19650800ba8b17364c79db5ee10', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 07:21:31', '2023-02-26 07:21:31', '2024-02-26 07:21:31');
INSERT INTO "public"."oauth_access_tokens" VALUES ('b656d6fe68a78dbe889e7bb633ea90ac5b00e868f817f431e5c479d6de7a464a08aed6851d8c6cf9', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 07:21:46', '2023-02-26 07:21:46', '2024-02-26 07:21:46');
INSERT INTO "public"."oauth_access_tokens" VALUES ('e2d1bc9074443ce2a66a3d731fd0541e3ff0458dce29b68e6c01bfa75e36197fbb9b81f367e49911', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 07:22:02', '2023-02-26 07:22:02', '2024-02-26 07:22:02');
INSERT INTO "public"."oauth_access_tokens" VALUES ('13fc5b5317c162d02d100f9f33fab448463e6aa3351cb501290615951b160fccf1c5929ab24f1e24', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 07:22:13', '2023-02-26 07:22:13', '2024-02-26 07:22:13');
INSERT INTO "public"."oauth_access_tokens" VALUES ('2a960f22eb3386df9a11ecfa99fe4064b0d1225e6d0e955d646dc29afd550a38420a11ed4e37de15', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 07:23:02', '2023-02-26 07:23:02', '2024-02-26 07:23:02');
INSERT INTO "public"."oauth_access_tokens" VALUES ('706528763202dea7ad856e8eb9d28e4fba79c2bb63847fe2d0175fa19aa988bcbfcbf47816dad60d', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 07:31:15', '2023-02-26 07:31:15', '2024-02-26 07:31:15');
INSERT INTO "public"."oauth_access_tokens" VALUES ('e0dad93851d03c6b4c9fd3ff7029c98bf016039d627c223dce0828b63b984537ef46cfc47164b3f9', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 08:59:44', '2023-02-26 08:59:44', '2024-02-26 08:59:44');
INSERT INTO "public"."oauth_access_tokens" VALUES ('d7041bccec608d0d6df19f7caeb1ffc77782ba98c17a779c17168bc98851b4df9c9cfb1bff94ec2b', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 09:17:59', '2023-02-26 09:17:59', '2024-02-26 09:17:59');
INSERT INTO "public"."oauth_access_tokens" VALUES ('ae7527918141cfca89687df34cea2e90037182da5157a9c2a296da892b7e66a67af59be13a250ec3', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 09:47:26', '2023-02-26 09:47:26', '2024-02-26 09:47:26');
INSERT INTO "public"."oauth_access_tokens" VALUES ('edf756264fa44caf140f279c3c7abaca0039e5d9c8e60bb21eceecb56afdf7b90813d792adddf458', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 09:53:56', '2023-02-26 09:53:56', '2024-02-26 09:53:56');
INSERT INTO "public"."oauth_access_tokens" VALUES ('8dfd432c7845c8ab4e77e4979f6d70a6e2ee6bd8e4198157e56ec59ac5952f96cabd5dfecae4f3ef', 1, 6, 'AuthToken', '[]', 'f', '2023-02-26 11:14:18', '2023-02-26 11:14:18', '2024-02-26 11:14:18');

-- ----------------------------
-- Table structure for oauth_auth_codes
-- ----------------------------
DROP TABLE IF EXISTS "public"."oauth_auth_codes";
CREATE TABLE "public"."oauth_auth_codes" (
  "id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "user_id" int8 NOT NULL,
  "client_id" int8 NOT NULL,
  "scopes" text COLLATE "pg_catalog"."default",
  "revoked" bool NOT NULL,
  "expires_at" timestamp(0)
)
;

-- ----------------------------
-- Table structure for oauth_clients
-- ----------------------------
DROP TABLE IF EXISTS "public"."oauth_clients";
CREATE TABLE "public"."oauth_clients" (
  "id" int8 NOT NULL DEFAULT nextval('oauth_clients_id_seq'::regclass),
  "user_id" int8,
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "secret" varchar(100) COLLATE "pg_catalog"."default",
  "provider" varchar(255) COLLATE "pg_catalog"."default",
  "redirect" text COLLATE "pg_catalog"."default" NOT NULL,
  "personal_access_client" bool NOT NULL,
  "password_client" bool NOT NULL,
  "revoked" bool NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of oauth_clients
-- ----------------------------
INSERT INTO "public"."oauth_clients" VALUES (6, NULL, 'y', 'ZTxbhiLq2l2DWQnWrjqiDJmxdMo9cieNhI7Lw5An', NULL, 'http://localhost', 't', 'f', 'f', '2023-02-24 06:33:05', '2023-02-24 06:33:05');

-- ----------------------------
-- Table structure for oauth_personal_access_clients
-- ----------------------------
DROP TABLE IF EXISTS "public"."oauth_personal_access_clients";
CREATE TABLE "public"."oauth_personal_access_clients" (
  "id" int8 NOT NULL DEFAULT nextval('oauth_personal_access_clients_id_seq'::regclass),
  "client_id" int8 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of oauth_personal_access_clients
-- ----------------------------
INSERT INTO "public"."oauth_personal_access_clients" VALUES (3, 6, '2023-02-24 06:33:05', '2023-02-24 06:33:05');

-- ----------------------------
-- Table structure for oauth_refresh_tokens
-- ----------------------------
DROP TABLE IF EXISTS "public"."oauth_refresh_tokens";
CREATE TABLE "public"."oauth_refresh_tokens" (
  "id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "access_token_id" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "revoked" bool NOT NULL,
  "expires_at" timestamp(0)
)
;

-- ----------------------------
-- Table structure for profil
-- ----------------------------
DROP TABLE IF EXISTS "public"."profil";
CREATE TABLE "public"."profil" (
  "id" int8 NOT NULL DEFAULT nextval('profil_id_seq'::regclass),
  "id_users" int4,
  "kode_dealer" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of profil
-- ----------------------------
INSERT INTO "public"."profil" VALUES (1, 1, 'A0001');
INSERT INTO "public"."profil" VALUES (3, 5, 'A0002');

-- ----------------------------
-- Table structure for transaksi
-- ----------------------------
DROP TABLE IF EXISTS "public"."transaksi";
CREATE TABLE "public"."transaksi" (
  "id" int8 NOT NULL DEFAULT nextval('transaksi_id_seq'::regclass),
  "kode_transaksi" varchar(255) COLLATE "pg_catalog"."default",
  "kode_dealer" varchar(255) COLLATE "pg_catalog"."default",
  "no_antrian" varchar(255) COLLATE "pg_catalog"."default",
  "status" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "updated_at" timestamp(6),
  "deleted_at" timestamp(6)
)
;

-- ----------------------------
-- Records of transaksi
-- ----------------------------
INSERT INTO "public"."transaksi" VALUES (6, 'DASHBOARD000126022023', 'A0001', '0001', 'DONE', '2023-02-26 18:20:45', '2023-02-26 18:21:11', NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS "public"."users";
CREATE TABLE "public"."users" (
  "id" int8 NOT NULL DEFAULT nextval('users_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default",
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "password" varchar(255) COLLATE "pg_catalog"."default",
  "api_token" text COLLATE "pg_catalog"."default",
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "role" varchar(20) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO "public"."users" VALUES (5, 'Admin', 'admin@gmail.com', '$2y$10$iEUI7l22PF5SsWz8N7kHR.079aIts4R0LyBMsmnBhhzVN0Y2NQtT6', NULL, '2023-02-26 18:48:33', '2023-02-26 18:48:33', 'SELF_SERVICE');
INSERT INTO "public"."users" VALUES (1, 'Brayen Prayoga', 'brayen@gmail.com', '$2y$10$Fb/NsKLEVgAAZ3l05oiH3OJ5WHBPTrjYLyHlApZJZ5ghhy8Ko2C/i', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI2IiwianRpIjoiOGRmZDQzMmM3ODQ1YzhhYjRlNzdlNDk3OWY2ZDcwYTZlMmVlNmJkOGU0MTk4MTU3ZTU2ZWM1OWFjNTk1MmY5NmNhYmQ1ZGZlY2FlNGYzZWYiLCJpYXQiOjE2Nzc0MTAwNTguNTUyMTU4LCJuYmYiOjE2Nzc0MTAwNTguNTUyMTYzLCJleHAiOjE3MDg5NDYwNTguNTEzNTkxLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.UOpTGWPn-Mr5oYQLuEW66r8w0CNXDChLMgLD8IYKFY7XXuRT9IyFTjQJVQ9qXPi5pGHkN6SiHAYKYCTK6yEn9xcYnAlTrCLpI1Po5YRigdU38ncGBUVJnwZgF8VbDviIEkyaBCywkai7XsurgYVfC3RJGkZDl-c4yRjCmbv6VaClZl5VMnvsmrPjsazB81dMumxeLNH_2zhm-byWnDdkofwsuHSjFHW81RS37JmWcQQZx7hmL3Bo__p61A2-GQL66eT22GI-93XK3cvzIPWsmYeLyc4cfJWVNst_y2WHZdlEGwu83Z1Nrrh7mpOmFsS9B2vay_kPqvNfMQyoZSG3BfluuMpeWceoBwjCbnVVYPuxpzPgIvapPbLzVfe7RHzVPCHBqcpbO0RMtln4XkwoTxXuTpPo5TkV6Rq5JC3VJTNq6ob7vNNh2OIJj1tgA0BHAYGMZFULGcZb-PowkrFDkjJ3TAOjaJ3K5v6WGP8VKvrolljQQHZX8f5oaAkooDBj9o9q7tV9pHKlS6KCd70oi3zIbqKggMwlzyMiygXYnpt0f-atW2F5sSePulnh331w6D-Ut0sjhh1pSjZR3Oc-Jmnho9MTxPmII8GrmStOw7bJMx-QP3Gb9ZchXyv4uTHrMAwAiEdcgwQovvDYkYOrZkpWl--17_u5d9yzVfsV8iw', NULL, '2023-02-26 11:14:18', 'DASHBOARD');

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."master_dealer_id_seq"
OWNED BY "public"."master_dealer"."id";
SELECT setval('"public"."master_dealer_id_seq"', 2, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."master_menu_id_seq"
OWNED BY "public"."master_menu"."id";
SELECT setval('"public"."master_menu_id_seq"', 2, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."master_ukuran_layar_id_seq"
OWNED BY "public"."master_ukuran_layar"."id";
SELECT setval('"public"."master_ukuran_layar_id_seq"', 3, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."migrations_id_seq"
OWNED BY "public"."migrations"."id";
SELECT setval('"public"."migrations_id_seq"', 8, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."oauth_clients_id_seq"
OWNED BY "public"."oauth_clients"."id";
SELECT setval('"public"."oauth_clients_id_seq"', 7, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."oauth_personal_access_clients_id_seq"
OWNED BY "public"."oauth_personal_access_clients"."id";
SELECT setval('"public"."oauth_personal_access_clients_id_seq"', 4, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."profil_id_seq"
OWNED BY "public"."profil"."id";
SELECT setval('"public"."profil_id_seq"', 4, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."transaksi_id_seq"
OWNED BY "public"."transaksi"."id";
SELECT setval('"public"."transaksi_id_seq"', 7, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."users_id_seq"
OWNED BY "public"."users"."id";
SELECT setval('"public"."users_id_seq"', 6, true);

-- ----------------------------
-- Primary Key structure for table master_dealer
-- ----------------------------
ALTER TABLE "public"."master_dealer" ADD CONSTRAINT "master_dealer_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table master_menu
-- ----------------------------
ALTER TABLE "public"."master_menu" ADD CONSTRAINT "master_menu_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table master_ukuran_layar
-- ----------------------------
ALTER TABLE "public"."master_ukuran_layar" ADD CONSTRAINT "master_ukuran_layar_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table migrations
-- ----------------------------
ALTER TABLE "public"."migrations" ADD CONSTRAINT "migrations_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table oauth_access_tokens
-- ----------------------------
CREATE INDEX "oauth_access_tokens_user_id_index" ON "public"."oauth_access_tokens" USING btree (
  "user_id" "pg_catalog"."int8_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table oauth_access_tokens
-- ----------------------------
ALTER TABLE "public"."oauth_access_tokens" ADD CONSTRAINT "oauth_access_tokens_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table oauth_auth_codes
-- ----------------------------
CREATE INDEX "oauth_auth_codes_user_id_index" ON "public"."oauth_auth_codes" USING btree (
  "user_id" "pg_catalog"."int8_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table oauth_auth_codes
-- ----------------------------
ALTER TABLE "public"."oauth_auth_codes" ADD CONSTRAINT "oauth_auth_codes_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table oauth_clients
-- ----------------------------
CREATE INDEX "oauth_clients_user_id_index" ON "public"."oauth_clients" USING btree (
  "user_id" "pg_catalog"."int8_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table oauth_clients
-- ----------------------------
ALTER TABLE "public"."oauth_clients" ADD CONSTRAINT "oauth_clients_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table oauth_personal_access_clients
-- ----------------------------
ALTER TABLE "public"."oauth_personal_access_clients" ADD CONSTRAINT "oauth_personal_access_clients_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table oauth_refresh_tokens
-- ----------------------------
CREATE INDEX "oauth_refresh_tokens_access_token_id_index" ON "public"."oauth_refresh_tokens" USING btree (
  "access_token_id" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table oauth_refresh_tokens
-- ----------------------------
ALTER TABLE "public"."oauth_refresh_tokens" ADD CONSTRAINT "oauth_refresh_tokens_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table profil
-- ----------------------------
ALTER TABLE "public"."profil" ADD CONSTRAINT "profil_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table transaksi
-- ----------------------------
ALTER TABLE "public"."transaksi" ADD CONSTRAINT "transaksi_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_email_unique" UNIQUE ("email");

-- ----------------------------
-- Primary Key structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_pkey" PRIMARY KEY ("id");
