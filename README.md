# Advance-Internet-Programming Project Spring 2017
- 12634123

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
