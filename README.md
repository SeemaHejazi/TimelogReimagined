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

<strong>*Questions :*</strong>  <br>
*How did you approach this challenge?*   <br>
&nbsp;&nbsp;&nbsp;I began by trying to put myself in a real situation where I might be an administrator at HiMama, an administrator at a daycare or a teacher at a daycare. Given those roles, I imagined what the day-to-day scenarios might be like.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
- As a teacher: I would need a very quick and simple way to clock in and clock out without worrying about too many details, and taking too much time out of my day. <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
- As a daycare administrator: I would like to see (/create and edit) all the teachers at my daycare, as well as see all of their timelogs.  <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
- As a HiMama administrator: I would like to see all the timelogs, by all the teachers, at all of the daycares.  <br>
<br>

I then started thinking about the CRUD functionality for each user, centre and timelog entry, answering questions such as:    
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
- How are users created: anyone can create their own accounts, or admin can create accounts for them.  <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
- How are teachers assigned to centres: at registration, they can select their daycare, or an admin can assign them. <br>  
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
- How are centres created: admins can create them.  <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
- How is a clock-in entry created: using the teachers username, associated centre and current time, an entry is created with only an ‘in time’.  <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
- What if they are already clocked-in: clock them out before clocking them in again.  <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
- How is a clock-out entry created: check if an entry for this teacher has been created with a valid in time where 'out time’ is null. Update it with the current time as 'out time' and the total.   <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
- What if they were not clocked in yet: Error message telling them they either haven’t clocked in, or they are trying to clock-in instead of out. 
   
<br>
<br>
    
*What schema design did you choose and why?* <br>
    *Please see the tables structure below.*
<br>
&nbsp;&nbsp;&nbsp;
    I decided to separate the data into 5 tables: Users, roles, centres, user_centres (join table) and entries. I chose to keep the users and the entries in separate tables to allow for other relations to be made with users, such as the roles and user centres. The roles were done as a 'User-many-one->Role', so a user can have 1 role, but each role belongs to many users. Conversely, the User to Centre relationship is a Many-to-Many one, because a user (teacher) could work in one or more centres (if they're a substitute), and each centre has many teachers assigned to it.
<br>
&nbsp;&nbsp;&nbsp;
    I decided to store the timestamps for entries as unix timestamps to be consider the clock-in and clock-out times of teachers in their own timezones.   
 
<br>   
      
*If you were given another day to work on this, how would you spend it? What if you were
given a month?*   
<br>    
    *Please also see the 'Functionality To Come in due time' section below.* 
    <br>   
&nbsp;&nbsp;&nbsp;
If given another day to work on this I would add more functionality to the user and centre controllers. I would want the ability to update a centre’s address, name or timezone, or to delete the centre all together. I would also like to allow users to update their personal information such as usernames, or change their passwords. This would be quite similar to how we currently deal with the existing models, it’s simply a matter of adding the front end functionality. 
<br>   
&nbsp;&nbsp;&nbsp; 
If given a month, I would like to add functionality to the whole system, starting with location data. If we know what location the teacher is clocking in from, we can cover the need to block teachers from clocking in at centres to which they aren’t necessarily pre-assigned. Additionally, I would add statistics based on teachers working hours, adding the ability for an admin to search for a teacher and filter their hours worked by day, month or year. I would include specifics about their average starting time, ending time and hours worked.
<br>
<br>
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
        - Delete entries (maybe someone made a mistake?)

 

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

 
  
  
