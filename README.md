# Advance-Internet-Programming Project Spring 2017
- 12634123

# Assessment Item
You will work in groups of up to three developers to design and develop a web application. Using a web development technology of your choice (subject to conditions that will be explained in Week 2), you will develop a website with a range of sophisticated functionality that includes secure login and the ability to manage data and an administrative roles. The assignment and final demonstrations are due at the start of the final laboratory session of the session (i.e., Week 12, starting 16 October). 

Your application will need to have the following features:
⊿ Sign up
⊿ Login
⊿ Ability to create, view, search, edit and delete/hide information
⊿ Logout
⊿ Have useful warning messages if the user enters invalid input
⊿ Administration zone that allows administrators to perform additional actions not available to ordinary users
⊿ Email-based password reset feature
⊿ Integration with a public web service
⊿ Exposes a useful RESTful API
⊿ Deployed on the public internet using a cloud host (e.g., Amazon, Google Cloud, Azure)

The information can represent anything that your group agrees on. During the laboratory session in Week 3, you will decide for yourself what user you are developing for, what purpose your website will serve and what your application will do. You will not be assessed on the quality of the idea. The idea does not have to be ‘good’ so long as you implement it well (i.e., using patterns and principles covered in this subject). Your application must also satisfy the following non-functional requirements:
⊿ Your application must incorporate appropriate ‘AJAX’ interactions (i.e., parts of your pages should update without requiring a full page reload)
⊿ Your application must be able to support multiple concurrent users (i.e., you should not have data loss if two people are accessing the application at the same time)
⊿ You should use modern frameworks and design patterns for code running on the client (i.e., the browser) and the server
⊿ You must store data in a database (for example, an SQL database such as MySQL or a ‘NoSQL’ database such as MongoDB)
⊿ Your application must be secure
⊿ You must not store unencrypted passwords
⊿ You must use an authentication framework that is appropriate for your chosen web development technology (i.e., do not write your own authentication code)
⊿ Your code must be well documented: good README files, clear commit messages, explanatory documentation on any non-trivial methods, clear variable names, self-documenting code, good formatting, appropriate use of coding conventions
⊿ You must use git to track your changes and you must regularly push your commits to a public repository so that your tutor and classmates can see your work 

You are not permitted to use the Microsoft .NET framework (UTS offers other subjects in Enterprise .NET).

Costs
BitBucket, Github and Gitlab all provide free hosting for public projects. Please use trial periods and free non-commercial licenses when integrating with commercial services. Reimbursement or financial support will NOT be provided if you choose to use paid plans or services that cost money. Please be very careful when deploying your application. Many cloud hosting providers provide free levels of service suitable for deploying your application. These free services should be used for this assignment. Please be careful when deploying instances as running additional instances can quickly result in a large bill.

Submission
Your assignment will be demonstrated to your tutor and (some) of your classmates during the final lab session. You will demonstrate the functionality as well as the source code. You will have an opportunity to discuss your assignment and your mark with your tutor. 

Before you demonstrate your system, you should thoroughly test your system:
⊿ Attempt to log in with an incorrect password
⊿ Enter invalid data and check that validation works on all fields
⊿ Check that you can log out
⊿ Attempt to access secure pages without logging in

Assessment Criteria
This assessment is worth 40% of your final grade. You will be receiving feedback and guidance throughout the semester. Preparation activities and in-class activities for Assessment 1 will be related to this Assessment and will, at many times, directly incorporate work that you have produced as part of this assessment. The final submission of your project will be assessed according to the following 

# Project files
```

assets/
storing css,js,json

Config/
routes.php

Controllers
cUser.php

Models/
mUser.php

Views/
vUser.php
vUserList.php

```

# Key Principles

* DRY - Don’t repeat yourself - Many programming constructs exist solely for that purpose (e.g. loops, functions, classes, and more).

* Abstraction Principle - Related to DRY is the abstraction principle “Each significant piece of functionality in a program should be implemented in just one place in the source code.

* KISS (Keep it simple, stupid!) - Simplicity (and avoiding complexity) should always be a key goal. Simple code takes less time to write, has fewer bugs, and is easier to modify.

* Avoid Creating a YAGNI (You aren’t going to need it) - You should try not to add functionality until you need it.

* Do the simplest thing that could possibly work -  “What is the simplest thing that could possibly work?”

* Don’t make me think - The point is that code should be easily read and understood with a minimum of effort required. If code requires too much thinking from an observer to understand, then it can probably stand to be simplified.

* Open/Closed Principle - Software entities (classes, modules, functions, etc.) should be open for extension, but closed for modification. In other words, don't write classes that people can modify, write classes that people can extend.

* Single Responsibility Principle - A component of code (e.g. class or function) should perform a single well defined task.

* Maximize Cohesion - Code that has similar functionality should be found within the same component.

* Avoid Premature Optimization - Don’t even think about optimization unless your code is working, but slower than you want. Only then should you start thinking about optimizing, and then only with the aid of empirical data. "We should forget about small efficiencies, say about 97% of the time: premature optimization is the root of all evil" - Donald Knuth.

*	Code Reuse is Good - Not very pithy, but as good a principle as any other. Reusing code improves code reliability and decrease development time.

*	Separation of Concerns - Different areas of functionality should be managed by distinct and minimally overlapping modules of code.

* Law of Demeter - Code components should only communicate with their direct relations (e.g. classes that they inherit from, objects that they contain, objects passed by argument, etc.)

* Write Code for the Maintainer - Almost any code that is worth writing is worth maintaining in the future, either by you or by someone else. The future you who has to maintain code often remembers as much of the code, as a complete stranger, so you might as well always write for someone else. A memorable way to remember this is “Always code as if the person who ends up maintaining your code is a violent psychopath who knows where you live.”

* Principle of least astonishment - The principle of least astonishment is usually referenced in regards to the user interface, but the same principle applies to written code. Code should surprise the reader as little as possible. The means following standard conventions, code should do what the comments and name suggest, and potentially surprising side effects should be avoided as much as possible.

###
