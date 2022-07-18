CREATE TABLE IF NOT EXISTS Cart_Alt(
    id int AUTO_INCREMENT PRIMARY  KEY,
    desired_quantity int,
    product_id int,
    unit_price int,
    user_id int,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    check (desired_quantity > 0),
    check (unit_price >= 0), 
    FOREIGN KEY (`user_id`) REFERENCES Users(`id`),
    FOREIGN KEY (`product_id`) REFERENCES Products(`id`),
    UNIQUE KEY (`user_id`, `product_id`)
)