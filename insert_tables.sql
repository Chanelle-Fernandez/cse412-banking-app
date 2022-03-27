INSERT INTO customer (username, pin, name, address, customer_id)
VALUES ('blacksmithJohn', 1234, 'John Smith', '123 Abc St', 1);

INSERT INTO customer (username, pin, name, address, customer_id)
VALUES ('beaverthecleaver', 9801, 'Wood Chuck', '576 Howmuch Ave', 2);

INSERT INTO customer (username, pin, name, address, customer_id)
VALUES ('homesweethome', 357, 'Dorothy Gale', '712 Yellow Brick Rd', 3);

INSERT INTO customer (username, pin, name, address, customer_id)
VALUES ('whoisthis', 5634, 'Jane Doe', '543 Easy St', 4);

INSERT INTO account (account_number, customer_id)
VALUES (12345678, 1);

INSERT INTO account (account_number, customer_id)
VALUES (12345679, 2);

INSERT INTO account (account_number, customer_id)
VALUES (12345681, 3);

INSERT INTO account (account_number, customer_id)
VALUES (22345678, 1);

INSERT INTO account (account_number, customer_id)
VALUES (12345682, 4);

INSERT INTO savings (account_number, s_bal)
VALUES (12345678, 567.32);

INSERT INTO savings (account_number, s_bal)
VALUES (12345679, 5);

INSERT INTO savings (account_number, s_bal)
VALUES (12345681, 7345.23);

INSERT INTO savings (account_number, s_bal)
VALUES (12345682, 321.89);

INSERT INTO checking (account_number, c_bal)
VALUES (22345678, 9234.12);

INSERT INTO transaction (transaction_id, timeDate, account_id)
VALUES (124, '1/1/2021', 12345678);

INSERT INTO transaction (transaction_id, timeDate, account_id)
VALUES (234, '4/7/2021', 12345679);

INSERT INTO transaction (transaction_id, timeDate, account_id)
VALUES (567, '8/13/2021', 12345681);

INSERT INTO transaction (transaction_id, timeDate, account_id)
VALUES (634, '11/1/2021', 22345678);

INSERT INTO transaction (transaction_id, timeDate, account_id)
VALUES (1432, '5/1/2022', 12345682);

INSERT INTO transfer (amount, dst, transaction_id)
VALUES (453,  22345678, 124);

INSERT INTO deposit (deposited, transaction_id)
VALUES (789.43, 234); 

INSERT INTO deposit (deposited, transaction_id)
VALUES (932.15, 567);

INSERT INTO withdraw (withdrawn, transaction_id)
VALUES (100, 634);

INSERT INTO withdraw (withdrawn, transaction_id)
VALUES (50, 1432);
