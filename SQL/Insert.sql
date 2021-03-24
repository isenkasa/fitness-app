-- Accounts --

INSERT INTO Accounts(First_Name) VALUES ('Michael');
INSERT INTO Accounts(First_Name) VALUES ('Dwight');
INSERT INTO Accounts(First_Name) VALUES ('Jim');
INSERT INTO Accounts(First_Name) VALUES ('Pam');
INSERT INTO Accounts(First_Name) VALUES ('Phylis');
INSERT INTO Accounts(First_Name) VALUES ('Erin');
INSERT INTO Accounts(First_Name) VALUES ('Bob');
INSERT INTO Accounts(First_Name) VALUES ('Louise');

-- Workouts --

INSERT INTO Workouts VALUES ('Bench Press','50','10');
INSERT INTO Workouts VALUES ('Squats','60','10');
INSERT INTO Workouts VALUES ('Curls','30','10');
INSERT INTO Workouts VALUES ('Shoulder Press','50','10');
INSERT INTO Workouts VALUES ('Lunges','40','10');
INSERT INTO Workouts VALUES ('Pushups','30','10');
INSERT INTO Workouts VALUES ('Light Running','80','10');
INSERT INTO Workouts VALUES ('Moderate Running','120','10');
INSERT INTO Workouts VALUES ('Heavy Running','180','10');
INSERT INTO Workouts VALUES ('Biking','80','10');

-- Meals --

INSERT INTO Meals VALUES ('Chicken Breast','200','100');
INSERT INTO Meals VALUES ('Pizza','285','100');
INSERT INTO Meals VALUES ('Mashed Potato','88','100');
INSERT INTO Meals VALUES ('Broccoli','10','100');
INSERT INTO Meals VALUES ('Steak','271','100');

-- Nutrients --

INSERT INTO Nutrients VALUES ('Carbohydrate','Macro','290');
INSERT INTO Nutrients VALUES ('Protein','Macro','130');
INSERT INTO Nutrients VALUES ('Fat','Macro','90');
INSERT INTO Nutrients VALUES ('Vitamin D','Micro','15');
INSERT INTO Nutrients VALUES ('Vitamin C','Micro','70000');
INSERT INTO Nutrients VALUES ('Calcium','Micro','1000000');
INSERT INTO Nutrients VALUES ('Sodium', 'Micro', '3400000');
INSERT INTO Nutrients VALUES ('Potassium', 'Micro', '4000000');

-- Conversions

INSERT INTO Conversions VALUES ('gram','microgram','1000000'); -- multiply
INSERT INTO Conversions VALUES ('microgram','gram','1000000'); -- divide by
INSERT INTO Conversions VALUES ('cups','gram','128');

-- Records_Weight

INSERT INTO Records_Weight VALUES ('1','2020-04-23 12:00:00','180');
INSERT INTO Records_Weight VALUES ('2','2020-04-23 09:00:00','190');
INSERT INTO Records_Weight VALUES ('3','2020-04-23 11:00:00','120');
INSERT INTO Records_Weight VALUES ('4','2020-04-23 08:00:00','130');
INSERT INTO Records_Weight VALUES ('5','2020-04-23 12:00:00','150');
INSERT INTO Records_Weight VALUES ('6','2020-04-23 11:30:00','110');
INSERT INTO Records_Weight VALUES ('7','2020-04-23 12:12:00','190');
INSERT INTO Records_Weight VALUES ('8','2020-04-23 12:00:02','200');

INSERT INTO Records_Weight VALUES ('1','2020-04-24 12:00:00','181');
INSERT INTO Records_Weight VALUES ('2','2020-04-24 09:00:00','191');
INSERT INTO Records_Weight VALUES ('3','2020-04-24 11:00:00','119');
INSERT INTO Records_Weight VALUES ('4','2020-04-24 08:00:00','129');
INSERT INTO Records_Weight VALUES ('5','2020-04-24 12:00:00','149');
INSERT INTO Records_Weight VALUES ('6','2020-04-24 11:30:00','108');
INSERT INTO Records_Weight VALUES ('7','2020-04-24 12:12:00','192');
INSERT INTO Records_Weight VALUES ('8','2020-04-24 12:00:02','198');

INSERT INTO Records_Weight VALUES ('1','2020-04-26 12:00:00','180');
INSERT INTO Records_Weight VALUES ('2','2020-04-26 09:00:00','192');
INSERT INTO Records_Weight VALUES ('3','2020-04-26 11:00:00','117');
INSERT INTO Records_Weight VALUES ('4','2020-04-26 08:00:00','126');
INSERT INTO Records_Weight VALUES ('5','2020-04-26 12:00:00','146');
INSERT INTO Records_Weight VALUES ('6','2020-04-26 11:30:00','105');
INSERT INTO Records_Weight VALUES ('7','2020-04-26 12:12:00','190');
INSERT INTO Records_Weight VALUES ('8','2020-04-26 12:00:02','195');

INSERT INTO Records_Weight VALUES ('1','2020-04-28 12:00:00','178');
INSERT INTO Records_Weight VALUES ('2','2020-04-28 09:00:00','190');
INSERT INTO Records_Weight VALUES ('3','2020-04-28 11:00:00','115');
INSERT INTO Records_Weight VALUES ('4','2020-04-28 08:00:00','122');
INSERT INTO Records_Weight VALUES ('5','2020-04-28 12:00:00','142');
INSERT INTO Records_Weight VALUES ('6','2020-04-28 11:30:00','102');
INSERT INTO Records_Weight VALUES ('7','2020-04-28 12:12:00','188');
INSERT INTO Records_Weight VALUES ('8','2020-04-28 12:00:02','190');

-- Performs_Workout

INSERT INTO Performs_Workout VALUES ('1','Bench Press','2020-04-23 12:00:00');
INSERT INTO Performs_Workout VALUES ('1','Squats','2020-04-23 12:10:00');
INSERT INTO Performs_Workout VALUES ('1','Light Running','2020-04-23 12:20:00');

INSERT INTO Performs_Workout VALUES ('2','Bench Press','2020-04-23 12:00:00');
INSERT INTO Performs_Workout VALUES ('2','Squats','2020-04-23 12:10:00');
INSERT INTO Performs_Workout VALUES ('2','Heavy Running','2020-04-23 12:20:00');

INSERT INTO Performs_Workout VALUES ('3','Bench Press','2020-04-23 12:00:00');
INSERT INTO Performs_Workout VALUES ('3','Squats','2020-04-23 12:10:00');
INSERT INTO Performs_Workout VALUES ('3','Moderate Running','2020-04-23 12:20:00');

INSERT INTO Performs_Workout VALUES ('4','Bench Press','2020-04-23 12:00:00');
INSERT INTO Performs_Workout VALUES ('4','Shoulder Press','2020-04-23 12:10:00');
INSERT INTO Performs_Workout VALUES ('4','Curls','2020-04-23 12:20:00');
INSERT INTO Performs_Workout VALUES ('4','Pushups','2020-04-23 12:00:00');
INSERT INTO Performs_Workout VALUES ('4','Squats','2020-04-23 12:10:00');
INSERT INTO Performs_Workout VALUES ('4','Heavy Running','2020-04-23 12:20:00');

INSERT INTO Performs_Workout VALUES ('5','Bench Press','2020-04-23 12:00:00');
INSERT INTO Performs_Workout VALUES ('5','Shoulder Press','2020-04-23 12:10:00');
INSERT INTO Performs_Workout VALUES ('5','Curls','2020-04-23 12:20:00');
INSERT INTO Performs_Workout VALUES ('5','Pushups','2020-04-23 12:00:00');
INSERT INTO Performs_Workout VALUES ('5','Squats','2020-04-23 12:10:00');
INSERT INTO Performs_Workout VALUES ('5','Heavy Running','2020-04-23 12:20:00');

INSERT INTO Performs_Workout VALUES ('6','Bench Press','2020-04-23 12:00:00');
INSERT INTO Performs_Workout VALUES ('6','Shoulder Press','2020-04-23 12:10:00');
INSERT INTO Performs_Workout VALUES ('6','Curls','2020-04-23 12:20:00');
INSERT INTO Performs_Workout VALUES ('6','Pushups','2020-04-23 12:00:00');
INSERT INTO Performs_Workout VALUES ('6','Squats','2020-04-23 12:10:00');
INSERT INTO Performs_Workout VALUES ('6','Light Running','2020-04-23 12:20:00');

INSERT INTO Performs_Workout VALUES ('7','Bench Press','2020-04-23 12:00:00');
INSERT INTO Performs_Workout VALUES ('7','Shoulder Press','2020-04-23 12:10:00');
INSERT INTO Performs_Workout VALUES ('7','Curls','2020-04-23 12:20:00');

INSERT INTO Performs_Workout VALUES ('8','Bench Press','2020-04-23 12:00:00');
INSERT INTO Performs_Workout VALUES ('8','Shoulder Press','2020-04-23 12:10:00');
INSERT INTO Performs_Workout VALUES ('8','Curls','2020-04-23 12:20:00');

-- Consumes_Meal

INSERT INTO Consumes_Meal VALUES ('1','Pizza','2020-04-23 09:00:00','3');
INSERT INTO Consumes_Meal VALUES ('2','Steak','2020-04-23 09:10:00','2');
INSERT INTO Consumes_Meal VALUES ('3','Chicken Breast','2020-04-23 09:20:00','4');
INSERT INTO Consumes_Meal VALUES ('4','Steak','2020-04-23 09:00:10','1');
INSERT INTO Consumes_Meal VALUES ('5','Pizza','2020-04-23 09:00:50','2');
INSERT INTO Consumes_Meal VALUES ('6','Mashed Potato','2020-04-23 10:00:00','1');

-- Converts_To
-- ?

-- Meal_Contains

INSERT INTO Meal_Contains VALUES ('Chicken Breast','Protein','31');
INSERT INTO Meal_Contains VALUES ('Chicken Breast','Carbohydrate','0');
INSERT INTO Meal_Contains VALUES ('Chicken Breast','Fat','4');

INSERT INTO Meal_Contains VALUES ('Pizza','Protein','11');
INSERT INTO Meal_Contains VALUES ('Pizza','Carbohydrate','33');
INSERT INTO Meal_Contains VALUES ('Pizza','Fat','10');
INSERT INTO Meal_Contains VALUES ('Pizza','Vitamin D','0');
INSERT INTO Meal_Contains VALUES ('Pizza','Vitamin C','0');
INSERT INTO Meal_Contains VALUES ('Pizza','Calcium','300000');
INSERT INTO Meal_Contains VALUES ('Pizza','Sodium','1000000');
INSERT INTO Meal_Contains VALUES ('Pizza','Potassium','400000');

INSERT INTO Meal_Contains VALUES ('Mashed Potato','Protein','2');
INSERT INTO Meal_Contains VALUES ('Mashed Potato','Carbohydrate','15');
INSERT INTO Meal_Contains VALUES ('Mashed Potato','Fat','3');
INSERT INTO Meal_Contains VALUES ('Mashed Potato','Vitamin D','0');
INSERT INTO Meal_Contains VALUES ('Mashed Potato','Vitamin C','0');
INSERT INTO Meal_Contains VALUES ('Mashed Potato','Calcium','0');
INSERT INTO Meal_Contains VALUES ('Mashed Potato','Sodium','500000');
INSERT INTO Meal_Contains VALUES ('Mashed Potato','Potassium','100000');

INSERT INTO Meal_Contains VALUES ('Broccoli','Protein','3');
INSERT INTO Meal_Contains VALUES ('Broccoli','Carbohydrate','6');
INSERT INTO Meal_Contains VALUES ('Broccoli','Fat','0');
INSERT INTO Meal_Contains VALUES ('Broccoli','Vitamin D','0');
INSERT INTO Meal_Contains VALUES ('Broccoli','Vitamin C','90000');
INSERT INTO Meal_Contains VALUES ('Broccoli','Calcium','8000');
INSERT INTO Meal_Contains VALUES ('Broccoli','Sodium','0');
INSERT INTO Meal_Contains VALUES ('Broccoli','Potassium','100000');

INSERT INTO Meal_Contains VALUES ('Steak','Protein','25');
INSERT INTO Meal_Contains VALUES ('Steak','Carbohydrate','0');
INSERT INTO Meal_Contains VALUES ('Steak','Fat','19');
INSERT INTO Meal_Contains VALUES ('Steak','Vitamin D','2');
INSERT INTO Meal_Contains VALUES ('Steak','Vitamin C','5000');
INSERT INTO Meal_Contains VALUES ('Steak','Calcium','1000');
INSERT INTO Meal_Contains VALUES ('Steak','Sodium','1000000');
INSERT INTO Meal_Contains VALUES ('Steak','Potassium','300000');

-- More Data
-- Records_Weight --
INSERT INTO Records_Weight VALUES ('1','2020-05-01 12:00:00','175');
INSERT INTO Records_Weight VALUES ('1','2020-05-10 12:00:00','174');
INSERT INTO Records_Weight VALUES ('1','2020-05-12 12:00:00','172');
INSERT INTO Records_Weight VALUES ('1','2020-06-16 12:00:00','178');
INSERT INTO Records_Weight VALUES ('1','2020-06-19 12:00:00','175');
INSERT INTO Records_Weight VALUES ('1','2020-06-24 12:00:00','174');

INSERT INTO Records_Weight VALUES ('2','2020-05-01 09:00:00','188');
INSERT INTO Records_Weight VALUES ('2','2020-05-10 09:00:00','187');
INSERT INTO Records_Weight VALUES ('2','2020-05-12 09:00:00','189');
INSERT INTO Records_Weight VALUES ('2','2020-06-16 09:00:00','190');
INSERT INTO Records_Weight VALUES ('2','2020-06-19 09:00:00','187');
INSERT INTO Records_Weight VALUES ('2','2020-06-24 09:00:00','188');

INSERT INTO Records_Weight VALUES ('3','2020-05-01 11:00:00','115');
INSERT INTO Records_Weight VALUES ('3','2020-05-10 11:00:00','113');
INSERT INTO Records_Weight VALUES ('3','2020-05-12 11:00:00','111');
INSERT INTO Records_Weight VALUES ('3','2020-05-16 11:00:00','114');
INSERT INTO Records_Weight VALUES ('3','2020-05-19 11:00:00','111');
INSERT INTO Records_Weight VALUES ('3','2020-05-24 11:00:00','110');

INSERT INTO Records_Weight VALUES ('4','2020-05-01 08:00:00','121');
INSERT INTO Records_Weight VALUES ('4','2020-05-10 08:00:00','122');
INSERT INTO Records_Weight VALUES ('4','2020-05-12 08:00:00','120');
INSERT INTO Records_Weight VALUES ('4','2020-05-16 08:00:00','119');
INSERT INTO Records_Weight VALUES ('4','2020-05-19 08:00:00','118');
INSERT INTO Records_Weight VALUES ('4','2020-05-24 08:00:00','120');

INSERT INTO Records_Weight VALUES ('5','2020-05-01 12:00:00','143');
INSERT INTO Records_Weight VALUES ('5','2020-05-10 12:00:00','142');
INSERT INTO Records_Weight VALUES ('5','2020-05-12 12:00:00','141');
INSERT INTO Records_Weight VALUES ('5','2020-05-16 12:00:00','139');
INSERT INTO Records_Weight VALUES ('5','2020-05-19 12:00:00','138');
INSERT INTO Records_Weight VALUES ('5','2020-05-24 12:00:00','140');

INSERT INTO Records_Weight VALUES ('6','2020-05-01 11:30:00','100');
INSERT INTO Records_Weight VALUES ('6','2020-05-10 11:30:00','101');
INSERT INTO Records_Weight VALUES ('6','2020-05-12 11:30:00','104');
INSERT INTO Records_Weight VALUES ('6','2020-05-19 11:30:00','99');
INSERT INTO Records_Weight VALUES ('6','2020-05-16 11:30:00','100');
INSERT INTO Records_Weight VALUES ('6','2020-05-24 11:30:00','102');

INSERT INTO Records_Weight VALUES ('7','2020-05-01 12:12:00','187');
INSERT INTO Records_Weight VALUES ('7','2020-05-10 12:12:00','189');
INSERT INTO Records_Weight VALUES ('7','2020-05-12 12:12:00','185');
INSERT INTO Records_Weight VALUES ('7','2020-05-16 12:12:00','186');
INSERT INTO Records_Weight VALUES ('7','2020-05-19 12:12:00','188');
INSERT INTO Records_Weight VALUES ('7','2020-05-24 12:12:00','184');

INSERT INTO Records_Weight VALUES ('8','2020-05-01 12:00:02','190');
INSERT INTO Records_Weight VALUES ('8','2020-05-10 12:00:02','188');
INSERT INTO Records_Weight VALUES ('8','2020-05-12 12:00:02','187');
INSERT INTO Records_Weight VALUES ('8','2020-05-16 12:00:02','189');
INSERT INTO Records_Weight VALUES ('8','2020-05-19 12:00:02','190');
INSERT INTO Records_Weight VALUES ('8','2020-05-28 12:00:02','187');

-- Performs_Workout --

INSERT INTO Performs_Workout VALUES ('1','Bench Press','2020-04-24 12:20:00');
INSERT INTO Performs_Workout VALUES ('1','Shoulder Press','2020-04-24 12:20:00');
INSERT INTO Performs_Workout VALUES ('1','Biking','2020-05-01 12:20:00');
INSERT INTO Performs_Workout VALUES ('1','Pushups','2020-05-05 12:20:00');
INSERT INTO Performs_Workout VALUES ('1','Curls','2020-05-05 12:25:00');
INSERT INTO Performs_Workout VALUES ('1','Squats','2020-05-07 12:20:00');
INSERT INTO Performs_Workout VALUES ('1','Curls','2020-05-08 12:20:00');

INSERT INTO Performs_Workout VALUES ('2','Shoulder Press','2020-04-24 12:20:00');
INSERT INTO Performs_Workout VALUES ('2','Curls','2020-04-24 12:25:00');
INSERT INTO Performs_Workout VALUES ('2','Squats','2020-04-25 12:20:00');
INSERT INTO Performs_Workout VALUES ('2','Pushups','2020-04-25 12:25:00');
INSERT INTO Performs_Workout VALUES ('2','Biking','2020-04-26 12:20:00');
INSERT INTO Performs_Workout VALUES ('2','Bench Press','2020-04-26 12:25:00');
INSERT INTO Performs_Workout VALUES ('2','Squats','2020-04-27 12:20:00');

INSERT INTO Performs_Workout VALUES ('3','Squats','2020-04-24 12:20:00');
INSERT INTO Performs_Workout VALUES ('3','Curls','2020-04-24 12:25:00');
INSERT INTO Performs_Workout VALUES ('3','Shoulder Press','2020-04-26 12:20:00');
INSERT INTO Performs_Workout VALUES ('3','Pushups','2020-04-26 12:25:00');
INSERT INTO Performs_Workout VALUES ('3','Bench Press','2020-04-28 12:20:00');
INSERT INTO Performs_Workout VALUES ('3','Squats','2020-04-28 12:25:00');
INSERT INTO Performs_Workout VALUES ('3','Biking','2020-04-30 12:20:00');

INSERT INTO Performs_Workout VALUES ('4','Bench Press','2020-04-26 12:20:00');
INSERT INTO Performs_Workout VALUES ('4','Biking','2020-04-26 12:25:00');
INSERT INTO Performs_Workout VALUES ('4','Light Running','2020-04-28 12:20:00');
INSERT INTO Performs_Workout VALUES ('4','Curls','2020-04-30 12:20:00');

INSERT INTO Performs_Workout VALUES ('5','Bench Press','2020-04-24 12:20:00');
INSERT INTO Performs_Workout VALUES ('5','Curls','2020-04-24 12:25:00');
INSERT INTO Performs_Workout VALUES ('5','Shoulder Press','2020-04-26 12:20:00');
INSERT INTO Performs_Workout VALUES ('5','Squats','2020-04-26 12:25:00');

INSERT INTO Performs_Workout VALUES ('6','Pushups','2020-04-25 12:20:00');
INSERT INTO Performs_Workout VALUES ('6','Shoulder Press','2020-04-25 12:25:00');
INSERT INTO Performs_Workout VALUES ('6','Curls','2020-04-27 12:20:00');
INSERT INTO Performs_Workout VALUES ('6','Squats','2020-04-27 12:25:00');
INSERT INTO Performs_Workout VALUES ('6','Heavy Running','2020-04-29 12:25:00');

INSERT INTO Performs_Workout VALUES ('7','Shoulder Press','2020-04-24 12:20:00');
INSERT INTO Performs_Workout VALUES ('7','Pushups','2020-04-24 12:25:00');
INSERT INTO Performs_Workout VALUES ('7','Squats','2020-04-26 12:20:00');
INSERT INTO Performs_Workout VALUES ('7','Biking','2020-04-26 12:25:00');
INSERT INTO Performs_Workout VALUES ('7','Curls','2020-04-28 12:20:00');
INSERT INTO Performs_Workout VALUES ('7','Bench Press','2020-04-28 12:25:00');
INSERT INTO Performs_Workout VALUES ('7','Shoulder Press','2020-04-30 12:20:00');

INSERT INTO Performs_Workout VALUES ('8','Shoulder Press','2020-04-25 12:20:00');
INSERT INTO Performs_Workout VALUES ('8','Bench Press','2020-04-25 12:25:00');
INSERT INTO Performs_Workout VALUES ('8','Squats','2020-04-27 12:20:00');
INSERT INTO Performs_Workout VALUES ('8','Curls','2020-04-27 12:25:00');
INSERT INTO Performs_Workout VALUES ('8','Biking','2020-04-29 12:20:00');
INSERT INTO Performs_Workout VALUES ('8','Moderate Running','2020-04-29 12:25:00');
INSERT INTO Performs_Workout VALUES ('8','Shoulder Press','2020-04-30 12:20:00');

-- Fix Meal_Contains Entries --

DELETE FROM Meal_Contains WHERE Amount=0;

-- Consumes_Meal --

INSERT INTO Consumes_Meal VALUES ('1','Pizza','2020-04-24 09:00:00','1');
INSERT INTO Consumes_Meal VALUES ('1','Mashed Potato','2020-04-24 17:00:00','2');
INSERT INTO Consumes_Meal VALUES ('1','Chicken Breast','2020-04-25 09:00:00','3');
INSERT INTO Consumes_Meal VALUES ('1','Steak','2020-04-25 17:00:00','1');
INSERT INTO Consumes_Meal VALUES ('1','Pizza','2020-04-26 09:00:00','3');
INSERT INTO Consumes_Meal VALUES ('1','Broccoli','2020-04-26 17:00:00','1');
INSERT INTO Consumes_Meal VALUES ('1','Pizza','2020-04-27 09:00:00','2');
INSERT INTO Consumes_Meal VALUES ('1','Steak','2020-04-27 17:00:00','1');
INSERT INTO Consumes_Meal VALUES ('1','Mashed Potato','2020-04-28 09:00:00','2');

INSERT INTO Consumes_Meal VALUES ('2','Chicken Breast','2020-04-24 09:00:00','1');
INSERT INTO Consumes_Meal VALUES ('2','Pizza','2020-04-24 17:00:00','2');
INSERT INTO Consumes_Meal VALUES ('2','Steak','2020-04-25 09:00:00','3');
INSERT INTO Consumes_Meal VALUES ('2','Mashed Potato','2020-04-25 17:00:00','1');
INSERT INTO Consumes_Meal VALUES ('2','Broccoli','2020-04-26 09:00:00','3');
INSERT INTO Consumes_Meal VALUES ('2','Steak','2020-04-26 17:00:00','1');
INSERT INTO Consumes_Meal VALUES ('2','Mashed Potato','2020-04-27 09:00:00','2');
INSERT INTO Consumes_Meal VALUES ('2','Pizza','2020-04-27 17:00:00','1');
INSERT INTO Consumes_Meal VALUES ('2','Broccoli','2020-04-28 09:00:00','2');

INSERT INTO Consumes_Meal VALUES ('3','Pizza','2020-04-24 09:00:00','1');
INSERT INTO Consumes_Meal VALUES ('3','Steak','2020-04-24 17:00:00','2');
INSERT INTO Consumes_Meal VALUES ('3','Chicken Breast','2020-04-25 09:00:00','3');
INSERT INTO Consumes_Meal VALUES ('3','Mashed Potato','2020-04-25 17:00:00','1');
INSERT INTO Consumes_Meal VALUES ('3','Broccoli','2020-04-26 09:00:00','3');
INSERT INTO Consumes_Meal VALUES ('3','Steak','2020-04-26 17:00:00','1');
INSERT INTO Consumes_Meal VALUES ('3','Pizza','2020-04-27 09:00:00','2');
INSERT INTO Consumes_Meal VALUES ('3','Steak','2020-04-27 17:00:00','1');
INSERT INTO Consumes_Meal VALUES ('3','Steak','2020-04-28 09:00:00','2');

INSERT INTO Consumes_Meal VALUES ('4','Steak','2020-04-24 09:00:00','1');
INSERT INTO Consumes_Meal VALUES ('4','Broccoli','2020-04-24 17:00:00','2');
INSERT INTO Consumes_Meal VALUES ('4','Steak','2020-04-25 09:00:00','3');
INSERT INTO Consumes_Meal VALUES ('4','Broccoli','2020-04-25 17:00:00','1');
INSERT INTO Consumes_Meal VALUES ('4','Steak','2020-04-26 09:00:00','3');
INSERT INTO Consumes_Meal VALUES ('4','Broccoli','2020-04-26 17:00:00','1');
INSERT INTO Consumes_Meal VALUES ('4','Mashed Potato','2020-04-27 09:00:00','2');
INSERT INTO Consumes_Meal VALUES ('4','Broccoli','2020-04-27 17:00:00','1');
INSERT INTO Consumes_Meal VALUES ('4','Broccoli','2020-04-28 09:00:00','7');

INSERT INTO Consumes_Meal VALUES ('5','Steak','2020-04-24 09:00:00','1');
INSERT INTO Consumes_Meal VALUES ('5','Pizza','2020-04-24 17:00:00','2');
INSERT INTO Consumes_Meal VALUES ('5','Mashed Potato','2020-04-25 09:00:00','3');
INSERT INTO Consumes_Meal VALUES ('5','Chicken Breast','2020-04-25 17:00:00','1');
INSERT INTO Consumes_Meal VALUES ('5','Pizza','2020-04-26 09:00:00','3');
INSERT INTO Consumes_Meal VALUES ('5','Broccoli','2020-04-26 17:00:00','1');
INSERT INTO Consumes_Meal VALUES ('5','Chicken Breast','2020-04-27 09:00:00','2');
INSERT INTO Consumes_Meal VALUES ('5','Steak','2020-04-27 17:00:00','1');
INSERT INTO Consumes_Meal VALUES ('5','Pizza','2020-04-28 09:00:00','2');

INSERT INTO Consumes_Meal VALUES ('6','Broccoli','2020-04-24 09:00:00','1');
INSERT INTO Consumes_Meal VALUES ('6','Steak','2020-04-24 17:00:00','2');
INSERT INTO Consumes_Meal VALUES ('6','Pizza','2020-04-25 09:00:00','3');
INSERT INTO Consumes_Meal VALUES ('6','Chicken Breast','2020-04-25 17:00:00','1');
INSERT INTO Consumes_Meal VALUES ('6','Pizza','2020-04-26 09:00:00','3');
INSERT INTO Consumes_Meal VALUES ('6','Mashed Potato','2020-04-26 17:00:00','1');
INSERT INTO Consumes_Meal VALUES ('6','Steak','2020-04-27 09:00:00','2');
INSERT INTO Consumes_Meal VALUES ('6','Broccoli','2020-04-27 17:00:00','1');
INSERT INTO Consumes_Meal VALUES ('6','Pizza','2020-04-28 09:00:00','2');

INSERT INTO Consumes_Meal VALUES ('7','Steak','2020-04-24 09:00:00','1');
INSERT INTO Consumes_Meal VALUES ('7','Mashed Potato','2020-04-24 17:00:00','2');
INSERT INTO Consumes_Meal VALUES ('7','Steak','2020-04-25 09:00:00','3');
INSERT INTO Consumes_Meal VALUES ('7','Mashed Potato','2020-04-25 17:00:00','1');
INSERT INTO Consumes_Meal VALUES ('7','Broccoli','2020-04-26 09:00:00','3');
INSERT INTO Consumes_Meal VALUES ('7','Pizza','2020-04-26 17:00:00','1');
INSERT INTO Consumes_Meal VALUES ('7','Steak','2020-04-27 09:00:00','2');
INSERT INTO Consumes_Meal VALUES ('7','Chicken Breast','2020-04-27 17:00:00','1');
INSERT INTO Consumes_Meal VALUES ('7','Broccoli','2020-04-28 09:00:00','2');

INSERT INTO Consumes_Meal VALUES ('8','Chicken Breast','2020-04-24 09:00:00','1');
INSERT INTO Consumes_Meal VALUES ('8','Steak','2020-04-24 17:00:00','2');
INSERT INTO Consumes_Meal VALUES ('8','Pizza','2020-04-25 09:00:00','3');
INSERT INTO Consumes_Meal VALUES ('8','Mashed Potato','2020-04-25 17:00:00','1');
INSERT INTO Consumes_Meal VALUES ('8','Broccoli','2020-04-26 09:00:00','3');
INSERT INTO Consumes_Meal VALUES ('8','Steak','2020-04-26 17:00:00','1');
INSERT INTO Consumes_Meal VALUES ('8','Mashed Potato','2020-04-27 09:00:00','2');
INSERT INTO Consumes_Meal VALUES ('8','Broccoli','2020-04-27 17:00:00','1');
INSERT INTO Consumes_Meal VALUES ('8','Pizza','2020-04-28 09:00:00','2');











