SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

INSERT INTO sellers (seller_id, seller_name, seller_city, commission) VALUES
(1001, 'Petro Kolichack', 'Ternopil', 12),
(1002, 'Sergey Maliev', 'Dnipro', 13),
(1003, 'Olexander Maksimchuk', 'Lviv', 10),
(1004, 'Mikhailo Kovtun', 'Ternopil', 11),
(1007, 'Ruslan Danilov', 'Kharkiv', 15);

INSERT INTO customers (customer_id, seller_id, customer_name, customer_city, rating) VALUES
(2001, 1001, 'Marina Mogylko', 'Ternopil', 100),
(2002, 1003, 'Maria Gusina', 'Kropyvnitskyi', 200),
(2003, 1002, 'Mariana Gorbatiuk', 'Dnipro', 200),
(2004, 1002, 'Margarita Savchuk', 'Rivne', 300),
(2006, 1001, 'Marta Golovanchuk', 'Ternopil', 100),
(2007, 1004, 'Magda Brilska', 'Mykolaiv', 100),
(2008, 1007, 'Matilda Berezuyk', 'Dnipro', 300);

INSERT INTO orders (order_id, seller_id, customer_id, ondate, amount) VALUES
(3001, 1007, 2008, '2019-03-10', 18.69),
(3002, 1004, 2007, '2019-03-10', 1900.10),
(3003, 1001, 2001, '2019-03-10', 767.19),
(3005, 1002, 2003, '2019-03-10', 5160.45),
(3006, 1007, 2008, '2019-03-10', 1098.16),
(3007, 1002, 2004, '2019-04-10', 75.75),
(3008, 1001, 2006, '2019-05-10', 4723.00),
(3009, 1003, 2002, '2019-04-10', 1713.23),
(3010, 1002, 2004, '2019-06-10', 1309.95),
(3011, 1001, 2006, '2019-06-10', 9891.88);
