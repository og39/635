drop user 'WorkoutAdmin'@'localhost';
create user 'WorkoutAdmin'@'localhost' identified by "midterm";
grant all privileges on Workouts.* to 'WorkoutAdmin'@'localhost';
flush privileges;
