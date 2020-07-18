# README

# Changes **_Tech_** have made today

## IDs

I have changed how every ID is generated
1- I have removed generateClinicID() method and I have added clinic option inside the generateID switch
2- I have fixed some errors inside the ID class. Read the comments to learn more.

## New classes:

- Adding a new class to the classes folder called System.php. Read the description in the file to learn more

## Additional information:

- If you check the clinicRegistration.php file you will see that there is a newly added directory. Read the comments for more information

Changed the following:

```
 if ($values == 0)
                return $values;
            else echo "Empty medecines <br />";
```

:warning: **PLEASE LOOK OUT FOR THIS**: The globel file contains the \_\_DIR\_\_which is defined as \_\_ROOT\_\_ it returns the root directory. Please do change the host and the project name in the core/init.php file for this project to work.

:warning: **FOR UBUNTU\UNIX USERS PLEASE LOOK OUT**: You need to give permissions to actually be able to create the directory. The most suitable permission is 700 chmod 700 /path/to/the/directory. If permission 700 doesn't work use 777
