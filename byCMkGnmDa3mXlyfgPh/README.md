# Latest Updates

:warning: **SUBMISSION CHANGE** Please read the following

## Login submission:

I have seperated the form from the logic. The logic is in login.php and the form is in login_form.php (we can change names later). Here's the code:

```
<?php
if (isset($_POST)) {
?>
  <script>
      let form = document.getElementById("login");
      form.addEventListener('submit', (e) => {
        e.preventDefault();
        form.action = "<?php echo '/smartClinicSystem/smart-clinic-web-application-backend/login_module/login.php' ?>";
        form.submit();
      });
  </script>
<?php
}
?>
```

What I did was check if the form is submitted. If it is then the script will get fired. What the script does is basically prevent the form being submitted adds an action attribute then submits it with the action attribute specified which will let us hide the directories of our backend. This is a test version.

## Why?

Since we have this method now we can seperate the front end from the backend. The backend right now can have encrypted names and should be put inside a folder whose name is encrypted (unguessable by tools like gobuster).


## Data sanitizing
escape function is now merged into the Input::get() method
## Fixed the log issue now it should be complete
>>>>>>> 28d3c1c93d1fba8bbdb676fa97be88c3b68c8507
>>>>>>> e0d36f0090e39e713f365324b10d10d802dc2b7d:smart-clinic-web-application-backend/README.md

# Major change to the directory structure

:warning: **SECURITY FLAWS** Please look out for security flaws and report them when necessary

:warning: **PLEASE LOOK OUT FOR THIS**: The globel file contains the \_\_DIR\_\_which is defined as \_\_ROOT\_\_ it returns the root directory. Please do change the host and the project name in the core/init.php file for this project to work.

:warning: **FOR UBUNTU\UNIX USERS PLEASE LOOK OUT**: You need to give permissions to actually be able to create the directory. The most suitable permission is 700 chmod 700 /path/to/the/directory. If permission 700 doesn't work use 777
