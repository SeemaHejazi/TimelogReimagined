# The Challenge: Timelog Reimagined

When a teacher arrives to work, they clock-in, when leave they clock-out, and the platform keeps track of the time worked. 
Using an MVC framework, build a very basic MVP of a clock in/out application, using traditional CRUD methods.

I chose to use Laravel 5.8, along with Docker.
The two ways this can be tested is via the site:  
        http://timelog.seemahejazi.com  (Redirects to ip...)
        
or locally, if you feel inclined to clone the repo, install docker, and run docker-compose.

Feel free to use to view current data:   
<strong> 
username: SuperAdmin   
password: secret
</strong>      
*or any of the other users seen in the screenshot (passwords are all 'secret')*

<strong>Tables include:</strong> 

*Users:*
  - username                    --ex: snorbury
  - first_name                  --ex: Sharon
  - last_name                   --ex: Norbury
  - email                       --ex: snorbury@northshore.com
  - password (bcrypt)             
  - role_id (FK: Role Table)    --ex: 3 -> 'teacher'
  
*Roles:* . 
  - id
  - name          -- super-admin (us), admin (daycare administrators), teacher.
  
*Centres:*  (refering to daycare centres) . 
  - id
  - centre_name   --ex: North Shore Daycare
  - location      --ex: 123 Evanston St, Evanston, Illinois
  - timezone      --ex: America/Chicago
    
*User_Centres:* (many-many relationship between staff and centres *special consideration for substitute teachers maybe*)  
  - user_id (FK: User)
  - centre_id (FK: Centre)
    
*Entries:*
  - id
  - user_id   (FK: User)
  - centre_id (FK: Centre)
  - in_time   (bigInt: Unix timestamp secs)   -- consideration for managing centres across the country... or WORLD 
  - out_time  (bigInt: Unix timestamp secs)
  - total     (bigInt: total time worked in secs)
    
<strong>*Functionality Included:*</strong>  

  *User:*  
    - Create a user > self or by admin   
    - Show users (Admin can see all the teachers from their centres, SuperAdmin see ALL)
    
  *Centre:*  
    - Create a centre   
    - Show centres (Admin can see assigned ones, SuperAdmin see ALL)
    
  *User_Centre:*  
    - Create a relationship user<->centre  
    - Show relationships user<->centre --view by admin  
    - Update relationships (adding and removing some)  
    - Deleting relationships
    
  *Entries:*  
    - Clock-in: Create a new entry  
    - Clock-out: Update existing entry with an out_time  
    - Show entries: Teacher can view all their own, Admin can see all the entries by teachers from their centre, SuperAdmin see ALL.

<strong>*Functionality To Come in due time:*</strong>  
  *User:*  
        - Update / Delete User   
  *Centre:*   
        - Update / Delete Centre   
  *Entries:*   
        - Delete entries (maybe someone mistakes?)

 

  <strong>*Assumptions:*</strong>  
  - Teachers might have the same name: unique usernames.   
  - Subs exist and sometimes go to different daycares, so we should know where they were working that day: centres/user relation.  
  - Centre Admin might wanna see all their staff data, but not necessarily that of other daycare staff.   
  - Daycares might be in different timezones, we probably want to know what time they came in, in their own timezone.   
  
  Enjoy! some screenshots:  

![Login](https://user-images.githubusercontent.com/10931672/65635154-c5a87a80-dfad-11e9-8fdc-e686e32902e6.png)
![Register](https://user-images.githubusercontent.com/10931672/65635202-deb12b80-dfad-11e9-8061-5b0ce64a4dfb.png)
![Admin-dash](https://user-images.githubusercontent.com/10931672/65635242-f38dbf00-dfad-11e9-973d-d2eab83894bd.png)
![1-new_user](https://user-images.githubusercontent.com/10931672/65635313-14eeab00-dfae-11e9-88a0-c82b46b5d2bd.png)
![2-new-user](https://user-images.githubusercontent.com/10931672/65635314-15874180-dfae-11e9-8df9-7c13df3553f3.png)
![3-show_user](https://user-images.githubusercontent.com/10931672/65635316-15874180-dfae-11e9-9d43-18353bef63ae.png)

 
  
  
