# RankerHack
Akshat Patel, Michael Pascale, Selwyn-Grace Foster Assignment 3: Software Engineering Professor Kees Leune.

This project fulfills the requirements for assignment 3. In order to access the website, you can navigate to the following link
  http://compsci.adelphi.edu/~michaelpascale/csc-440/Assignment-3-Collaborative-Software-Development/src/login.php
                      -or-
  http://compsci.adelphi.edu/~akshatpatel/Testing/Assignment-3-Collaborative-Software-Development/src/

You can log in using the credentials guest as username, and softwareengineer as the password. That will give you access as a participant.

Other accounts are at the discresion of the admin.

## Introduction

In this assignment, we will design and (partially) implement a system that allows organizers to post, update and remove "challenges". Participants can view challenges and attempt to solve them. Administrators can add/remove users (organizers and participants).

User stories are included below.


## User Stories
User Stories


As a ...	    |   I would like to...	               								 | So that...


organizer	 |  post a challenge with its solution	 							 | participants can solve them


organizer	 |  see how many participants have attempted to solve my challenges  | I can figure out how hard they are


organizer 	 |  remove challenges  												 | nobody can submit solutions


participant  |  browse challenges before I attempt them 					     | I determine which ones I want try


participant	 |  would like to submit my solution 	 							 | I can see if my solution is correct


participant  |  be able to see the expected outcome before I submit my results 	 | I can understand the problem better 


admin	     |  add and remove new users 										 | people can use my system


admin	     |  see all problems, outcomes and solutions 						 | analyze how people use my system


## Login Page
![Screenshot](https://github.com/AKSHAT3272/Assignment-3-Collaborative-Software-Development/blob/master/Screenshots/login.png)

Once logged in the navbar loads up dynamically based on user roles i.e., Admin, Organizer and Participants. One user can have multiple roles

## Navbar

![Screenshot](https://github.com/AKSHAT3272/Assignment-3-Collaborative-Software-Development/blob/master/Screenshots/Navbar.png)

## Organizer

A organizer can add challenges and look at progress on particular challenges
![Screenshot](https://github.com/AKSHAT3272/Assignment-3-Collaborative-Software-Development/blob/master/Screenshots/Organizer.png)

## Admin

A admin can add or remove users and assign roles to users
![Screenshot](https://github.com/AKSHAT3272/Assignment-3-Collaborative-Software-Development/blob/master/Screenshots/Admin.png)

## Participant

A Participant can solve challenges posted by organizers
![Screenshot](https://github.com/AKSHAT3272/Assignment-3-Collaborative-Software-Development/blob/master/Screenshots/Participant.png)
