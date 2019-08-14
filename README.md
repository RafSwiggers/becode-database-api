# BeCode Database API!

Ladies and gents, welcome to our latest little bit of growth. Today, we learn to build the backstage, the place behind the curtain. Today, we learn to make the magic happen!

## Summary
The goal of this exercise is to build the API and Database that would be behind a note-taking app. We're building a simple database and writing the PHP code that will manipulate that database, based on requests made by a user. It should react to GET and POST requests.

## Why?
As we progress, it's important to know what happens when we call an API. It's also important to be able to actually build an access point for other programs and websites. 

## How?
I used MAMP to create a local server, and to access and use the MYSQL. I used ARC to simulate the POST requests. The PHP is mostly divided into simple IF/ELSE statements to determine what type of SQL request is sent when.

### Create
To create, have the title of the new note as a GET request, the content as a POST. Title should be named Title, content should be named content.

### Read
To read, make a GET request with the "show" paramater.

### Update
To update a note, follow the same method as the Create. Rather than a "content", send an "update" POST request. 

### Delete
To delete a note, enter a GET query with the title of the note you wish to delete.

## What happened?
This happened! Run the initial SQL to set up the database, then adjust the PHP to the correct location, username and password. You should then be able to Create Read Update and Delete.
