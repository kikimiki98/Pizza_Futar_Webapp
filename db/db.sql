
CREATE DATABASE IF NOT EXISTS pizzafutar;
USE pizzafutar;


CREATE TABLE Customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    email VARCHAR(255) NOT NULL
);


CREATE TABLE Pizzas (
    pizza_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT
);

CREATE TABLE Images (
    image_id INT AUTO_INCREMENT PRIMARY KEY,
    pizza_id INT,
    image_path VARCHAR(255) NOT NULL,
    FOREIGN KEY (pizza_id) REFERENCES Pizzas(pizza_id)
);


CREATE TABLE Orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    order_date DATE NOT NULL,
    status VARCHAR(50) NOT NULL,
    FOREIGN KEY (customer_id) REFERENCES Customers(customer_id)
);


CREATE TABLE OrderDetails (
    order_detail_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    pizza_id INT,
    quantity INT NOT NULL,
    FOREIGN KEY (order_id) REFERENCES Orders(order_id),
    FOREIGN KEY (pizza_id) REFERENCES Pizzas(pizza_id)
);


CREATE DATABASE IF NOT EXISTS userdata;
USE userdata;


CREATE TABLE Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    customer_id INT,
    FOREIGN KEY (customer_id) REFERENCES pizzafutar.Customers(customer_id)
);


CREATE TABLE Admins (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password_hash VARCHAR(255) NOT NULL
);


USE pizzafutar;


INSERT INTO Customers (name, address, phone, email) VALUES
('John Doe', '123 Main St', '555-1234', 'john@example.com'),
('Jane Smith', '456 Oak St', '555-5678', 'jane@example.com');


INSERT INTO Pizzas (name, price, description) VALUES
('Margherita', 8.99, 'Classic tomato and cheese'),
('Pepperoni', 10.99, 'Pepperoni and cheese'),
('Vegetarian', 9.99, 'Mushrooms, onions, peppers, and cheese');


INSERT INTO Orders (customer_id, order_date, status) VALUES
(1, '2023-12-01', 'Processing'),
(2, '2023-12-02', 'Delivered');

INSERT INTO OrderDetails (order_id, pizza_id, quantity) VALUES
(1, 1, 2),
(1, 2, 1),
(2, 3, 3);


USE userdata;


INSERT INTO Users (username, password_hash, customer_id) VALUES
('user1', 'user1', 1),
('user2', 'user2', 2);


INSERT INTO Admins (username, password_hash) VALUES
('admin1', 'admin1');
