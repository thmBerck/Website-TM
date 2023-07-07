This is the folder for the Laravel project.


Temporary sources bank:
https://app.pluralsight.com/library/courses/laravel-9-fundamentals/table-of-contents (To refresh my memory on the Laravel topic. I also learned some core principles and best-practices here that I have used in my project.)
https://canvas.ehb.be/courses/30473/modules (To refresh my memory on the Laravel topic.)
https://chat.openai.com (For CSS)

CSRF toevoegen met @csrf.
Input validation
  $request -> validate(
    'title'=> ['required', 'min:10']
  )



Assignment:
Content

For this project you will have to build a website using Laravel. To clarify: we are talking about a dynamic website, so one that will store and read data dynamically from a database to persistently save information. A static page will not suffice!

It is not allowed to just copy/paste an online tutorial to finish this project, but you are allowed to use them as a basis for your own website if you:
- understand the code you are using and can explain what it does in your own words
- you correctly cite your sources

 

You are free to choose the type of website that you build, for example for the small business of your parents, a local sports club, music festival, video game, ... As long as the website meets the standards described in this assignment.
Functional minimum requirements

As the name indicates, these requirements are the minimum features that need to be present in your website.

You have an informative website with at least the following data driven features:

    Login system
        Users can log in
        Visitors can create a new account
        Users may or may not be an administrator
        Only an administrator can promote another user to administrator status (or create a new user that is an admin)
    Profile pagina
        Each user has their own publicly available profile page
        A user can edit their own user data
        The information shown is at least
            Username
            Birthday
            Avatar (that can be uploaded and saved on the webserver)
            Short 'about me' biography 
    Latest news
        Admins can add, edit, and delete news items
        Every visitor of the website can view the news posts
        These news items have at least the following:
            Title
            Cover image
            Content
            Publishing date
    FAQ page
        There is a list of questions and answers, grouped by categories
        Admins can add, edit, and delete FAQ categories
        Admins can add, edit, and delete FAQ question and answer pairs
        Every visitor of the website can view the FAQ page(s)
    Contact page
        Visitors can fill out a contact form
        The content of submitted forms will be sent to the administrators

Extra requirements

If you perfectly implement every single minimal requirement you will get a passing grade for the project. If you wish to excel in your result, you can add extra features to your website. Below you can find a list of example features you can add:

    Admins can reply to the submitted contact forms through the admin panel, the replies will be mailed to the original sender
    Users can leave comments on news posts
    Users can pose questions that might be added to the FAQ
    Admins can add answers to the posed FAQ questions through the admin panel
    Basic forum: Users can create threads, other users can leave replies
    Online ordering: A customer can (with or without being logged in) place an order for the products available on the website
    ...

Don't just add features for the sake of adding features. If you are making a website for your parents' butcher shop it's a lot more logical to add online ordering than it is to add a forum. If you're unsure about how good a feature might be, feel free to ask the teacher.
Technical requirements

Aside from the functional requirements, there are a few guidelines for the technical aspect of the project as well:

    Views
        You will at least have an "about" page. This is a static view that will serve as your Readme/list of sources. Cite any resources that you've used in this page, as well as a link to those pages. This page is mandatory, if your about page does not exist, you will not be able to pass for this project.
        Use at least 2 layouts (think about maybe splitting up the 'public' website and the admin panel)
        Use partials where logical
        Use the techniques we've seen during the exercises:
            Control structures
            XSS protection
            CSRF protection
            Client-side validation
    Routes
        All routes use controller methods
        All routes use logical middleware
        If possible, group the routes where needed
    Controller
        Use several controllers to split your logic
        Think back to resource controllers for CRUD operations
    Models
        Use Eloquent models
        Add relationships where needed
            At least 1 one-to-many
            At least 1 many-to-many 
    Database
        Your database needs to be created using migration files 
        Add seeders to have some "dummy" data
        I will run "php artisan migrate:fresh --seed" on every project. After running this your website should be usable for me
    Authentication
        Default functionality for authentication
            Log in/out
            'Remember me'
            Register
            Forgot password
            Change password
        Add 1 default admin with a seeder
            Username: admin
            Email: admin@ehb.be
            Password: Password!321
    Theming/styles
        Provide some default styling for your website. Even though design is not a core competence of this course, I expect a minimum. If you are not good at design, use something like Bootstrap and pick a free theme from a website such as https://startbootstrap.com/ 

        Links to an external site.

GIT

The use of git is required. Remember to commit often and to add logical commit messages. This allows me to follow along with your progress, but it also provides you with a fallback when something does go wrong with your code.

Important: add the 'vendor' folder to your .gitignore file.

Add a link to your GitHub repo for this project to your "about" page.
Submitting

Aside from the GitHub repo, you'll also have to submit a .zip of your project on Canvas. You name your file: bw_firstname_lastname_laravel.zip. In the zip you will delete the vendor folder.

Handing in too late will result in a 0. I only accept submissions through Canvas. Canvas not working because you try to submit your project at the very last minute is not an excuse for handing in too late.
