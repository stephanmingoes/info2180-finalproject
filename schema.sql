CREATE TABLE Users (
    id INT NOT NULL AUTO_INCREMENT,
    firstname VARCHAR(30),
    lastname VARCHAR(30),
    password VARCHAR(500),
    email VARCHAR(30),
    role VARCHAR(30),
    created_at DATETIME, 
    PRIMARY KEY (id)
);


CREATE TABLE Contacts (
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(30),  
    firstname VARCHAR(30),
    lastname VARCHAR(30),
    email VARCHAR(30),
    telephone VARCHAR(30),
    company VARCHAR(30),
    type VARCHAR(30),
    assigned_to INT,
    created_by INT,
    created_at DATETIME,
    updated_at DATETIME,
    PRIMARY KEY (id),
    FOREIGN KEY (created_by) REFERENCES Users(id),
    FOREIGN KEY (assigned_to) REFERENCES Users(id)
);

CREATE TABLE Notes (
    id INT NOT NULL AUTO_INCREMENT,
    contact_id INT,
    comment TEXT,
    created_by INT,
    created_at DATETIME,
    PRIMARY KEY (id),
    FOREIGN KEY (created_by) REFERENCES Users(id),
    FOREIGN KEY (contact_id) REFERENCES Contacts(id)

);

INSERT INTO Users(firstname,lastname, password, email, role, created_at)
VALUES("Stephan", "Mingoes", "$2y$10$P1AmxzYsg3ZFJQD3qKfOXeetBSxvg2LAYiIp7pVk6DtJiUf./3246", "admin@mail.com", "Admin", "9999-12-31 23:59:59")
