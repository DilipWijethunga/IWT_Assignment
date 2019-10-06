CREATE TABLE notifications (
    ntfy_id INTEGER AUTO_INCREMENT,
    u_id INTEGER,
    ntfy_content VARCHAR(256),
    ntfy_status VARCHAR(3),
    ntfy_time TIMESTAMP,
    CONSTRAINT notifications_pk PRIMARY KEY (ntfy_id),
    CONSTRAINT notification_users_fk FOREIGN KEY (u_id) REFERENCES users (u_id)
);