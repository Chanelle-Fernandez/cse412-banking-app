--
-- PostgreSQL database dump
--

-- Dumped from database version 14.2 (Ubuntu 14.2-1.pgdg20.04+1)
-- Dumped by pg_dump version 14.2 (Ubuntu 14.2-1.pgdg20.04+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: account; Type: TABLE; Schema: public; Owner: obhuvqmvswdwgp
--

CREATE TABLE public.account (
    account_number integer NOT NULL,
    customer_id integer NOT NULL,
    account_type integer NOT NULL
);


ALTER TABLE public.account OWNER TO obhuvqmvswdwgp;

--
-- Name: account_account_number_seq; Type: SEQUENCE; Schema: public; Owner: obhuvqmvswdwgp
--

ALTER TABLE public.account ALTER COLUMN account_number ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.account_account_number_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: checkings; Type: TABLE; Schema: public; Owner: obhuvqmvswdwgp
--

CREATE TABLE public.checkings (
    account_number integer NOT NULL,
    c_bal integer NOT NULL
);


ALTER TABLE public.checkings OWNER TO obhuvqmvswdwgp;

--
-- Name: customer; Type: TABLE; Schema: public; Owner: obhuvqmvswdwgp
--

CREATE TABLE public.customer (
    customer_id integer NOT NULL,
    username character(50) NOT NULL,
    pin integer NOT NULL,
    name character(50) NOT NULL,
    address character varying(100) NOT NULL,
    password character varying NOT NULL
);


ALTER TABLE public.customer OWNER TO obhuvqmvswdwgp;

--
-- Name: customer_customer_id_seq; Type: SEQUENCE; Schema: public; Owner: obhuvqmvswdwgp
--

ALTER TABLE public.customer ALTER COLUMN customer_id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.customer_customer_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: deposit; Type: TABLE; Schema: public; Owner: obhuvqmvswdwgp
--

CREATE TABLE public.deposit (
    transaction_id integer NOT NULL,
    deposited numeric NOT NULL
);


ALTER TABLE public.deposit OWNER TO obhuvqmvswdwgp;

--
-- Name: savings; Type: TABLE; Schema: public; Owner: obhuvqmvswdwgp
--

CREATE TABLE public.savings (
    account_number integer NOT NULL,
    s_bal integer NOT NULL
);


ALTER TABLE public.savings OWNER TO obhuvqmvswdwgp;

--
-- Name: transaction; Type: TABLE; Schema: public; Owner: obhuvqmvswdwgp
--

CREATE TABLE public.transaction (
    transaction_id integer NOT NULL,
    timedate timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    account_number integer NOT NULL
);


ALTER TABLE public.transaction OWNER TO obhuvqmvswdwgp;

--
-- Name: transaction_transaction_id_seq; Type: SEQUENCE; Schema: public; Owner: obhuvqmvswdwgp
--

ALTER TABLE public.transaction ALTER COLUMN transaction_id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.transaction_transaction_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: transfer; Type: TABLE; Schema: public; Owner: obhuvqmvswdwgp
--

CREATE TABLE public.transfer (
    transaction_id integer NOT NULL,
    amount numeric(15,2) NOT NULL,
    dst_account integer NOT NULL
);


ALTER TABLE public.transfer OWNER TO obhuvqmvswdwgp;

--
-- Name: withdraw; Type: TABLE; Schema: public; Owner: obhuvqmvswdwgp
--

CREATE TABLE public.withdraw (
    transaction_id integer NOT NULL,
    withdrawn numeric NOT NULL
);


ALTER TABLE public.withdraw OWNER TO obhuvqmvswdwgp;

--
-- Data for Name: account; Type: TABLE DATA; Schema: public; Owner: obhuvqmvswdwgp
--

COPY public.account (account_number, customer_id, account_type) FROM stdin;
4	4	2
5	5	2
6	6	1
7	7	2
8	8	2
9	9	1
10	10	1
11	11	1
12	12	1
13	13	1
14	14	1
15	15	1
16	16	2
17	17	2
18	18	2
19	19	2
20	20	2
21	21	2
22	22	1
23	23	1
24	24	1
25	25	1
26	26	1
27	27	1
28	28	1
29	29	1
30	30	1
\.


--
-- Data for Name: checkings; Type: TABLE DATA; Schema: public; Owner: obhuvqmvswdwgp
--

COPY public.checkings (account_number, c_bal) FROM stdin;
14	50
15	50
22	0
23	0
24	0
25	0
26	0
27	0
28	0
29	12441
30	25
\.


--
-- Data for Name: customer; Type: TABLE DATA; Schema: public; Owner: obhuvqmvswdwgp
--

COPY public.customer (customer_id, username, pin, name, address, password) FROM stdin;
1	test                                              	1234	test test                                         	test	$2y$10$8kQ286Pb4HOlYT4AK5gJg.ruM6zj6Y6r.21xSMBhElkoFs1cOWvhO
2	tester                                            	1234	tester tester                                     	tester	$2y$10$dkracIvTMCo3ao28vsl5oeKaacK2QqPIIhGnzJ6hBtewZ3SPXNfRS
3	testing                                           	1234	testing testing                                   	testing	$2y$10$jcySHmierF4vdn1OnIluUO8F3a.osmhPJR3EmPNLuIe0ZebV6e63.
4	tehe                                              	1234	tehe tehe                                         	tehe	$2y$10$DUR8UZQi1082CzSrN6MWmOzMmvYOrXY5ceFMbDNTdNiM6uIKPRQ3C
5	testtest                                          	1234	testtest testtest                                 	testtest	$2y$10$CagcxtXV0J6Vjg13L.nv8eNo59a5/Z4/wmEZHlM8iV8.6ccBTz4j6
6	testingtest                                       	1234	testingtest testingtest                           	testingtest	$2y$10$490Jo4wZ3tAgkVbf6YZ06.2FsZjf/0vvxFsYOD1p3SWto/Rizuu/O
7	teeheenis                                         	1234	teeheenis teeheenis                               	teeheenis	$2y$10$NYXLUwmk/7k/VcWxHvOpAOPtkQTxC6Becc/BHiXHead8z1CgNtHn6
8	boo                                               	123	boo boo                                           	boo	$2y$10$C4zJSXZ2xXgbWXodeGSIPuR44H.W2hwv9q0z2GtZSg5VBrIlWz5xW
9	ahh                                               	453	ahh ahh                                           	ahh	$2y$10$jAJ4218Jq4Fm9OEDu8gYu.dipVnTF1WdVG6e22wjABgHXwoJhnfUe
10	checkings                                         	432	checkings checkings                               	checkings	$2y$10$qc716SRs2nbft/8oJco3J.Z7lO7JOyBSqFSLkfgJFVKrYtC/ne7OC
11	checkingtest                                      	5435	checkingtest checkingtest                         	checkingtest	$2y$10$3IxNteFG/qaXXatn7DcrUueuO4fZwgXK3BROhBn7sBfoXOLeHC/lO
12	testingcheckings                                  	342432	testingcheckings testingcheckings                 	testingcheckings	$2y$10$sPBmC9UtiR84JTnjkqZKd.bUpPYXywhdDu0v8BELywhYYo1OTI4Tu
13	morechecking                                      	42432	morechecking morechecking                         	morechecking	$2y$10$STi/CzCe72eVjRyK8BcBC.ClFc8wHsCV87el104pKV4ZQZNgLtgE6
14	check                                             	543	check check                                       	check	$2y$10$qZ0ar8zFpj1zM5lWgv72.ukK7rQd1plKDa4djKZWAgbHUb/WnoQoO
15	checkers                                          	423	checkers checkers                                 	checkers	$2y$10$JOcxDy5sRkVcTVU196boBuo2e/1AYgW90p4DoZhuue31pxtHw4.2K
16	savings                                           	453	savings savings                                   	savings	$2y$10$zSZ9.H0Yv7x7kMLSDk.qKOJpaIlRoRfdbeongBXnKeMHi5k1P6wQi
17	savingscheck                                      	4234	savingscheck savingscheck                         	savingscheck	$2y$10$Tob43KW3djnzgw/1A9nA5uc8GlboQ0I6qJDvOHC9pCCgtIIiR7H/u
18	apple                                             	432	apple apple                                       	apple	$2y$10$XFRvXs.5gggZNAwqVeT1Lu/qdVdRJ0XkXmCy905PPWZKit/3YCoWu
19	pear                                              	3424	pear pear                                         	pear	$2y$10$CJu1A4flZWeqjA279N3Q.OiBH9vGtbfDyADIBvmXfRCII1xSSd9GC
20	mango                                             	4535	mango mango                                       	mango	$2y$10$GN72WVRoVBHl1BN2M.VW/.DNKtBFBFQhQw2GZs3UGwhGA09iGjbom
21	banana                                            	4324	banana banana                                     	banana	$2y$10$tOLkZyUQf42BxNbA8AOvjORQrBQ31/311FW76v3P8LN.RlAe.Tjfa
22	tears                                             	4355	tears tears                                       	tears	$2y$10$Y9c3uX7PuIdCamQRTsvXHeO/7hutS44HgwMEuNFJFgaeR33tiBEOS
23	screams                                           	324	screams screams                                   	screams	$2y$10$91d0Ui/OKz4EOoxxRaerl.PhC5.RM9GAJ4x6uo/BOPnpWeEOCRfJ6
24	jump                                              	342	jump jump                                         	jump	$2y$10$kExwxqaXJLDN3mekMazI6.2NMuSFwDEDXi8uWK7cjJC5U53WLUHwq
25	applesauce                                        	543	applesauce applesauce                             	applesauce	$2y$10$hUPO/Jse6dSoqyM9VygT2.fJSffm6T2JbS6T0kvdoCZgpR8HtWpl.
26	applesaucy                                        	34243	applesaucy applesaucy                             	applesaucy	$2y$10$wlh0KvdYDNcPXyPiuqWu1eouDudTqX00dlFotJ28SKN6dUelUdt.q
27	oopsie                                            	34243	oopsie oopsie                                     	oopsie	$2y$10$pLfWlN9JBcbQPVzh75Fo2O1l2jFJaSyjQ9yXJoV.ObGJK5V9fpvsC
28	oopsie2                                           	3423	oopsie2 oopsie2                                   	oopsie2	$2y$10$08pCl38B50OzJ4opOhC7S.A94ZZAALt9V.psfrjM7DbpZFUPdHCme
29	daumana                                           	4321	David Umana                                       	ASU	$2y$10$cxnbuqPBTMIlg2rFy9pgpeAQ0FlzZFs150mvh.pgWM95wF5SHniLq
30	cjferna2                                          	1234	Chanelle Fernandez                                	Address	$2y$10$HaJFBiXMiazw6SToYs3b.u1Lh370SrMR1cnRISqqLwHRuW.L/O2cC
\.


--
-- Data for Name: deposit; Type: TABLE DATA; Schema: public; Owner: obhuvqmvswdwgp
--

COPY public.deposit (transaction_id, deposited) FROM stdin;
17	50
18	50
22	100
\.


--
-- Data for Name: savings; Type: TABLE DATA; Schema: public; Owner: obhuvqmvswdwgp
--

COPY public.savings (account_number, s_bal) FROM stdin;
17	0
16	50
21	0
18	10
19	15
20	25
\.


--
-- Data for Name: transaction; Type: TABLE DATA; Schema: public; Owner: obhuvqmvswdwgp
--

COPY public.transaction (transaction_id, timedate, account_number) FROM stdin;
4	2022-04-26 16:57:13.008378+00	20
5	2022-04-26 16:58:02.158715+00	20
6	2022-04-26 17:08:50.28215+00	20
7	2022-04-26 17:09:53.997894+00	20
8	2022-04-26 17:13:35.582657+00	18
9	2022-04-26 17:15:16.120851+00	20
10	2022-04-26 17:16:19.0849+00	20
11	2022-04-26 17:17:04.805861+00	20
12	2022-04-26 17:33:48.808745+00	20
13	2022-04-26 17:37:28.889561+00	20
14	2022-04-26 17:39:27.421321+00	20
15	2022-04-26 17:42:11.240586+00	20
16	2022-04-26 17:47:01.241479+00	20
17	2022-04-26 17:49:36.380432+00	20
18	2022-04-26 17:54:46.985432+00	20
19	2022-04-26 17:54:55.71068+00	20
20	2022-04-26 17:55:02.098646+00	20
21	2022-04-26 17:57:36.954624+00	20
22	2022-04-26 20:27:13.380124+00	30
23	2022-04-26 20:28:06.989893+00	30
24	2022-04-26 20:28:37.885626+00	30
\.


--
-- Data for Name: transfer; Type: TABLE DATA; Schema: public; Owner: obhuvqmvswdwgp
--

COPY public.transfer (transaction_id, amount, dst_account) FROM stdin;
21	15.00	19
24	25.00	20
\.


--
-- Data for Name: withdraw; Type: TABLE DATA; Schema: public; Owner: obhuvqmvswdwgp
--

COPY public.withdraw (transaction_id, withdrawn) FROM stdin;
19	25
23	50
\.


--
-- Name: account_account_number_seq; Type: SEQUENCE SET; Schema: public; Owner: obhuvqmvswdwgp
--

SELECT pg_catalog.setval('public.account_account_number_seq', 30, true);


--
-- Name: customer_customer_id_seq; Type: SEQUENCE SET; Schema: public; Owner: obhuvqmvswdwgp
--

SELECT pg_catalog.setval('public.customer_customer_id_seq', 30, true);


--
-- Name: transaction_transaction_id_seq; Type: SEQUENCE SET; Schema: public; Owner: obhuvqmvswdwgp
--

SELECT pg_catalog.setval('public.transaction_transaction_id_seq', 24, true);


--
-- Name: account account_pkey; Type: CONSTRAINT; Schema: public; Owner: obhuvqmvswdwgp
--

ALTER TABLE ONLY public.account
    ADD CONSTRAINT account_pkey PRIMARY KEY (account_number);


--
-- Name: customer customer_pkey; Type: CONSTRAINT; Schema: public; Owner: obhuvqmvswdwgp
--

ALTER TABLE ONLY public.customer
    ADD CONSTRAINT customer_pkey PRIMARY KEY (customer_id);


--
-- Name: transaction transaction_pkey; Type: CONSTRAINT; Schema: public; Owner: obhuvqmvswdwgp
--

ALTER TABLE ONLY public.transaction
    ADD CONSTRAINT transaction_pkey PRIMARY KEY (transaction_id);


--
-- Name: account account_customer_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: obhuvqmvswdwgp
--

ALTER TABLE ONLY public.account
    ADD CONSTRAINT account_customer_id_fkey FOREIGN KEY (customer_id) REFERENCES public.customer(customer_id);


--
-- Name: checkings checkings_account_number_fkey; Type: FK CONSTRAINT; Schema: public; Owner: obhuvqmvswdwgp
--

ALTER TABLE ONLY public.checkings
    ADD CONSTRAINT checkings_account_number_fkey FOREIGN KEY (account_number) REFERENCES public.account(account_number);


--
-- Name: deposit deposit_transaction_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: obhuvqmvswdwgp
--

ALTER TABLE ONLY public.deposit
    ADD CONSTRAINT deposit_transaction_id_fkey FOREIGN KEY (transaction_id) REFERENCES public.transaction(transaction_id);


--
-- Name: savings savings_account_number_fkey; Type: FK CONSTRAINT; Schema: public; Owner: obhuvqmvswdwgp
--

ALTER TABLE ONLY public.savings
    ADD CONSTRAINT savings_account_number_fkey FOREIGN KEY (account_number) REFERENCES public.account(account_number);


--
-- Name: transaction transaction_account_number_fkey; Type: FK CONSTRAINT; Schema: public; Owner: obhuvqmvswdwgp
--

ALTER TABLE ONLY public.transaction
    ADD CONSTRAINT transaction_account_number_fkey FOREIGN KEY (account_number) REFERENCES public.account(account_number);


--
-- Name: transfer transfer_dst_account_fkey; Type: FK CONSTRAINT; Schema: public; Owner: obhuvqmvswdwgp
--

ALTER TABLE ONLY public.transfer
    ADD CONSTRAINT transfer_dst_account_fkey FOREIGN KEY (dst_account) REFERENCES public.account(account_number);


--
-- Name: transfer transfer_transaction_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: obhuvqmvswdwgp
--

ALTER TABLE ONLY public.transfer
    ADD CONSTRAINT transfer_transaction_id_fkey FOREIGN KEY (transaction_id) REFERENCES public.transaction(transaction_id);


--
-- Name: withdraw withdraw_transaction_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: obhuvqmvswdwgp
--

ALTER TABLE ONLY public.withdraw
    ADD CONSTRAINT withdraw_transaction_id_fkey FOREIGN KEY (transaction_id) REFERENCES public.transaction(transaction_id);


--
-- Name: LANGUAGE plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO obhuvqmvswdwgp;


--
-- PostgreSQL database dump complete
--

