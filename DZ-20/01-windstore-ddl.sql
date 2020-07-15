SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE customers (
  customer_id int(11) UNSIGNED NOT NULL COMMENT 'pk',
  seller_id int(11) UNSIGNED NOT NULL COMMENT 'fk',
  customer_name varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'customer name',
  customer_city varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'customer city',
  rating smallint(5) UNSIGNED NOT NULL DEFAULT '100' COMMENT 'some internal rating'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='customers (peoples, who bought windows)';

CREATE TABLE orders (
  order_id int(11) UNSIGNED NOT NULL COMMENT 'pk',
  seller_id int(11) UNSIGNED NOT NULL COMMENT 'fk',
  customer_id int(11) UNSIGNED NOT NULL COMMENT 'fk',
  ondate date NOT NULL COMMENT 'order date created',
  amount float(6,2) UNSIGNED NOT NULL COMMENT 'amount'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='orders';

CREATE TABLE sellers (
  seller_id int(11) UNSIGNED NOT NULL COMMENT 'pk',
  seller_name varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'seller name',
  seller_city varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'seller city',
  commission tinyint(3) UNSIGNED NOT NULL DEFAULT '10' COMMENT 'seller commision in %'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='sellers (office managers)';

ALTER TABLE customers
  ADD PRIMARY KEY (customer_id),
  ADD KEY seller_id (seller_id);

ALTER TABLE orders
  ADD PRIMARY KEY (order_id),
  ADD KEY customer_id (customer_id),
  ADD KEY seller_id (seller_id);

ALTER TABLE sellers
  ADD PRIMARY KEY (seller_id);

ALTER TABLE customers
  MODIFY customer_id int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'pk';

ALTER TABLE orders
  MODIFY order_id int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'pk';

ALTER TABLE sellers
  MODIFY seller_id int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'pk';

ALTER TABLE customers
  ADD CONSTRAINT customers_ibfk_1 FOREIGN KEY (seller_id) REFERENCES sellers (seller_id) ON UPDATE CASCADE;

ALTER TABLE orders
  ADD CONSTRAINT orders_ibfk_1 FOREIGN KEY (customer_id) REFERENCES customers (customer_id) ON UPDATE CASCADE,
  ADD CONSTRAINT orders_ibfk_2 FOREIGN KEY (seller_id) REFERENCES sellers (seller_id) ON UPDATE CASCADE;