CREATE TABLE estructura (id BIGINT AUTO_INCREMENT, nombre VARCHAR(50) NOT NULL, tipo BIGINT NOT NULL, capacidad BIGINT NOT NULL, es_navegable TINYINT(1) DEFAULT '1', PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE multimedia (id BIGINT AUTO_INCREMENT, nombre VARCHAR(255) NOT NULL, tipo BIGINT NOT NULL, estructura_id BIGINT, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE pared_dibujable (id BIGINT AUTO_INCREMENT, punto_1_id BIGINT NOT NULL, punto_2_id BIGINT NOT NULL, link_imagen TEXT NOT NULL, descripcion TEXT NOT NULL, INDEX punto_1_id_idx (punto_1_id), INDEX punto_2_id_idx (punto_2_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE punto_navegacion (id BIGINT AUTO_INCREMENT, nombre VARCHAR(50) NOT NULL, punto_origen_x BIGINT NOT NULL, punto_origen_y BIGINT NOT NULL, estructura_id BIGINT, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE punto_navegacion_punto_navegacion (punto_navegacion_1_id BIGINT, punto_navegacion_2_id BIGINT, distancia FLOAT(18, 2) NOT NULL, PRIMARY KEY(punto_navegacion_1_id, punto_navegacion_2_id)) ENGINE = INNODB;
CREATE TABLE puntos (id BIGINT AUTO_INCREMENT, punto_origen_x BIGINT NOT NULL, punto_origen_y BIGINT NOT NULL, estructura_id BIGINT, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_forgot_password (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, unique_key VARCHAR(255), expires_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id BIGINT AUTO_INCREMENT, user_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id BIGINT AUTO_INCREMENT, first_name VARCHAR(255), last_name VARCHAR(255), email_address VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id BIGINT, group_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
ALTER TABLE pared_dibujable ADD CONSTRAINT pared_dibujable_punto_2_id_puntos_id FOREIGN KEY (punto_2_id) REFERENCES puntos(id) ON DELETE RESTRICT;
ALTER TABLE pared_dibujable ADD CONSTRAINT pared_dibujable_punto_1_id_puntos_id FOREIGN KEY (punto_1_id) REFERENCES puntos(id) ON DELETE RESTRICT;
ALTER TABLE punto_navegacion_punto_navegacion ADD CONSTRAINT pppi FOREIGN KEY (punto_navegacion_1_id) REFERENCES punto_navegacion(id);
ALTER TABLE sf_guard_forgot_password ADD CONSTRAINT sf_guard_forgot_password_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
