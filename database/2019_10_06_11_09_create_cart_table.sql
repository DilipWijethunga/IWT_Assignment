CREATE TABLE cart (
	prd_id INTEGER,
    u_id INTEGER,
    CONSTRAINT cart_pk PRIMARY KEY (prd_id,u_id),
    CONSTRAINT cart_products_fk FOREIGN KEY (prd_id) REFERENCES products(prd_id),
    CONSTRAINT catt_users_fk FOREIGN KEY (u_id) REFERENCES users(u_id)
);