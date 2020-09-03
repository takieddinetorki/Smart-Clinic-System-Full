# Smart-Clinic-System-Full
 
# Latest Updates from Front-end

:warning: **Sidebar Location Changed** Please read the following

## Commit name : Sidebar made Global:

## First---------------------------------->

Created a new file "sidebar.php" which contacins the code for the sidebar.
This file is nowincluded in every page just after the navbar.
Every page is calling a function "sidebarActivelink" which is defined in layout.js file.
The function takes id of the page as the parameter to add the "nav-active" class for that page in sidebar

```
function sidebarActivelink(id){
    var element = document.getElementById(id);
    element.classList.add("nav-active");
}
```
## Why?

Making the SideBar Global makes the HTML code a little cleaner

## Second------------------------------------>

The list of all the countries in the dropdown of the Personal-info page is made global and the file "countries.php" is included in the page.

## Why?

This will make any further use of Countries dropdown a bit easier
