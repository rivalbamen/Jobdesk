# HPTeam

Here the member :

1. [Rival] (https://github.com/rivalbamen)
2. [Surya] (https://github.com/adhisurya)
3. [Putri] (https://github.com/chiput) 
4. [Mirza] (https://github.com/kajhie)
5. [Wawan] (https://github.com/WawanAndiika)

#Resource Learning

1. [PHP For Beginner] (http://www.w3schools.com/php/default.asp)
2. Code's Rule 
	- [Coding Standard] (http://www.php-fig.org/psr/psr-1/)
	- [Coding Style Guide] (http://www.php-fig.org/psr/psr-2/)
	- [Auto Loader] (http://www.php-fig.org/psr/psr-4/)
3. [Belajar JavaScript] (http://www.duniailkom.com/tutorial-belajar-javascript-dasar-untuk-pemula/)
4. [Basic Slim] (https://www.codecourse.com/lessons/learn-slim-3)
5. [Slim Controller Dependency Injection] (https://www.codecourse.com/lessons/slim-3-controllers-dependency-injection)
6. [Basic Elloquent Database] (https://laravel.com/docs/5.2/eloquent)


#Basic Code

1. Fork https://github.com/rivalbamen/taskmanager.git
2. Do this bash

 ```bash
    > git clone https://github.com/[username]/taskmanager.git
	> cd taskmanager/
	> git init
	> git config --global user.name "[username]"
	> git config --global user.email "[your@email.com]"
    > git remote set-url origin https://github.com/[username]/taskmanager.git
    > git remote add upstream https://github.com/blidodi/taskmanager.git
    > git remote -v 
	> mkdir [username]
	> touch [username]/README.md
	> git status
	> git add [username]
	> git add [username]/README.md
	> git commit -am "Add new directory [username]"
	> git push origin master
 ```

3. Update Workflow
    - do git push to your repository
    - create pull request
    - after succeed do this bash

```bash
    > git fetch upstream
    > git merge upstream/master
 ```