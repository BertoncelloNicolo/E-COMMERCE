insert into ecommerce.products(nome, prezzo, marca)
values ("libro", 20, "zanichelli"),
       ("rose", 19.99, "lego"),
       ("personal computer", 1799.99, "omen"),
       ("iphone 15", 1500, "apple"),
       ("vision pro", 3899.99, "apple"),
       ("jordan 4", 350, "jordan");

insert into ecommerce.roles(nome, descrizione)
values ("shopper", "utente base"),
       ("admin", "utente privilegiato");

insert into ecommerce.users(email, password, role_id)
values ('alice@gmail.com', 'password123', 1),
       ('bob@gmail.com','qwerty456', 2),
       ('charlie@outlook.com', 'letmein789', 2),
       ('david@libero.it','pass1234', 1);

INSERT INTO ecommerce.carts (id) VALUES (DEFAULT)

