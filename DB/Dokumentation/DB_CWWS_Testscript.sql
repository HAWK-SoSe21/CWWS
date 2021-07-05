-- Test Script um Datenbank mit Werten zu füllen
-- Übersicht über Querries zum Einfügen von Datensätzen in die Datenbank
-- https://www.ionos.de/digitalguide/server/knowhow/mysql-lernen-leicht-gemacht/

----------------------------------------------------
-- Properties
INSERT INTO Properties (Properties_name, Properties_description) VALUES ("Beispiel", "Beispiel");

-- (Articel Group)
INSERT INTO Properties (Properties_name, Properties_description) VALUES ("Artikel", "Gruppe");
INSERT INTO Articel_group (Articel_group_picture, Properties_Properties_id) VALUES ("C:/Users/.../abc.png", 
(SELECT Properties_id from Properties WHERE Properties_description = "Gruppe"));
-- Bild ist optional kann bei bedarf weggelassen werden

-- (Usage Statistics)
INSERT INTO usage_statistics (Usage_statistics_number_of_accesses) VALUES (0);

-- Format
INSERT INTO format (Format_height, Format_width, Format_length) VALUES ("10", "20", "30");

-- Articel
INSERT INTO articel (Articel_expiry, Articel_rotatable, Articel_stackable, Properties_Properties_id, Format_format_id, Articel_group_Articel_group_id, Usage_statistics_idUsage_statistics) VALUES ("1900-01-01", 1, 1, 
(SELECT Properties_id from Properties WHERE Properties_name = "Beispiel"), 
(SELECT format_id from format WHERE Format_height = "10" and Format_width = "20" and Format_length = "30"),
(SELECT Articel_group_id from Articel_group WHERE Properties_Properties_id = (SELECT Properties_id from Properties WHERE Properties_name = "Beispiel")),
(SELECT Usage_statistics_id FROM Usage_statistics ORDER BY Usage_statistics_id DESC LIMIT 1));

-- Alias angelegen
INSERT INTO Aliase (Aliase_1, Articel_Articel_id) VALUES ('Pseudonym', (SELECT Articel_id FROM Articel ORDER BY articel_id DESC LIMIT 1)); -- Fügt zusletzt angelegte Articel ID hinzu

-- Subarticel anlegen
INSERT INTO Subarticel (Subarticel_quantity, Subarticel_time_of_storage, Articel_Articel_id) VALUES (1, NOW(), (SELECT Articel_id FROM Articel ORDER BY articel_id DESC LIMIT 1)); -- Fügt zusletzt angelegte Articel ID hinzu

----------------------------------------------------
-- User anlegen
INSERT INTO User (user_name, user_password,  user_email) VALUES ("Max", "12345", "1234@abc.de");

-- User mit Artikel verknüpfen
INSERT INTO User_has_Articel (User_user_id, Articel_Articel_id) VALUES ((SELECT user_id FROM user ORDER BY user_id DESC LIMIT 1), (SELECT Articel_id FROM Articel ORDER BY articel_id DESC LIMIT 1)); -- Fügt zusletzt angelegte Articel ID und user ID hinzu

----------------------------------------------------
-- Lagerplatz anlegen
INSERT INTO Storage_yard (storage_yard_picture, format_format_id) VALUES ('C:/Users/.../abc.png', (SELECT Format_id FROM Format ORDER BY Format_id DESC LIMIT 1)); -- Fügt zusletzt angelegte Format ID hinzu 
--.
--.
--.

-- Updaten eines Attributes
UPDATE Articel SET Articel_rotatable = 0 WHERE Articel_id = 1;