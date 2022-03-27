CREATE TABLE customer  ( username  CHAR(25) NOT NULL,
			  pin INTEGER NOT NULL,
                            name       CHAR(25) NOT NULL,
                            address  VARCHAR(50) NOT NULL,
                            customer_id    INTEGER NOT NULL,
                            PRIMARY KEY (customer_id));

CREATE TABLE account  ( account_number  INTEGER NOT NULL,
			 cusotmer_id INTEGER NOT NULL,
			 PRIMARY KEY (account_number)
			 FOREIGN KEY (customer_id) REFERENCES customer(customer_id));

CREATE TABLE transaction  ( transaction_id     INTEGER NOT NULL,
                          timeDate        DATE,
                          account_id INTEGER NOT NULL,
                          PRIMARY KEY (transaction_id)
                          FOREIGN KEY (account_id) REFERENCES account(account_id));

CREATE TABLE savings ( account_number     INTEGER NOT NULL,
                             s_bal   INTEGER NOT NULL,
                             FOREIGN KEY (account_number) REFERENCES account(account_number));

CREATE TABLE checking ( account_number     INTEGER NOT NULL,
                             c_bal     INTEGER NOT NULL,
                             FOREIGN KEY (account_number) REFERENCES account(account_number));

CREATE TABLE transfer ( amount     DECIMAL(15,2) NOT NULL,
                             dst        VARCHAR(25) NOT NULL,
                             transaction_id INTEGER NOT NULL,
                             FOREIGN KEY(transaction_id) REFERENCES transaction(transaction_id));

CREATE TABLE deposit  ( deposited       DECIMAL NOT NULL,
                           transaction_id        INTEGER NOT NULL,
                           FOREIGN KEY(transaction_id) REFERENCES transaction(transaction_id));

CREATE TABLE withdraw ( withdrawn    DECIMAL NOT NULL,
                             transaction_id     INTEGER NOT NULL,
                             FOREIGN KEY(transaction_id) REFERENCES transaction(transaction_id));
