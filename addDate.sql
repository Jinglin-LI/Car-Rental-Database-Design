
-- insert account
INSERT INTO `account` (`Email`, `Password`) VALUES
('raylrc@gmail.com', 'yellow'),
('raylrc@foxmail.com ', 'blue'),
('raylrc@hotmail.com', 'black'),
('raylrc@qq.com', 'helloworld');

-- insert customer
INSERT INTO `customer` (`Ssn`, `Fname`, `Minit`, `Lname`, `Phone`, `Drive_Licence`, `Email`) 
VALUES
('47589604', 'xi', '', 'jinping', '469-5437786', '41841200', 'raylrc@hotmail.com'),
('47589603', 'jiang', '', 'zemin', '469-5437787', '41841201', 'raylrc@gmail.com'),
('47589602', 'deng', '', 'xiaoping', '469-5437789', '41841202', 'raylrc@qq.com'),
('47589601', 'mao', '', 'zedong', '469-5437710', '41841203', 'raylrc@foxmail.com');


-- insert store_representative info
INSERT INTO `store_representative`(`R_ssn`, `Phone`, `Email`, `Working_time`) 
VALUES
('3189042','469-5437321','wenyi@gmail.com','8AM-4PM'),
('3189043','469-5437987','hello@gmail.com','7AM-4PM'),
('3189023','469-5475982','yello@gmail.com','1AM-1PM'),
('4189023','469-5438391','poly@gmail.com','9AM-2PM');

-- insert store info
INSERT INTO `store`(`StoreID`, `Phone`, `Operating_time`, `Street`, `City`, `State`, `Zip`, `R_ssn`) 
VALUES 
('01','460-5437789','8AM-6PM','coit RD','Plano','TX','75080','3189042'),
('02','460-5437801','9AM-6PM','prenston RD','Dallas','TX','75430','3189023'),
('03','460-5437482','8AM-5PM','overland DR','Plano','TX','75073','4189023');

-- insert car info
INSERT INTO `car`(`VID`, `type`, `brand`, `capacity`, `detail`, `Status`, `Rental_rate`, `Insurance`, `StoreID`) 
VALUES ('41313313','Sedan','Toyota','4','bluetooth,heat seat,audo','In','100','AAA-COM','01'),
 ('41313332','trunk','Nissan','8','bluetooth,moon window','In','120','AAA-COM','03'),
  ('41313890','SUV','Honda','6','bluetooth,heat seat,auto light','In','150','StateFarm-COM','02');

-- insert order info
INSERT INTO `order_place`(`OrderID`, `Start_day`, `End_day`, `Start_mile`, `End_mile`, `Payment_way`, `Ssn`, `VID`) 
VALUES 
('2389232','2017-04-10','2017-04-20','47282','48982','Credit card','47589604','41313313'),
('2387483','2017-04-11','2017-04-21','45843','46843','Debit card','47589602','41313332'),
('2388450','2017-04-12','2017-04-22','29033','30033','Credit card','47589601','41313890');








