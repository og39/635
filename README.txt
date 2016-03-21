README

To start:

use file 'userinterface.php'

the format for commands is:

userinterface.php -u <user id> -p <password> -c <command arguements...>


Available Commands:

1. 'addUser'

    userinterface.php -u <user id> -p <password> -c addUser <first name> <last name> <phone number> <account type>
  
    Phone number format:########## (only digits)
    Account Type is either 'user' or 'trainer' (lowercase)

2. 'updatePassword'

    userinterface.php -u <user id> -p <old password> -c updatePassword <new password>

3. 'createRoutine'

    ***Only trainers can create routines ***
  
    userinterface.php -u <user id> -p <password> -c createRoutine <routine name>

4.  'deleteRoutine'
    
    ***Only trainers can delete routines ***
  
    userinterface.php -u <user id> -p <password> -c deleteRoutine <routine name>

5. 'trainerReport

    ***Only trainers can view this report ***
  
    userinterface.php -u <user id> -p <password> -c trainerReport <routine name>
    
6. 'progressReport'
  
    userinterface.php -u <user id> -p <password> -c progressReport <routine name> 

7. 'addSet'
  
    userinterface.php -u <user id> -p <password> -c addSet <routine name> <date> <Exercise> <Set Number> <Weight> <Reps> <Body Part>
    
    Date format: YYYY-MM-DD
    
    