    # Team 1 
    # October 13 2022

    use site_db;

    Drop table t1_users;
    create table t1_users 
        (id int primary key auto_increment, 
        first_name varchar(20) not null,
        last_name varchar(20) not null,
        username varchar(20) not null,
        passwords varchar(20) not null,
        password_type enum("HASHED", "TEXT") default "TEXT",
        orders int,
        email varchar(50),
        user_type enum("EMP", "ADMIN", "CUS") default "CUS",
        deleted enum("T", "F") default "F");

    insert into t1_users (first_name, last_name, username, passwords, orders, user_type) values ("Madeleine","Cavanagh", "cavanagh0088","student1", 2, "ADMIN");
    insert into t1_users (first_name, last_name, username, passwords, orders, user_type) values ("Hunter","Conway", "conwayh03","student2", 2, "ADMIN");
    insert into t1_users (first_name, last_name, username, passwords, orders, user_type) values ("William","Caras", "willcaras02","student3", 2, "ADMIN");
    insert into t1_users (first_name, last_name, username, passwords, orders, user_type) values ("William","Boulton", "weboulton413","student4", 2, "ADMIN");
    insert into t1_users (first_name, last_name, username, passwords, orders, user_type) values ("Andrew","Tokash", "Proftokash","ProfAPT0", 2, "ADMIN");
    INSERT INTO t1_users (first_name, last_name, username, passwords, password_type, orders, email, user_type) VALUES ("Joseph", "Porter", "jporter2020", "port2020", "HASHED", 3, "joseph_porter@yahoo.com", "CUS");
    INSERT INTO t1_users (first_name, last_name, username, passwords, password_type, user_type) VALUES ("Tony", "Stark", "tstark", "ironman", "TEXT", "CUS");
    INSERT INTO t1_users (first_name, last_name, username, passwords, password_type, email, user_type) VALUES ("Mary", "Jane", "mj2001", "maryj", "HASHED", "jane.mary@gmail.com", "EMP");
    INSERT INTO t1_users (first_name, last_name, username, passwords, password_type, email, user_type) VALUES ("Peter", "Smith", "peterpeter", "smithsmith", "HASHED", "smithpeterpeter@icloud.com", "EMP");
    INSERT INTO t1_users (first_name, last_name, username, passwords, password_type, orders, email, user_type) VALUES ("Riley", "Anderson", "Randerson809", "rileyA", "TEXT", 13, "randerson809@yahoo.com", "CUS");
    INSERT INTO t1_users (first_name, last_name, username, passwords) VALUES ("Jacob", "Martin", "jaymart", "kmart");
    INSERT INTO t1_users (first_name, last_name, username, passwords, password_type, orders, email, user_type) VALUES ("Walter", "Moore", "waltmoore", "chemistry", "HASHED", 200, "waltmoore@gmail.com", "CUS");



   DROP table if exists t1_products;
  
  create table t1_products
        (id int primary key auto_increment,
        type varchar(50),
        name varchar(50) not null,
        price decimal(10,2),
        stock int,
        supplier_name enum("Seedy Place", "Trowel World", "Dirt & Stuff"),
        supplier_id int,
        deleted enum("T", "F") default "F");

    insert into t1_products (type, name, price,stock,supplier_name,supplier_id) values ("Flower", "Chrysanthemum", 10.99,20,"Seedy Place",1);
    insert into t1_products (type, name, price,stock,supplier_name,supplier_id) values ("Flower", "Hyacinth", 15.99,30,"Seedy Place",1);
    insert into t1_products (type, name, price,stock,supplier_name,supplier_id) values ("Flower", "Daffodil", 5.99,50,"Seedy Place",1);
    insert into t1_products (type, name, price,stock,supplier_name,supplier_id) values ("Plant", "Holly", 9.99,50,"Trowel World",3);
    insert into t1_products (type, name, price,stock,supplier_name,supplier_id) values ("Flower", "Winter clematis", 12.99,20,"Seedy Place",1);
    insert into t1_products (type, name, price,stock,supplier_name,supplier_id) values ("Flower", "Irises", 9.99,20,"Seedy Place",1);
    insert into t1_products (type, name, price,stock,supplier_name,supplier_id) values ("Plant", "Waterwick", 4.99,10,"Trowel World",3);
    insert into t1_products (type, name, price,stock,supplier_name,supplier_id) values ("Plant", "Northfolk Pine", 10.99,30,"Trowel World",3);
    insert into t1_products (type, name, price,stock,supplier_name,supplier_id) values ("Plant", "Yucca Cane", 15.99,15,"Trowel World",3);
    insert into t1_products (type, name, price,stock,supplier_name,supplier_id) values ("Tree", "Ceder Pine", 185.99,10,"Trowel World",3);
    insert into t1_products (type, name, price,stock,supplier_name,supplier_id) values ("Soil", "Potting Mix", 5.99,100,"Dirt & Stuff",2);
    insert into t1_products (type, name, price,stock,supplier_name,supplier_id) values ("Soil", "Miracle Grow", 7.99,100,"Dirt & Stuff",2);
    insert into t1_products (type, name, price,stock,supplier_name,supplier_id) values ("Soil", "Soil Conditioner", 24.99,50,"Dirt & Stuff",2);
    insert into t1_products (type, name, price,stock,supplier_name,supplier_id) values ("Soil", "Expanding Soil", 15.99,75,"Dirt & Stuff",2);
    insert into t1_products (type, name, price,stock,supplier_name,supplier_id) values ("Soil", "Biochar", 19.99,50,"Dirt & Stuff",2);

DROP table if exists t1_cus_info;
    create table t1_cus_info
        (id int primary key auto_increment,
        username varchar(20),
        cc_num char(16),
        cc_security_code char(3),
        cc_expdate char(5),
        address_street varchar(256),
        address_city varchar(256),
        address_state varchar(256),
        address_zipcode char(5),
        deleted enum("T", "F") default "F");

    insert into t1_cus_info (cc_num, cc_security_code, cc_expdate, address_street, address_city, address_state, address_zipcode) values ("4673879018112456", "493", "01/32", "258 Playground Street", "Poughkeepsie", "New York", "12601");
    insert into t1_cus_info (cc_num, cc_security_code, cc_expdate, address_street, address_city, address_state, address_zipcode) values ("8812236711909847", "992", "11/24", "21 Street Street", "Poughkeepsie", "New York", "12602");
    insert into t1_cus_info (cc_num, cc_security_code, cc_expdate, address_street, address_city, address_state, address_zipcode) values ("4372987501567396", "128", "09/26", "405 Wispy Drive", "Newburgh", "New York", "12550");
    insert into t1_cus_info (cc_num, cc_security_code, cc_expdate, address_street, address_city, address_state, address_zipcode) values ("5013964567372987", "365", "12/26", "906 Wispy Drive", "Newburgh", "New York", "12550");
    insert into t1_cus_info (username, cc_num, cc_security_code, cc_expdate, address_street, address_city, address_state, address_zipcode) values ("Steven03","5013964567372987", "356", "12/26", "906 Wispy Drive", "Newburgh", "New York", "12550");
    insert into t1_cus_info (username, cc_num, cc_security_code, cc_expdate, address_street, address_city, address_state, address_zipcode) values ("Maryjane203","9863257498632485", "896", "12/26", "34 Green Drive", "Poughkeepsie", "New York", "12550");
    insert into t1_cus_info (username, cc_num, cc_security_code, cc_expdate, address_street, address_city, address_state, address_zipcode) values ("Stewart009","5749863248567375", "235", "12/26", "98 Green Lane Road", "Newburgh", "New York", "12550");
    insert into t1_cus_info (username, cc_num, cc_security_code, cc_expdate, address_street, address_city, address_state, address_zipcode) values ("Mack423","8266267581872987", "145", "12/26", "34 Oak Street", "New Paltz", "New York", "12550");
    insert into t1_cus_info (username, cc_num, cc_security_code, cc_expdate, address_street, address_city, address_state, address_zipcode) values ("JohnS20","9632578942658365", "557", "12/26", "1241 Sparky Lane", "Poughkeepsie", "New York", "12552");
    insert into t1_cus_info (username, cc_num, cc_security_code, cc_expdate, address_street, address_city, address_state, address_zipcode) values ("LarryG343","2453698563248426", "578", "12/26", "48 Sunset Road", "Poughkeepsie", "New York", "12552");
    insert into t1_cus_info (username, cc_num, cc_security_code, cc_expdate, address_street, address_city, address_state, address_zipcode) values ("Peter443","1254789365982425", "245", "12/26", "79 Lake Road", "New Paltz", "New York", "12550");
    insert into t1_cus_info (username, cc_num, cc_security_code, cc_expdate, address_street, address_city, address_state, address_zipcode) values ("Joe34","1536872523683625", "475", "12/26", "24 Applewood Avenue", "Newburgh", "New York", "12550");

DROP table if exists t1_suppliers;
    create table t1_suppliers
        (id int primary key auto_increment,
        name varchar(50) not null,
        num_inventory_items int,
        contact_phone_num varchar(20),
        contact_name varchar(20),
        contact_email varchar(50),
        deleted enum("T", "F") default "F");

    insert into t1_suppliers (id,name,num_inventory_items,contact_phone_num,contact_name,contact_email,deleted)values(1,"Seedy Place", 13, 8459020209, "John Seed", "mrseed1963@gmail.com", "F");
    insert into t1_suppliers (id,name,num_inventory_items,contact_phone_num,contact_name,contact_email,deleted)values(2,"Dirt & Stuff", 4, 9148920193, "Elizabeth Jones", "els1ejones1988@aol.com", "F");
    insert into t1_suppliers (id,name,num_inventory_items,contact_phone_num,contact_name,contact_email,deleted)values(3,"Trowel World", 2, 8219457832, "David Davis", "ddtrowelworld@outlook.com", "F");
    INSERT INTO t1_suppliers (id,name,num_inventory_items,contact_phone_num,contact_name,contact_email,deleted)VALUES(4,"PlantsandPots",55, 2086734535,"Emily Collins","Plantsandpots34@gmail.com", "F" );
    INSERT INTO t1_suppliers (id,name,num_inventory_items,contact_phone_num,contact_name,contact_email,deleted)VALUES(5,"Trees Keep",67,5647565746,"Mike Park","treeskeep@gmail.com", "F" );
    INSERT INTO t1_suppliers (id,name,num_inventory_items,contact_phone_num,contact_name,contact_email,deleted)VALUES(6,"Green Leave",34,29457467636,"Dan York","greenleaves@yahoo.com", "F" );
    INSERT INTO t1_suppliers (id,name,num_inventory_items,contact_phone_num,contact_name,contact_email,deleted)VALUES(7,"Parkplace",23,5764839478,"Lily Carhart","Parksplace@gmail.com", "F" );
    INSERT INTO t1_suppliers (id,name,num_inventory_items,contact_phone_num,contact_name,contact_email,deleted)VALUES(8,"Redpeas", 21 , 4568747436 ,"Megan Chang","Redpeas@yahoo.com", "F" );
    INSERT INTO t1_suppliers (id,name,num_inventory_items,contact_phone_num,contact_name,contact_email,deleted)VALUES(9,"coffelab", 34 , 2018794376 ,"Penelope Gomez","CoffeeLab@yahoo.com", "F" );
    INSERT INTO t1_suppliers (id,name,num_inventory_items,contact_phone_num,contact_name,contact_email,deleted)VALUES(10,"FlyHigh", 47 , 9804356789 ,"Josha Basset","Flyhigh@yahoo.com", "F" );
    