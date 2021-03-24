USE z1875089;

-- main tables --

CREATE TABLE Accounts(
    A_ID int PRIMARY KEY AUTO_INCREMENT,
    First_Name char(255) NOT NULL
);

CREATE TABLE Workouts(
    Exercise char(32) PRIMARY KEY,
    Intensity int(255) NOT NULL,
    Duration int(255) NOT NULL
);

CREATE TABLE Meals(
    Food char(32) PRIMARY KEY,
    Calories int(255) NOT NULL,
    Serving_Size int(255) NOT NULL
);

CREATE TABLE Nutrients(
    Nutrient char(32) NOT NULL,
    Type char(32) NOT NULL,
    Recommended_Amount int(255) NOT NULL,
    PRIMARY KEY(Nutrient, Type)
);

CREATE TABLE Conversions(
    Unit char(32) PRIMARY KEY,
    Converting_To char(255) NOT NULL,
    Conversion int(255) NOT NULL
);


-- relationship tables --

CREATE TABLE Records_Weight(
    A_ID int NOT NULL,
    Date_Time datetime NOT NULL,
    Pounds int(255) NOT NULL,
    PRIMARY KEY(A_ID, Date_Time),
    FOREIGN KEY (A_ID) REFERENCES Accounts(A_ID)
);

CREATE TABLE Performs_Workout(
    A_ID int NOT NULL,
    Exercise char(32) NOT NULL,
    Date_Time datetime NOT NULL,
    PRIMARY KEY (A_ID, Exercise, Date_Time),
    FOREIGN KEY (A_ID) REFERENCES Accounts(A_ID),
    FOREIGN KEY (Exercise) REFERENCES Workouts(Exercise)
);

CREATE TABLE Consumes_Meal(
    A_ID int NOT NULL,
    Food char(32) NOT NULL,
    Date_Time datetime NOT NULL,
    Servings_Consumed int(255) NOT NULL,
    PRIMARY KEY (A_ID, Food, Date_Time),
    FOREIGN KEY (A_ID) REFERENCES Accounts(A_ID),
    FOREIGN KEY (Food) REFERENCES Meals(Food)
);

CREATE TABLE Converts_To(
    Food char(32) NOT NULL,
    Unit char(32) NOT NULL,
    PRIMARY KEY (Food, Unit),
    FOREIGN KEY (Food) REFERENCES Meals(Food),
    FOREIGN KEY (Unit) REFERENCES Conversions(Unit)
);

CREATE TABLE Meal_Contains(
    Food char(32) NOT NULL,
    Nutrient char(32) NOT NULL,
    Amount int(255) NOT NULL,
    PRIMARY KEY (Food, Nutrient),
    FOREIGN KEY (Food) REFERENCES Meals(Food),
    FOREIGN KEY (Nutrient) REFERENCES Nutrients(Nutrient)
);