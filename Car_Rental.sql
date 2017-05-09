use Car_Rental
create table account (
	Email varchar(25) not null,
	Password char(8) not null,
	primary key(Email)
);

create table customer (
	Ssn char(9) not null,
	Fname varchar(15) not null,
	Minit varchar(1),
	Lname varchar(15) not null,
	Phone char(10),
	Drive_Licence varchar(15) not null,
	Email varchar(25) not null,
	primary key(Ssn),
	foreign key(Email) references account(Email) ON DELETE CASCADE
);

create table store_representative (
	R_ssn char(9) not null,
	Phone char(10) not null,
	Email varchar(25) not null,
	Working_time varchar(25) not null,
	primary key(R_ssn)
);

create table store (
	StoreID varchar(25) not null,
	Phone char(10) not null,
	Operating_time varchar(25) not null,
	Street varchar(25) not null,
	City varchar(25) not null,
	State varchar(25) not null,
	Zip char(5) not null,
	R_ssn char(9) not null,
	primary key(StoreID),
	foreign key(R_ssn) 
	  references store_representative(R_ssn)
	  ON DELETE CASCADE
);

create table car (
	VID varchar(25) not null,
	type varchar(25) not null,
	brand varchar(25) not null,
	capacity varchar(5) not null,
	detail varchar(25) not null,
	Status char(1) not null,      ------ 0 for not available (has been rented), 1 for available (is in the store), 2 for pending (is processing for renting)
	Rental_rate int(10) not null,
	Insurance varchar(25) not null,
	StoreID varchar(25) not null,
	primary key(VID),
	foreign key(StoreID) 
	  references store(StoreID)
	  ON DELETE CASCADE
);

create table order_place (
	OrderID varchar(25) not null,
	Start_day date not null,
	End_day date,
	Start_mile varchar(25) not null,
	End_mile varchar(25),
	Payment_way varchar(25),
	Ssn char(9) not null,
	VID varchar(25),
	primary key(OrderID),
	foreign key(Ssn) 
	  references customer(Ssn)
	  ON DELETE CASCADE,
	foreign key(VID) 
	  references car(VID)
	  ON DELETE CASCADE
);


use Car_Rental

-- Procedure 1

-- update the rental rate (increase by 25%) of the cars which located in dallas

CREATE OR REPLACE PROCEDURE
 UpdateRental_Rate25 AS
CURSOR DallasCarID IS
SELECT CAR.VID
FROM car, store
WHERE car.StoreID = store.StoreID
 and store.City = 'Dallas';
thisCarID Car.VID%TYPE;
BEGIN
 OPEN DallasCarID;
 LOOP
      FETCH DallasCarID INTO thisCarID;
	  EXIT WHEN (DallasCarID%NOTFOUND);
	  UPDATE car SET Rental_rate = Rental_rate * 1.25
	  WHERE VID = thisCarID;
 END LOOP;
 CLOSE DallasCarID;
END;
/
BEGIN
 UpdateRental_Rate25();
END;
/

-- Procedure 2
-- update the start day and start mile of the car
-- when the status of the car is "2" (pending for rental)

CREATE OR REPLACE PROCEDURE
 UpdateStart_Day_And_Mile AS
CURSOR PENDING_OrderID IS
SELECT order_place.OrderID
FROM order_place, car
WHERE car.VID = order_place.VID
 AND car.Status = '2';
thisOrderID order_place.OrderID%TYPE;
BEGIN 
 OPEN PENDING_OrderID;
 LOOP 
  FETCH PENDING_OrderID INTO thisOrderID;
  EXIT WHEN (PENDING_OrderID%NOTFOUND);
  UPDATE order_place SET (Start_day = '24-APR-17' and Start_mile = End_mile)
  WHERE OrderID = thisOrderID;

 END LOOP;
 CLOSE PENDING_OrderID;
END;
/
BEGIN
 UpdateStart_Day_And_Mile();
END;
/ 


-- Trigger 1

-- create a row-level trigger for the car table that would fire for INSERT
-- or UPDATE operations performed on Car table
-- this trigger will display the rental rate difference between the old values and new values.

CREATE OR REPLACE TRIGGER display_rentalrate_changes
BEFORE INSERT OR UPDATE ON CAR
FOR EACH ROW
WHEN (NEW.VID > 0)
DECLARE
 rentalrate_diff number;
BEGIN 
 rentalrate_diff := :NEW.Rental_rate - :OLD.Rental_rate;
 dbms_output.put_line('Old Rental Rate: ' || :OLD.Rental_rate);
 dbms_output.put_line('NEW Rental Rate: ' || :NEW.Rental_rate);
 dbms_output.put_line('Rental Rate difference: ' || rentalrate_diff);
END;
/

-- trigger 2
-- keep a log file containing data from rows that have been deleted from car table
CREATE TRIGGER Car_Delete
AFTER DELETE ON Car
 REFERENCING OLD ROW AS Old
FOR EACH ROW
 INSERT INTO Car_Deleted_Log
  VALUES(old.VID);

