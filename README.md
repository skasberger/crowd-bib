crowd bib
==============================

Crowd Bib is a form to collect bibliographic data within a scientific discipline via the crowd. The collected data is shared as open data and also the sourcecode is openly available.

It offers a submission form where you can enter the data, a list to present the collection, an about page and a own admin section to edit the submissions.

The sourcecode is licensed under the [MIT License](http://opensource.org/licenses/MIT).

The data is licensed under [Creative Commons BY](https://creativecommons.org/licenses/by/3.0/at/).

### [DEMO: Bibliography of Research on Data Journalism](http://b00mbl1tz.weblog.mur.at/ddjbib/)

## DEPLOY

After 10min, the deployment to your site should be finished.

**Prerequisites**

A mySQL database and a webserver running php. 

**1: Download repo**

Download this repo to your webspace with php running. 

**2: Create a database**

Go into your admin area and create a mySQL database. For this, you only have to change TABLENAME inside the ```create.sql``` template to your wish. 

**3: Setup your config.php**

Copy ```config-sample.php``` and rename it to ```config.php```. Then open it and add your paramters in support of the comments.

**4: Setup config-user.php**

Copy ```config-user-sample.php``` and rename it to ```config-user.php```. Enter your login data.

**Optional: Wordpress Template**

Copy the ```config.php``` and rename it to ```config-crowdbib.php```. Then copy the ```config-crowdbib.php```, ```template-crowdbib.php``` and ```sidebar-crowdbib.php``` in your wordpress theme folder. Now create a new page in wordpress and with the crowd-bib template.

## DOCUMENTATION
### General
Thanks a lot to [Danah Boyd](http://www.danah.org/) and [Dylan Field](https://twitter.com/dylanjfield), who developed the initial version of this crowd-sourced bibliography for research on [Social Network Sites](http://www.danah.org/researchBibs/sns.php) and [Twitter](http://www.danah.org/researchBibs/twitter.php). Danah provided the free source code, which [Stefan Kasberger](http://www.github.com/skasberger) built on and added some minor changes to make it more flexible in deployment and for use in wordpress.

Feel free to make your own bibliography for your own field of interest. The project was started during the fellowship of [Julian Ausserhofer](http://ausserhofer.net) at [Alexander von Humboldt Institute for Internet and Society](http://hiig.de/).

## ToDo
- improve wordpress template: sort by year
- provide RSS feed

## CHANGELOG
### Version 0.2 - 2013-08-26
- add delete function
- add wordpress theme
- add email notification
- improve list
- add alert for submission sheet
- add fields: doi, open access

### Version 0.1 - 2013-08-03
- add style.css
- renamed files to flexible structure
- adapt code structure for more flexibility
- add config-user.php for login data
- add create.sql for easy table creation in mySQL
- add wordpress page template
- clean up of code
- add .gitignore
- add documentation: README.md
- add LICENSE

<!--
## SOURCES

-->

