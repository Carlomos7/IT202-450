CREATE TABLE IF NOT EXISTS OrderHistory(
    id int AUTO_INCREMENT PRIMARY KEY,
    order_id int,
    product_id int,
    desired_quantity int,
    user_id int,
    unit_price int,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(id),
    FOREIGN KEY (product_id) REFERENCES Products(id),
    check(desired_quantity > 0)
)