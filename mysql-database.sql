CREATE TABLE enquire
(
    id          INT AUTO_INCREMENT NOT NULL,
    property_id INT DEFAULT NULL,
    message     VARCHAR(255)       NOT NULL,
    email       VARCHAR(255)       NOT NULL,
    INDEX IDX_899835CB549213EC (property_id),
    PRIMARY KEY (id)
) DEFAULT CHARACTER SET utf8mb4
  COLLATE `utf8mb4_unicode_ci`
  ENGINE = InnoDB;

CREATE TABLE property
(
    id        INT AUTO_INCREMENT NOT NULL,
    title     VARCHAR(255)       NOT NULL,
    latitude  NUMERIC(7, 5)      NOT NULL,
    longitude NUMERIC(7, 5)      NOT NULL,
    bedrooms  INT                NOT NULL,
    point     POINT              NOT NULL,
    PRIMARY KEY (id)
) DEFAULT CHARACTER SET utf8mb4
  COLLATE `utf8mb4_unicode_ci`
  ENGINE = InnoDB;

CREATE TABLE location
(
    id        INT AUTO_INCREMENT NOT NULL,
    name      VARCHAR(255)       NOT NULL,
    slug      VARCHAR(255)       NOT NULL,
    latitude  NUMERIC(7, 5)      NOT NULL,
    longitude NUMERIC(7, 5)      NOT NULL,
    PRIMARY KEY (id)
) DEFAULT CHARACTER SET utf8mb4
  COLLATE `utf8mb4_unicode_ci`
  ENGINE = InnoDB;

ALTER TABLE enquire
    ADD CONSTRAINT FK_899835CB549213EC FOREIGN KEY (property_id) REFERENCES property (id);
