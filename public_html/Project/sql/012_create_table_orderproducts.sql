CREATE TABLE IF NOT EXISTS OrderProducts(
    id int AUTO_INCREMENT PRIMARY  KEY,
    order_id int,
    desired_quantity int,
    product_id int,
    unit_price int,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    check (desired_quantity > 0),
    check (unit_price >= 0), 
    FOREIGN KEY (`order_id`) REFERENCES Orders(`id`),
    FOREIGN KEY (`product_id`) REFERENCES Products(`id`),
    UNIQUE KEY (`order_id`, `product_id`)
)