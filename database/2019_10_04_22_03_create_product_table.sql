CREATE TABLE product_types (
	prd_typ_id INTEGER AUTO_INCREMENT,
    prd_typ_name VARCHAR(20),
	prd_typ_code VARCHAR(10),
    CONSTRAINT product_types_pk PRIMARY KEY(prd_typ_id)
);

CREATE TABLE product_categories (
	prd_cat_id INTEGER AUTO_INCREMENT,
    prd_cat_name VARCHAR (150),
    prd_cat_code VARCHAR (10),
    CONSTRAINT product_categories_pk PRIMARY KEY(prd_cat_id)
);

CREATE TABLE products (
	prd_id INTEGER AUTO_INCREMENT,
    prd_name VARCHAR(150),
    prd_img VARCHAR(250),
    prd_cat_id INTEGER,
    prd_price DECIMAL(10,2),
    prd_desc VARCHAR(500),
    prd_cheff_spent_time TIME,
    CONSTRAINT products_pk PRIMARY KEY (prd_id),
    CONSTRAINT products_product_category_fk FOREIGN KEY(prd_cat_id) REFERENCES product_categories(prd_cat_id)
);

CREATE TABLE product_has_types (
    prd_id INTEGER,
    prd_typ_id INTEGER,
    CONSTRAINT product_has_types_pk PRIMARY KEY (prd_id,prd_typ_id),
    CONSTRAINT product_types_product_fk FOREIGN KEY (prd_id) REFERENCES products(prd_id),
    CONSTRAINT product_types_type_fk FOREIGN KEY (prd_typ_id) REFERENCES product_types(prd_typ_id)
);