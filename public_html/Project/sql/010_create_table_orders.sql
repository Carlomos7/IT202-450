CREATE TABLE IF NOT EXISTS Orders(
    id int AUTO_INCREMENT PRIMARY KEY,
    order_id int,
    user_address text,
    payment_type text,
    payment_value int,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES Orders(id)
)