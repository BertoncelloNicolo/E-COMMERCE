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
values ('utente@gmail.com', 'a', 1),
       ('admin@gmail.com','admin', 2);

INSERT INTO ecommerce.carts (id) VALUES (DEFAULT)

